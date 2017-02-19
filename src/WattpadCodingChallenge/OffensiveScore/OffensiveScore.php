<?php

namespace WattpadCodingChallenge\OffensiveScore;

class OffensiveScore
{
    private $score;

    public function __construct($score)
    {
        $this->score = (int)$score;
    }

    public function getScore()
    {
        return $this->score;
    }
}
