<?php
/**
 * Created by PhpStorm.
 * User: Gato
 * Date: 2018-07-24
 * Time: 오후 5:30
 */

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use JMS\Serializer\Annotation\Type as JMSType;
use App\Document\Chapter;
use App\Document\PiecedText;
use App\Repository\ScenarioRepository;

/**
 * @ODM\Document(collection="scenario", repositoryClass="App\Repository\ScenarioRepository")
 */
class Scenario
{

    /**
     * @ODM\Id(name="_id")
     */
    protected $id;

    /**
     * @ODM\Field(name="int")
     */
    protected $idScenario;

    /**
     * @ODM\ReferenceOne(targetDocument="User", name="id_user")
     */
    protected $idUser;

    /**
     * @ODM\Field(type="int", name="system")
     */
    protected $system;

    /**
     * @ODM\Field(type="collection")
     */
    protected $tags;

    /**
     * @ODM\Field(type="int", name="min_member")
     */
    protected $minMember;

    /**
     * @ODM\Field(type="int", name="max_member")
     */
    protected $maxMember;

    /**
     * @ODM\Field(type="int", name="expected_time")
     */
    protected $expectedTime;

    /**
     * @ODM\Field(type="bool", name="criteria_time")
     */
    protected $criteriaTime;

    /**
     * @ODM\Field(type="bool", name="ero")
     */
    protected $ero;

    /**
     * @ODM\Field(type="bool", name="gro")
     */
    protected $gro;

    /**
     * @ODM\Field(type="int", name="recommended_id_universe")
     */
    protected $recommendedIdUniverse;

    /**
     * @ODM\Field(type="string", name="name")
     */
    protected $name;

    /**
     * @ODM\Field(type="string", name="summary")
     */
    protected $summary;


    /**
     * @ODM\Field(type="string", name="ref_url")
     */
    protected $refUrl;



    /**
     * @ODM\Field(type="string", name="title_img_url")
     */
    protected $titleImgUrl;


    /**
     * @ODM\Field(type="collection")
     */
    protected $series = [];

    /**
     * @JMSType("ArrayCollection<App\Document\Chapter>")
     * @ODM\EmbedMany(targetDocument="App\Document\Chapter")
     */
    protected $chapter = [];

    /**
     * @JMSType("ArrayCollection<App\Document\PiecedText>")
     * @ODM\EmbedMany(targetDocument="App\Document\PiecedText")
     */
    protected $piecedTexts = [];



    /**
     * @ODM\Field(type="int", name="published")
     */
    protected $published;

    /**
     * @ODM\Field(type="int", name="view_count")
     */
    protected $viewCount;

    /**
     * @ODM\Field(type="int", name="favored_count")
     */
    protected $favoredCount;



    /**
     * @JMSType("ArrayCollection<App\Document\Date>")
     * @ODM\EmbedMany(targetDocument="App\Document\Date")
     */
    protected $created;

    /**
     * @JMSType("ArrayCollection<App\Document\Date>")
     * @ODM\EmbedMany(targetDocument="App\Document\Date")
     */
    protected $updated;

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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdScenario()
    {
        return $this->idScenario;
    }

    /**
     * @param mixed $idScenario
     */
    public function setIdScenario($idScenario)
    {
        $this->idScenario = $idScenario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \MongoId $idUser
     */
    public function setIdUser(MongoId $idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * @param mixed $system
     */
    public function setSystem($system)
    {
        $this->system = $system;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinMember()
    {
        return $this->minMember;
    }

    /**
     * @param mixed $minMember
     */
    public function setMinMember($minMember)
    {
        $this->minMember = $minMember;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxMember()
    {
        return $this->maxMember;
    }

    /**
     * @param mixed $maxMember
     */
    public function setMaxMember($maxMember)
    {
        $this->maxMember = $maxMember;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpectedTime()
    {
        return $this->expectedTime;
    }

    /**
     * @param mixed $expectedTime
     */
    public function setExpectedTime($expectedTime)
    {
        $this->expectedTime = $expectedTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteriaTime()
    {
        return $this->criteriaTime;
    }


    /**
     * @param mixed $criteriaTime
     */
    public function setCriteriaTime($criteriaTime)
    {
        $this->criteriaTime = $criteriaTime;
    }

    /**
     * @return mixed
     */
    public function getEro()
    {
        return $this->ero;
    }

    /**
     * @param mixed $ero
     */
    public function setEro($ero)
    {
        $this->ero = $ero;
    }

    /**
     * @return mixed
     */
    public function getGro()
    {
        return $this->gro;
    }

    /**
     * @param mixed $gro
     */
    public function setGro($gro)
    {
        $this->gro = $gro;
    }

    

    /**
     * @return mixed
     */
    public function getRecommendedIdUniverse()
    {
        return $this->recommendedIdUniverse;
    }

    /**
     * @param mixed $recommendedIdUniverse
     */
    public function setRecommendedIdUniverse($recommendedIdUniverse)
    {
        $this->recommendedIdUniverse = $recommendedIdUniverse;
        return $this;
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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefUrl()
    {
        return $this->refUrl;
    }

    /**
     * @param mixed $refUrl
     */
    public function setRefUrl($refUrl)
    {
        $this->refUrl = $refUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFavoredCount()
    {
        return $this->favoredCount;
    }

    /**
     * @param mixed $favoredCount
     */
    public function addFavoredCount()
    {
        $this->favoredCount++;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitleImgUrl()
    {
        return $this->titleImgUrl;
    }

    /**
     * @param mixed $titleImgUrl
     */
    public function setTitleImgUrl($titleImgUrl)
    {
        $this->titleImgUrl = $titleImgUrl;
    }



    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @param mixed $chapter
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPiecedTexts()
    {
        return $this->piecedTexts;
    }

    /**
     * @param mixed $piecedTexts
     */
    public function setPiecedTexts($piecedTexts)
    {
        $this->piecedTexts = $piecedTexts;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * @param mixed $viewCount
     */
    public function addViewCount()
    {
        $this->viewCount++;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function addTag($tag){
        if(!$this->tags->contain($tag))
            $this->tags->add($tag);
        return $this;
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
        return $this;
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
        return $this;
    }


//--------------CUSTOM FUNCTION---------
    public function __construct()
    {
        $this->published = 0;
        $this->viewCount = 0;
        $this->favoredCount = 0;
        $this->created = new Date();
        $this->updated = new Date();

    }

    public function unsetForSynopsis(){
        unset($this->id);
        unset($this->chapter);
        unset($this->piecedTexts);
    }



}