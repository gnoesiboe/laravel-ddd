<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\Email;

/**
 * Class Email
 */
class EmailTest extends \PHPUnit_Framework_TestCase
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
                new Email($nonStringValue);

                $this->fail('An exception has not been raised for value: ' . $nonStringValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesNotAcceptInvalidEmailAdresses()
    {
        $invalidEmailAdresses = array(
            'test',
            'test@test',
            'waadf938293'
        );

        foreach ($invalidEmailAdresses as $invalidEmailAddress) {
            try {
                new Email($invalidEmailAddress);

                $this->fail('An exception has not been raised for value: ' . $invalidEmailAddress);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testDoesAcceptValidEmailAdresses()
    {
        $validEmailAddresses = array(
            'gijsnieuwenhuis@gmail.com',
            'klaas.vaak@hotmail.com',
            'pieter.post-derde@water.overig.nl'
        );

        foreach ($validEmailAddresses as $validEmailAddress) {
            $email = new Email($validEmailAddress);
            $this->assertTrue($email instanceof Email);
        }
    }

    public function testTypecastToStringReturnsStringInput()
    {
        $input = 'gijsnieuwenhuis@gmail.com';

        $email = new Email($input);

        $this->assertEquals((string)$email, $input);
    }
}
