<?php

namespace WattpadCodingChallenge\OffensiveScore;

use SplFileInfo;
use WattpadCodingChallenge\File\Extractor\PhraseExtractor;
use WattpadCodingChallenge\File\Extractor\WordExtractor;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\OffensiveScore\Scorer\HighRiskPhraseScorer;
use WattpadCodingChallenge\OffensiveScore\Scorer\LowRiskPhraseScorer;

class OffensiveScoreServiceFactory
{
    /**
     * Create an offensive score service using the following scorers
     * @param WordExtractor $wordExtractor
     * @param PhraseExtractor $phraseExtractor
     * @return OffensiveScoreService
     */
    public function create(WordExtractor $wordExtractor, PhraseExtractor $phraseExtractor)
    {
        // @todo Make these parameterised
        $highRiskPhraseFile = new File(new SplFileInfo(__DIR__.'/../../../data/phrases/high_risk_phrases.txt'));
        $lowRiskPhraseFile = new File(new SplFileInfo(__DIR__.'/../../../data/phrases/low_risk_phrases.txt'));

        $highRiskPhraseScorer = new HighRiskPhraseScorer(
            $phraseExtractor->extractPhrasesFromFile($highRiskPhraseFile)
        );
        $lowRiskPhraseScorer = new LowRiskPhraseScorer(
            $phraseExtractor->extractPhrasesFromFile($lowRiskPhraseFile)
        );

        return new OffensiveScoreService($wordExtractor, $highRiskPhraseScorer, $lowRiskPhraseScorer);
    }
}
