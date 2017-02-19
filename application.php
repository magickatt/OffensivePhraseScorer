<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use WattpadCodingChallenge as W;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    W\OffensiveScore\OffensiveScoreService::class => DI\factory([W\OffensiveScore\OffensiveScoreServiceFactory::class, 'create']),
    W\Word\WordBuilder::class => DI\factory([W\Word\WordBuilderFactory::class, 'create']),
]);
$container = $builder->build();

$command = $container->get(W\Console\Command\OffensiveScoreCommand::class);
$application = new Application();
$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run();