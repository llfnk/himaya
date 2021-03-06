<?php

namespace Feniu\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Feniu\UserBundle\Entity\User;

/**
 * Topic
 *
 * @ORM\Table(name="forum_topics")
 * @ORM\Entity(repositoryClass="Feniu\ForumBundle\Repository\TopicRepository")
 * 
 */
class Topic
{
    
    const Topic = 'Feniu\ForumBundle\Entity\Topic';
    
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
     *@var Topic
     *@ORM\ManyToOne(targetEntity="Feniu\UserBundle\Entity\User")
     *@ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $author;
    
    /**
    * @var \DateTime
    * @ORM\Column(type="datetime")
    */
    private $Date;
    
    /**
     *@var Category
     *@ORM\ManyToOne(targetEntity="Category", inversedBy="categoryTopic")
     *@ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    protected $category;
    
    /**
     * @var TopicPost[]
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="topic", cascade={"persist"})
     */
    protected $topicPost;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->topicPost = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Topic
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
     * @return Topic
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
     * @param \Feniu\ForumBundle\Entity\Category $category
     * @return Topic
     */
    public function setCategory(\Feniu\ForumBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Feniu\ForumBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add topicPost
     *
     * @param \Feniu\ForumBundle\Entity\Post $topicPost
     * @return Topic
     */
    public function addTopicPost(\Feniu\ForumBundle\Entity\Post $topicPost)
    {
        $this->topicPost[] = $topicPost;

        return $this;
    }

    /**
     * Remove topicPost
     *
     * @param \Feniu\ForumBundle\Entity\Post $topicPost
     */
    public function removeTopicPost(\Feniu\ForumBundle\Entity\Post $topicPost)
    {
        $this->topicPost->removeElement($topicPost);
    }

    /**
     * Get topicPost
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopicPost()
    {
        return $this->topicPost;
    }

    /**
     * Set Date
     *
     * @param \DateTime $date
     * @return Topic
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
