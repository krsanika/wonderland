<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use JMS\Serializer\Annotation\Type as JMSType;

/**
 * @ODM\EmbeddedDocument
 */
class Article
{

    /**
     * @ODM\Field(type="int", name="id_article")
     */
    protected $id_article;

    /**
     * @ODM\Field(type="int", name="article_type")
     */
    protected $article_type;

    /**
     * @ODM\Field(type="int", name="title")
     */
    protected $title;

    /**
     * @ODM\Field(type="string", name="content")
     */
    protected $content;

    /**
     * @JMSType("ArrayCollection<App\Document\Date>")
     * @ODM\EmbedOne(targetDocument="App\Document\Date")
     */
    protected $created;

    /**
     * @JMSType("ArrayCollection<App\Document\Date>")
     * @ODM\EmbedOne(targetDocument="App\Document\Date")
     */
    protected $updated;

    /**
     * @ODM\Field(type="int", name="last_update_id_user")
     */
    protected $last_update_id_user;

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getArticleType()
    {
        return $this->article_type;
    }

    /**
     * @param mixed $article_type
     */
    public function setArticleType($article_type)
    {
        $this->article_type = $article_type;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateIdUser()
    {
        return $this->last_update_id_user;
    }

    /**
     * @param mixed $last_update_id_user
     */
    public function setLastUpdateIdUser($last_update_id_user)
    {
        $this->last_update_id_user = $last_update_id_user;
    }



}