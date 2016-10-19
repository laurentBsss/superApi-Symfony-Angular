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
use LBSS\MyAngularApiBundle\Form\UserType;


class UserController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/users")
     */  
    public function getUsersAction(Request $request)
    {   
    	$users = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->findAll();

        return $users;

    }
    
    /**
     * @Rest\View()
     * @Rest\Get("/user/{id}")
     */
    public function getUserAction(User $user)
    {   
    	$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->find($user);

         return $user;

    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/users")
     */
    public function postUsersAction(Request $request)
    { 
        /*$userName = "Da vinci";
        $email = "blabla@gmail.com" ;*/

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());
        /*$user->setUsername($request->get('username'))
            ->setEmail($request->get('email'));*/
       /* $user->setUsername($userName)
            ->setEmail($email);*/

         if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $user;
        } else {
            return $form;
        }

    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/users/{id}")
     */
    public function removeUserAction(User $user)
    {
        $user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->find($user);
        $em = $this->getDoctrine()->getManager();

        if ($place) {
            $em->remove($user);
            $em->flush();
        }

    }



   
}
