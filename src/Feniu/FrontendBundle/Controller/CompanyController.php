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

    public function indexAction(Request $request) {
        $em = $this->get('doctrine.orm.entity_manager');
                $translator = $this->get('translator');
        $companyForm = $this->getObjectForm(null, 'Feniu\CompanyBundle\Entity\Company', 'Feniu\FrontendBundle\Form\Company\CompanyType');
        $user = $this->getUser();
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
        $test = new \DateTime();

//                 echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($test);
//        echo '</pre>';
//        die();

                if ($request->getMethod() == 'POST') {
            $companyForm->handleRequest($request);
            if ($companyForm->isValid()) {
                $company = $companyForm->getData();

                $company->setUser($user);
                $em->persist($company);
                $em->flush();
                $this->addFlash('success', $translator->trans('Form.CreateSuccessMessage', array(), 'Frontend'));
                return $this->redirectToRoute('feniu_frontend_company_show', array('slug' => $company->getSlug()));
            } else {
                $this->addFlash('danger', $translator->trans('Form.CreateFailureMessage', array(), 'Frontend'));
            }
        }
        


        return $this->render('FeniuFrontendBundle:Company:company_new.html.twig', array('userdata' => $userdata, 'form' => $companyForm->createView()));
    }

    public function showCompanyAction(Request $request, $slug) {
        $em = $this->getDoctrine()->getEntityManager();
//        $form = $this->createForm(new BusinessType());
//        
//        $userid=$this->getUser()->getId();
//         $user=$em->getRepository(User::User)->find($userid);
//         $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);

        $company = $em->getRepository(Company::Company)->findOneBySlug($slug);
                $user = $this->getUser();
        $userdata = $em->getRepository(UserData::UserData)->findOneByUserlogin($user);
//         $business = $em->getRepository(Business::Business)->findByCompany($company);
 $breadcrumbs = $this->get("white_october_breadcrumbs");
     $breadcrumbs->addItem("Home", $this->get("router")->generate("feniu_frontend_homepage"));

    // Example without URL
    $breadcrumbs->addItem("Some text without link");
//        echo '<pre>';
//        \Doctrine\Common\Util\Debug::dump($company);
//        echo '</pre>';
//        die();


        return $this->render('FeniuFrontendBundle:Company:company.html.twig', array('userdata' => $userdata, 'company' => $company, ));
    }

    public function getObjectForm($object = null, $objectname = null, $formname = null) {
        if (null === $object) {
            $object = new $objectname();
        }
        return $this->createForm(new $formname($this->container), $object);
    }

}
