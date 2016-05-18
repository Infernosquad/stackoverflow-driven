<?php

namespace ContentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Post
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\ManyToMany(targetEntity="Tag",inversedBy="tags",cascade={"persist", "remove"})
     * @ORM\JoinTable(name="post_tags")
     */
    protected $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addTag(Tag $tag)
    {
        $tag->addPost($this);
        $this->tags[] = $tag;
    }

    public function getTags()
    {
        return $this->tags;
    }

}