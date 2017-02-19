<?php

namespace WattpadCodingChallenge\OffensiveScore;

use WattpadCodingChallenge\File\WordExtractor;

class OffensiveScoreService
{
    private $wordExtractor;

    public function __construct(WordExtractor $wordExtractor)
    {
        $this->wordExtractor = $wordExtractor;
    }
}
