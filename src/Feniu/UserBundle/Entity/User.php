<?php

// src/Acme/UserBundle/Entity/User.php

namespace Feniu\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {

    const User = 'Feniu\UserBundle\Entity\User';

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
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    protected $surname;

    /**
     * @var UserUserData[]
     *
     * @ORM\OneToOne(targetEntity="UserData", mappedBy="userlogin", cascade={"persist"})
     */
    protected $useruserdata;

    /**
     * @var company[]
     *
     * @ORM\OneToOne(targetEntity="Feniu\CompanyBundle\Entity\Company", mappedBy="user", cascade={"persist"})
     */
    protected $company;
    
    /**
     * @var BusinessUser[]
     *
     * @ORM\OneToOne(targetEntity="Feniu\CompanyBundle\Entity\BusinessUser", mappedBy="user", cascade={"persist"})
     */
    protected $businessUser;

    /**
     * Date/Time of the last activity
     *
     * @var \Datetime
     * @ORM\Column(name="last_activity_at", type="datetime", nullable=true)
     */
    protected $lastActivityAt;

    

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * @return User
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
 * @param \Datetime $lastActivityAt
 */
public function setLastActivityAt($lastActivityAt)
{
    $this->lastActivityAt = $lastActivityAt;
}

/**
 * @return \Datetime
 */
public function getLastActivityAt()
{
    return $this->lastActivityAt;
}

/**
 * @return Bool Whether the user is active or not
 */
public function isActiveNow()
{
    // Delay during wich the user will be considered as still active
    $delay = new \DateTime('2 minutes ago');

    return ( $this->getLastActivityAt() > $delay );
}

    /**
     * Set useruserdata
     *
     * @param \Feniu\UserBundle\Entity\UserData $useruserdata
     * @return User
     */
    public function setUseruserdata(\Feniu\UserBundle\Entity\UserData $useruserdata = null)
    {
        $this->useruserdata = $useruserdata;

        return $this;
    }

    /**
     * Get useruserdata
     *
     * @return \Feniu\UserBundle\Entity\UserData 
     */
    public function getUseruserdata()
    {
        return $this->useruserdata;
    }

    /**
     * Set company
     *
     * @param \Feniu\CompanyBundle\Entity\Company $company
     * @return User
     */
    public function setCompany(\Feniu\CompanyBundle\Entity\Company $company = null)
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
     * @return User
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
}
