<?php

namespace Feniu\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feniu\ForumBundle\Entity\Category;
use Feniu\UserBundle\Entity\UserData;
use Feniu\UserBundle\Entity\UserTwitter;
use Feniu\UserBundle\Entity\UserEvents;
use Feniu\UserBundle\Entity\UserNotification;
use Feniu\UserBundle\Entity\UserFriends;
use Feniu\UserBundle\Entity\UserMails;
use Feniu\UserBundle\Entity\User;
use Feniu\FrontendBundle\Form\UserDataType;
use Feniu\FrontendBundle\Form\AddFriendType;
use Feniu\FrontendBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller {

    public function indexAction(Request $Request) {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository(Category::Category)->findall();

        $userid = $this->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        $form = $this->createForm(new UserDataType());


//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($userdata);
//        echo '</pre>';
//        die();

        
         $form->handleRequest($Request);
        if($form->isValid()){
            $name=$form->get('name')->getData();
            $surname=$form->get('surname')->getData();
            
                    $validator = $this->get('validator');
            $errors = $validator->validate($surname);
            $userdata->setName($name);
            $userdata->setSurname($surname);
            
            $em->persist($userdata);
            $em->flush();
                    $this->get('session')->getFlashBag()->add('success', 'The task has been added successfully!');
 
        }

        
        
        
        
        


        return $this->render('FeniuFrontendBundle:User:users.html.twig', array('categories' => $categories, 'userdata' => $userdata, 'form' => $form->createView()));
    }
    
     public function emailAction(Request $Request) {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository(Category::Category)->findall();

        $userid = $this->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        
        
        
        


        return $this->render('FeniuFrontendBundle:User:email.html.twig', array('userdata' => $userdata));
    }
    
         public function emailSendAction(Request $Request) {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository(Category::Category)->findall();

        $userid = $this->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);


         $form = $this->createForm(new MailType());
        
        
        $form->handleRequest($Request);
        if($form->isValid()){
            $to_surname=$form->get('to')->getData();
            $userdata = $em->getRepository(UserData::UserData)->findOneBysurname($to_surname);
            $to=$userdata->getuserlogin();
            $text=$form->get('text')->getData();
            
            $email = new UserMails();
            $email->setFrom($user);
            $email->setTo($to);
            $email->setText($text);
            $email->setDate(new \DateTime());
            $email->setIsReaded(0);
            $email->setEmailType(0);
            $em->persist($email);
            
            $email2 = new UserMails();
            $email2->setFrom($user);
            $email2->setTo($to);
            $email2->setText($text);
            $email2->setDate(new \DateTime());
            $email2->setIsReaded(0);
            $email2->setEmailType(1);
            $em->persist($email2);
            
            $em->flush();
            
 
        }
        


        return $this->render('FeniuFrontendBundle:User:email_send.html.twig', array('userdata' => $userdata, 'form' => $form->createView()));
    }
    
    
    
    
    

    public function allNotificationAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $this->getUser();
        $usernotifications = $em->getRepository(UserNotification::UserNotification)->findByuser($user);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($usernotifications);
//        echo '</pre>';
//        die();

        return $this->render('FeniuFrontendBundle:User:notification.html.twig', array('usernotifications' => $usernotifications, 'userdata' => $userdata));
    }

    public function profilAction($slug, Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository(Category::Category)->findall();

        $userid = $this->getUser();

        $userdata = $em->getRepository(UserData::UserData)->findOneByslug($slug);
        $user = $userdata->getUserLogin();
        $twitts = $em->getRepository(UserTwitter::UserTwitter)->findByUser($user);
        $events = $em->getRepository(UserEvents::UserEvents)->findByUser($user);
        $notification = $em->getRepository(UserNotification::UserNotification)->findByUser($userid);
        $addfriendform = $this->createForm(new AddFriendType());





        $addfriendform->handleRequest($request);
        if ($addfriendform->isValid()) {

            $newnotification = new UserNotification();
            $sender = $em->getRepository(UserData::UserData)->findOneByuserlogin($userid);
            $newnotification->setText('Zostałeś właśnie zaproszony do przyjaciół przez');
            $newnotification->setDate(new \DateTime());
            $newnotification->setUser($user);
            $newnotification->setIsReaded(0);

            $em->persist($newnotification);

            $newfriend = new UserFriends();
            $newfriend->setInvitefrom($sender);
            $newfriend->setInviteto($user);
            $newfriend->setIsRight(0);
            $em->persist($newfriend);

            $em->flush();
        }

        ;


        return $this->render('FeniuFrontendBundle:User:profil.html.twig', array('user' => $user, 'categories' => $categories, 'userdata' => $userdata, 'twitts' => $twitts, 'events' => $events, 'notification' => $notification, 'addfriendform' => $addfriendform->createView()));
    }

    public function clearNotificationAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();

        $user = $this->getUser();
        $notifications = $em->getRepository(UserNotification::UserNotification)->findByuser($user);


        foreach ($notifications as $notification) {
            $notification->setIsReaded(1);
            echo "zrobione";
            $em->persist($notification);
        }
        $em->flush();



        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }

    public function clearOneNotificationAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $ntnr = $request->request->get('ntnr');

        $user = $this->getUser();
        $notificationuser = $em->getRepository(UserNotification::UserNotification)->find($ntnr)->getuser();

        if ($notificationuser == $user) {
            $notification = $em->getRepository(UserNotification::UserNotification)->find($ntnr);
            $em->remove($notification);
            $em->flush();
        }



        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }

    public function AddfriendAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
            $userid = $request->request->get('userid');
//        $userid = 1;
        $user = $em->getRepository(User::User)->find($userid);
        $sender = $this->getUser();
        $sendersurname = $em->getRepository(UserData::UserData)->findOneByuserlogin($sender)->getsurname();
        $sendername = $em->getRepository(UserData::UserData)->findOneByuserlogin($sender)->getname();


//        $newnotification = new UserNotification();
////            $sender = $em->getRepository(UserData::UserData)->findOneByuserlogin($userid);
//        $newnotification->setText($sendername . ' ' . $sendersurname . ' zaprosił(a) Cię do przyjaciół');
//        $newnotification->setDate(new \DateTime());
//        $newnotification->setUser($user);
//        $newnotification->setIsReaded(0);
//
//        $em->persist($newnotification);

        $newfriend = new UserFriends();
        $newfriend->setInvitefrom($sender);
        $newfriend->setInviteto($user);
        $newfriend->setIsRight(0);
        $em->persist($newfriend);

        $em->flush();


        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }

    public function editAction(Request $request) {
        $name = $request->request->get('imie');
        $surname = $request->request->get('nazwisko');


        $em = $this->getDoctrine()->getEntityManager();

        $userid = $this->getUser()->getId();
        $user = $em->getRepository(User::User)->find($userid);
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        if ($userdata) {

            $userdata->setName($name);
            $userdata->setSurname($surname);
            $em->persist($userdata);
            $em->flush();
        } else {


            $newuserdata = new UserData();
            $newuserdata->setName($name);
            $newuserdata->setSurname($surname);
            $newuserdata->setUserlogin($user);



            $em->persist($newuserdata);
            $em->flush();
        }



//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($userdata);
//        echo '</pre>';
//        die();


        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }

}
