<?php

namespace BpopWebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminUser
 *
 * @ORM\Table(name="admin_user")
 * @ORM\Entity(repositoryClass="BpopWebsiteBundle\Repository\AdminUserRepository")
 */
class AdminUser
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
     * @ORM\Column(name="login", type="string", length=255, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="pp_url", type="string", length=255, nullable=true)
     */
    private $ppUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="band_role", type="string", length=255)
     */
    private $bandRole;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="text")
     */
    private $introduction;


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
     * Set login
     *
     * @param string $login
     *
     * @return AdminUser
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return AdminUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ppUrl
     *
     * @param string $ppUrl
     *
     * @return AdminUser
     */
    public function setPpUrl($ppUrl)
    {
        $this->ppUrl = $ppUrl;

        return $this;
    }

    /**
     * Get ppUrl
     *
     * @return string
     */
    public function getPpUrl()
    {
        return $this->ppUrl;
    }

    /**
     * Set bandRole
     *
     * @param string $bandRole
     *
     * @return AdminUser
     */
    public function setBandRole($bandRole)
    {
        $this->bandRole = $bandRole;

        return $this;
    }

    /**
     * Get bandRole
     *
     * @return string
     */
    public function getBandRole()
    {
        return $this->bandRole;
    }

    /**
     * Set introduction
     *
     * @param string $introduction
     *
     * @return AdminUser
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }
}

