<?php

namespace WattpadCodingChallenge\Word\Filter;

/**
 * Replaces numeric characters with their (approximate) alpha equivalent
 */
class L33tFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function sanitizeWord($string)
    {
        return strtr(
            $string,
            '0123456789',
            'oizeasglbg'
        );
    }
}