<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $form = $this->createForm(new UserType(),new User());

        return $this->render('AppBundle:Default:index.html.twig',array('form'=> $form->createView()));
    }
}
