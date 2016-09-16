<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GaleryFile
 *
 * @ORM\Table(name="galery_files")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\GaleryFileRepository")
 */
class GaleryFile
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="BpopWebsiteBundle\Entity\Recording", mappedBy="file")
     */
    private $songs;
    
    /**
     * @ORM\ManyToOne(targetEntity="BpopwebsiteBundle\Entity\MusicShow")
     * @ORM\JoinColumn(nullable=false)
     */
    private $show;


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
     * Set title
     *
     * @param string $title
     *
     * @return GaleryFile
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return GaleryFile
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return GaleryFile
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return GaleryFile
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
     * Add song
     * 
     * @param Recording $song
     * 
     * @return GaleryFile
     */
    public function addSong($song)
    {
        $this->songs[] = $song;
    }
    
    /**
     * Remove song
     * 
     * @param Song $song
     * 
     * @return GaleryFile
     */
    public function removeSong($song)
    {
        $this->songs->removeElement($song);
    }
    
    /**
     * Get songs
     * 
     * @return ArrayCollection
     */
    public function getSongs()
    {
        return $this->songs;
    }
    
    /**
     * Set show
     * 
     * @param MusicShow $show
     * 
     * @return GaleryFile
     */
    public function setShow($show)
    {
        $this->show = $show;
    }
    
    /**
     * Get show
     * 
     * @return MusicShow
     */
    public function getShow()
    {
        return $this->show;
    }
}

