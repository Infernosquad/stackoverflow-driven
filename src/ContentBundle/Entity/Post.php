<?php

namespace ContentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\EntityListeners({"ContentBundle\EntityListener\PostListener"})
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
     * @ORM\ManyToMany(targetEntity="Tag",inversedBy="posts",cascade={"persist", "remove"})
     * @ORM\JoinTable(name="post_tags")
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post",fetch="EXTRA_LAZY",cascade={"persist", "remove"})
     */
    private $comments;

    public function __construct() {
        $this->tags     = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function removeTag(Tag $tag)
    {
        if($this->tags->contains($tag)){
            $this->tags->remove($tag);
        }
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setPost($this);
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}