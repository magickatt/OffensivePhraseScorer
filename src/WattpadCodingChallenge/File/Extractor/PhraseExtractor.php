<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Phrase\PhraseCollection;
use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordBuilder;
use WattpadCodingChallenge\Word\WordCollection;

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

    /**
     * @param File $file
     * @return PhraseCollection
     */
    public function extractPhrasesFromFile(File $file)
    {
        $lines = file($file->getPath());
        return $this->createPhraseCollectionFromArray($lines);
    }

    /**
     * Create a phrase collection from the array of lines containing words found in the phrase file
     * @param array $array
     * @return WordCollection
     */
    private function createPhraseCollectionFromArray(array $array)
    {
        $collection = new PhraseCollection();
        foreach ($array as $string) {
            $collection->addPhrase(new Phrase($this->createWordsFromString($string)));
        }
        return $collection;
    }

    /**
     * Create words from a string of words found on a line of the phrase file
     * @param string $string
     * @return Word[]
     */
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