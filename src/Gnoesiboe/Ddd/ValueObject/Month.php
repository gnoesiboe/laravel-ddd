<?php

namespace Gnoesiboe\Ddd\ValueObject;

/**
 * Class Month
 */
class Month extends Enum
{

    /** @var int */
    const JANUARY = 1;

    /** @var int */
    const FEBRUARY = 2;

    /** @var int */
    const MARCH = 3;

    /** @var int */
    const APRIL = 4;

    /** @var int */
    const MAY = 5;

    /** @var int */
    const JUNE = 6;

    /** @var int */
    const JULY = 7;

    /** @var int */
    const AUGUST = 8;

    /** @var int */
    const SEPTEMBER = 9;

    /** @var int */
    const OCTOBER = 10;

    /** @var int */
    const NOVEMBER = 11;

    /** @var int */
    const DECEMBER = 12;

    /**
     * @return static
     */
    public static function current()
    {
        $now = new \DateTime();

        return new static((int)$now->format('n'));
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return static
     */
    public static function fromDateTime(\DateTime $dateTime)
    {
        return new static((int)$dateTime->format('n'));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }
}
