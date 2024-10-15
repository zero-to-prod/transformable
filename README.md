# Zerotoprod\Transformable

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/transformable)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/transformable/phpunit.yml?label=tests)](https://github.com/zero-to-prod/transformable/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/transformable?color=blue)](https://packagist.org/packages/zero-to-prod/transformable/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/transformable?color=f28d1a)](https://packagist.org/packages/zero-to-prod/transformable)
[![GitHub repo size](https://img.shields.io/github/repo-size/zero-to-prod/transformable)](https://github.com/zero-to-prod/transformable)
[![License](https://img.shields.io/packagist/l/zero-to-prod/transformable?color=red)](https://github.com/zero-to-prod/transformable/blob/main/LICENSE.md)

Transform a class into different types.

## Installation

You can install the package via Composer:

```bash
composer require zerotoprod/transformable
```

### Additional Packages

- [DataModel](https://github.com/zero-to-prod/data-model): Transform data into a class.
- [DataModelHelper](https://github.com/zero-to-prod/data-model-helper): Helpers for a `DataModel`.
- [DataModelFactory](https://github.com/zero-to-prod/data-model-factory): A factory helper to set the value of your `DataModel`.

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