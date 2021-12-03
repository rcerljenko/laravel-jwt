<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Secret key
	|--------------------------------------------------------------------------
	|
	| Used for token encoding/decoding.
	| We can leverage from "php artisan key:generate" here or you can change it to custom secret key.
	|
	 */

	'secret-key' => env('APP_KEY'),

	/*
	|--------------------------------------------------------------------------
	| Hash algo
	|--------------------------------------------------------------------------
	|
	| Supported algos: 'ES256', 'ES384', 'HS256', 'HS384', 'HS512', 'RS256', 'RS384', 'RS512', 'EdDSA'
	|
	 */

	'hash-algo' => env('JWT_HASH_ALGO', 'HS512'),

	/*
	|--------------------------------------------------------------------------
	| Token expiration (in minutes)
	|--------------------------------------------------------------------------
	|
	| Token expiration time defined in minutes. If null then token has no expiration at all (lifetime token).
	|
	 */

	'expiration' => env('JWT_EXPIRATION', 60 * 24),

	/*
	|--------------------------------------------------------------------------
	| Default claims
	|--------------------------------------------------------------------------
	|
	| These claims will be in all tokens.
	|
	 */

	'claims' => [
		'iss' => env('APP_URL'),
		'aud' => env('APP_URL')
	]
];
