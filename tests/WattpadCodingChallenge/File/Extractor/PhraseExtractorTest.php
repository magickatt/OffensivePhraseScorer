<?php

namespace WattpadCodingChallenge\File\Extractor;

use SplFileInfo;
use PHPUnit_Framework_TestCase as TestCase;
use WattpadCodingChallenge\File\File;
use WattpadCodingChallenge\Phrase\Phrase;
use WattpadCodingChallenge\Phrase\PhraseCollection;
use WattpadCodingChallenge\Word\Filter\TrimFilter;
use WattpadCodingChallenge\Word\Word;
use WattpadCodingChallenge\Word\WordBuilder;
use WattpadCodingChallenge\Word\WordCollection;

class PhraseExtractorTest extends TestCase
{
    /** @var string */
    private $path;

    /** @var string */
    private $filename;

    /** @var SplFileInfo */
    private $fileinfo;

    /** @var PhraseExtractor */
    private $phraseExtractor;

    public function setUp()
    {
        $this->filename = sha1(rand(1, 999999)).'.txt';
        $path = sys_get_temp_dir().DIRECTORY_SEPARATOR.$this->filename;
        touch($path);
        $this->path = realpath($path);
        $this->fileinfo = new SplFileInfo($this->path);

        $this->phraseExtractor = new PhraseExtractor(new WordBuilder(new TrimFilter()));
    }

    public function testItCanReadTheContentsOfTheFileItPointsTo()
    {
        $string1 = 'Pack my box with five dozen liquor jugs';
        $string2 = 'Jackdaws love my big sphinx of quartz';
        $expectedCollection = new PhraseCollection();
        $expectedCollection->addPhrase(new Phrase([
            new Word('Pack'),
            new Word('my'),
            new Word('box'),
            new Word('with'),
            new Word('five'),
            new Word('dozen'),
            new Word('liquor'),
            new Word('jugs'),
        ]));
        $expectedCollection->addPhrase(new Phrase([
            new Word('Jackdaws'),
            new Word('love'),
            new Word('my'),
            new Word('big'),
            new Word('sphinx'),
            new Word('of'),
            new Word('quartz'),
        ]));
        file_put_contents($this->path, $string1."\r\n".$string2);
        $inputFile = new File($this->fileinfo);

        $actualCollection = $this->phraseExtractor->extractPhrasesFromFile($inputFile);
        $this->assertEquals($expectedCollection, $actualCollection);
    }
}