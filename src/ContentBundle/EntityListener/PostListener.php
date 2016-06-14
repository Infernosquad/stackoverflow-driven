<?php

namespace ContentBundle\EntityListener;

use ContentBundle\Entity\Post;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;

class PostListener
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function prePersist(Post $post, LifecycleEventArgs $event)
    {
        if($post->getTitle() == '...'){
            $this->logger->info(sprintf('Strange post #%d',$post->getId()));
        }
    }
}