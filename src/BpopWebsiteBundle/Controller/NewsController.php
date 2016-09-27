<?php

namespace BpopWebsiteBundle\Controller;

use BpopWebsiteBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller {

  public function indexAction($page, Request $request) {
    $news = new News();

    $form = $this->get('form.factory')->createBuilder(FormType::class, $news)
      ->add('title', TextType::class)
      ->add('content', TextareaType::class)
      ->add('save', SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);
      
      if ($form->isValid()) {
        $repositoryAdminUser = $this->getDoctrine()->getManager()->getRepository('BpopWebsiteBundle:AdminUser');
        
        $user = $repositoryAdminUser->find(1);
        
        $news->setAuthor($user);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($news);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('notive', "News bien ajoutée");
        
        return $this->redirectToRoute('bpop_website_news');
      }
    }
    
    $repositoryNews = $this->getDoctrine()->getManager()->getRepository('BpopWebsiteBundle:News');
    
    $allNews = $repositoryNews->findAll();

    return $this->render('BpopWebsiteBundle:News:index.html.twig', array('news' => $allNews, 'page' => $page, 'formNew' => $form->createView()));
  }
}
