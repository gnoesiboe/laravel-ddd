<?php

namespace Gnoesiboe\Ddd;

use Gnoesiboe\Ddd\Exception\InvalidValueException;

/**
 * Class ValueObject
 */
abstract class ValueObject implements ValueObjectInterface
{

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var array
     */
    protected $rules = null;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @param string $value
     */
    protected function setValue($value)
    {
        $this->validateValue($value);

        $this->value = $this->prepareValue($value);
    }

    /**
     * Override to add own functionality
     *
     * @param mixed $value
     *
     * @return mixed
     */
    protected function prepareValue($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     */
    abstract protected function validateValue($value);

    /**
     * @param bool        $condition
     * @param null|string $message
     *
     * @throws InvalidValueException
     */
    protected function throwInvalidValueExceptionUnless($condition, $message = null)
    {
        if ((bool)$condition === false) {
            throw $this->createInvalidValueException($message);
        }
    }

    /**
     * @param string|null $message
     *
     * @return InvalidValueException
     */
    protected function createInvalidValueException($message = null)
    {
        return new InvalidValueException($message);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function is(ValueObject $valueObject)
    {
        return $this === $valueObject || ($valueObject instanceof static && $this->value === $valueObject->getValue());
    }
}
