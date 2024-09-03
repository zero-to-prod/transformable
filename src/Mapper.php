<?php

namespace Zerotoprod\Transformable;

class Mapper
{
    use Transformable;

    public function __construct($items)
    {
        foreach ($items as $key => $item) {
            $this->$key = $item;
        }
    }
}