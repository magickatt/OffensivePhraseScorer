<?php

namespace WattpadCodingChallenge\File;

use WattpadCodingChallenge\OffensiveScore\Phrase;
use WattpadCodingChallenge\OffensiveScore\PhraseCollection;

class PhraseExtractor
{
    public function extractPhrasesFromFile(File $file)
    {
        $contents = file_get_contents($file->getPath());
        return $this->createPhraseCollectionFromArray(explode(' ', $contents));
    }

    private function createPhraseCollectionFromArray(array $array)
    {
        $collection = new PhraseCollection();
        foreach ($array as $string) {
            $collection->addPhrase(new Phrase($string));
        }
        return $collection;
    }
}