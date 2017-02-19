<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordCollection;

class WordExtractor
{
    public function extractWordsFromFile(File $file)
    {
        $sentence = file_get_contents($file->getPath());
        return $this->createWordCollectionFromArray(explode(' ', $sentence));
    }

    private function createWordCollectionFromArray(array $array)
    {
        $collection = new WordCollection();
        foreach ($array as $string) {
            $collection->addWord(new Word($string));
        }
        return $collection;
    }
}