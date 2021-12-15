<?php

namespace RCerljenko\LaravelJwt;

use Firebase\JWT\JWT as FirebaseJwt;
use Firebase\JWT\Key as FirebaseJwtKey;

class JWT
{
	public static function encodeToken(object $user, array $config = []): string
	{
		$nbf = $config['valid_from'] ?? $user->getJwtValidFromTime() ?? now();

		$payload = [
			'iat' => now()->format('U'),
			'nbf' => $nbf->format('U'),
			'jti' => $config['id'] ?? $user->getJwtId()
		];

		if ($exp = $config['valid_until'] ?? $user->getJwtValidUntilTime()) {
			$payload['exp'] = $exp->format('U');
		}

		$payload = array_replace($payload, config('jwt.claims', []), $config['claims'] ?? $user->getJwtCustomClaims());

		return FirebaseJwt::encode($payload, static::getKeyObject());
	}

	public static function decodeToken(string $token): object
	{
		return FirebaseJwt::decode($token, static::getKeyObject());
	}

	private static function getKeyObject(): FirebaseJwtKey
	{
		return new FirebaseJwtKey(config('jwt.secret-key'), config('jwt.hash-algo'));
	}
}
