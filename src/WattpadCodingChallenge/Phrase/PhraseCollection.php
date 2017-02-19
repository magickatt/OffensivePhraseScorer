<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Collection\AbstractCollection;

/**
 * Collection of phrases
 */
class PhraseCollection extends AbstractCollection
{
    /**
     * @param Phrase $phrase
     */
    public function addPhrase(Phrase $phrase)
    {
        $this->addItem($phrase);
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        if ($value instanceof Phrase) {
            parent::offsetSet($offset, $value);
        }
    }
}
