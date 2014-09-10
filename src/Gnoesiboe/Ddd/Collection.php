<?php

namespace Gnoesiboe\Ddd;

use Illuminate\Support\Contracts\ArrayableInterface;

/**
 * Collection
 */
class Collection implements CollectionInterface
{

    /**
     * The items contained in the collection.
     *
     * @var array
     */
    protected $items = array();

    /**
     * @param  array  $items
     */
    public function __construct(array $items = array())
    {
        $this->setItems($items);
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        $this->validateHas($offset);

        return $this->items[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Execute a callback over each item.
     *
     * @param  \Closure $callback
     * @return $this
     */
    public function each(\Closure $callback)
    {
        array_map($callback, $this->items);

        return $this;
    }

    /**
     * Run a filter over each of the items.
     *
     * @param  \Closure  $callback
     * @return $this
     */
    public function filter(\Closure $callback)
    {
        return new static(array_filter($this->items, $callback));
    }

    /**
     * Get an item from the collection by key.
     *
     * @param  int|string $key
     * @param  mixed $default
     *
     * @return mixed`
     */
    public function get($key, $default = null)
    {
        return $this->has($key) === true ? $this->items[$key] : $default;
    }

    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  string|int $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * @param string $key
     * @throws \UnexpectedValueException
     */
    protected function validateHas($key)
    {
        if ($this->has($key) === false) {
            throw new \UnexpectedValueException('Collection does not have an entry with key: ' . $key);
        }
    }

    /**
     * Determine if the collection is empty or not.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->items) === 0;
    }

    /**
     * Get the last item from the collection.
     *
     * @param mixed $default
     * @return mixed
     */
    public function last($default = null)
    {
        return count($this->items) > 0 ? end($this->items) : $default;
    }

    /**
     * Run a map over each of the items.
     *
     * @param \Closure $callback
     * @return $this
     */
    public function map(\Closure $callback)
    {
        return new static(array_map($callback, $this->items, array_keys($this->items)));
    }

    /**
     * Sort through each item with a callback.
     *
     * @param \Closure $callback
     * @return $this
     */
    public function sort(\Closure $callback)
    {
        uasort($this->items, $callback);

        return $this;
    }

    /**
     * Get the first item from the collection.
     *
     * @param  mixed $default
     * @return mixed
     */
    public function first($default = null)
    {
        return count($this->items) > 0 ? reset($this->items) : $default;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $out = array();

        foreach ($this->items as $key => $item) {
            $out[$key] = $item instanceof ArrayableInterface ? $item->toArray() : $item;
        }

        return $out;
    }
}
