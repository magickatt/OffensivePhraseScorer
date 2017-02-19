<?php

namespace WattpadCodingChallenge\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\File\Input\InputFileCollection;
use WattpadCodingChallenge\File\Input\InputFileService;
use WattpadCodingChallenge\OffensiveScore\OffensiveScore;
use WattpadCodingChallenge\OffensiveScore\OffensiveScoreService;

class OffensiveScoreCommand extends Command
{
    const NAME = 'wattpad:offensivescore';
    const OUTPUT_FILENAME = 'output.txt';

    /** @var InputFileService */
    private $inputFileService;

    /** @var OffensiveScoreService */
    private $offensiveScoreService;

    /**
     * @param InputFileService $inputFileService
     * @param OffensiveScoreService $offensiveScoreService
     */
    public function __construct(InputFileService $inputFileService, OffensiveScoreService $offensiveScoreService)
    {
        $this->inputFileService = $inputFileService;
        $this->offensiveScoreService = $offensiveScoreService;
        parent::__construct(self::NAME);
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName(self::NAME)
             ->setDescription('Determine offensive score of input files located in data/input/*.')
             ->addArgument('input-dir', InputArgument::OPTIONAL, 'Directory containing input files', $this->resolveInputPath())
             ->addArgument('output-dir', InputArgument::OPTIONAL, 'Directory where the output file will be written', $this->resolveOutputPath())
             ->addArgument('output-file', InputArgument::OPTIONAL, 'Filename of the output file', self::OUTPUT_FILENAME);
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = $this->inputFileService->getInputFilesFromDirectory($input->getArgument('input-dir'));
        $output->writeln('Calculating offensive score for input files...');

        $output->writeln('-------------------------');
        $results = $this->generateResults($files, $output);
        $output->writeln('-------------------------');

        $this->writeResultsToFile($results, $input, $output);
    }

    /**
     * @param InputFileCollection $files
     * @param OutputInterface $output
     * @return array
     */
    private function generateResults(InputFileCollection $files, OutputInterface $output)
    {
        $results = [];

        /** @var File $file */
        foreach ($files as $file) {
            $score = $this->offensiveScoreService->calculateOffensiveScore($file);
            $result = $this->createResultAndShow($score, $file);
            $results[] = $result;
            $output->writeln($result);
        }
        return $results;
    }

    /**
     * @param OffensiveScore $score
     * @param File $file
     * @return string
     */
    private function createResultAndShow(OffensiveScore $score, File $file)
    {
        return $file->getFilename().':'.$score->getScore();
    }

    /**
     * @param array $results
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    private function writeResultsToFile(array $results, InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('output-dir').DIRECTORY_SEPARATOR.$input->getArgument('output-file');
        file_put_contents($path, array_reduce($results, function ($carry, $value) {
            $carry .= $value."\n";
            return $carry;
        }, ''));
        $output->writeln('Written results to '.realpath($path));
    }

    /**
     * @return string
     */
    private function resolveInputPath()
    {
        return realpath($this->resolveDataDirectory().DIRECTORY_SEPARATOR.'input');
    }

    /**
     * @return string
     */
    private function resolveOutputPath()
    {
        return realpath($this->resolveDataDirectory().DIRECTORY_SEPARATOR.'output');
    }

    /**
     * @todo Add to configuration
     * @return string
     */
    private function resolveDataDirectory()
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.
               DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data';
    }
}
