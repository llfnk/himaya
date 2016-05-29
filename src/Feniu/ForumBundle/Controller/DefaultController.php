<?php

namespace Feniu\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FeniuForumBundle:Default:index.html.twig', array('name' => $name));
    }
}
