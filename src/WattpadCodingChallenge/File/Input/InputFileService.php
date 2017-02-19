<?php

namespace WattpadCodingChallenge\File\Input;

class InputFileService
{
    /** @var InputFileScanner */
    private $scanner;

    /**
     * @param InputFileScanner $scanner
     */
    public function __construct(InputFileScanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * @param string $directory
     * @return InputFileCollection
     */
    public function getInputFilesFromDirectory($directory)
    {
        return $this->scanner->scanDirectoryForInputFiles($directory);
    }
}
