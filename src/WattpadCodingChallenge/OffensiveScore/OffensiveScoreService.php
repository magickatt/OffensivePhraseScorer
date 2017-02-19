<?php

namespace WattpadCodingChallenge\OffensiveScore;

use WattpadCodingChallenge\File\Extractor\WordExtractor;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\OffensiveScore\Scorer\ScorerInterface;
use WattpadCodingChallenge\Word\WordCollection;

class OffensiveScoreService
{
    /** @var WordExtractor */
    private $wordExtractor;

    /** @var ScorerInterface[] */
    private $scorers;

    /**
     * @param WordExtractor $wordExtractor
     * @param ScorerInterface[] ...$scorers
     */
    public function __construct(WordExtractor $wordExtractor, ScorerInterface ...$scorers)
    {
        $this->wordExtractor = $wordExtractor;
        $this->scorers = $scorers;
    }

    /**
     * Calculate the offensive score for a particular input file
     * @param File $file
     * @return OffensiveScore
     */
    public function calculateOffensiveScore(File $file)
    {
        $words = $this->wordExtractor->extractWordsFromFile($file);
        return $this->calculateOffensiveScoreFromWords($words);
    }

    /**
     * Based on the words in the input file, calculate an offensive score
     * @param WordCollection $words
     * @return OffensiveScore
     */
    private function calculateOffensiveScoreFromWords(WordCollection $words)
    {
        $score = 0;
        foreach ($this->scorers as $scorer) {
            $score += $scorer->scoreWordCollection($words);
        }
        return new OffensiveScore($score);
    }
}
