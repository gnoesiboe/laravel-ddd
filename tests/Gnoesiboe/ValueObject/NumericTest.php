<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\Numeric;

/**
 * Class NumericTest
 */
class NumericTest extends \PHPUnit_Framework_TestCase
{

    public function testDoesNotAcceptNonNumericValues()
    {
        $nonNumericValues = array(
            new \stdClass(),
            array(),
            'string'
        );

        foreach ($nonNumericValues as $nonNumericValue) {
            try {
                new Numeric($nonNumericValue);

                $this->fail('An exception has not been raised for value: ' . $nonNumericValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptNumericValues()
    {
        $numericValues = array(
            '123',
            1234,
            123.43
        );

        foreach ($numericValues as $numericValue) {
            $numeric = new Numeric($numericValue);
            $this->assertTrue($numeric instanceof Numeric);
        }
    }
}
