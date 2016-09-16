<?php

namespace BpopWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BpopWebsiteBundle:Default:index.html.twig');
    }
}
