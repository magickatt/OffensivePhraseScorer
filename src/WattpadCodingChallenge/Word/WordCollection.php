<?php

namespace WattpadCodingChallenge\Word;

use WattpadCodingChallenge\Collection\Collection;
use WattpadCodingChallenge\Phrase\Phrase;

class WordCollection extends Collection
{
    /**
     * @param Word $word
     */
    public function addWord(Word $word)
    {
        $this->addItem($word);
    }

    public function containsPhrase(Phrase $phrase)
    {
        for ($x = 0; $x < $this->count(); $x++) {
            $word = $this->offsetGet($x);
            if ($phrase->getFirstWord()->equalTo($word)) {
                // @todo Implement handling of multi-word phrases
                return true;
            }
        }
        return false;
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof Word) {
            parent::offsetSet($offset, $value);
        }
    }
}
