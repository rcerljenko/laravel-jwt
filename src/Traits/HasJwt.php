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
		$expiration = config('jwt.expiration');

		return $expiration ? now()->addMinutes($expiration) : null;
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
