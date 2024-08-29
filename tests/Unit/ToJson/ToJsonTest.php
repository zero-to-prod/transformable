<?php

namespace Tests\Unit\ToJson;

use Tests\TestCase;
use Zerotoprod\Transformable\Transformable;

class ToJsonTest extends TestCase
{
    /**
     * @test
     *
     * @see Transformable
     */
    public function json(): void
    {
        $json = json_encode([
            Base::id => 1,
            Base::name => 'name',
            Base::Child => [
                Child::id => 1,
                Child::name => 'name',
            ]
        ]);

        $BaseClass = new Base();
        $BaseClass->id = 1;
        $BaseClass->name = 'name';
        $BaseClass->Child =  [
            Child::id => 1,
            Child::name => 'name',
        ];

        $this->assertEquals($json, $BaseClass->toJson());
    }
}