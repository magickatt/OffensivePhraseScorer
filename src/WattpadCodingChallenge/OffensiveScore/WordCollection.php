<?php

namespace WattpadCodingChallenge\OffensiveScore;

use WattpadCodingChallenge\Collection\Collection;

class WordCollection extends Collection
{
    /**
     * @param Word $word
     */
    public function addWord(Word $word)
    {
        $this->addItem($word);
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof Word) {
            parent::offsetSet($offset, $value);
        }
    }
}
