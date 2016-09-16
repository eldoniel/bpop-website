<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recording
 *
 * @ORM\Table(name="recording")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\RecordingRepository")
 */
class Recording
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="file_path", type="string", length=255)
     */
    private $filePath;

    /**
     * @var string
     *
     * @ORM\Column(name="album", type="string", length=255, nullable=true)
     */
    private $album;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_date", type="datetime")
     */
    private $addDate;


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
     * @return Recording
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
     * Set filePath
     *
     * @param string $filePath
     *
     * @return Recording
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set album
     *
     * @param string $album
     *
     * @return Recording
     */
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return string
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Recording
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime
     */
    public function getAddDate()
    {
        return $this->addDate;
    }
}

