<?php

namespace SkiUtah\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="resorts", schema="skiutah")
 */
class ResortEntity extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="resort_id", type="integer", nullable=false)
     */
    protected $resort_id;

    /**
     * @var string
     *
     * @ORM\Column(name="resort_name", type="string", length=255, nullable=false)
     */
    protected $resort_name;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="decimal", nullable=false)
     */
    protected $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="decimal", nullable=false)
     */
    protected $longitude;

    /**
     * @return int
     */
    public function getResortId()
    {
        return $this->resort_id;
    }

    /**
     * @param mixed $resort_id
     * @return ResortEntity
     */
    public function setResortId($resort_id)
    {
        $this->resort_id = $resort_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getResortName()
    {
        return $this->resort_name;
    }

    /**
     * @param mixed $resort_name
     * @return ResortEntity
     */
    public function setResortName($resort_name)
    {
        $this->resort_name = $resort_name;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return ResortEntity
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return ResortEntity
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getResortSlug()
    {
        return trim(strtolower(str_replace([' '], '-', $this->getResortName())));
    }
}