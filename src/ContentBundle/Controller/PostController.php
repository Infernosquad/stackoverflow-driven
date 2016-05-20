<?php

namespace ContentBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function createAction(Request $request)
    {
        $form = $this->createForm('content_post');


        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('content_post_list');
        }

        return $this->render('ContentBundle:Post:create.html.twig',[
            'form'  => $form->createView(),
        ]);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('ContentBundle:Post:list.html.twig',[
            'posts' => $em->getRepository('ContentBundle:Post')->findAll()
        ]);
    }

}