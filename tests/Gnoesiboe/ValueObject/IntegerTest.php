<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\Integer;

/**
 * Class IntegerTest
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
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
                new Integer($nonIntegerValue);

                $this->fail('An exception has not been raised for value: ' . $nonIntegerValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptIntegerValues()
    {
        $numericValues = array(
            '123',
            1234
        );

        foreach ($numericValues as $numericValue) {
            $numeric = new Integer($numericValue);
            $this->assertTrue($numeric instanceof Integer);
        }
    }
}
