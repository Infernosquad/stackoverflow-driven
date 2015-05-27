<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Type\UserType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends FOSRestController {

    /**
     * @Rest\View()
     */
    public function getUsersAction()
    {
        return array();
    }

    /**
     * @Rest\View()
     */
    public function postUsersAction(Request $request)
    {
        $form = $this->createForm(new UserType(),new User());

        if($form->handleRequest($request)->isValid()){
            return array('new' => 'form');
        }

        return array();
    }

}