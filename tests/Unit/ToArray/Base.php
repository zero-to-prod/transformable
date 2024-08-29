<?php

namespace Tests\Unit\ToArray;

use Zerotoprod\Transformable\Transformable;

class Base
{
    use Transformable;

    public const string = 'string';
    public const int = 'int';
    public const float = 'float';
    public const bool = 'bool';
    public const array = 'array';
    public const object = 'object';
    public const null = 'null';
    public const resource = 'resource';
    public $string;
    public $int;
    public $float;
    public $bool;
    public $array;
    public $object;
    public $null;
    public $resource;
}