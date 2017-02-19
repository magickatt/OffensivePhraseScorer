<?php

namespace spec\WattpadCodingChallenge\OffensiveScore;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\File\Extractor\WordExtractor;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\OffensiveScore\OffensiveScore;
use WattpadCodingChallenge\OffensiveScore\Scorer\ScorerInterface;
use WattpadCodingChallenge\Word\WordCollection;

class OffensiveScoreServiceSpec extends ObjectBehavior
{
    function it_should_calculate_an_offensive_score_from_an_input_file(
        File $file,
        WordExtractor $wordExtractor,
        WordCollection $words,
        ScorerInterface $scorer1,
        ScorerInterface $scorer2
    ) {
        $this->beConstructedWith($wordExtractor, $scorer1, $scorer2);

        $wordExtractor->extractWordsFromFile($file)->willReturn($words);
        $scorer1->scoreWordCollection($words)->willReturn(1);
        $scorer2->scoreWordCollection($words)->willReturn(2);

        $this->calculateOffensiveScore($file)->shouldBeLike(new OffensiveScore(3));
    }
}
