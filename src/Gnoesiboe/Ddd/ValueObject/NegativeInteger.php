<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;

/**
 * Class NegativeInteger
 */
class NegativeInteger extends Integer
{

    /**
     * @param mixed $value
     *
     * @throws InvalidValueException
     */
    protected function validateValue($value)
    {
        parent::validateValue($value);

        $this->throwInvalidValueExceptionUnless((int)$value < 0, 'Value should be less than zero');
    }
}
