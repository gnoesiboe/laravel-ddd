<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Integer
 */
class Integer extends ValueObject
{

    /**
     * @param string|int $value
     *
     * @return int
     */
    protected function prepareValue($value)
    {
        return (int)$value;
    }

    /**
     * @param mixed $value
     */
    protected function validateValue($value)
    {
        $this->throwInvalidValueExceptionUnless(filter_var($value, FILTER_VALIDATE_INT) !== false, 'Value should be an integer');
    }
}
