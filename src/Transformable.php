<?php

namespace Zerotoprod\Transformable;

/**
 * Provides transformation capabilities to convert object properties to arrays or JSON.
 *
 * The `Transformable` trait allows any class that uses it to easily convert its properties
 * into an associative array or a JSON string. This is particularly useful for data serialization
 * and API responses.
 */
trait Transformable
{
    /**
     * Converts the object's properties to an associative array.
     *
     * Iterates over each property of the object, transforming it into an array
     * if it is an object, or leaves it as-is if it's not. Nested arrays are also
     * handled by recursively converting objects within the array to associative arrays.
     *
     * @return array The object as an associative array.
     */
    public function toArray(): array
    {
        $array = [];
        foreach ($this as $property => $value) {
            if (is_array($value)) {
                $array[$property] = array_map(
                    static function ($item) {
                        return is_object($item) ? get_object_vars($item) : $item;
                    },
                    $value
                );

                continue;
            }

            if ($value) {
                $array[$property] = is_object($value) ? get_object_vars($value) : $value;
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
     * @return string The object as a JSON string.
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
