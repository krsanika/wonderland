<?php
namespace App\Document;
use App\Document\Marker;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\Type as JMSType;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @MongoDB\EmbeddedDocument
 */
class Map
{
    /**
     * @MongoDB\Id(name="_id")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="int",name="id_map")
     */
    protected $idMap;

    /**
     * @MongoDB\Field(type="string", name="map_name")
     */
    protected $mapName;

    /**
     * @MongoDB\Field(type="string", name="image_url")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a Image file.")
     * @Assert\File(mimeTypes={
     *          "image/png",
     *          "image/jpeg",
     *          "image/jpg",
     *          "image/gif",
     *     })
     */
    protected $imageUrl;

    /**
     * @JMSType("ArrayCollection<App\Document\Marker>")
     * @MongoDB\EmbedMany(targetDocument="App\Document\Marker")
     */
    protected $markers = [];


    public function __construct()
    {
       $this->markers = new ArrayCollection();
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
    public function getIdMap()
    {
        return $this->idMap;
    }

    /**
     * @param mixed $idMap
     */
    public function setIdMap($idMap)
    {
        $this->idMap = $idMap;
    }

    /**
     * @return mixed
     */
    public function getMapName()
    {
        return $this->mapName;
    }

    /**
     * @param mixed $mapName
     */
    public function setMapName($mapName)
    {
        $this->mapName = $mapName;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }



    /**
     * @return mixed
     */
    public function getMarkers()
    {
        return $this->markers;
    }

    /**
     * @param mixed $markers
     */
    public function setMarkers($markers)
    {
        $this->markers = $markers;
    }


    public function addMarker(Marker $marker){
        if(!$this->markers->contains($marker)){
            $this->markers->add($marker);
        }

        return $this;
    }


    public function removeMarker(Marker $markers){
        $this->markers->removeElement($markers);
        return $this;
    }
}

//-----------------------------------------------------
//마커즈의 우선순위를 가려주는 애