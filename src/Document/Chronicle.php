<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-06-26
 * Time: 오후 9:06
 */

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\Type as JMSType;


/**
 * @MongoDB\EmbeddedDocument
 */
class Chronicle
{

    /**
     * @MongoDB\Id(strategy="INCREMENT")     
     */
    protected $idChronicle;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $type;

    /**
     * @MongoDB\Field(type="string", name="team_color")
     */
    protected $teamColor;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTeamColor()
    {
        return $this->teamColor;
    }

    /**
     * @param mixed $teamColor
     */
    public function setTeamColor($teamColor)
    {
        $this->teamColor = $teamColor;
    }








}