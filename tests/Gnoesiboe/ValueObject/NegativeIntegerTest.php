<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\NegativeInteger;

/**
 * Class PositiveIntegerTest
 */
class NegativeIntegerTest extends \PHPUnit_Framework_TestCase
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
                new NegativeInteger($nonIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $nonIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesNotAcceptPossitiveIntegerValues()
    {
        $negativeIntegerValues = array(
            129,
            '1942'
        );

        foreach ($negativeIntegerValues as $negativeIntegerValue) {
            try {
                new NegativeInteger($negativeIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $negativeIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptNegativeIntegerValues()
    {
        $numericValues = array(
            '-123',
            -1234
        );

        foreach ($numericValues as $numericValue) {
            $numeric = new NegativeInteger($numericValue);
            $this->assertTrue($numeric instanceof NegativeInteger);
        }
    }
}
