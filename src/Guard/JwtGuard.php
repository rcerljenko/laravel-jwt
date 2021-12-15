<?php

namespace RCerljenko\LaravelJwt\Guard;

use Exception;
use RCerljenko\LaravelJwt\JWT;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class JwtGuard implements Guard
{
	use GuardHelpers;

	public function __construct(UserProvider $provider)
	{
		$this->setProvider($provider);
	}

	/**
	 * Get the currently authenticated user.
	 */
	public function user(): ?Authenticatable
	{
		if ($this->hasUser() && !app()->runningUnitTests()) {
			return $this->user;
		}

		try {
			$decoded = $this->getTokenPayload();
		} catch (Exception $e) {
			abort(401, $e->getMessage());
		}

		if (!$decoded) {
			return null;
		}

		$this->user = $this->getProvider()->retrieveById($decoded->jti);

		return $this->user;
	}

	/**
	 * Validate a user's credentials.
	 */
	public function validate(array $credentials = []): bool
	{
		return !empty($this->attempt($credentials));
	}

	public function attempt(array $credentials = []): ?Authenticatable
	{
		$provider = $this->getProvider();

		$this->user = $provider->retrieveByCredentials($credentials);
		$this->user = $this->user && $provider->validateCredentials($this->user, $credentials) ? $this->user : null;

		return $this->user;
	}

	public function getTokenPayload(): ?object
	{
		$token = $this->getTokenFromRequest();

		return $token ? JWT::decodeToken($token) : null;
	}

	private function getTokenFromRequest(): ?string
	{
		$request = request();

		return $request->bearerToken() ?? $request->token;
	}
}
