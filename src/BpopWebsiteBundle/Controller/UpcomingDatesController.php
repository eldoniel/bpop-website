<?php

namespace BpopWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UpcomingDatesController extends Controller {

  public function upcomingAction() {
    $concert1 = "30 septembre, Nuit Killian, St Etienne";
    $concert2 = "15 octobre, Fréquence Café, Grenoble";

    $concerts[] = $concert1;
    $concerts[] = $concert2;

    return $this->render('BpopWebsiteBundle:Upcoming:upcoming.html.twig', array('concerts' => $concerts));
  }

}
