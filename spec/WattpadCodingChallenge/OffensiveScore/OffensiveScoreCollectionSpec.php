<?php

namespace spec\WattpadCodingChallenge\OffensiveScore;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\OffensiveScore\OffensiveScore;

class OffensiveScoreCollectionSpec extends ObjectBehavior
{
    private $score1;

    private $score2;

    private $score3;

    function let(OffensiveScore $file1, OffensiveScore $file2, OffensiveScore $file3)
    {
        $this->score1 = $file1;
        $this->score2 = $file2;
        $this->score3 = $file3;

        $this->addOffensiveScore($this->score1);
        $this->addOffensiveScore($this->score2);
        $this->addOffensiveScore($this->score3);
    }

    function it_contains_scores()
    {
        $this->count()->shouldReturn(3);
    }

    function it_will_store_scores_in_the_order_they_were_added()
    {
        $this->offsetGet(0)->shouldReturn($this->score1);
        $this->offsetGet(1)->shouldReturn($this->score2);
        $this->offsetGet(2)->shouldReturn($this->score3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(true);
        $this->offsetExists(2)->shouldReturn(true);
    }

    function it_can_have_scores_added_to_it(OffensiveScore $file4, OffensiveScore $file5, OffensiveScore $file6)
    {
        $this->addOffensiveScore($file4);
        $this->addOffensiveScore($file5);

        $this->count()->shouldReturn(5);
        $this->offsetGet(3)->shouldReturn($file4);
        $this->offsetGet(4)->shouldReturn($file5);

        $this->offsetSet(6, $file6);
        $this->offsetGet(6)->shouldReturn($file6);
        $this->count()->shouldReturn(6);
    }

    function it_can_haves_scores_removed_from_it()
    {
        $this->offsetUnset(1);

        $this->count()->shouldReturn(2);
        $this->offsetGet(0)->shouldReturn($this->score1);
        $this->offsetGet(1)->shouldReturn(null);
        $this->offsetGet(2)->shouldReturn($this->score3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(false);
        $this->offsetExists(2)->shouldReturn(true);
    }
}
