<?php

namespace WattpadCodingChallenge\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\File\Input\InputFileService;
use WattpadCodingChallenge\OffensiveScore\OffensiveScore;
use WattpadCodingChallenge\OffensiveScore\OffensiveScoreService;

class OffensiveScoreCommand extends Command
{
    const NAME = 'wattpad:offensivescore';

    /** @var InputFileService */
    private $inputFileService;

    /** @var OffensiveScoreService */
    private $offensiveScoreService;

    public function __construct(InputFileService $inputFileService, OffensiveScoreService $offensiveScoreService)
    {
        $this->inputFileService = $inputFileService;
        $this->offensiveScoreService = $offensiveScoreService;
        parent::__construct(self::NAME);
    }

    protected function configure()
    {
        $this->setName(self::NAME)
             ->setDescription('Determine offensive score of input files located in data/input/*.')
             ->addArgument('path', InputArgument::OPTIONAL, 'Directory containing input files');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = $this->inputFileService->getInputFilesFromDirectory(
            $this->resolvePath($input)
        );

        /** @var File $file */
        foreach ($files as $file) {
            $score = $this->offensiveScoreService->calculateOffensiveScore($file);
            $this->recordOffensiveScoreForFile($score, $file, $output);
        }
    }

    private function recordOffensiveScoreForFile(OffensiveScore $score, File $file, OutputInterface $output)
    {
        $output->writeln($file->getFilename().':'.$score->getScore());
    }

    private function resolvePath(InputInterface $input)
    {
        $path = $input->getArgument('path');
        if (!$path) {
            $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.
                    DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'input';
        }
        return realpath($path);
    }
}
