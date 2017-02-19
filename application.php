<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use WattpadCodingChallenge\Console\Command;

$application = new Application();
$command = new Command\TestCommand();
$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run();