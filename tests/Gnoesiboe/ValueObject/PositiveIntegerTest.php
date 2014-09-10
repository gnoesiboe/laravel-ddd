<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\PositiveInteger;

/**
 * Class PositiveIntegerTest
 */
class PositiveIntegerTest extends \PHPUnit_Framework_TestCase
{

    public function testDoesNotAcceptNonIntegerValues()
    {
        $nonIntegerValues = array(
            new \stdClass(),
            array(),
            'string',
            '123.2',
            1234.23
        );

        foreach ($nonIntegerValues as $nonIntegerValue) {
            try {
                new PositiveInteger($nonIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $nonIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesNotAcceptNegativeIntegerValues()
    {
        $negativeIntegerValues = array(
            -129,
            '-1944'
        );

        foreach ($negativeIntegerValues as $negativeIntegerValue) {
            try {
                new PositiveInteger($negativeIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $negativeIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptPositiveIntegerValues()
    {
        $numericValues = array(
            '123',
            1234
        );

        foreach ($numericValues as $numericValue) {
            $positiveInteger = new PositiveInteger($numericValue);
            $this->assertTrue($positiveInteger instanceof PositiveInteger);
        }
    }

    public function testDoesAcceptZero()
    {
        $possitiveInteger = new PositiveInteger(0);
        $this->assertTrue($possitiveInteger instanceof PositiveInteger);
    }
}
