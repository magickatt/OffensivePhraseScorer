<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Collection\Collection;

class PhraseCollection extends Collection
{
    /**
     * @param Phrase $phrase
     */
    public function addPhrase(Phrase $phrase)
    {
        $this->addItem($phrase);
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof Phrase) {
            parent::offsetSet($offset, $value);
        }
    }
}
