<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use WattpadCodingChallenge as W;

$application = new Application();
$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    W\OffensiveScore\OffensiveScoreService::class => DI\factory([W\OffensiveScore\OffensiveScoreServiceFactory::class, 'create']),
]);
$container = $builder->build();

$command = $container->get(W\Console\Command\OffensiveScoreCommand::class);
$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run();