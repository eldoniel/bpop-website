<?php

namespace BpopWebsiteBundle\Entity;

use BpopWebsiteBundle\Entity\AdminUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class News
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminUser")
     */
    private $lastEditor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_edited", type="datetime", nullable=true)
     */
    private $lastEdited;
    
    
    public function __construct() {
        $this->date = new \DateTime();
    }


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
     * @return News
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
     * Set content
     *
     * @param string $content
     *
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Set Author
     * 
     * @return News
     */
    public function setAuthor(AdminUser $author)
    {
        $this->author = $author;
        
        return $this;
    }
    
    /**
     * Get Author
     * 
     * @return AdminUser
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return News
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
     * Set Last editor
     * 
     * @return News
     */
    public function setLastEditor(AdminUser $lastEditor)
    {
        $this->lastEditor = $lastEditor;
        
        return $this;
    }
    
    /**
     * Get Last editor
     * 
     * @return AdminUser
     */
    public function getLastEditor()
    {
        return $this->lastEditor;
    }

    /**
     * Set lastEdited
     *
     * @param \DateTime $lastEdited
     *
     * @return News
     */
    public function setLastEdited($lastEdited)
    {
        $this->lastEdited = $lastEdited;

        return $this;
    }

    /**
     * Get lastEdited
     *
     * @return \DateTime
     */
    public function getLastEdited()
    {
        return $this->lastEdited;
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function editDate()
    {
      $this->setLastEdited(new \DateTime());
    }
}

