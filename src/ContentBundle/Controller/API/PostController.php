<?php

namespace ContentBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;

class PostController extends FOSRestController
{
    /**
     * @QueryParam(name="sort", requirements="(asc|desc)", allowBlank=false, default="asc", description="Sort direction")
     */
    public function getPostsAction(ParamFetcher $paramFetcher)
    {
        $sort = $paramFetcher->get('sort');
    }
}