<?php

namespace ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Comment
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     */
    private $post;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

}