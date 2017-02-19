<?php

namespace WattpadCodingChallenge\Word\Filter;

class TrimFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function sanitizeWord($string)
    {
        return trim($string);
    }
}