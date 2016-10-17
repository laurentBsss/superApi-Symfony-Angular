<?php

namespace LBSS\MyAngularApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LBSS\MyAngularApiBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations\Get;

/*
*
* controller for all tests
*
*/
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LBSSMyAngularApiBundle:Default:index.html.twig');
    }

    /**
     * @Get("/default")
     */   
    public function getDefaultsAction(Request $request)
    {   
    	$users = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->findAll();
    	
    	/*var_dump($users);die;*/
        return array('users' => $users );
    }
    
    /**
     * @Get("/default/{id}")

     */
    public function getDefaultAction(User $user)
    {   
    	$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->find($user);
    	/*$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->find($request->get('users_id'));*/
    	
    	var_dump($user);die;

        return array('user' => $user );
    }

}
