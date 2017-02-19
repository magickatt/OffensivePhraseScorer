<?php

namespace WattpadCodingChallenge\File;

use DirectoryIterator;

class InputFileScanner
{
    public function scanDirectoryForInputFiles(DirectoryIterator $directoryIterator)
    {
        $collection = new InputFileCollection();
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
        $inputFile = new InputFile($file);
        $collection->addInputFile($inputFile);
    }
}
