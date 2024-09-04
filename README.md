# Zerotoprod\Transformable
[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/transformable)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/zero-to-prod/transformable.svg)](https://packagist.org/packages/zero-to-prod/transformable)
![test](https://github.com/zero-to-prod/transformable/actions/workflows/phpunit.yml/badge.svg)
![Downloads](https://img.shields.io/packagist/dt/zero-to-prod/transformable.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/zero-to-prod/transformable&#41)

Transform a class into different types.

## Installation

You can install the package via Composer:

```bash
composer require zerotoprod/transformable
```

## Methods

- `toArray(): array` Converts the object’s properties into an associative array.
- `toJson(): string` Converts the object’s properties into a JSON string.

## Usage
To use the `Zerotoprod\Transformable\Transformable` trait in your class, simply include it:
```php
use Zerotoprod\Transformable\Transformable;

class YourDataModel
{
    use Transformable;

    public $name;
    public $email;
}

$model = new YourDataModel();
$model->name = 'John Doe';
$model->email = 'john.doe@example.com';

$array = $model->toArray();
$json = $model->toJson();
```