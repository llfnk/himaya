<?php

namespace Feniu\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feniu\ForumBundle\Entity\Category;
use Feniu\ForumBundle\Entity\Topic;
use Feniu\ForumBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Feniu\UserBundle\Entity\UserData;
use Feniu\UserBundle\Entity\User;
use Feniu\UserBundle\Entity\UserNotification;

class ForumController extends Controller {

    public function indexAction($category) {
        $em = $this->getDoctrine()->getEntityManager();
        $cat= $em->getRepository(Category::Category)->findOneByname($category);
        $id = $cat->getId();
        $topics = $em->getRepository(Topic::Topic)->findByCategory($id);
        $categories = $em->getRepository(Category::Category)->findall();
//
        
        $userid=$this->getUser()->getId();
         $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
         $notification = $em->getRepository(UserNotification::UserNotification)->findByUser($user);
//         
//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($useruser);
//        echo '</pre>';
//        die();
        return $this->render('FeniuFrontendBundle:Forum:topics.html.twig', array('topics' => $topics,'categories' => $categories, 'userdata' => $userdata, 'notification' => $notification));
    }

    public function post2Action($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository(Post::Post)->findBytopic($id);
        $categories = $em->getRepository(Category::Category)->findall();
//        $userid= $posts->getAuthor();
//        echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($posts);
//        echo '</pre>';
//        die();
        $userid=$this->getUser()->getId();
         $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        return $this->render('FeniuFrontendBundle:Forum:post.html.twig', array('posts' => $posts,'categories' => $categories, 'userdata' => $userdata));
    }
    
    public function postAction($id, Request $request)
{
   $em = $this->getDoctrine()->getEntityManager();
   $posts = $em->getRepository(Post::Post)->findBytopic($id);
   
   $userid=$this->getUser()->getId();
         $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $posts,
        $request->query->getInt('strona', 1)/*page number*/,
        10/*limit per page*/
    );
    
//            echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($po);
//        echo '</pre>';
//        die();

    // parameters to template
    return $this->render('FeniuFrontendBundle:Forum:post.html.twig', array('pagination' => $pagination, 'userdata' => $userdata));
}
    
    
    
    

   
      public function categoryAddAction($name) {

        $post = new Category();
        $post->setName($name);
        $post->setAuthor(1);

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);
        $em->flush();
    }
    
    
    
    
    public function postAddAction(Request $request) {

        $topicnr = $request->request->get('topicnr');
        $htmltext = $request->request->get('htmltext');
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $topics = $em->getRepository(Topic::Topic)->find($topicnr);
        
        $post = new Post();
        $post->setName('A Foo Bar');
        $post->setText($htmltext);
        $post->setTopic($topics);
        $post->setAuthor($user);

        

        $em->persist($post);
        $em->flush();




//        $em=$this->getDoctrine()->getEntityManager();
//        $posts=$em->getRepository(Post::Post)->findBytopic($id);
//        echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($posts);
//        echo '</pre>';
//        die();

        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }
    
        public function topicAddAction(Request $request) {

        $categorynr = $request->request->get('categorynr');
        $htmltext = $request->request->get('htmltext');
        $topicname = $request->request->get('topicname');
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::Category)->find($categorynr);
        
        $topic = new Topic();
        $topic->setName($topicname);
        $topic->setCategory($category);
        $topic->setAuthor($user);
        $topic->setDate(new \DateTime());
        $em->persist($topic);
        
        $post = new Post();
        $post->setName(1);
        $post->setText($htmltext);
        $post->setTopic($topic);
        $post->setAuthor($user);

        $em->persist($post);
        

        
        $em->flush();




//        $em=$this->getDoctrine()->getEntityManager();
//        $posts=$em->getRepository(Post::Post)->findBytopic($id);
//        echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($posts);
//        echo '</pre>';
//        die();

        return new Response(json_encode(array('status' => true)), Response::HTTP_OK, array('application/json'));
    }
    

}
