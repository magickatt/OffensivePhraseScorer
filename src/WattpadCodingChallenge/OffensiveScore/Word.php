<?php

namespace WattpadCodingChallenge\OffensiveScore;

class Word
{
    private $word;

    public function __construct($word)
    {
        $this->word = (string)$word;
    }

    public function word()
    {
        return $this->word;
    }
}
