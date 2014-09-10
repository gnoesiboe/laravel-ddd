<?php

namespace Gnoesiboe\Ddd;

/**
 * Class Command
 */
abstract class Command
{

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }
}
