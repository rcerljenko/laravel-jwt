<?php

namespace RCerljenko\LaravelJwt\Traits;

use RCerljenko\LaravelJwt\JWT;

trait HasJwt
{
	public function getJwtId()
	{
		return $this->getKey();
	}

	public function getJwtValidFromTime()
	{
	}

	public function getJwtValidUntilTime()
	{
		$expirationTime = config('jwt.expiration-time');

		return $expirationTime ? now()->addMinutes($expirationTime) : null;
	}

	public function getJwtCustomClaims()
	{
		return [];
	}

	public function token(array $config = [])
	{
		return JWT::encodeToken($this, $config);
	}

	public function getTokenPayload(string $token)
	{
		return JWT::decodeToken($token);
	}
}
