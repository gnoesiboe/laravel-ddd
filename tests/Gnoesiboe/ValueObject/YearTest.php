<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\Year;

/**
 * Class YearTest
 */
class YearTest extends \PHPUnit_Framework_TestCase
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
                new Year($nonIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $nonIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testOnlyAcceptsPositiveIntegers()
    {
        $numericValues = array(
            '123',
            1234
        );

        foreach ($numericValues as $numericValue) {
            $numeric = new Year($numericValue);
            $this->assertTrue($numeric instanceof Year);
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
                new Year($negativeIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $negativeIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }
}
