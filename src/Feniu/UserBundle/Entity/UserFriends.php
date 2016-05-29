<?php

// src/Acme/UserBundle/Entity/User.php

namespace Feniu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_friends")
 */
class UserFriends {

    const UserFriends = 'Feniu\UserBundle\Entity\UserFriends';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var invitefrom
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="invitefrom", referencedColumnName="id")
     *
     */
    protected $invitefrom;

    /**
     * @var inviteto
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="inviteto", referencedColumnName="id")
     *
     */
    protected $inviteto;

    /**
     * @ORM\Column(type="boolean", name="is_right", options={"default": false})
     */
    private $is_right;




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
     * Set is_right
     *
     * @param boolean $isRight
     * @return UserFriends
     */
    public function setIsRight($isRight)
    {
        $this->is_right = $isRight;

        return $this;
    }

    /**
     * Get is_right
     *
     * @return boolean 
     */
    public function getIsRight()
    {
        return $this->is_right;
    }

    /**
     * Set invitefrom
     *
     * @param \Feniu\UserBundle\Entity\User $invitefrom
     * @return UserFriends
     */
    public function setInvitefrom(\Feniu\UserBundle\Entity\User $invitefrom = null)
    {
        $this->invitefrom = $invitefrom;

        return $this;
    }

    /**
     * Get invitefrom
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getInvitefrom()
    {
        return $this->invitefrom;
    }

    /**
     * Set inviteto
     *
     * @param \Feniu\UserBundle\Entity\User $inviteto
     * @return UserFriends
     */
    public function setInviteto(\Feniu\UserBundle\Entity\User $inviteto = null)
    {
        $this->inviteto = $inviteto;

        return $this;
    }

    /**
     * Get inviteto
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getInviteto()
    {
        return $this->inviteto;
    }
}
