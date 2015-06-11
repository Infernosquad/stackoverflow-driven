<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller{

    /**
     * @View()
     */
    public function getUsersAction()
    {
        throw new NotFoundHttpException();
        return $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
    }
}
