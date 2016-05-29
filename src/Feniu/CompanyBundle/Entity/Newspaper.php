<?php

namespace Feniu\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Feniu\UserBundle\Entity\User;

/**
 * Topic
 *
 * @ORM\Table(name="company_newspaper")
 * @ORM\Entity(repositoryClass="Feniu\CompanyBundle\Repository\NewspaperRepository")
 * 
 */
class Newspaper
{
    
    const Newspaper = 'Feniu\CompanyBundle\Entity\Newspaper';
    
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
     *@ORM\ManyToOne(targetEntity="Company", inversedBy="Newspaper")
     *@ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
     */
    protected $company;
    


  

    

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
     * @return Newspaper
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
     * @return Newspaper
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
     * @return Newspaper
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
}
