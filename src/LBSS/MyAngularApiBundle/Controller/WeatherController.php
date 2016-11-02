<?php

namespace LBSS\MyAngularApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/*use LBSS\MyAngularApiBundle\Entity\Weather;*/
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
/*use LBSS\MyAngularApiBundle\Form\TrackingType;*/
use GuzzleHttp\Client;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class WeatherController extends Controller
{
    /**
     * @ApiDoc(
     *    description="Récupère les données météo pour une ville donnée",
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
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/weather/{city}")
     */  
    public function getWeatherAction($city)
    {  /*var_dump($city);die;*/
       
       $appID = '14e1516c61a756cc3081bb5bc13a572a';
       $client = new Client( ['verify' => false ,'headers' => ['Accept' => 'application/json']]);
       $response = $client->get('http://api.openweathermap.org/data/2.5/weather?q='.$city.',fr&appid='. $appID);
       $contents = $response->getBody()->getContents();
       $response = new Response($contents);
       $response->headers->set('Content-Type', 'application/json');
       return $response;

    }
    /**
     * @ApiDoc(
     *    description="Récupère les données météo pour Paris par defaut",
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
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/weather/")
     */  
    public function getWeatherDefaultAction($city = 'paris')
    {  /*var_dump($city);die;*/
       
       $appID = '14e1516c61a756cc3081bb5bc13a572a';
       $client = new Client( ['verify' => false ,'headers' => ['Accept' => 'application/json']]);
       $response = $client->get('http://api.openweathermap.org/data/2.5/weather?q='.$city.',fr&appid='. $appID);
       $contents = $response->getBody()->getContents();
       $response = new Response($contents);
       $response->headers->set('Content-Type', 'application/json');
       return $response;

    }
   
}
