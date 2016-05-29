<?php

namespace Feniu\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Feniu\ForumBundle\Entity\Category;
use Feniu\CompanyBundle\Entity\Company;
use Feniu\CompanyBundle\Entity\Business;
use Feniu\UserBundle\Entity\User;
use Feniu\UserBundle\Entity\UserData;
use Feniu\FrontendBundle\Form\Company\CompanyType;
use Feniu\FrontendBundle\Form\Company\BusinessType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CompanyController extends Controller {

    public function indexAction(Request $Request) {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new CompanyType());
        
        $userid=$this->getUser()->getId();
         $user=$em->getRepository(User::User)->find($userid);
         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
        $test = new \DateTime();

                 echo '<pre>';
        \Doctrine\Common\Util\Debug::dump($test);
        echo '</pre>';
        die();

        
         $form->handleRequest($Request);
        if($form->isValid()){
            $name=$form->get('name')->getData();
            
            
            $company = new Company();
            $company->setName($name);
            $company->setUser($user);
            $company->setDate(new \DateTime());
            $em->persist($company);
            $em->flush();
                    $this->get('session')->getFlashBag()->add('success', 'The task has been added successfully!');
 
        }

        
        
        
        
        


        return $this->render('FeniuFrontendBundle:Company:company_new.html.twig', array('userdata' => $userdata,'form' => $form->createView()));
    }
    
        public function showCompanyAction(Request $Request) {
        $em = $this->getDoctrine()->getEntityManager();
//        $form = $this->createForm(new BusinessType());
//        
//        $userid=$this->getUser()->getId();
//         $user=$em->getRepository(User::User)->find($userid);
//         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
         
         $company = $em->getRepository(Company::Company)->find(1);
//         $business = $em->getRepository(Business::Business)->findByCompany($company);

                 echo '<pre>';
        \Doctrine\Common\Util\Debug::dump($company);
        echo '</pre>';
        die();

        
         $form->handleRequest($Request);
        if($form->isValid()){
            $name=$form->get('name')->getData();
            
            
            $business = new Business();
            $business->setName($name);
            $business->setCompany($company);
            $business->setDate(new \DateTime());
            $em->persist($business);
            $em->flush();
                    $this->get('session')->getFlashBag()->add('success', 'The task has been added successfully!');
 
        }

        
        
        
        
        


        return $this->render('FeniuFrontendBundle:Company:company.html.twig', array('userdata' => $userdata, 'company' => $company,'form' => $form->createView()));
    }
    
    

    
       

}
