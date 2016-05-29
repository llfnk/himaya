<?php

namespace Feniu\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        
//                 echo '<pre>';
//         print_r($user);
//         echo '</pre>';
//         die();
        
        
        return $this->render('FeniuFrontendBundle:Default:index.html.twig', array('user' => $user));
    }
}
