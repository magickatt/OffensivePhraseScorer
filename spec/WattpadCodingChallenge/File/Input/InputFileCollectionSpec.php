<?php

namespace spec\WattpadCodingChallenge\File\Input;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\File\File;

class InputFileCollectionSpec extends ObjectBehavior
{
    private $file1;

    private $file2;

    private $file3;

    function let(File $file1, File $file2, File $file3)
    {
        $this->file1 = $file1;
        $this->file2 = $file2;
        $this->file3 = $file3;

        $this->addInputFile($this->file1);
        $this->addInputFile($this->file2);
        $this->addInputFile($this->file3);
    }

    function it_contains_files()
    {
        $this->count()->shouldReturn(3);
    }

    function it_will_store_files_in_the_order_they_were_added()
    {
        $this->offsetGet(0)->shouldReturn($this->file1);
        $this->offsetGet(1)->shouldReturn($this->file2);
        $this->offsetGet(2)->shouldReturn($this->file3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(true);
        $this->offsetExists(2)->shouldReturn(true);
    }

    function it_can_have_input_files_added_to_it(File $file4, File $file5, File $file6)
    {
        $this->addInputFile($file4);
        $this->addInputFile($file5);

        $this->count()->shouldReturn(5);
        $this->offsetGet(3)->shouldReturn($file4);
        $this->offsetGet(4)->shouldReturn($file5);

        $this->offsetSet(6, $file6);
        $this->offsetGet(6)->shouldReturn($file6);
        $this->count()->shouldReturn(6);
    }

    function it_can_have_input_files_removed_from_it()
    {
        $this->offsetUnset(1);

        $this->count()->shouldReturn(2);
        $this->offsetGet(0)->shouldReturn($this->file1);
        $this->offsetGet(1)->shouldReturn(null);
        $this->offsetGet(2)->shouldReturn($this->file3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(false);
        $this->offsetExists(2)->shouldReturn(true);
    }
}
