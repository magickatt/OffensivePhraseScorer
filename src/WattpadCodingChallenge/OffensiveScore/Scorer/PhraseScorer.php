<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Phrase\PhraseCollection;
use WattpadCodingChallenge\Word\WordCollection;

abstract class PhraseScorer implements ScorerInterface
{
    protected $phrases;

    public function __construct(PhraseCollection $phrases)
    {
        $this->phrases = $phrases;
    }

    /**
     * @param WordCollection $words
     * @return int
     */
    public function scoreWordCollection(WordCollection $words)
    {
        $score = 0;

        /** @var Phrase $phrase */
        foreach ($this->phrases as $phrase) {
            if ($words->containsPhrase($phrase)) {
                $score = $this->incrementScore($score);
            }
        }
        return $score;
    }

    /**
     * @param int $currentScore
     * @return int
     */
    abstract protected function incrementScore($currentScore);
}
