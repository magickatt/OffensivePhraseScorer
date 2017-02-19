<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use WattpadCodingChallenge as W;

$application = new Application();
$command = new W\Console\Command\OffensiveScoreCommand(
    new W\File\InputFileService(new W\File\InputFileScanner()),
    new W\OffensiveScore\OffensiveScoreService()
);
$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run();