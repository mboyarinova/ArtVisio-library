<?php
namespace App\Controller;

use App\Entity\Book;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryController extends AbstractController {
    /**
     * @Route("/", name="book_list")
     */
    public function index() {

      $books = $this->getDoctrine()->getRepository(Book::class)->findAll();

      return $this->render('library/index.html.twig', array('books' => $books));
    }

    /**
     * @Route("/book/new", name="add_book")
     */
    public function addBook() {
      return $this->render('library/add.html.twig');
    }

    /**
     * @Route("/book/{id}", name="edit_book")
     */
    public function editBook($id) {
      return $this->render('library/edit.html.twig');
    }


    // /**
    //  * @Route("/book/save")
    //  */
    //  public function save() {
    //    $entityManager = $this->getDoctrine()->getManager();
    //
    //    $book = new Book();
    //    $book->setTitle("Book 2");
    //    $book->setAuthor("Author 2");
    //    $book->setYear(2000);
    //
    //    $entityManager->persist($book);
    //    $entityManager->flush();
    //
    //    return new Response(
    //      'saved the book with the id of '.$book->getId()
    //    );
    //  }
}


?>
