<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordCollection;

/**
 * Phrases are essentially collections of words
 */
class Phrase extends WordCollection
{
    /**
     * @param Word[] $words
     */
    public function __construct(array $words)
    {
        foreach ($words as $word) {
            $this->addWord($word);
        }
    }

    /**
     * @return bool
     */
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
