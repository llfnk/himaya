<?php

namespace Feniu\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feniu\ForumBundle\Entity\Category;
use Feniu\UserBundle\Entity\UserData;
use Feniu\UserBundle\Entity\User;
use Feniu\UserBundle\Entity\UserNotification;
use Feniu\UserBundle\Entity\UserEvents;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $em = $this->getDoctrine()->getEntityManager();
         $categories = $em->getRepository(Category::Category)->findall();
         
         $userid=$this->getUser()->getId();
         $name=$this->getUser()->getName();
         $surname=$this->getUser()->getSurname();
                  $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

         
         if ($userdata) {
        } else {


            $newuserdata = new UserData();
            $newuserdata->setName($name);
            $newuserdata->setSurname($surname);
            $newuserdata->setUserlogin($user);



            $em->persist($newuserdata);
            
            $newevents = new UserEvents();
            $newevents->setDate(new \DateTime());
            $newevents->setText('Długo oczekiwane narodziny. Obywatel dołączył do gry.');
            $newevents->setUser($user);
            $em->persist($newevents);
            
            
            $em->flush();
        }
         
         
         
         $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
         $notification = $em->getRepository(UserNotification::UserNotification)->findByUser($user);
         
        

        
         
         
         
         
         
         
         
//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($notification);
//        echo '</pre>';
//        die();

        
        return $this->render('FeniuFrontendBundle:Default:index.html.twig', array('categories' => $categories, 'userdata' => $userdata, 'notification' => $notification));
    }
}
