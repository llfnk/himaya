<?php

namespace Feniu\CompanyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FeniuCompanyBundle:Default:index.html.twig', array('name' => $name));
    }
}
