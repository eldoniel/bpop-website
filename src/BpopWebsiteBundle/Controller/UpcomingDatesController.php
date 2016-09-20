<?php

namespace BpopWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpcomingDatesController extends Controller {

  public function upcomingAction() {
    $concert1 = "30 septembre, Nuit Killian, St Etienne";
    $concert2 = "2 octobre, RDV Emergenza, Lyon";

    $concerts[] = $concert1;
    $concerts[] = $concert2;

    return $this->render('BpopWebsiteBundle:Upcoming:upcoming.html.twig', array('concerts' => $concerts));
  }

}
