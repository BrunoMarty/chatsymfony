<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
         $entityManager = $this -> getDoctrine() -> getManager();
         $mess = $entityManager->getRepository('AppBundle:Chat')->findAll();

         $form = $this -> createForm('AppBundle\Form\ChatType');

         return $this->render('default/index.html.twig', array(
             'mess' => $mess,
             'form' => $form ->createView()));
     //   return $this->render('default/index.html.twig');
    }
    

}
