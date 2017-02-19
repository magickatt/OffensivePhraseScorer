<?php

namespace spec\WattpadCodingChallenge\File;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WattpadCodingChallenge\File\InputFileCollection;
use WattpadCodingChallenge\File\InputFileScanner;

class InputFileServiceSpec extends ObjectBehavior
{
    private $path = '/dev/null';

    private $collection;

    function let(InputFileScanner $scanner, InputFileCollection $collection)
    {
        $this->collection = $collection;
        $scanner->scanDirectoryForInputFiles($this->path)->willReturn($collection);
        $this->beConstructedWith($scanner);
    }

    function it_should_return_a_collection_of_input_files_if_scanner_finds_input_files()
    {
        $this->getInputFilesFromDirectory($this->path)->shouldReturn($this->collection);
    }
}
