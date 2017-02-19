<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Phrase\PhraseCollection;
use WattpadCodingChallenge\Word\WordBuilder;

class PhraseExtractor
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

    public function extractPhrasesFromFile(File $file)
    {
        $lines = file($file->getPath());
        return $this->createPhraseCollectionFromArray($lines);
    }

    private function createPhraseCollectionFromArray(array $array)
    {
        $collection = new PhraseCollection();
        foreach ($array as $string) {
            $collection->addPhrase(new Phrase($this->createWordsFromString($string)));
        }
        return $collection;
    }

    private function createWordsFromString($string)
    {
        $builder = $this->builder;
        $array = explode(' ', $string);
        return array_reduce($array, function ($carry, $item) use ($builder) {
            $carry[] = $builder->create($item);
            return $carry;
        }, []);
    }
}