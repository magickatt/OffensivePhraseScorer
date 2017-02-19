<?php

namespace WattpadCodingChallenge\OffensiveScore;

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
}
