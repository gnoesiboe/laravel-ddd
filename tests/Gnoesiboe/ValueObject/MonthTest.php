<?php

namespace Gnoesiboe\ValueObject;

use Gnoesiboe\Ddd\Exception\InvalidValueException;
use Gnoesiboe\Ddd\ValueObject\Month;

/**
 * Class MonthTest
 */
class MonthTest extends \PHPUnit_Framework_TestCase
{

    public function testDoesNotAcceptValueThatAreNotSetAsConstants()
    {
        $notSupportedValues = array(
            'test',
            1332,
            22.03,
            new \stdClass(),
            array()
        );

        foreach ($notSupportedValues as $notSupportedValue) {
            try {
                new Month($notSupportedValue);

                $this->fail('An exception has not been raised for value: ' . $notSupportedValue);
            } catch (\Exception $exception) {
                $this->assertTrue($exception instanceof InvalidValueException);
            }
        }
    }

    public function testAcceptsValuesThatAreSetAsContants()
    {
        $supportedValues = array_values(Month::getConstants());

        foreach ($supportedValues as $supportedValue) {
            $month = new Month($supportedValue);
            $this->assertTrue($month instanceof Month);
        }
    }

    public function testCurrentMethodCreatesAMonthObjectWithTheCurrentMonth()
    {
        $now = new \DateTime();
        $currentMonth = (int)$now->format('n');

        $month = Month::current();

        $this->assertEquals($month->getValue(), $currentMonth);
    }

    public function testStringTypecastReturnsStringValueOfMonth()
    {
        $monthId = Month::JANUARY;
        $month = new Month($monthId);

        $this->assertEquals((string)$month, (string)$monthId);
    }
}
