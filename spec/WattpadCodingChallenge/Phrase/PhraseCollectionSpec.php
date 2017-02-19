<?php

namespace spec\WattpadCodingChallenge\Phrase;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\Phrase\Phrase;

class PhraseCollectionSpec extends ObjectBehavior
{
    private $phrase1;

    private $phrase2;

    private $phrase3;

    function let(Phrase $file1, Phrase $file2, Phrase $file3)
    {
        $this->phrase1 = $file1;
        $this->phrase2 = $file2;
        $this->phrase3 = $file3;

        $this->addPhrase($this->phrase1);
        $this->addPhrase($this->phrase2);
        $this->addPhrase($this->phrase3);
    }

    function it_contains_files()
    {
        $this->count()->shouldReturn(3);
    }

    function it_will_store_phrases_in_the_order_they_were_added()
    {
        $this->offsetGet(0)->shouldReturn($this->phrase1);
        $this->offsetGet(1)->shouldReturn($this->phrase2);
        $this->offsetGet(2)->shouldReturn($this->phrase3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(true);
        $this->offsetExists(2)->shouldReturn(true);
    }

    function it_can_have_phrases_added_to_it(Phrase $file4, Phrase $file5, Phrase $file6)
    {
        $this->addPhrase($file4);
        $this->addPhrase($file5);

        $this->count()->shouldReturn(5);
        $this->offsetGet(3)->shouldReturn($file4);
        $this->offsetGet(4)->shouldReturn($file5);

        $this->offsetSet(6, $file6);
        $this->offsetGet(6)->shouldReturn($file6);
        $this->count()->shouldReturn(6);
    }

    function it_can_have_phrases_removed_from_it()
    {
        $this->offsetUnset(1);

        $this->count()->shouldReturn(2);
        $this->offsetGet(0)->shouldReturn($this->phrase1);
        $this->offsetGet(1)->shouldReturn(null);
        $this->offsetGet(2)->shouldReturn($this->phrase3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(false);
        $this->offsetExists(2)->shouldReturn(true);
    }
}
