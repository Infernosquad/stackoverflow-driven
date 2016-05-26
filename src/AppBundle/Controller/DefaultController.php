<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:Person')->findAll();
        dump($users);
        die();

        $form = $this->createForm(new UserType(),new User());

        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($form->getData());
            $em->flush();

            return $this->redirect($this->generateUrl('index'));
        }

        return $this->render('AppBundle:Default:index.html.twig', array(
                'users' => $users,
                'form'  => $form->createView()
            )
        );
    }

    public function angularAction()
    {
        return $this->render('AppBundle:Default:angular.html.twig');
    }
}
