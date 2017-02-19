<?php

namespace WattpadCodingChallenge\Phrase;

use WattpadCodingChallenge\Word\Word;

class Phrase
{
    private $words;

    public function __construct(array $words)
    {
        $this->words = $words;
    }

    public function count()
    {
        return count($this->words);
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
        return $this->words[0];
    }
}
