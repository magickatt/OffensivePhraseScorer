<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Collection\Collection;

class PhraseCollection extends Collection
{
    private $firstWords = [];

    /**
     * @param Phrase $phrase
     */
    public function addPhrase(Phrase $phrase)
    {
        $this->addItem($phrase);
        $this->addFirstWord($phrase);
    }

    public function addFirstWord(Phrase $phrase)
    {
        $firstWord = $phrase->getFirstWord();
        $key = array_search($phrase->getFirstWord(), $this->items);
        $this->firstWords[$key] = $firstWord;
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof Phrase) {
            parent::offsetSet($offset, $value);
        }
    }
}
