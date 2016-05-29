<?php

namespace Feniu\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;

/**
 * Post
 *
 * @ORM\Table(name="forum_posts")
 * @ORM\Entity(repositoryClass="Feniu\ForumBundle\Repository\PostRepository")
 * 
 */
class Post
{
    const Post = 'Feniu\ForumBundle\Entity\Post';
    
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
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    protected $text;
    
    
    /**
     * @var author
     *

     *@ORM\ManyToOne(targetEntity="Feniu\UserBundle\Entity\User")
     *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $author;
    
    /**
     *@var Topic
     *@ORM\ManyToOne(targetEntity="Topic", inversedBy="topicPost")
     *@ORM\JoinColumn(name="topic_id", referencedColumnName="id", nullable=false)
     */
    protected $topic;
    
    /**
    * @var \DateTime
    * @ORM\Column(type="datetime")
    */
    private $Date;
  
  
   public function __construct()
  {
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
     * @return Post
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
     * Set author
     *
     * @param integer $author
     * @return Post
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set category
     *
     * @param \Feniu\ForumBundle\Entity\Topic $category
     * @return Post
     */
    public function setCategory(\Feniu\ForumBundle\Entity\Topic $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Feniu\ForumBundle\Entity\Topic 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Post
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
     * Set topic
     *
     * @param \Feniu\ForumBundle\Entity\Topic $topic
     * @return Post
     */
    public function setTopic(\Feniu\ForumBundle\Entity\Topic $topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Feniu\ForumBundle\Entity\Topic 
     */
    public function getTopic()
    {
        return $this->topic;
    }


    /**
     * Set Date
     *
     * @param \DateTime $date
     * @return Post
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
}
