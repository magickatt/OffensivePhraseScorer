<?php

namespace spec\WattpadCodingChallenge\OffensiveScore;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WattpadCodingChallenge\File\InputFileScanner;

class OffensiveScoreServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WattpadCodingChallenge\OffensiveScore\OffensiveScoreService');
    }
}
