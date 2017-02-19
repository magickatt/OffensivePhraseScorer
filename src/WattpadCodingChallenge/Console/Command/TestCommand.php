<?php

namespace WattpadCodingChallenge\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this->setName('wattpad:test')
             ->setDescription('Test command to prove application runs.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('foobar');
    }
}
