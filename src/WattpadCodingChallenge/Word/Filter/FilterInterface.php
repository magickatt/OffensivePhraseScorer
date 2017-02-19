<?php

namespace WattpadCodingChallenge\Word\Filter;

interface FilterInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function sanitizeWord($string);
}