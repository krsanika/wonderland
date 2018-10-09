<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-07-26
 * Time: 오후 11:19
 */

namespace App\Document;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class Chapter
{

    /**
     * @ODM\Field(type="int", name="no")
     */
    protected $no;

    /**
     * @ODM\Field(type="collection", name="prev_chapter")
     */
    protected $prevChapter;

    /**
     * @ODM\Field(type="collection", name="next_chapter")
     */
    protected $nextChapter;

    /**
     * @ODM\Field(type="int", name="chapter_type")
     */
    protected $chapterType;

    /**
     * @ODM\Field(type="int", name="chapter_name")
     */
    protected $chapterName;

    /**
     * @ODM\Field(type="int", name="context")
     */
    protected $context;

    /**
     * @return mixed
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param mixed $no
     */
    public function setNo($no)
    {
        $this->no = $no;
    }

    /**
     * @return mixed
     */
    public function getPrevChapter()
    {
        return $this->prevChapter;
    }

    /**
     * @param mixed $prevChapter
     */
    public function setPrevChapter($prevChapter)
    {
        $this->prevChapter = $prevChapter;
    }

    /**
     * @return mixed
     */
    public function getNextChapter()
    {
        return $this->nextChapter;
    }

    /**
     * @param mixed $nextChapter
     */
    public function setNextChapter($nextChapter)
    {
        $this->nextChapter = $nextChapter;
    }

    /**
     * @return mixed
     */
    public function getChapterType()
    {
        return $this->chapterType;
    }

    /**
     * @param mixed $chapterType
     */
    public function setChapterType($chapterType)
    {
        $this->chapterType = $chapterType;
    }

    /**
     * @return mixed
     */
    public function getChapterName()
    {
        return $this->chapterName;
    }

    /**
     * @param mixed $chapterName
     */
    public function setChapterName($chapterName)
    {
        $this->chapterName = $chapterName;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }



}