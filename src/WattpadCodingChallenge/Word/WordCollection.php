<?php

namespace WattpadCodingChallenge\Word;

use InvalidArgumentException;
use WattpadCodingChallenge\Collection\AbstractCollection;
use WattpadCodingChallenge\Phrase\Phrase;

/**
 * Collection of words
 */
class WordCollection extends AbstractCollection
{
    /**
     * @param Word $word
     */
    public function addWord(Word $word)
    {
        $this->addItem($word);
    }

    /**
     * @param mixed $offset
     * @return Word|null
     */
    public function getWordByOffset($offset)
    {
        $word = $this->offsetGet($offset);
        if ($word instanceof Word) {
            return $word;
        }
    }

    /**
     * Does this collection of words contain this phrase somewhere within it?
     * @param Phrase $phrase
     * @return bool
     */
    public function containsPhrase(Phrase $phrase)
    {
        for ($x = 0; $x < $this->count(); $x++) {
            if ($phrase->getFirstWord()->equalTo($this->getWordByOffset($x))) {
                if ($phrase->isSingleWord()) {
                    return true; // Single word phrase match
                } else {
                    for ($y = 1; $y < $phrase->count(); $y++) {
                        if (!$this->getWordByOffset($x + $y)->equalTo($phrase->getWordByOffset($y))) {
                            break 2;
                        }
                    }
                    return true; // Multiple word phrase match
                }
            }
        }
        return false; // No match, phrase was not found
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof Word) {
            throw new InvalidArgumentException('Word collection can only contain words');
        }
        parent::offsetSet($offset, $value);
    }
}
