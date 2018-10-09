<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-07-26
 * Time: 오후 11:14
 */

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;


/**
 * @ODM\EmbeddedDocument
 */
class PiecedText
{

    /**
     * @ODM\Field(type="int", name="id_pieced_text")
     */
    protected $idPiecedText;

    /**
     * @ODM\Field(type="int", name="keyword_type")
     */
    protected $keywordType;

    /**
     * @ODM\Field(type="string", name="keyword")
     */
    protected $keyword;

    /**
     * @ODM\Field(type="string", name="context")
     */
    protected $context;

    /**
     * @ODM\Field(type="string", name="img_url")
     */
    protected $imgUrl;

    /**
     * @return mixed
     */
    public function getIdPiecedText()
    {
        return $this->idPiecedText;
    }

    /**
     * @param mixed $idPiecedText
     */
    public function setIdPiecedText($idPiecedText)
    {
        $this->idPiecedText = $idPiecedText;
    }

    /**
     * @return mixed
     */
    public function getKeywordType()
    {
        return $this->keywordType;
    }

    /**
     * @param mixed $keywordType
     */
    public function setKeywordType($keywordType)
    {
        $this->keywordType = $keywordType;
    }

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
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

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param mixed $imgUrl
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    }




}