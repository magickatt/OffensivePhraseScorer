<?php

namespace WattpadCodingChallenge\File;

use SplFileInfo;
use PHPUnit_Framework_TestCase as TestCase;

class InputFileTest extends TestCase
{
    /** @var string */
    private $path;

    /** @var string */
    private $filename;

    /** @var SplFileInfo */
    private $fileinfo;

    public function setUp()
    {
        $this->filename = sha1(rand(1, 999999)).'.txt';
        $path = sys_get_temp_dir().DIRECTORY_SEPARATOR.$this->filename;
        touch($path);
        $this->path = realpath($path);
        $this->fileinfo = new SplFileInfo($this->path);
    }

    public function testItCanBeConstructedFromFileInfo()
    {
        $inputFile = new File($this->fileinfo);

        $this->assertEquals($inputFile->getFilename(), $this->filename);
        $this->assertEquals($inputFile->getPath(), $this->path);
    }
}