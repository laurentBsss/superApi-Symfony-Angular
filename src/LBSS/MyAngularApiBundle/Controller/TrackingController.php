<?php

namespace LBSS\MyAngularApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LBSS\MyAngularApiBundle\Entity\Tracking;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as Rest;

/*use LBSS\MyAngularApiBundle\Form\TrackingType;*/
use GuzzleHttp\Client;

class TrackingController extends Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/tracking/{id}")
     */  
    public function getTrackingAction($id)
    {  /*var_dump($id);die;*/
       $datatest = 'KU998077933FR';
       $client = new Client( ['verify' => false ,'headers' => ['Accept'     => 'application/json','X-Okapi-Key' => 'WhxruvdlPdnFLcWJT9X7xZyhErjUqYa0Va7c/rxMfTepZ02LnPyKPrjrkV4V3joi']]);
       $response = $client->get('https://api.laposte.fr/suivi/v1/'. $id);
       $contents = $response->getBody()->getContents();
       $response = new Response($contents);
       $response->headers->set('Content-Type', 'application/json');
       return $response;

    }
    
    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/tracking/test/{id}")
     */
    public function getTrackingsAction(Tracking $tracking)
    {   
    	$user = $this->getDoctrine()->getRepository('LBSSMyAngularApiBundle:Tracking')->findAll();

         return $user;

    }
   
   
}
