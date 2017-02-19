<?php

namespace WattpadCodingChallenge\File;

use SplFileInfo;

class InputFile
{
    /** @var string */
    private $path;

    /** @var string */
    private $filename;

    public function __construct(SplFileInfo $fileInfo)
    {
        $this->path = $fileInfo->getRealPath();
        $this->filename = $fileInfo->getFilename();
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getFilename()
    {
        return $this->filename;
    }
}
