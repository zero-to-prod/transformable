<?php

namespace Tests\Unit\ToArray;

use stdClass;
use Tests\TestCase;
use Zerotoprod\Transformable\Transformable;

class ToArrayTest extends TestCase
{

    /**
     * @test
     *
     * @see Transformable
     */
    public function scalars(): void
    {
        $model = new Base();
        $model->string = "Test String";
        $model->int = 42;
        $model->float = 3.14;
        $model->bool = true;

        $expected = [
            Base::string => "Test String",
            Base::int => 42,
            Base::float => 3.14,
            Base::bool => true,
        ];

        $this->assertEquals($expected, $model->toArray());
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function array(): void
    {
        $model = new Base();
        $model->array = ['key1' => 'value1', 'key2' => 'value2'];

        $expected = [
            Base::array => ['key1' => 'value1', 'key2' => 'value2'],
        ];

        $this->assertEquals($expected, $model->toArray());
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function object(): void
    {
        $innerObject = new stdClass();
        $innerObject->property1 = "value1";
        $innerObject->property2 = "value2";

        $model = new Base();
        $model->object = $innerObject;

        $expected = [
            base::object => [
                'property1' => "value1",
                'property2' => "value2",
            ],
        ];

        $this->assertEquals($expected, $model->toArray());
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function null(): void
    {
        $model = new Base();
        $model->null = null;

        $expected = [
        ];

        $this->assertEquals($expected, $model->toArray());
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function resource(): void
    {
        $resource = fopen('php://memory', 'rb+');
        fwrite($resource, 'Test Data');
        rewind($resource);

        $model = new Base();
        $model->resource = $resource;

        $expected = [
            Base::resource => $resource,
        ];

        $this->assertEquals($expected, $model->toArray());

        fclose($resource);
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function nested_array_and_object(): void
    {
        $innerObject = new stdClass();
        $innerObject->property1 = "value1";

        $model = new Base();
        $model->array = ['key1' => 'value1', 'key2' => $innerObject];

        $expected = [
            Base::array => [
                'key1' => 'value1',
                'key2' => [
                    'property1' => "value1",
                ],
            ],
        ];

        $this->assertEquals($expected, $model->toArray());
    }

    /**
     * @test
     *
     * @see Transformable
     */
    public function all_types(): void
    {
        $resource = fopen('php://memory', 'rb+');
        fwrite($resource, 'Test Data');
        rewind($resource);

        $innerObject = new stdClass();
        $innerObject->property1 = "value1";

        $model = new Base();
        $model->string = "Test String";
        $model->int = 42;
        $model->float = 3.14;
        $model->bool = true;
        $model->array = ['key1' => 'value1', 'key2' => $innerObject];
        $model->object = $innerObject;
        $model->null = null;
        $model->resource = $resource;

        $expected = [
            Base::string => "Test String",
            Base::int => 42,
            Base::float => 3.14,
            Base::bool => true,
            Base::array => [
                'key1' => 'value1',
                'key2' => [
                    'property1' => "value1",
                ],
            ],
            Base::object => [
                'property1' => "value1",
            ],
            Base::resource => $resource,
        ];

        $this->assertEquals($expected, $model->toArray());

        fclose($resource);
    }
}