<?php

namespace WattpadCodingChallenge\Word;

use WattpadCodingChallenge\Word\Filter\FilterInterface;

class WordBuilder
{
    /** @var FilterInterface[] */
    private $filters;

    /**
     * @param FilterInterface[] ...$filters
     */
    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    /**
     * Create a word from a string using various filters
     * @param string $string
     * @return Word
     */
    public function create($string)
    {
        foreach ($this->filters as $filter) {
            $string = $filter->sanitizeWord($string);
        }
        return new Word($string);
    }
}