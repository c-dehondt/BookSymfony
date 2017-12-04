<?php

namespace BookBundle\Controller;

use BookBundle\Entity\member;
use BookBundle\Entity\picture;
use BookBundle\Entity\category;
use BookBundle\Form\memberType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class memberController extends Controller
{
    /**
     *  list all the member in bdd
     * @Route(
     *     path=    "/Member",
     *     name=    "allMember"
     * )
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // On récupère tous les membres  // We get the member
        $members = $em->getRepository('BookBundle:member')->findAll();
        return $this->render('BookBundle:member:allMember.html.twig', array(
            'members' => $members
            
        ));
    }
    
    /** 
     * view the detail of the member selectionned
     * @Route(
     *     path=    "/member/{id}",
     *     name=    "memberAction",
     *     defaults={"id" : "1"},
     *     
     *     requirements= {"id" : "\d+"}
     * )
    */
    public function memberAction($id){ 
        
        $em = $this->getDoctrine()->getManager();
        // On récupère un membre $id  // We recover from a member $id
        $member = $em->getRepository('BookBundle:member')->find($id);
          
        if (null === $member) 
        {
            throw new NotFoundHttpException("the member d'id ".$id." does not exist.");
        }
        
        
        return $this->render('BookBundle:member:member.html.twig', array(
            'member' => $member
            ));
              
        }

        /**
         * Add the member in the bdd
         * @Route(
         *     path=    "/member/add",
         *     name=    "addMember"
         * )
        */
        public function addMemberAction(Request $request)
        {
            $member = new member();

        // create a random account number  // créer un numéro de compte aléatoire
        $number = '0123456789';
        $letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $login = "";
        for ($i = 0; $i < 5; $i++){
            $login .= $number[rand(0, strlen($number))];
        }
        $login .= $letter[rand(0, strlen($letter))];
            
            $form   = $this->get('form.factory')->create(memberType::class, $member);
            $form-> remove('login');
                if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) { 
                  
                  $em = $this->getDoctrine()->getManager();
                  $member->setLogin($login);
                  $em->persist($member);
                  $em->flush();

                  $request->getSession()->getFlashBag()->add('notice', 'Membre bien enregistrée.');
                   return $this->redirectToRoute('memberAction', array('id' => $member->getId()));
                      }
                  
                      return $this->render('BookBundle:member:addMember.html.twig', array(
                        'form' => $form->createView()));
                             
    }
}