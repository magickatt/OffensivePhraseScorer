<?php

namespace WattpadCodingChallenge\Word;

use InvalidArgumentException;

class Word
{
    /** @var string */
    private $string;

    public function __construct($string)
    {
        if (!is_string($string)) {
            throw new InvalidArgumentException($string.' is not a string ('.gettype($string).' supplied)');
        }
        $this->string = (string)$string;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param Word $word
     * @return bool
     */
    public function equalTo(Word $word)
    {
        return strcmp($word->getString(), $this->getString()) === 0;
    }
}