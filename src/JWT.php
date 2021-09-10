<?php

namespace RCerljenko\LaravelJwt;

use Firebase\JWT\JWT as FirebaseJwt;

class JWT
{
	public static function encodeToken(object $user, array $config = [])
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

		return FirebaseJwt::encode(array_replace($payload, config('jwt.claims', []), $config['claims'] ?? $user->getJwtCustomClaims()), config('jwt.secret-key'), config('jwt.hash-algo'));
	}

	public static function decodeToken(string $token)
	{
		return FirebaseJwt::decode($token, config('jwt.secret-key'), [config('jwt.hash-algo')]);
	}
}
