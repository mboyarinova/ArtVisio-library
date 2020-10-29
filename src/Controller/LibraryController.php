<?php
namespace App\Controller;

use App\Entity\Book;
use App\Form\Type\BookType;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryController extends AbstractController {
    /**
     * @Route("/", name="book_list")
     */
    public function index(): Response {

      $books = $this->getDoctrine()->getRepository(Book::class)->findAll();

      return $this->render('library/index.html.twig', array('books' => $books));
    }

    /**
     * @Route("/book/new", name="add_book")
     * Method({"GET", "POST"})
     */
    public function addBook(Request $request): Response {

      $book = new Book();

      $form = $this->createForm(BookType::class, $book);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $book = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($book);
        $entityManager->flush();
        return $this->redirectToRoute('book_list');
      }

      return $this->render('library/add.html.twig',
                            array('form' => $form->createView()));
    }

    /**
     * @Route("/book/edit/{id}", name="edit_book")
     * Method({"GET", "POST"})
     */
    public function editBook(Request $request, int $id): Response {

      $book = $this->getDoctrine()->getRepository(Book::class)->find($id);

      $form = $this->createForm(BookType::class, $book);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return $this->redirectToRoute('book_list');
      }

      return $this->render('library/edit.html.twig',
                            array('form' => $form->createView(),
                                  'book' => $book->getTitle()));
    }

}


?>
