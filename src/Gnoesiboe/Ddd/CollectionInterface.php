<?php

namespace Gnoesiboe\Ddd;

use Illuminate\Support\Contracts\ArrayableInterface;

/**
 * Interface CollectionInterface
 */
interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate, ArrayableInterface
{

    /**
     * Execute a callback over each item.
     *
     * @param  \Closure $callback
     * @return $this
     */
    public function each(\Closure $callback);

    /**
     * @param array $items
     */
    public function setItems(array $items);

    /**
     * @return array
     */
    public function getItems();

    /**
     * Run a filter over each of the items.
     *
     * @param  \Closure  $callback
     * @return $this
     */
    public function filter(\Closure $callback);

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  string|int $key
     * @return bool
     */
    public function has($key);

    /**
     * Determine if the collection is empty or not.
     *
     * @return bool
     */
    public function isEmpty();

    /**
     * Get the last item from the collection.
     *
     * @param mixed $default
     * @return mixed
     */
    public function last($default = null);

    /**
     * Run a map over each of the items.
     *
     * @param \Closure $callback
     * @return $this
     */
    public function map(\Closure $callback);

    /**
     * Sort through each item with a callback.
     *
     * @param \Closure $callback
     * @return $this
     */
    public function sort(\Closure $callback);

    /**
     * @param mixed $default
     * @return mixed
     */
    public function first($default = null);
}
