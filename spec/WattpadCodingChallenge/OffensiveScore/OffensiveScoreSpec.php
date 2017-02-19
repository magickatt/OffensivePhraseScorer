<?php

namespace spec\WattpadCodingChallenge\OffensiveScore;

use PhpSpec\ObjectBehavior;

class OffensiveScoreSpec extends ObjectBehavior
{
    private $score;

    function let()
    {
        $this->score = 4;
        $this->beConstructedWith(4);
    }

    function it_has_a_score()
    {
        $this->getScore()->shouldReturn($this->score);
    }
}
