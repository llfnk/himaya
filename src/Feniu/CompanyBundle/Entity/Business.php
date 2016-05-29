<?php

namespace Feniu\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Feniu\UserBundle\Entity\User;

/**
 * Topic
 *
 * @ORM\Table(name="company_business")
 * @ORM\Entity(repositoryClass="Feniu\CompanyBundle\Repository\BusinessRepository")
 * 
 */
class Business
{
    
    const Business = 'Feniu\CompanyBundle\Entity\Business';
    
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
     *@var Company
     *@ORM\ManyToOne(targetEntity="Company", inversedBy="Business")
     *@ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    protected $company;
    
    
    
    
//        /**
//     * @var BusinessUser[]
//     *
//     * @ORM\OneToOne(targetEntity="Feniu\CompanyBundle\Entity\BusinessUser", mappedBy="business", cascade={"persist"})
//     */
//    protected $businessUser;
//    
    /**
     * @var BusinessOffer[]
     *
     * @ORM\OneToMany(targetEntity="BusinessOffer", mappedBy="business", cascade={"persist"})
     */
    protected $businessOffer;
    


  

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->businessOffer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Business
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
     * @return Business
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
     * Set company
     *
     * @param \Feniu\CompanyBundle\Entity\Company $company
     * @return Business
     */
    public function setCompany(\Feniu\CompanyBundle\Entity\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Feniu\CompanyBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set businessUser
     *
     * @param \Feniu\CompanyBundle\Entity\BusinessUser $businessUser
     * @return Business
     */
    public function setBusinessUser(\Feniu\CompanyBundle\Entity\BusinessUser $businessUser = null)
    {
        $this->businessUser = $businessUser;

        return $this;
    }

    /**
     * Get businessUser
     *
     * @return \Feniu\CompanyBundle\Entity\BusinessUser 
     */
    public function getBusinessUser()
    {
        return $this->businessUser;
    }

    /**
     * Add businessOffer
     *
     * @param \Feniu\CompanyBundle\Entity\Business $businessOffer
     * @return Business
     */
    public function addBusinessOffer(\Feniu\CompanyBundle\Entity\Business $businessOffer)
    {
        $this->businessOffer[] = $businessOffer;

        return $this;
    }

    /**
     * Remove businessOffer
     *
     * @param \Feniu\CompanyBundle\Entity\Business $businessOffer
     */
    public function removeBusinessOffer(\Feniu\CompanyBundle\Entity\Business $businessOffer)
    {
        $this->businessOffer->removeElement($businessOffer);
    }

    /**
     * Get businessOffer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusinessOffer()
    {
        return $this->businessOffer;
    }
}
