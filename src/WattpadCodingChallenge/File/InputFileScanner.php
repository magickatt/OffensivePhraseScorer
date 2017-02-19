<?php

namespace WattpadCodingChallenge\File;

use SplFileInfo;
use SplFileObject;
use DirectoryIterator;
use InvalidArgumentException;

class InputFileScanner
{
    public function scanDirectoryForInputFiles($directory)
    {
        $directoryIterator = $this->createDirectoryIterator($directory);
        return $this->iterateDirectoryAndAddInputFilesToCollection($directoryIterator, new InputFileCollection());
    }

    private function createDirectoryIterator($directory)
    {
        if (!file_exists($directory) || !is_dir($directory)) {
            throw new InvalidArgumentException("Directory $directory is not a directory");
        }
        return new DirectoryIterator($directory);
    }

    private function iterateDirectoryAndAddInputFilesToCollection(DirectoryIterator $directoryIterator, InputFileCollection $collection)
    {
        foreach ($directoryIterator as $file) {
            if ($file->isDot()) {
                continue;
            }
            $this->createInputFileAndAddToCollection($file, $collection);
        }
        return $collection;
    }

    private function createInputFileAndAddToCollection(\SplFileInfo $file, InputFileCollection $collection)
    {
        $inputFile = new File($file);
        $collection->addInputFile($inputFile);
    }
}
