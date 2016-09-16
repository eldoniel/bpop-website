<?php

namespace BpopWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('BpopWebsiteBundle:News:index.html.twig', array('author' => 'Niko', 'page' => $page));
    }
    
    public function upcomingAction()
    {
        $concert1 = "30 septembre, Nuit Killian, St Etienne";
        $concert2 = "2 octobre, RDV Emergenza, Lyon";
        
        $concerts[] = $concert1;
        $concerts[] = $concert2;
        
        return $this->render('BpopWebsiteBundle:News:upcoming.html.twig', array('concerts' => $concerts));
    }
}
