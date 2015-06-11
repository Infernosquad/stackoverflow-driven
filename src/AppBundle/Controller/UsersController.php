<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;

class UsersController extends Controller{

    /**
     * @View()
     */
    public function getUsersAction()
    {
        return $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
    }
}
