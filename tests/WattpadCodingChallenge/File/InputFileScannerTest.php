<?php

namespace WattpadCodingChallenge\File;

use DirectoryIterator;
use PHPUnit_Framework_TestCase as TestCase;

class InputFileScannerTest extends TestCase
{
    private $directory;

    private $paths = [];

    /** @var DirectoryIterator */
    private $directoryIterator;

    /** @var InputFileScanner */
    private $inputFileScanner;

    public function setUp()
    {
        $randomString = function() {
            return sha1(rand(1, 999999));
        };
        $this->directory = sys_get_temp_dir().DIRECTORY_SEPARATOR.$randomString();
        mkdir($this->directory);

        $this->paths[0] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        $this->paths[1] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        $this->paths[2] = $this->directory.DIRECTORY_SEPARATOR.$randomString().'.txt';
        foreach ($this->paths as $path) {
            touch($path);
        }

        $this->directoryIterator = new DirectoryIterator($this->directory);

        $this->inputFileScanner = new InputFileScanner();
    }

    public function testItIteratesOverEachFile()
    {
        $collection = $this->inputFileScanner->scanDirectoryForInputFiles($this->directoryIterator);

        // Assert that the collection contains the right number of files
        $this->assertCount(count($this->paths), $collection);

        // Assert that the collection contains the files in the right order
        foreach ($collection as $key => $value) {
            /** @var InputFile $inputFile */
            $inputFile = $collection->offsetGet($key);
            $this->assertEquals($this->paths[$key], $inputFile->getPath());
        }
    }

}