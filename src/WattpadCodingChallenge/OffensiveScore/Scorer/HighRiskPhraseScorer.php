<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

class HighRiskPhraseScorer extends PhraseScorer
{
    const SCORE_INCREMENT = 2;

    /**
     * @param int $currentScore
     * @return int
     */
    protected function incrementScore($currentScore)
    {
        return $currentScore + self::SCORE_INCREMENT;
    }
}
