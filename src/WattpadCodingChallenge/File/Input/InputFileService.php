<?php

namespace WattpadCodingChallenge\File\Input;

class InputFileService
{
    /** @var InputFileScanner */
    private $scanner;

    public function __construct(InputFileScanner $scanner)
    {
        $this->scanner = $scanner;
    }

    public function getInputFilesFromDirectory($path)
    {
        return $this->scanner->scanDirectoryForInputFiles($path);
    }
}
