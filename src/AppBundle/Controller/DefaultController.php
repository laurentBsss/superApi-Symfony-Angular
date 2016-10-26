<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/hello", name="homepage")
     */
    public function indexAction(Request $request)
    { 

       $client = new Client( ['verify' => false ,'headers' => ['Accept'     => 'application/json','X-Okapi-Key' => 'WhxruvdlPdnFLcWJT9X7xZyhErjUqYa0Va7c/rxMfTepZ02LnPyKPrjrkV4V3joi']]);
       /*var_dump($client);die();*/
       /*$response = $client->get('https://api.darksky.net/forecast/64e533656b64031a94ec0f314cd024f9/37.8267,-122.4233');*/
       /* $response = $client->get('http://dev.test.com/app_dev.php/user/9');*/
       $response = $client->get('https://api.laposte.fr/suivi/v1/KU998077933FR');
      $contents = $response->getBody()->getContents();
   
$response = new Response($contents);
        /*$response = new Response(json_encode($contents,true));
    $response->headers->set('Content-Type', 'application/json');*/
$response->headers->set('Content-Type', 'application/json');
/*var_dump(gettype($response));die();*/
    return $response;


    
       
    
        /*var_dump('hello  a  toi ');die;
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);*/
    }
}
