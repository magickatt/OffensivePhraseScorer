<?php

namespace WattpadCodingChallenge\File\Input;

use WattpadCodingChallenge\Collection\Collection;
use WattpadCodingChallenge\File\File;

class InputFileCollection extends Collection
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
