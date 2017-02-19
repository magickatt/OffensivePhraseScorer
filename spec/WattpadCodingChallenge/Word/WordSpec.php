<?php

namespace spec\WattpadCodingChallenge\OffensiveScore\Word;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordSpec extends ObjectBehavior
{
    private $string = 'Test';

    function let()
    {
        $this->beConstructedWith($this->string);
    }

    function it_should_contain_a_string()
    {
        $this->word()->shouldReturn($this->string);
    }
}
