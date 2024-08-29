# Zerotoprod\Transformable

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