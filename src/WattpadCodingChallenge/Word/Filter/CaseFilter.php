<?php

namespace WattpadCodingChallenge\Word\Filter;

/**
 * Ensures case consistency prior to word comparison
 */
class CaseFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function sanitizeWord($string)
    {
        return strtolower($string);
    }
}