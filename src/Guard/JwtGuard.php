<?php

namespace RCerljenko\LaravelJwt\Guard;

use Exception;
use RCerljenko\LaravelJwt\JWT;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;

class JwtGuard implements Guard
{
	use GuardHelpers;

	public function __construct(UserProvider $provider)
	{
		$this->setProvider($provider);
	}

	/**
	 * Get the currently authenticated user.
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function user()
	{
		if ($this->user && !app()->runningUnitTests()) {
			return $this->user;
		}

		try {
			$decoded = $this->getTokenPayload();
		} catch (Exception $e) {
			abort(401, $e->getMessage());
		}

		if (!$decoded) {
			return;
		}

		$this->user = $this->getProvider()->retrieveById($decoded->jti);

		return $this->user;
	}

	/**
	 * Validate a user's credentials.
	 *
	 * @return bool
	 */
	public function validate(array $credentials = [])
	{
		return !empty($this->attempt($credentials));
	}

	public function attempt(array $credentials = [])
	{
		$provider = $this->getProvider();

		$this->user = $provider->retrieveByCredentials($credentials);
		$this->user = $this->user && $provider->validateCredentials($this->user, $credentials) ? $this->user : null;

		return $this->user;
	}

	public function getTokenPayload()
	{
		$token = $this->getTokenFromRequest();

		return $token ? JWT::decodeToken($token) : null;
	}

	private function getTokenFromRequest()
	{
		$request = request();

		return $request ? ($request->bearerToken() ?? $request->token) : null;
	}
}
