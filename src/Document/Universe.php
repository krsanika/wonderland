<?php

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use App\Document\Chronicle;
use App\Document\Map;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use JMS\Serializer\Annotation\Type as JMSType;

/**
 * @ODM\Document(collection="universe")
 */
class Universe
{
    /**
     * @ODM\Id(name="_id")
     */
    protected $id;

//    /**
//     * @ODM\Id(strategy="INCREMENT")
//     */
    /**
     * @ODM\Field(type="int", name="id_universe")
     */
    protected $idUniverse;

    /**
     * @ODM\Field(type="int", name="id_user")
     */
    protected $idUser;

    /**
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @ODM\Field(type="string", name="reverse_law_name")
     */
    protected $ReverseLawName;


    /**
     * @JMSType("ArrayCollection<App\Document\Chronicle>")
     * @ODM\EmbedMany(targetDocument="App\Document\Chronicle")
     */
    protected $chronicles = [];


    /**
     * @JMSType("ArrayCollection<App\Document\Map>")
     * @ODM\EmbedMany(targetDocument="App\Document\Map")
     */
    protected $maps = [];

    public function __construct($idUser)
    {
        $this->idUser = $idUser;
        $this->name = "기본세계";
        $this->ReverseLawName = '서력';
        $this->maps = new ArrayCollection();
        $this->chronicles = new ArrayCollection();
    }

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
    public function getReverseLawName()
    {
        return $this->ReverseLawName;
    }

    /**
     * @param mixed $ReverseLawName
     */
    public function setReverseLawName($ReverseLawName)
    {
        $this->ReverseLawName = $ReverseLawName;
    }

    /**
     * @return mixed
     */
    public function getChronicles()
    {
        return $this->chronicles;
    }

    /**
     * @param mixed $chronicles
     */
    public function setChronicles($chronicles)
    {
        $this->chronicles = $chronicles;
    }

    /**
     * @return mixed
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * @param mixed $maps
     */
    public function setMaps($maps)
    {
        $this->maps = $maps;
    }

    public function addMap(Map $maps){
        if(!$this->maps->contains($maps)){
            $this->maps->add($maps);
        }

        return $this;
    }


//    public function removeMap(Map $maps){
//        $this->maps->removeElement($maps);
//        return $this;
//    }

    public function removeMap($id){
        foreach($this->maps as $map )
        {
            if($id==$map->getId())
            {
                $this->maps->removeElement($map);
            }
        }
        return $this;
    }

    public function getLocal($id)
    {
        $result = null;
        foreach($this->maps as $map)
        {
            if($id==$map->getId())
            {
                $result = $map;
            }
        }
        return $result;
    }

    public function replaceLocal($id, $local)
    {
        $result = null;
        foreach($this->maps as $map)
        {
            if($id==$map->getId())
            {
                $this->maps->removeElement($map);
                $this->maps->add($local);
            }
        }
        
        return $this;
    }
}
