<?php

namespace AppBundle\Listener;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class AppExceptionListener
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // We get the exception object from the received event
        $exception = $event->getException();

        if($exception->getStatusCode() != 404)
        {
            $this->logger->info('Error');
        }
    }

}