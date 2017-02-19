<?php

namespace WattpadCodingChallenge\Word\Filter;

/**
 * Ensures only alphanumeric characters are used for comparison
 */
class AlphanumericFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function sanitizeWord($string)
    {
        return preg_replace("/[^A-Za-z0-9 ]/", '', $string);
    }
}