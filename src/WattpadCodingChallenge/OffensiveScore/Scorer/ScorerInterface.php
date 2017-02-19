<?php

namespace WattpadCodingChallenge\OffensiveScore\Scorer;

use WattpadCodingChallenge\Word\WordCollection;

interface ScorerInterface
{
    /**
     * @param WordCollection $collection
     * @return int
     */
    public function scoreWordCollection(WordCollection $collection);
}
