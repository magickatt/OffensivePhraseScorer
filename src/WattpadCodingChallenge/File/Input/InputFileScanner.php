<?php

namespace WattpadCodingChallenge\File\Input;

use SplFileInfo;
use DirectoryIterator;
use InvalidArgumentException;
use WattpadCodingChallenge\File\File;

class InputFileScanner
{
    const EXTENSION = 'txt';

    /**
     * Scan a directory to find input files
     * @param string $directory
     * @return InputFileCollection
     */
    public function scanDirectoryForInputFiles($directory)
    {
        $directoryIterator = $this->createDirectoryIterator($directory);
        return $this->iterateDirectoryAndAddInputFilesToCollection($directoryIterator, new InputFileCollection());
    }

    /**
     * @param string $directory
     * @return DirectoryIterator
     */
    private function createDirectoryIterator($directory)
    {
        if (!file_exists($directory) || !is_dir($directory)) {
            throw new InvalidArgumentException("Path $directory is not a directory");
        }
        return new DirectoryIterator($directory);
    }

    /**
     * Add input files located to an input file collection
     * @param DirectoryIterator $directoryIterator
     * @param InputFileCollection $collection
     * @return InputFileCollection
     */
    private function iterateDirectoryAndAddInputFilesToCollection(DirectoryIterator $directoryIterator, InputFileCollection $collection)
    {
        foreach ($directoryIterator as $file) {
            if ($file->isDot() || $file->getExtension() != self::EXTENSION) {
                continue;
            }
            $this->createInputFileAndAddToCollection($file, $collection);
        }
        return $collection;
    }

    /**
     * @param SplFileInfo $file
     * @param InputFileCollection $collection
     */
    private function createInputFileAndAddToCollection(SplFileInfo $file, InputFileCollection $collection)
    {
        $inputFile = new File($file);
        $collection->addInputFile($inputFile);
    }
}
