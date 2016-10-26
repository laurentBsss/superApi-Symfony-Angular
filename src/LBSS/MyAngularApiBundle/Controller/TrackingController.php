<?php

namespace LBSS\MyAngularApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LBSS\MyAngularApiBundle\Entity\Tracking;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use LBSS\MyAngularApiBundle\Entity\Tracking;

use FOS\RestBundle\Controller\Annotations as Rest;

/*use LBSS\MyAngularApiBundle\Form\TrackingType;*/
use GuzzleHttp\Client;

use Symfony\Component\HttpFoundation\Response;

class TrackingController extends Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/tracking/{id}")
     */  
    public function getTrackingAction(Request $request)
    {   
    	
        return $tracking;

    }
    
    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/tracking/test/{id}")
     */
    public function getTrackingAction(Tracking $tracking)
    {   
    	$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:Tracking')->findAll();

         return $user;

    }
   
   
}
