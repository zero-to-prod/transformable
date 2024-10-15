<?php

namespace Zerotoprod\Transformable;

/**
 * @internal  For use within this package.
 * Behavior and function signatures are subject to change.
 * Use at your own risk.
 *
 * @link      https://github.com/zero-to-prod/transformable
 *
 * @see       https://github.com/zero-to-prod/data-model
 * @see       https://github.com/zero-to-prod/data-model-helper
 * @see       https://github.com/zero-to-prod/data-model-factory
 */
class Mapper
{
    use Transformable;

    /**
     * @internal  For use within this package.
     * Behavior and function signatures are subject to change.
     * Use at your own risk.
     *
     * @link      https://github.com/zero-to-prod/transformable
     *
     * @see       https://github.com/zero-to-prod/data-model
     * @see       https://github.com/zero-to-prod/data-model-helper
     * @see       https://github.com/zero-to-prod/data-model-factory
     */
    public function __construct($items)
    {
        foreach ($items as $key => $item) {
            $this->$key = $item;
        }
    }
}
