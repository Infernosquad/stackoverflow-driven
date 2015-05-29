<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        $request = $this->getRequest();
        if($request->getMethod() == "POST"){
            $uploadPath = $this->container->getParameter('kernel.root_dir') . '/../web/uploads/';

            try {
                $uploadedAvatarFile = $request->files->get('avatar');

                /* @var $avatarFile \Symfony\Component\HttpFoundation\File\File */
                $avatarFile = $uploadedAvatarFile->move($uploadPath, $uploadedAvatarFile->getClientOriginalName());

                unset($uploadedAvatarFile);
            } catch (\Exception $e) {
                /* if you don't set $avatarFile to a default file here
                 * you cannot execute the next instruction.
                 */
            }

            $avatarExt = $avatarFile->getExtension();
            var_dump($avatarExt);

        }

        return $this->render('AppBundle:Default:index.html.twig',array('users' => $users));
    }
}
