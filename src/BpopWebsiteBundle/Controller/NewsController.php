<?php

namespace BpopWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('BpopWebsiteBundle:News:index.html.twig', array('author' => 'Niko'));
        
        return new Response($content);
    }
}
