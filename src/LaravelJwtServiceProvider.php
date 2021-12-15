<?php

namespace RCerljenko\LaravelJwt;

use Illuminate\Support\ServiceProvider;
use RCerljenko\LaravelJwt\Guard\JwtGuard;

class LaravelJwtServiceProvider extends ServiceProvider
{
	public function boot(): void
	{
		$this->publishConfig();

		$this->extendAuthGuard();
	}

	public function register(): void
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/jwt.php', 'jwt');
	}

	private function publishConfig(): void
	{
		$this->publishes([
			__DIR__ . '/../config/jwt.php' => config_path('jwt.php'),
		], 'config');
	}

	private function extendAuthGuard(): void
	{
		auth()->extend('jwt', function ($app, $name, array $config) {
			return new JwtGuard(auth()->createUserProvider($config['provider']));
		});
	}
}
