<?php

namespace WattpadCodingChallenge\File\Input;

use WattpadCodingChallenge\Collection\AbstractCollection;
use WattpadCodingChallenge\File\File;

class InputFileCollection extends AbstractCollection
{
    /**
     * @param File $file
     */
    public function addInputFile(File $file)
    {
        $this->addItem($file);
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        if ($value instanceof File) {
            parent::offsetSet($offset, $value);
        }
    }
}
