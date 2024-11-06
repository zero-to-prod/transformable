<?php

namespace Zerotoprod\Transformable;

/**
 * Provides transformation capabilities to convert object properties to arrays or JSON.
 *
 * The `Transformable` trait allows any class that uses it to easily convert its properties
 * into an associative array or a JSON string. This is particularly useful for data serialization
 * and API responses.
 *
 * @link      https://github.com/zero-to-prod/transformable
 *
 * @see       https://github.com/zero-to-prod/data-model
 * @see       https://github.com/zero-to-prod/data-model-helper
 * @see       https://github.com/zero-to-prod/data-model-factory
 */
trait Transformable
{
    /**
     * Recursively converts a classes properties to an associative array.
     *
     * Iterates over each property of the object, transforming it into an array
     * if it is an object, or leaves it as-is if it's not. Nested arrays are also
     * handled by recursively converting objects within the array to associative arrays.
     *
     * Example
     * ```
     * $MyClass->toArray();
     * ```
     *
     * @return array The object as an associative array.
     *
     * @link      https://github.com/zero-to-prod/transformable
     *
     * @see       https://github.com/zero-to-prod/data-model
     * @see       https://github.com/zero-to-prod/data-model-helper
     * @see       https://github.com/zero-to-prod/data-model-factory
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this as $property => $value) {
            if ($value) {
                if($value instanceof \UnitEnum){
                    $array[$property] = $value->value;
                    continue;
                }
                $array[$property] = is_array($value) || is_object($value)
                    ? (new Mapper($value))->toArray()
                    : $value;
            }
        }

        return $array;
    }

    /**
     * Converts the object's properties to a JSON string.
     *
     * Uses the `toArray` method to first transform the object into an associative array,
     * then encodes it to a JSON string.
     *
     * Example
     *  ```
     *  $MyClass->toArray();
     *  ```
     *
     * @return string The object as a JSON string.
     *
     * @link      https://github.com/zero-to-prod/transformable
     *
     * @see       https://github.com/zero-to-prod/data-model
     * @see       https://github.com/zero-to-prod/data-model-helper
     * @see       https://github.com/zero-to-prod/data-model-factory
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
