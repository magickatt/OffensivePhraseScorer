<?php

namespace WattpadCodingChallenge\Word;

class Word
{
    private $string;

    public function __construct($string)
    {
        $this->string = self::sanitizeWord($string);
    }

    public function word()
    {
        return $this->string;
    }

    public function equalTo(Word $word)
    {
        return strcmp($word->word(), $this->word()) === 0;
    }

    public static function sanitizeWord($string)
    {
        return strtolower(
            strtr(
                preg_replace("/[^A-Za-z0-9 ]/", '', $string),
                '0123456789',
                'oizeasglbg'
            )
        );
    }
}