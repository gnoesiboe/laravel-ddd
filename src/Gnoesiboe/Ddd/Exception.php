<?php

namespace Gnoesiboe\Ddd;

/**
 * Class Exception
 */
abstract class Exception extends \Exception
{

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }
}
