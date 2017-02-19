<?php

namespace WattpadCodingChallenge\File;

use SplFileInfo;

class File
{
    /** @var string */
    private $path;

    /** @var string */
    private $filename;

    /**
     * @param SplFileInfo $fileInfo
     */
    public function __construct(SplFileInfo $fileInfo)
    {
        $this->path = $fileInfo->getRealPath();
        $this->filename = $fileInfo->getFilename();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
}
