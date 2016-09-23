<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Recording
 *
 * @ORM\Table(name="recording")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\RecordingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Recording {

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
   * @ORM\Column(name="url", type="string", length=255)
   */
  private $url;
  
  private $tempFilename;
  
  private $file;

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

  public function __construct() {
    $this->addDate = new \DateTime();
  }

  /**
   * Get id
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set title
   *
   * @param string $title
   *
   * @return Recording
   */
  public function setTitle($title) {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  public function setFile(UploadedFile $file = null) {
    $this->file = $file;

    if (null !== $this->url) {
      $this->tempFilename = $this->url;
      
      $this->url = null;
    }
  }

  public function getFile() {
    return $this->file;
  }

  /**
   * Set url
   * 
   * @param string $url
   * 
   * @return Recording
   */
  public function setUrl($url) {
    $this->url = $url;

    return $this;
  }

  /**
   * Get url
   * 
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Set album
   *
   * @param string $album
   *
   * @return Recording
   */
  public function setAlbum($album) {
    $this->album = $album;

    return $this;
  }

  /**
   * Get album
   *
   * @return string
   */
  public function getAlbum() {
    return $this->album;
  }

  /**
   * Set addDate
   *
   * @param \DateTime $addDate
   *
   * @return Recording
   */
  public function setAddDate($addDate) {
    $this->addDate = $addDate;

    return $this;
  }

  /**
   * Get addDate
   *
   * @return \DateTime
   */
  public function getAddDate() {
    return $this->addDate;
  }
  
  /**
   * ORM\PrePersist()
   * ORM\PreUpdate()
   */
  public function preUpload() {
    if (null === $this->file) {
      return;
    }
    
    $this->url = $this->file->guessExtension();
  }
  
  /**
   * @ORM\PreRemove()
   */
  public function preRemoveUpload()
  {
    $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->url;
  }
  
  /**
   * @ORM\PostRemove()
   */
  public function removeUpload()
  {
    if (file_exists($this->tempFilename)) {
      unlink($this->tempFilename);
    }
  }

  public function upload() {
    if (null === $this->file) {
      return;
    }
    
    if (null !== $this->tempFilename) {
      $oldFile = $this->getUploadRootDir() . '/' . $this->id . '/' . $this->tempFilename;
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }
    }
    
    $this->file->move(
      $this->getUploadRootDir(),
      $this->id . '.' . $this->url
    );
  }

  public function getUploadDir() {
    
    return 'uploads/audio';
  }
  
  protected function getUploadRootDir() {
    
    return __DIR__ . '/../../../web/' . $this->getUploadDir();
  }

}
