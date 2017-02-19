<?php

namespace spec\WattpadCodingChallenge\Word;

use PhpSpec\ObjectBehavior;
use WattpadCodingChallenge\Word\Filter\FilterInterface;
use WattpadCodingChallenge\Word\Word;

class WordBuilderSpec extends ObjectBehavior
{
    function it_will_filter_words_depending_on_the_filters_applied(FilterInterface $filter1, FilterInterface $filter2)
    {
        $startString = 'Test';
        $filteredString = strtoupper($startString);
        $endString = substr($filteredString, 1, 2);
        $this->beConstructedWith($filter1, $filter2);
        $filter1->sanitizeWord($startString)->willReturn($filteredString);
        $filter2->sanitizeWord($filteredString)->willReturn($endString);

        $this->create($startString)->shouldBeLike(new Word($endString));
    }
}
