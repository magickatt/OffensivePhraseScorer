<?php

namespace WattpadCodingChallenge\OffensiveScore;

use WattpadCodingChallenge\File\Extractor\WordExtractor;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\OffensiveScore\Scorer\ScorerInterface;
use WattpadCodingChallenge\Word\WordCollection;

class OffensiveScoreService
{
    private $wordExtractor;

    private $scorers;

    public function __construct(WordExtractor $wordExtractor, ScorerInterface ...$scorers)
    {
        $this->wordExtractor = $wordExtractor;
        $this->scorers = $scorers;
    }

    public function calculateOffensiveScore(File $file)
    {
        $words = $this->wordExtractor->extractWordsFromFile($file);
        return $this->calculateOffensiveScoreFromWords($words);
    }

    private function calculateOffensiveScoreFromWords(WordCollection $words)
    {
        $score = 0;
        foreach ($this->scorers as $scorer) {
            $score += $scorer->scoreWordCollection($words);
        }
        return new OffensiveScore($score);
    }
}
