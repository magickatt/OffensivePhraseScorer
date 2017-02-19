<?php

namespace WattpadCodingChallenge\Word\Filter;

class TestFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function sanitizeWord($string)
    {
        return $string;
    }
}