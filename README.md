# Scopify

[![Latest Version on Packagist](https://img.shields.io/packagist/v/allenjd3/scopify.svg?style=flat-square)](https://packagist.org/packages/allenjd3/scopify)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/allenjd3/scopify/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/allenjd3/scopify/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/allenjd3/scopify/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/allenjd3/scopify/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/allenjd3/scopify.svg?style=flat-square)](https://packagist.org/packages/allenjd3/scopify)

This package allows you to quickly create filters and query objects and use them in your laravel scopes.

## Installation

You can install the package via composer:

```bash
composer require allenjd3/scopify
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="scopify-config"
```

This is the contents of the published config file:

```php
return [
    'default-namespace' => 'App\\Filters',
];
```

## Usage

Create a new filter with

```bash
php artisan make:scopify YourFilter
```

Then in your model, add the Filterable trait

```php
class User extends Authenticatable
{
    use Filterable;
}
```

Then you can use your filters like this-

```php
...
public function scopeMyScope($query)
{
    return (new App\Filters\MyFilter)->call($query)
}
```

Optionally you can also override the scopifyFilters method to add scopes

```php
protected function scopifyFilters()
{
    return [
        'myScope' => MyFilter::class,
    ];
}
```

You can now use your scope like you normally would- `User::myScope()->get()`

## Applying Multiple Filters

You can apply multiple filters like this-

```php
User::filters([
    MyFilter::class,
    MyOtherFilter::class,
])->get();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [James Allen](https://github.com/allenjd3)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
