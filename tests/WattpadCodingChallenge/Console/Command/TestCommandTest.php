<?php

namespace WattpadCodingChallenge\Console\Command;

use PHPUnit_Framework_TestCase as TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommandTest extends TestCase
{
    /** @var InputInterface|ObjectProphecy */
    private $input;

    /** @var OutputInterface|ObjectProphecy */
    private $output;

    /** @var TestCommand */
    private $command;

    public function setUp()
    {
        $this->input = $this->prophesize(InputInterface::class);
        $this->output = $this->prophesize(OutputInterface::class);

        $this->command = new TestCommand();
    }

    public function testItOutputsSampleText()
    {
        $this->output->writeln('foobar')->shouldBeCalled();

        $this->command->run($this->input->reveal(), $this->output->reveal());
    }
}