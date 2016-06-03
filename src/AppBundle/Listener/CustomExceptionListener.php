<?php
//src/AppBundle/Listener/CustomExceptionListener.php

namespace AppBundle\Listener;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomExceptionListener
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if(!$exception instanceof NotFoundHttpException)
        {
            $this->logger->info(sprintf('Error message: %s',$exception->getMessage()));
        }
    }

}