<?php

namespace Feniu\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Feniu\UserBundle\Entity\User;
use Feniu\CompanyBundle\Entity\Business;

/**
 * Topic
 *
 * @ORM\Table(name="company_businessoffer")
 * @ORM\Entity(repositoryClass="Feniu\CompanyBundle\Repository\BusinessOfferRepository")
 * 
 */
class BusinessOffer {

    const BusinessOffer = 'Feniu\CompanyBundle\Entity\BusinessOffer';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @var business
     * @ORM\ManyToOne(targetEntity="Business", inversedBy="businessOffer")
     * @ORM\JoinColumn(name="businessoffer_id", referencedColumnName="id", nullable=false)
     */
    protected $business;

    /**
     * @var integer
     *
     * @ORM\Column(name="salary", type="integer")
     */
    protected $salary;

    /**
     * @var integer
     *
     * @ORM\Column(name="minExp", type="integer")
     */
    protected $minExp;

      /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;


    

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
     * Set Date
     *
     * @param \DateTime $date
     * @return BusinessOffer
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
     * Set salary
     *
     * @param integer $salary
     * @return BusinessOffer
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return integer 
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set minExp
     *
     * @param integer $minExp
     * @return BusinessOffer
     */
    public function setMinExp($minExp)
    {
        $this->minExp = $minExp;

        return $this;
    }

    /**
     * Get minExp
     *
     * @return integer 
     */
    public function getMinExp()
    {
        return $this->minExp;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return BusinessOffer
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set business
     *
     * @param \Feniu\CompanyBundle\Entity\Business $business
     * @return BusinessOffer
     */
    public function setBusiness(\Feniu\CompanyBundle\Entity\Business $business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get business
     *
     * @return \Feniu\CompanyBundle\Entity\Business 
     */
    public function getBusiness()
    {
        return $this->business;
    }
}
