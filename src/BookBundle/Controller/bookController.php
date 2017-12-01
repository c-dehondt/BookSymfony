<?php

namespace BookBundle\Controller;

use BookBundle\Entity\book;
use BookBundle\Entity\picture;
use BookBundle\Entity\category;
use BookBundle\Form\bookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class bookController extends Controller
{
    /**
     * @Route(
     *     path=    "/",
     *     name=    "allBook"
     * )
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // On récupère les livres
        // We get the books
        $books = $em->getRepository('BookBundle:book')->findAll();
        return $this->render('BookBundle:book:index.html.twig', array(
            'books' => $books
        ));
    }
    
    /**
     * @Route(
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
        
        $em = $this->getDoctrine()->getManager();
        // On récupère d'un livre $id
        // We recover from a book $id
        $book = $em->getRepository('BookBundle:book')->find($id);
          
        if (null === $book) 
        {
            throw new NotFoundHttpException("the Book d'id ".$id." does not exist.");
        }
        return $this->render('BookBundle:book:detailBook.html.twig', array(
            'book' => $book
            ));
              
        }

        /**
         * @Route(
         *     path=    "/book/add",
         *     name=    "addBook"
         * )
        */
        public function addBookAction(Request $request)
        {
            $book = new book();
            $form   = $this->get('form.factory')->create(bookType::class, $book);
     
                if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) { 
                  //  elle qui déplace l'image là où on veut les stocker
                  // she who moves the image where we want to store them
                  $book->getPicture()->upload();
            
                  
                  $em = $this->getDoctrine()->getManager();
                  $em->persist($book);
                  $em->flush();

                  $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
                   return $this->redirectToRoute('bookAction', array('id' => $book->getId()));
                      }
                  
                      return $this->render('BookBundle:book:addBook.html.twig', array(
                        'form' => $form->createView()));
                             
    }
}