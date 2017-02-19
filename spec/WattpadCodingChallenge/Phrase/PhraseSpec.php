<?php

namespace spec\WattpadCodingChallenge\OffensiveScore\Phrase;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhraseSpec extends ObjectBehavior
{
    function it_can_be_constructed_with_a_single_word()
    {
        $this->beConstructedWith(['foo']);
        $this->count()->shouldReturn(1);
        $this->isSingleWord()->shouldReturn(true);
    }

    function it_can_be_constructed_with_multiple_words()
    {
        $this->beConstructedWith(['foo', 'bar']);
        $this->count()->shouldReturn(2);
        $this->isSingleWord()->shouldReturn(false);
    }
}
