<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

class LowRiskPhraseScorer extends PhraseScorer
{
    const SCORE_INCREMENT = 1;

    /**
     * @param int $currentScore
     * @return int
     */
    protected function incrementScore($currentScore)
    {
        return $currentScore + self::SCORE_INCREMENT;
    }
}
