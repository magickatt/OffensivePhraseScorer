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

    public function extractWordsFromFile(File $file)
    {
        $sentence = file_get_contents($file->getPath());
        return $this->createWordCollectionFromArray(explode(' ', $sentence));
    }

    private function createWordCollectionFromArray(array $array)
    {
        $collection = new WordCollection();
        foreach ($array as $string) {
            $collection->addWord($this->builder->create($string));
        }
        return $collection;
    }
}