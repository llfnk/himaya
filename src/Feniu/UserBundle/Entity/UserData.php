<?php
// src/Acme/UserBundle/Entity/User.php

namespace Feniu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_data")
 * @UniqueEntity(fields="surname")
 */
class UserData
{
    const UserData = 'Feniu\UserBundle\Entity\UserData';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
        /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;
    
        /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="surname", type="string", length=255, unique=true)
     */
    protected $surname;
    
    
        /**
     *@var Topic
     *@ORM\OneToOne(targetEntity="User")
     *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $userlogin;
    
     
    /**
     * @Gedmo\Slug(fields={"name","surname"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return UserData
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
     * Set surname
     *
     * @param string $surname
     * @return UserData
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set userlogin
     *
     * @param \Feniu\UserBundle\Entity\User $userlogin
     * @return UserData
     */
    public function setUserlogin(\Feniu\UserBundle\Entity\User $userlogin = null)
    {
        $this->userlogin = $userlogin;

        return $this;
    }

    /**
     * Get userlogin
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getUserlogin()
    {
        return $this->userlogin;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return UserData
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
