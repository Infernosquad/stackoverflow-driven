<?php

namespace ContentBundle\Controller\API;

use ContentBundle\Entity\Post;
use ContentBundle\Form\Type\PostType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends FOSRestController
{
    /**
     * @QueryParam(name="sort", requirements="(asc|desc)", allowBlank=false, default="asc", description="Sort direction")
     */
    public function getPostsAction(ParamFetcher $paramFetcher)
    {
        throw new NotFoundHttpException();
        return [];
    }

    public function putPostAction(Post $post, Request $request)
    {
        $em     = $this->getDoctrine()->getManager();
        $form   = $this->createForm('content_post',$post);

        $form->submit($request);

        if($form->isValid()){
            $em->persist($form->getData());
            $em->flush();

            return $post;
        }

        return $form;
    }
}