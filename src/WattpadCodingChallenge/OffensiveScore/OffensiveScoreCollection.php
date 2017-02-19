<?php

namespace WattpadCodingChallenge\OffensiveScore;

use Countable;
use ArrayAccess;
use IteratorAggregate;
use ArrayIterator;
use Traversable;

class OffensiveScoreCollection implements Countable, ArrayAccess, IteratorAggregate
{
    private $files = [];

    public function addOffensiveScore(OffensiveScore $file)
    {
        $this->files[] = $file;
    }

    public function count()
    {
        return count($this->files);
    }

    /**
     * @return Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->files);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->files);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->files[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof OffensiveScore) {
            $this->files[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->files[$offset]);
        }
    }
}
