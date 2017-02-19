<?php

namespace WattpadCodingChallenge\Collection;

use Countable;
use ArrayAccess;
use IteratorAggregate;
use ArrayIterator;

class Collection implements Countable, ArrayAccess, IteratorAggregate
{
    /** @var array */
    protected $items = [];

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->items[$offset];
        }
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->items[$offset]);
        }
    }

    /**
     * @param mixed $item
     */
    protected function addItem($item)
    {
        $this->items[] = $item;
    }
}
