<?php

namespace RCerljenko\LaravelJwt;

use Illuminate\Support\ServiceProvider;

class LaravelJwtServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../config/jwt.php' => config_path('jwt.php'),
		], 'config');
	}

	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/jwt.php', 'jwt');
	}
}
