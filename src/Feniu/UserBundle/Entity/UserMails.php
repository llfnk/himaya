<?php

// src/Acme/UserBundle/Entity/User.php

namespace Feniu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_mails")
 */
class UserMails {

    const UserMails = 'Feniu\UserBundle\Entity\UserMails';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var from
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="from", referencedColumnName="id")
     *
     */
    protected $from;

    /**
     * @var to
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="to", referencedColumnName="id")
     *
     */
    protected $to;

    /**
     * @ORM\Column(type="boolean", name="is_right", options={"default": false})
     */
    private $is_readed;
    
    /**
     * @ORM\Column(type="boolean", name="email_type", options={"default": false})
     */
    private $email_type;
    
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set is_readed
     *
     * @param boolean $isReaded
     * @return UserMails
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

    /**
     * Set text
     *
     * @param string $text
     * @return UserMails
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
     * @return UserMails
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
     * Set from
     *
     * @param \Feniu\UserBundle\Entity\User $from
     * @return UserMails
     */
    public function setFrom(\Feniu\UserBundle\Entity\User $from = null)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \Feniu\UserBundle\Entity\User $to
     * @return UserMails
     */
    public function setTo(\Feniu\UserBundle\Entity\User $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \Feniu\UserBundle\Entity\User 
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set email_type
     *
     * @param boolean $emailType
     * @return UserMails
     */
    public function setEmailType($emailType)
    {
        $this->email_type = $emailType;

        return $this;
    }

    /**
     * Get email_type
     *
     * @return boolean 
     */
    public function getEmailType()
    {
        return $this->email_type;
    }
}
