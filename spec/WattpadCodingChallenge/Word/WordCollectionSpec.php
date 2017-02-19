<?php

namespace spec\WattpadCodingChallenge\Word;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Word\Word;

class WordCollectionSpec extends ObjectBehavior
{
    private $word1;

    private $word2;

    private $word3;

    function let(Word $word1, Word $word2, Word $word3)
    {
        $this->word1 = $word1;
        $this->word2 = $word2;
        $this->word3 = $word3;

        $this->addWord($this->word1);
        $this->addWord($this->word2);
        $this->addWord($this->word3);
    }

    function it_contains_files()
    {
        $this->count()->shouldReturn(3);
    }

    function it_will_store_words_in_the_order_they_were_added()
    {
        $this->offsetGet(0)->shouldReturn($this->word1);
        $this->offsetGet(1)->shouldReturn($this->word2);
        $this->offsetGet(2)->shouldReturn($this->word3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(true);
        $this->offsetExists(2)->shouldReturn(true);
    }

    function it_can_have_words_added_to_it(Word $word4, Word $word5, Word $word6)
    {
        $this->addWord($word4);
        $this->addWord($word5);

        $this->count()->shouldReturn(5);
        $this->offsetGet(3)->shouldReturn($word4);
        $this->offsetGet(4)->shouldReturn($word5);

        $this->offsetSet(6, $word6);
        $this->offsetGet(6)->shouldReturn($word6);
        $this->count()->shouldReturn(6);
    }

    function it_can_have_words_removed_from_it()
    {
        $this->offsetUnset(1);

        $this->count()->shouldReturn(2);
        $this->offsetGet(0)->shouldReturn($this->word1);
        $this->offsetGet(1)->shouldReturn(null);
        $this->offsetGet(2)->shouldReturn($this->word3);
        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(false);
        $this->offsetExists(2)->shouldReturn(true);
    }

    function it_will_know_if_it_contains_a_particular_single_word_phrase(Phrase $phrase, Word $firstWord)
    {
        $phrase->isSingleWord()->willReturn(true);
        $phrase->getFirstWord()->willReturn($firstWord);
        $firstWord->equalTo($this->word1)->willReturn(false);
        $firstWord->equalTo($this->word2)->willReturn(true);

        $this->containsPhrase($phrase)->shouldReturn(true);
    }

    function it_will_know_if_it_does_not_contain_a_particular_single_word_phrase(Phrase $phrase, Word $firstWord)
    {
        $phrase->isSingleWord()->willReturn(true);
        $phrase->getFirstWord()->willReturn($firstWord);
        $firstWord->equalTo($this->word1)->willReturn(false);
        $firstWord->equalTo($this->word2)->willReturn(false);
        $firstWord->equalTo($this->word3)->willReturn(false);

        $this->containsPhrase($phrase)->shouldReturn(false);
    }

    function it_will_know_if_it_contains_a_particular_multi_word_phrase(Phrase $phrase, Word $firstWord, Word $secondWord)
    {
        $phrase->count()->willReturn(2);
        $phrase->isSingleWord()->willReturn(false);
        $phrase->getFirstWord()->willReturn($firstWord);
        $phrase->getWordByOffset(1)->willReturn($secondWord);
        $firstWord->equalTo($this->word1)->willReturn(false);
        $firstWord->equalTo($this->word2)->willReturn(true);
        $this->word3->equalTo($secondWord)->willReturn(true);

        $this->containsPhrase($phrase)->shouldReturn(true);
    }

    function it_will_know_if_it_does_not_contain_all_of_a_particular_multi_word_phrase(Phrase $phrase, Word $firstWord, Word $secondWord)
    {
        $phrase->count()->willReturn(2);
        $phrase->isSingleWord()->willReturn(false);
        $phrase->getFirstWord()->willReturn($firstWord);
        $phrase->getWordByOffset(1)->willReturn($secondWord);
        $firstWord->equalTo($this->word1)->willReturn(false);
        $firstWord->equalTo($this->word2)->willReturn(true);
        $this->word3->equalTo($secondWord)->willReturn(false);

        $this->containsPhrase($phrase)->shouldReturn(false);
    }
}
