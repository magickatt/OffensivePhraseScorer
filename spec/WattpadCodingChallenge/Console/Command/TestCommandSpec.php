<?php

namespace spec\WattpadCodingChallenge\Console\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WattpadCodingChallenge\Console\Command\TestCommand');
    }
}
