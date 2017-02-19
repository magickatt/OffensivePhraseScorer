<?php

namespace spec\WattpadCodingChallenge\OffensiveScore;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\File\InputFileScanner;
use WattpadCodingChallenge\File\WordExtractor;

class OffensiveScoreServiceSpec extends ObjectBehavior
{
    function let(WordExtractor $wordExtractor)
    {
        $this->beConstructedWith($wordExtractor);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('WattpadCodingChallenge\OffensiveScore\OffensiveScoreService');
    }

//    function it_should_calculate_an_offensive_score_from_an_input_file(InputFile $inputFile)
//    {
//        $this->calculateOffensiveScore($inputFile);
//    }
}
