<?php

namespace Zerotoprod\Transformable;

/**
 * @internal For use within this package.
 * Behavior and function signatures are subject to change.
 * Use at your own risk.
 *
 * @see      https://github.com/zero-to-prod/transformable
 */
class Mapper
{
    use Transformable;

    /**
     * @internal For use within this package.
     * Behavior and function signatures are subject to change.
     * Use at your own risk.
     *
     * @see      https://github.com/zero-to-prod/transformable
     */
    public function __construct($items)
    {
        foreach ($items as $key => $item) {
            $this->$key = $item;
        }
    }
}
