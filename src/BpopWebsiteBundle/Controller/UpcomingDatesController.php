<?php

namespace BpopWebsiteBundle\Controller;

use BpopWebsiteBundle\Entity\MusicShow;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UpcomingDatesController extends Controller {

  public function upcomingAction() {
    $repositoryMusicShow = $this->getDoctrine()->getManager()->getRepository('BpopWebsiteBundle:MusicShow');
    
    $allShows = $repositoryMusicShow->findAll();

    return $this->render('BpopWebsiteBundle:Upcoming:upcoming.html.twig', array('shows' => $allShows));
  }
  
  public function addAction(Request $request) {
    $musicShow = new MusicShow();

    $form = $this->get('form.factory')->createBuilder(FormType::class, $musicShow)
      ->add('name', TextType::class, array('required' => false))
      ->add('location', TextType::class)
      ->add('date', DateType::class)
      ->add('save', SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);
      
      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($musicShow);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('notive', "Concert bien ajouté");
        
        return $this->redirectToRoute('bpop_website_news');
      }
    }
    
    $repositoryMusicShow = $this->getDoctrine()->getManager()->getRepository('BpopWebsiteBundle:MusicShow');
    
    $allShows = $repositoryMusicShow->findAll();

    return $this->render('BpopWebsiteBundle:Upcoming:add.html.twig', array('shows' => $allShows, 'formAddShow' => $form->createView()));
  }
}
