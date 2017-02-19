<?php

namespace WattpadCodingChallenge\File;

use WattpadCodingChallenge\Collection\Collection;

class InputFileCollection extends Collection
{
    /**
     * @param File $file
     */
    public function addInputFile(File $file)
    {
        $this->addItem($file);
    }

    public function offsetSet($offset, $value)
    {
        if ($value instanceof File) {
            parent::offsetSet($offset, $value);
        }
    }
}
