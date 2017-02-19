<?php

namespace WattpadCodingChallenge\Collection;

use Countable;
use ArrayAccess;
use IteratorAggregate;
use ArrayIterator;
use Traversable;

class Collection implements Countable, ArrayAccess, IteratorAggregate
{
    protected $items = [];

    public function count()
    {
        return count($this->items);
    }

    /**
     * @return Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->items[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

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
