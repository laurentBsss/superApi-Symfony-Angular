<?php

namespace LBSS\MyAngularApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LBSS\MyAngularApiBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as Rest;
/*use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
*/


class UserController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/users")
     */  
    public function getUsersAction(Request $request)
    {   
    	$users = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->findAll();
    	
    	/*var_dump($users);die;*/
        // Récupération du view handler
       /* $viewHandler = $this->get('fos_rest.view_handler');

        // Création d'une vue FOSRestBundle
        $view = View::create($users);
        $view->setFormat('json');

        // Gestion de la réponse
        return $viewHandler->handle($view);*/

        return $users;

    }
    
    /**
     * @Rest\View()
     * @Rest\Get("/user/{id}")
     */
    public function getUserAction(User $user)
    {   
    	$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->find($user);

        /*// Récupération du view handler
        $viewHandler = $this->get('fos_rest.view_handler');

        // Création d'une vue FOSRestBundle
        $view = View::create($user);
        $view->setFormat('json');

        // Gestion de la réponse
        return $viewHandler->handle($view);*/
        
         return $user;

    }

   
}
