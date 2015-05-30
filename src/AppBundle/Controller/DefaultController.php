<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        //Trigger event
        $users[0]->setName(time());
        $em = $this->getDoctrine()->getManager();
        $em->persist($users[0]);
        $em->flush();

        return $this->render('AppBundle:Default:index.html.twig',array('users' => $users));
    }
}
