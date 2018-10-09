<?php
namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\Type as JMSType;
/**
 * @MongoDB\EmbeddedDocument
 */
class Marker
{
    /**
     * @MongoDB\Field(type="int", name="id_chronicle")
     */
    protected $idChronicle;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $positionTitle;

    /**
     * @JMSType("ArrayCollection<App\Document\PiecedText>")
     * @MongoDB\EmbedMany(targetDocument="App\Document\PiecedText")
     */
    protected $piecedTexts=[];

    /**
     * @MongoDB\Field(type="int")
     */
    protected $positionX;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $positionY;

    public function __construct()
    {
        $this->piecedTexts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdChronicle()
    {
        return $this->idChronicle;
    }

    /**
     * @param mixed $idChronicle
     */
    public function setIdChronicle($idChronicle)
    {
        $this->idChronicle = $idChronicle;
    }

    /**
     * @return mixed
     */
    public function getPositionTitle()
    {
        return $this->positionTitle;
    }

    /**
     * @param mixed $positionTitle
     */
    public function setPositionTitle($positionTitle)
    {
        $this->positionTitle = $positionTitle;
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
    }

    public function addPiecedText(PiecedText $piecedText){
        if($this->piecedTexts->contains($piecedText)){
            $this->piecedTexts->add($piecedText);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * @param mixed $positionX
     */
    public function setPositionX($positionX)
    {
        $this->positionX = $positionX;
    }

    /**
     * @return mixed
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * @param mixed $positionY
     */
    public function setPositionY($positionY)
    {
        $this->positionY = $positionY;
    }

}