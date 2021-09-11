# Laravel JWT

Simple JWT Auth for Laravel PHP Framework using [Firebase JWT](https://github.com/firebase/php-jwt) under the hood.

## Installation

Standard [Composer](https://getcomposer.org/download) package installation:

```sh
composer require rcerljenko/laravel-jwt -v
```

## Usage

1. Publish the config file. This will create a `config/jwt.php` file for basic configuration options.

```sh
php artisan vendor:publish --provider="RCerljenko\LaravelJwt\LaravelJwtServiceProvider" --tag="config"
```

2. Add a new auth guard to your auth config file using a `jwt` driver.

```php
// config/auth.php

'guards' => [
	'web' => [
		'driver' => 'session',
		'provider' => 'users',
	],

	'api' => [
		'driver' => 'jwt',
		'provider' => 'users',
	],
],
```

3. Protect your API routes using this new guard.

```php
// routes/api.php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
	// JWT protected routes
});
```

4. Use provided Trait from this package on your Auth model (eg. User).

```php
namespace App\Models;

use RCerljenko\LaravelJwt\Traits\HasJwt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable, HasJwt;
}
```
