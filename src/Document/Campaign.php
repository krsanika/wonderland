<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use App\Document\Article;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use JMS\Serializer\Annotation\Type as JMSType;

/**
 * @ODM\Document(collection="campaign")
 */
class Campaign
{
    /**
     * @ODM\Id(name="_id")
     */
    protected $id;

    /**
     * @ODM\Id(strategy="INCREMENT")
     */
//    /**
//     * @ODM\Field(type="int", name="id_campaine")
//     */
    protected $idCampaign;


    /**
     * @ODM\Field(type="int", name="id_user")
     */
    protected $idUser;

    /**
     * @ODM\Field(type="int", name="id_universe")
     */
    protected $idUniverse;


    /**
     * @ODM\Field(type="string", name="name")
     */
    protected $name;



    /**
     * @JMSType("ArrayCollection<App\Document\Article>")
     * @ODM\EmbedMany(targetDocument="App\Document\Article")
     */
    protected $articles = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdCampaign()
    {
        return $this->idCampaign;
    }

    /**
     * @param mixed $idCampaign
     */
    public function setIdCampaign($idCampaign)
    {
        $this->idCampaign = $idCampaign;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdUniverse()
    {
        return $this->idUniverse;
    }

    /**
     * @param mixed $idUniverse
     */
    public function setIdUniverse($idUniverse)
    {
        $this->idUniverse = $idUniverse;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
    }



    public function addArticle(Article $article){
        if(!$this->articles->contains($article)){
            $this->articles->add($article);
        }
        return $this;
    }

    public function removeArticle(Article $article){
        $this->articles->removeElement($article);
        return $this;
    }

}