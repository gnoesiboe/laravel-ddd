<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Email
 */
class Email extends String
{

    /**
     * @param mixed $value
     */
    protected function validateValue($value)
    {
        parent::validateValue($value);

        $this->throwInvalidValueExceptionUnless(filter_var($value, FILTER_VALIDATE_EMAIL) !== false, 'Value should be of type string');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
