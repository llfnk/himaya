<?php

// src/Acme/UserBundle/Entity/User.php

namespace Feniu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_events")
 */
class UserEvents {

    const UserEvents = 'Feniu\UserBundle\Entity\UserEvents';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    protected $text;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @var from
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     */
    protected $user;
    



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
     * Set text
     *
     * @param string $text
     * @return UserEvents
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set Date
     *
     * @param \DateTime $date
     * @return UserEvents
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
     * Set user
     *
     * @param \Feniu\UserBundle\Entity\User $user
     * @return UserEvents
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
     * Set is_readed
     *
     * @param boolean $isReaded
     * @return UserEvents
     */
    public function setIsReaded($isReaded)
    {
        $this->is_readed = $isReaded;

        return $this;
    }

    /**
     * Get is_readed
     *
     * @return boolean 
     */
    public function getIsReaded()
    {
        return $this->is_readed;
    }
}
