<?php

namespace Gnoesiboe\Ddd;

/**
 * Interface ValueObjectInterface
 */
interface ValueObjectInterface
{

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function is(ValueObject $valueObject);
}
