<?php

return [
	'secret-key' => env('JWT_SECRET_KEY'),

	'hash-algo' => env('JWT_HASH_ALGO', 'HS512'),

	'expiration-time' => env('JWT_EXPIRATION_TIME', 60 * 24),

	'claims' => [
		'iss' => env('APP_URL'),
		'aud' => env('APP_URL')
	]
];
