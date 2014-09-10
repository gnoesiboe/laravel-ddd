<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Title
 */
class String extends ValueObject
{

    /**
     * @param mixed $value
     */
    protected function validateValue($value)
    {
        $this->throwInvalidValueExceptionUnless(is_string($value) === true, 'Value should be of type string');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
