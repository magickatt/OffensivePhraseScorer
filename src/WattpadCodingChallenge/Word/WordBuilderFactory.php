<?php

namespace WattpadCodingChallenge\Word;

use WattpadCodingChallenge\Word\Filter\AlphanumericFilter;
use WattpadCodingChallenge\Word\Filter\CaseFilter;
use WattpadCodingChallenge\Word\Filter\L33tFilter;
use WattpadCodingChallenge\Word\Filter\TrimFilter;

class WordBuilderFactory
{
    /**
     * Create a word builder using the following filters
     * @return WordBuilder
     */
    public function create()
    {
        return new WordBuilder(
            new TrimFilter(),
            new L33tFilter(),
            new AlphanumericFilter(),
            new CaseFilter()
        );
    }
}