<?php

namespace WattpadCodingChallenge\File\Extractor;

use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Phrase\PhraseCollection;

class PhraseExtractor
{
    public function extractPhrasesFromFile(File $file)
    {
        $lines = file($file->getPath());
        return $this->createPhraseCollectionFromArray($lines);
    }

    private function createPhraseCollectionFromArray(array $array)
    {
        $collection = new PhraseCollection();
        foreach ($array as $string) {
            $collection->addPhrase(new Phrase(explode(' ', $string)));
        }
        return $collection;
    }
}