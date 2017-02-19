<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordCollection;

class WordExtractor
{
    public function extractWordsFromFile(File $file)
    {
        $contents = file_get_contents($file->getPath());
        return $this->createWordCollectionFromArray(explode(' ', $contents));
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