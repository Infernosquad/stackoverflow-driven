<?php

namespace AppBundle\EntityListener;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\RouterInterface;

class UserListener {

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function postPersist(User $user, LifecycleEventArgs $args)
    {
        $logger = $this->logger;

        $logger->info('Event triggered');

        //Do something
    }
}