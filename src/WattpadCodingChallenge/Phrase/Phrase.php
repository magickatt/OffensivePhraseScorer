<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Collection\Collection;
use WattpadCodingChallenge\Word\Word;

class Phrase extends Collection
{
    public function __construct(array $words)
    {
        $this->items = $words;
    }

    public function count()
    {
        return count($this->items);
    }

    public function isSingleWord()
    {
        return $this->count() === 1;
    }

    /**
     * @return Word
     */
    public function getFirstWord()
    {
        return $this->items[0];
    }
}
