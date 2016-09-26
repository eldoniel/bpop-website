<?php

namespace BpopWebsiteBundle\Controller;

use BpopWebsiteBundle\Entity\Recording;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class MusicController extends Controller {

  public function indexAction(Request $request) {
    $song = new Recording();
    
    $form = $this->get('form.factory')->createBuilder(FormType::class, $song)
      ->add('title', TextType::class)
      ->add('file', FileType::class)
      ->add('save', SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);
      
      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($song);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('notice', "Fichier bien ajouté");
        
        return $this->redirectToRoute('bpop_website_music');
      }
    }
    
    $repositoryRecording = $this->getDoctrine()->getManager()->getRepository('BpopWebsiteBundle:Recording');
    
    $allRecordings = $repositoryRecording->findAll();
    
    $path = $song->getUploadDir();
    
    return $this->render('BpopWebsiteBundle:Music:index.html.twig', array('recordings' => $allRecordings, 'formNew' => $form->createView(), 'path' => $path));
  }

}
