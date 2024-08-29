<?php

namespace Tests\Unit\ToJson;


use Zerotoprod\Transformable\Transformable;

class Base
{
    use Transformable;

    const id = 'id';
    const name = 'name';
    const Child = 'Child';

    /** @var int $id */
    public $id;
    /** @var string $name */
    public $name;
    /**
     * @var \Tests\Unit\ToJson\Child $Child
     */
    public $Child;
}