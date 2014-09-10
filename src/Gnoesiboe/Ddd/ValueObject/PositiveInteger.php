<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;

/**
 * Class PossitiveInteger
 */
class PositiveInteger extends Integer
{

    /**
     * @param string|int $value
     *
     * @throws InvalidValueException
     */
    protected function validateValue($value)
    {
        parent::validateValue($value);

        $this->throwInvalidValueExceptionUnless((int)$value >= 0, 'Value should be greater than or equal to zero');
    }
}
