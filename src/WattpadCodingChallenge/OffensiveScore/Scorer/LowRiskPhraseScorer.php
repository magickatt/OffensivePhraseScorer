<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

/**
 * Offensive scoring for low risk phrases
 */
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
