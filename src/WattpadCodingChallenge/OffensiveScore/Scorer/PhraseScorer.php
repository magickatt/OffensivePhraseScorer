<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

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
        return 1;
    }
}
