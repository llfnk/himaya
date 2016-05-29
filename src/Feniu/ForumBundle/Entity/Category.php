<?php

namespace Feniu\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\EntityListeners;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Category
 *
 * @ORM\Table(name="forum_category")
 * @ORM\Entity(repositoryClass="Feniu\ForumBundle\Repository\CategoryRepository")
 */
class Category
{
    
    const Category = 'Feniu\ForumBundle\Entity\Category';
    
    
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
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    

    
    
    /**
     * @var CategoryTopic[]
     *
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="category", cascade={"persist"})
     */
    protected $categoryTopic;


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
     * @return Category
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
     * @param string $author
     * @return Category
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryTopic = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categoryTopic
     *
     * @param \Feniu\ForumBundle\Entity\Topic $categoryTopic
     * @return Category
     */
    public function addCategoryTopic(\Feniu\ForumBundle\Entity\Topic $categoryTopic)
    {
        $this->categoryTopic[] = $categoryTopic;

        return $this;
    }

    /**
     * Remove categoryTopic
     *
     * @param \Feniu\ForumBundle\Entity\Topic $categoryTopic
     */
    public function removeCategoryTopic(\Feniu\ForumBundle\Entity\Topic $categoryTopic)
    {
        $this->categoryTopic->removeElement($categoryTopic);
    }

    /**
     * Get categoryTopic
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategoryTopic()
    {
        return $this->categoryTopic;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
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
     * Set code
     *
     * @param string $code
     * @return Category
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
}
