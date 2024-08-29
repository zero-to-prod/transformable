<?php

namespace Zerotoprod\Transformable;

trait Transformable
{
    public function toArray(): array
    {
        $array = [];
        foreach ($this as $property => $value) {
            if (is_array($value)) {
                $array[$property] = array_map(static function ($item) {
                    return is_object($item) ? get_object_vars($item) : $item;
                }, $value);

                continue;
            }

            if (!is_null($value)) {
                $array[$property] = is_object($value) ? get_object_vars($value) : $value;
            }
        }

        return $array;
    }


    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
