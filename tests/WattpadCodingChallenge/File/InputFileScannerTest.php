<?php

namespace WattpadCodingChallenge\File;

use PHPUnit_Framework_TestCase as TestCase;

class InputFileScannerTest extends TestCase
{
    private $directory;

    private $paths = [];

    /** @var InputFileScanner */
    private $inputFileScanner;

    public function setUp()
    {
        $randomString = function() {
            return sha1(rand(1, 999999));
        };
        $this->directory = sys_get_temp_dir().DIRECTORY_SEPARATOR.$randomString();
        mkdir($this->directory);
        $this->directory = realpath($this->directory);

        $this->paths[0] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        $this->paths[1] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        $this->paths[2] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        foreach ($this->paths as $path) {
            touch($path);
        }

        $this->inputFileScanner = new InputFileScanner($this->directory);
    }

    public function testItIteratesOverEachFile()
    {
        $collection = $this->inputFileScanner->scanDirectoryForInputFiles($this->directory);

        // Assert that the collection contains the right number of files
        $this->assertCount(count($this->paths), $collection);

        /** @var File $inputFile */
        foreach ($collection as $inputFile) {
            // Ordering of directory scanning can be random so cannot reliably check order
            $this->assertContains($inputFile->getPath(), $this->paths);
        }
    }
}