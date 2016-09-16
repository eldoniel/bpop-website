<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MusicShow
 *
 * @ORM\Table(name="music_show")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\MusicShowRepository")
 */
class MusicShow
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @ORM\ManyToMany(targetEntity="BpopWebsiteBundle\Entity\Band")
     */
    private $bands;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MusicShow
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return MusicShow
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return MusicShow
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Add band
     * 
     * @param Band $band
     * 
     * @return MusicShow
     */
    public function addBand($band)
    {
        $this->bands[] = $band;
    }
    
    /**
     * Remove band
     * 
     * @param Band $band
     * 
     * @return MusicShow
     */
    public function removeBand($band)
    {
        $this->bands->removeElement($band);
    }
    
    /**
     * Get bands
     * 
     * @return ArrayCollection
     */
    public function getBands()
    {
        return $this->bands;
    }
}

