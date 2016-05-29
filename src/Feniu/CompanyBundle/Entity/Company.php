<?php

namespace Feniu\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Category
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="Feniu\CompanyBundle\Repository\CompanyRepository")
 */
class Company
{
    
    const Company = 'Feniu\CompanyBundle\Entity\Company';

    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
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
    * @var \DateTime
    * @ORM\Column(type="datetime")
    */
    private $Date;
    
     /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    

       
     /**
     *@var User
     *@ORM\OneToOne(targetEntity="Feniu\UserBundle\Entity\User")
     *@ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @var Business[]
     *
     * @ORM\OneToMany(targetEntity="Business", mappedBy="company", cascade={"persist"})
     */
    protected $Business;
    
    /**
     * @var Newspaper[]
     *
     * @ORM\OneToMany(targetEntity="Newspaper", mappedBy="company", cascade={"persist"})
     */
    protected $Newspaper;
//    
    /**
     * @var Bookie[]
     *
     * @ORM\OneToMany(targetEntity="Bookie", mappedBy="company", cascade={"persist"})
     */
    protected $Bookie;


   

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Business = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Newspaper = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Bookie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Date = new \DateTime();
    }

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
     * @return Company
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
     * Set Date
     *
     * @param \DateTime $date
     * @return Company
     */
    public function setDate($date)
    {
        $this->Date = $date;

        return $this;
    }

    /**
     * Get Date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Company
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

    /**
     * Set user
     *
     * @param \Feniu\UserBundle\Entity\User $user
     * @return Company
     */
    public function setUser(\Feniu\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add Business
     *
     * @param \Feniu\CompanyBundle\Entity\Business $business
     * @return Company
     */
    public function addBusiness(\Feniu\CompanyBundle\Entity\Business $business)
    {
        $this->Business[] = $business;

        return $this;
    }

    /**
     * Remove Business
     *
     * @param \Feniu\CompanyBundle\Entity\Business $business
     */
    public function removeBusiness(\Feniu\CompanyBundle\Entity\Business $business)
    {
        $this->Business->removeElement($business);
    }

    /**
     * Get Business
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusiness()
    {
        return $this->Business;
    }

    /**
     * Add Newspaper
     *
     * @param \Feniu\CompanyBundle\Entity\Business $newspaper
     * @return Company
     */
    public function addNewspaper(\Feniu\CompanyBundle\Entity\Business $newspaper)
    {
        $this->Newspaper[] = $newspaper;

        return $this;
    }

    /**
     * Remove Newspaper
     *
     * @param \Feniu\CompanyBundle\Entity\Business $newspaper
     */
    public function removeNewspaper(\Feniu\CompanyBundle\Entity\Business $newspaper)
    {
        $this->Newspaper->removeElement($newspaper);
    }

    /**
     * Get Newspaper
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNewspaper()
    {
        return $this->Newspaper;
    }

    /**
     * Add Bookie
     *
     * @param \Feniu\CompanyBundle\Entity\Bookie $bookie
     * @return Company
     */
    public function addBookie(\Feniu\CompanyBundle\Entity\Bookie $bookie)
    {
        $this->Bookie[] = $bookie;

        return $this;
    }

    /**
     * Remove Bookie
     *
     * @param \Feniu\CompanyBundle\Entity\Bookie $bookie
     */
    public function removeBookie(\Feniu\CompanyBundle\Entity\Bookie $bookie)
    {
        $this->Bookie->removeElement($bookie);
    }

    /**
     * Get Bookie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookie()
    {
        return $this->Bookie;
    }
}
