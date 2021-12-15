<?php

namespace RCerljenko\LaravelJwt\Traits;

use Illuminate\Support\Carbon;
use RCerljenko\LaravelJwt\JWT;

trait HasJwt
{
	public function getJwtId(): string
	{
		return $this->getKey();
	}

	public function getJwtValidFromTime(): ?Carbon
	{
		return null;
	}

	public function getJwtValidUntilTime(): ?Carbon
	{
		$expiration = config('jwt.expiration');

		return $expiration ? now()->addMinutes($expiration) : null;
	}

	public function getJwtCustomClaims(): array
	{
		return [];
	}

	public function token(array $config = []): string
	{
		return JWT::encodeToken($this, $config);
	}
}
