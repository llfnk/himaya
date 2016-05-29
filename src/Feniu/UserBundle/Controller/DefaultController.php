<?php

namespace Feniu\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FeniuUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
