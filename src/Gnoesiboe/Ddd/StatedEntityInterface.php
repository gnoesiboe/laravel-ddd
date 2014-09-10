<?php

namespace Gnoesiboe\Ddd;

/**
 * Interface StatedEntityInterface
 */
interface StatedEntityInterface
{

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param mixed $state
     *
     * @return $this
     */
    public function setState($state);
}
