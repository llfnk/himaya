<?php

namespace Feniu\FrontendBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Feniu\ForumBundle\Entity\Category;
use Feniu\UserBundle\Entity\UserData;
use Feniu\UserBundle\Entity\User;
use Feniu\UserBundle\Entity\UserNotification;
use Feniu\UserBundle\Entity\UserFriends;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;

/**
 * Description of LayoutExtension
 *
 * @author llewandowski
 */
class LayoutExtension extends \Twig_Extension {

    protected $container;

    public function __construct(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function getName() {
        return 'layout_extension';
    }

    public function notificationLayout($container = false) {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $userid = $this->container->get('security.context')->getToken()->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
        $notification = $em->getRepository(UserNotification::UserNotification)->findBy(array('user' => $user, 'is_readed' => 0));
        $friends = $em->getRepository(UserFriends::UserFriends)->findBy(array('inviteto' => $user, 'is_right' => 0));
//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($friends);
//        echo '</pre>';
//        die();

        return $this->container->get('templating')
                        ->render("FeniuFrontendBundle:TwigExtension:notification.html.twig", array('userdata' => $userdata, 'notification' => $notification, 'friends' => $friends));
    }

    public function menuLayout($container = false) {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $categories = $em->getRepository(Category::Category)->findall();

        return $this->container->get('templating')
                        ->render("FeniuFrontendBundle:TwigExtension:menu.html.twig", array('categories' => $categories));
    }
    
    public function helloLayout($container = false) {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $userid = $this->container->get('security.context')->getToken()->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        return $this->container->get('templating')
                        ->render("FeniuFrontendBundle:TwigExtension:hello.html.twig", array('userdata' => $userdata));
    }
    


    public function getFunctions() {
        return array(
            'layout_notification' => new \Twig_Function_Method($this, 'notificationLayout', array('is_safe' => array('html'))),
            'layout_menu' => new \Twig_Function_Method($this, 'menuLayout', array('is_safe' => array('html'))),
            'layout_hello' => new \Twig_Function_Method($this, 'helloLayout', array('is_safe' => array('html'))),
        );
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

