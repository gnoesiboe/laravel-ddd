<?php

namespace Gnoesiboe\Ddd\ValueObject;

use Gnoesiboe\Ddd\ValueObject;

/**
 * Class Year
 */
class Year extends PositiveInteger
{

    /**
     * @return static
     */
    public static function current()
    {
        $now = new \DateTime();

        return new static((int)$now->format('Y'));
    }

    /**
     * @param \DateTime $dateTime
     *
     * @return static
     */
    public static function fromDateTime(\DateTime $dateTime)
    {
        return new static((int)$dateTime->format('Y'));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }
}
