<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\String;

/**
 * Class StringTest
 */
class StringTest extends \PHPUnit_Framework_TestCase
{

    public function testDoesNotAcceptNonStrings()
    {
        $nonStringValues = array(
            123,
            new \stdClass(),
            array(),
            129.39
        );

        foreach ($nonStringValues as $nonStringValue) {
            try {
                new String($nonStringValue);

                $this->fail('An exception has not been raised for value: ' . $nonStringValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptStringValue()
    {
        $stringValue = 'string value';

        $string = new String($stringValue);

        $this->assertTrue($string instanceof String);
    }

    public function testTypecastToStringReturnsStringInput()
    {
        $stringInput = 'string input';

        $stringObject = new String($stringInput);

        $this->assertEquals((string)$stringObject, $stringInput);
    }
}
