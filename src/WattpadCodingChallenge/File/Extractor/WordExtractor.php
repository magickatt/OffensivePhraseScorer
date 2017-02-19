<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Word\WordBuilder;
use WattpadCodingChallenge\Word\WordCollection;

class WordExtractor
{
    /** @var WordBuilder */
    private $builder;

    /**
     * @param WordBuilder $builder
     */
    public function __construct(WordBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param File $file
     * @return WordCollection
     */
    public function extractWordsFromFile(File $file)
    {
        $sentence = file_get_contents($file->getPath());
        return $this->createWordCollectionFromArray(explode(' ', $sentence));
    }

    /**
     * Create a word collection from the array of words found in the input file
     * @param array $array
     * @return WordCollection
     */
    private function createWordCollectionFromArray(array $array)
    {
        $collection = new WordCollection();
        foreach ($array as $string) {
            $collection->addWord($this->builder->create($string));
        }
        return $collection;
    }
}