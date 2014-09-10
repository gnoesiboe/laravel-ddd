<?php

namespace Gnoesiboe\Ddd;

use Illuminate\Support\Contracts\ArrayableInterface;

/**
 * Class Model
 */
abstract class StatedEntity implements StatedEntityInterface, ArrayableInterface
{

    /**
     * @var mixed
     */
    protected $state;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->setState($this->createState());
    }

    /**
     * @return mixed
     */
    abstract protected function createState();

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->validateState($state);

        $this->state = $state;

        return $this;
    }

    /**
     * @param mixed $state
     *
     * @throws \UnexpectedValueException
     */
    abstract protected function validateState($state);

    /**
     * @return array
     */
    public function toArray()
    {
        $state = $this->state;

        return array(
            'state' => $state instanceof ArrayableInterface ? $state->toArray() : $state
        );
    }
}
