<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        $form = $this->createForm(new UserType(),new User());

        $form->handleRequest($request);

        var_dump($request->getClientIp());
        if($request->isMethod('POST'))
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('AppBundle:Default:index.html.twig', array(
                'users' => $users,
                'form'  => $form->createView()
            )
        );
    }
}
