<?php

namespace BookBundle\Controller;

use BookBundle\Entity\book;
use BookBundle\Entity\picture;
use BookBundle\Entity\category;
use BookBundle\Entity\member;
use BookBundle\Form\bookType;
use BookBundle\Form\memberType;
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

        /**
     * to rent a book
     * @Route(
     *     path = "/book/{id}/borrowBook",
     *     name="borrowBook" ,
     *     requirements={"id": "\d+"})
     */
    public function borrowBookAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager()-> getRepository(book::class);
        $book = $em->find($id);
        $member = new member();
    // an: create a form to member // fr: créer un formulaire pour membre
        $form = $this->createForm(memberType::class, $member);
        $form->remove('name' )
             ->remove('age'  )
             ->remove('streetAddress')
             ->remove('city')
             ->remove('postalPost');
             if ($request->isMethod('POST') && $form->handleRequest($request)->isvalid()) {
                
                $em = $this->getDoctrine()->getManager();
                // search if the number member is in bdd // recherche si le membre numéro est en bdd
                $member = $em-> getRepository(member::class)->findOneByLogin($_POST['bookbundle_member']['login']);
                
                if (isset($member)) {
                    $book->setMember($member);
                    // add the member to the entity book // ajouter le membre au livre d'entités
                    // make no available the book  // ne rend pas disponible le livre
                    $book->setStatus(0);
                    $this->getDoctrine()->getManager()->flush();
          
                    return $this->redirectToRoute('memberAction', array(
                    'id' => $member->getId()
                ));
                } 
            }
            $form = $form->createView();
                
                
                
            return $this->render('BookBundle:book:borrowBook.html.twig', compact('book', 'form'));
        }
         

        /**
         * to back the book
         * @Route(
        * path = "home/book/{id}/backborrow",
        * name="backBook",
        *
        * requirements={"id": "\d+"})
        */
        public function backBookAction($id, Request $request)
        {
        $em = $this->getDoctrine()->getManager()-> getRepository(book::class);
        $book = $em->find($id);
        // reset the member of the book  // réinitialise le membre du livre
        $book->setMember();
        // make the book available // rend le livre disponible
        $book->setStatus(1);
        $this->getDoctrine()->getManager()->flush();
        // message flash
        $request->getSession()->getFlashBag()->add('notice', 'Votre livre a bien été rendu.');
        return $this->redirectToRoute('allBook', array(
        'id' => $book->getId()
        ));
    }

        /**
         * delete the book
         * @Route(
        * path = "home/book/{id}/delete",
        * name="deleteBook",
        *
        * requirements={"id": "\d+"})
        */

    public function deleteAction($id)
    
      {
        $em = $this->getDoctrine()->getManager(); 
        $book = $em->getRepository('BookBundle:book')->find($id);
  
        if (null === $book) {
          throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        // On boucle sur les catégories de l'annonce pour les supprimer
        foreach ($book->getCategories() as $category) {
          $book->removeCategory($category);
        }
        $em->flush();
        return $this->render('BookBundle:book:index.html.twig');
      }
}