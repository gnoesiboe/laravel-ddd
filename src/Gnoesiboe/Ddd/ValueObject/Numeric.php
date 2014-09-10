<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Numeric
 */
class Numeric extends ValueObject
{

    /**
     * @param mixed $value
     */
    protected function validateValue($value)
    {
        $this->throwInvalidValueExceptionUnless(is_numeric($value) === true, 'Value should be numeric');
    }
}
