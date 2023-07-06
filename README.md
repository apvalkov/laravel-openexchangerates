# Laravel openexchangerates

## Installation

Require this package with composer using the following command:

```bash
composer require apvalkov/laravel-openexchangerates
```

Add the following class to the `providers` array in `config/app.php`:

```php
Apvalkov\LaravelOpenexchangerates\ServiceProvider::class,
```

You can also publish the config file to change implementations (ie. interface to specific class).

```shell
php artisan vendor:publish --provider="Apvalkov\LaravelOpenexchangerates\ServiceProvider"
```

Set your openexchangerates app id

```dotenv
OPEN_EXCHANGE_RATES_APP_ID=your-app-id-here
```

## How to use

```php
// Latest
$rates = (new Openexchangerates())->latest(new LatestRatesRequest());

//Historical
$rates = (new Openexchangerates())->historical(new LatestRatesRequest(), Carbon::now());
```
