<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use ContentBundle\Entity\Post;
use ContentBundle\Entity\Tag;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tag1 = new Tag('tag1');
        $post1 = new Post();
        $post1->setTitle('Post 1');
        $post1->addTag($tag1);
        $post1->addTag(new Tag('tag2'));

        $post2 = new Post();
        $post2->setTitle('Post 2');
        $post2->addTag($tag1);

        $manager->persist($post1);
        $manager->persist($post2);

        $manager->flush();
    }
}