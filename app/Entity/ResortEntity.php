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
     * @return string
     */
    public function getResortSlug()
    {
        return trim(strtolower(str_replace([' '], '-', $this->getResortName())));
    }
}