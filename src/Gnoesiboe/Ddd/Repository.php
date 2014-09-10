<?php

namespace Gnoesiboe\Ddd;

/**
 * Class Repository
 */
abstract class Repository
{

    /**
     * @return static
     */
    public static function createInstance()
    {
        return \App::make(get_called_class());
    }
}
