<?php

namespace WattpadCodingChallenge\OffensiveScore;

class OffensiveScore
{
    /** @var int */
    private $score;

    /**
     * @param int $score
     */
    public function __construct($score)
    {
        $this->score = (int)$score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }
}
