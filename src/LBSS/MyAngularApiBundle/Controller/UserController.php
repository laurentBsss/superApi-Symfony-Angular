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

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends Controller
{
    /**
     * @ApiDoc(
     *    description="Récupère la liste des Users",
     *    input={"class"=PlaceType::class, "name"=""},
     *    statusCodes = {
     *        201 = "Création avec succès",
     *        400 = "Formulaire invalide"
     *    },
     *    responseMap={
     *         201 = {"class"=Place::class},
     *         400 = { "class"=PlaceType::class, "fos_rest_form_errors"=true, "name" = ""}
     *    }

     * )
     *
     * @Rest\View()
     * @Rest\Get("/users")
     */  
    public function getUsersAction(Request $request)
    {   
    	$users = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')->findAll();

        return $users;

    }
    
    /**
     * @ApiDoc(
     *    description="Récupère un User"
     * )
     *
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
    
    /**
     * @Rest\View()
     * @Rest\Put("/user/{id}")
     */
    public function putUserAction(Request $request)
    {
        $user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')
                ->find($request->get('id')); 
       
        if (empty($user)) {
            return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/user/{id}")
     */
    public function patchPlaceAction(Request $request)
    {
        $user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:User')
                ->find($request->get('id')); 

        if (empty($user)) {
            return \FOS\RestBundle\View\View::create(['message' => 'user not found !!!'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(UserType::class, $user);

         // Le paramètre false dit à Symfony de garder les valeurs dans notre 
         // entité si l'utilisateur n'en fournit pas une dans sa requête
        $form->submit($request->request->all(), false);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');            
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }
   
}
