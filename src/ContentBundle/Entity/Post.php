<?php

namespace ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Choice(callback = "getConditions")
     * @ORM\Column(type="string",length=10)
     */
    protected $title;

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

    public static function getConditions()
    {
        return array(
            0 => 'new',
            1 => 'used'
        );
    }
    public static function getConditions1()
    {
        return array(
            '0'  => 'new',
            '1' => 'used',
            '2' => 'sed'
        );
    }

}