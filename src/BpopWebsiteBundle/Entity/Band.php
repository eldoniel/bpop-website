<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Band
 *
 * @ORM\Table(name="band")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\BandRepository")
 */
class Band
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url1", type="string", length=255, nullable=true)
     */
    private $url1;

    /**
     * @var string
     *
     * @ORM\Column(name="url2", type="string", length=255, nullable=true)
     */
    private $url2;


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
     * @return Band
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
     * Set style
     *
     * @param string $style
     *
     * @return Band
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Band
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url1
     *
     * @param string $url1
     *
     * @return Band
     */
    public function setUrl1($url1)
    {
        $this->url1 = $url1;

        return $this;
    }

    /**
     * Get url1
     *
     * @return string
     */
    public function getUrl1()
    {
        return $this->url1;
    }

    /**
     * Set url2
     *
     * @param string $url2
     *
     * @return Band
     */
    public function setUrl2($url2)
    {
        $this->url2 = $url2;

        return $this;
    }

    /**
     * Get url2
     *
     * @return string
     */
    public function getUrl2()
    {
        return $this->url2;
    }
}

