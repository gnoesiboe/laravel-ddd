<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Enum
 */
abstract class Enum extends ValueObject
{

    /**
     * @var array
     */
    private static $constants = array();

    /**
     * @param mixed $value
     */
    protected function validateValue($value)
    {
        $supported = array_values(self::extractConstants(get_called_class()));

        $this->throwInvalidValueExceptionUnless(in_array($value, $supported, true), 'Value should be one of: ' . implode(', ', $supported));
    }

    /**
     * @return array
     */
    public static function getConstants()
    {
        return self::extractConstants(get_called_class());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return array_search($this->value, self::extractConstants(get_called_class()), true);
    }

    /**
     * @param string $class
     *
     * @return array
     */
    private static function extractConstants($class)
    {
        if (is_array(self::$constants[$class]) === true) {
            return self::$constants[$class];
        }

        $reflection = new \ReflectionClass($class);

        $constants = $reflection->getConstants();
        self::validateClassConstantsAreUnique($constants);

        // This is required to make sure that constants of base classes will be the first
        while (($reflection = $reflection->getParentClass()) && $reflection->name !== __CLASS__) {
            $constants = $reflection->getConstants() + $constants;
        }

        self::$constants[$class] = $constants;

        return $constants;
    }

    /**
     * @param array $constants
     */
    private static function validateClassConstantsAreUnique(array $constants)
    {
        // values needs to be unique
        $ambiguous = array();
        foreach ($constants as $value) {
            $nameOccurrenceForValue = array_keys($constants, $value, true);

            if (count($nameOccurrenceForValue) > 1) {
                $ambiguous[var_export($value, true)] = $nameOccurrenceForValue;
            }
        }
        if (count($ambiguous) > 0) {
            throw new \UnexpectedValueException('All possible constant values needs to be unique');
        }
    }
}
