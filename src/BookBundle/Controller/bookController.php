<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class bookController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // On récupère les livres
        // We get the books
        $books = $em->getRepository('BookBundle:book')->findAll();
        
        return $this->render('BookBundle:book:index.html.twig', array(
            'book' => $books
        ));
    }
    
    /**
     * Route(
     *     path=    "/book",
     *     name=    "bookAction"
     * )
     * 
     * @Route(
     *     path=    "/book/{id}",
     *     name=    "bookAction",
     *     defaults={"id" : "1"},
     *     
     *     requirements= {"id" : "\d+"}
     * )
    */
    public function bookAction($id){ 
        
        // $em = $this->getDoctrine()->getManager();
        // On récupère d'un livre $id
        // We recover from a book $id
        // $book = $em->getRepository('BookBundle:book')->find($id);
          
        // if (null === $book) 
        // {
        //     throw new NotFoundHttpException("the Book d'id ".$id." does not exist.");
        // }
        return $this->render('BookBundle:book:detailBook.html.twig', array(
            'book' => $book
            ));
              
        }
    }
