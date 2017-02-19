<?php

namespace WattpadCodingChallenge\File\Extractor;

use SplFileInfo;
use PHPUnit_Framework_TestCase as TestCase;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Word\Filter\TrimFilter;
use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordBuilder;
use WattpadCodingChallenge\Word\WordCollection;

class WordExtractorTest extends TestCase
{
    /** @var string */
    private $path;

    /** @var string */
    private $filename;

    /** @var SplFileInfo */
    private $fileinfo;

    /** @var WordExtractor */
    private $wordExtractor;

    public function setUp()
    {
        $this->filename = sha1(rand(1, 999999)).'.txt';
        $path = sys_get_temp_dir().DIRECTORY_SEPARATOR.$this->filename;
        touch($path);
        $this->path = realpath($path);
        $this->fileinfo = new SplFileInfo($this->path);

        $this->wordExtractor = new WordExtractor(new WordBuilder(new TrimFilter()));
    }

    public function testItCanReadTheContentsOfTheFileItPointsTo()
    {
        $string = 'The quick brown fox jumps over the lazy dog';
        $collection = new WordCollection();
        $collection->addWord(new Word('The'));
        $collection->addWord(new Word('quick'));
        $collection->addWord(new Word('brown'));
        $collection->addWord(new Word('fox'));
        $collection->addWord(new Word('jumps'));
        $collection->addWord(new Word('over'));
        $collection->addWord(new Word('the'));
        $collection->addWord(new Word('lazy'));
        $collection->addWord(new Word('dog'));
        file_put_contents($this->path, $string);
        $inputFile = new File($this->fileinfo);

        $this->assertEquals($collection, $this->wordExtractor->extractWordsFromFile($inputFile));
    }
}