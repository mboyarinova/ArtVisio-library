<?php
namespace App\Controller;

use App\Entity\Book;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
      $form = $this->createFormBuilder($book)
        ->add('title', TextType::class, array(
          'label' => 'Название',
          'attr' => array('class' => 'form-control')))
        ->add('Author', TextType::class, array(
          'label' => 'Автор',
          'attr' => array('class' => 'form-control')))
        ->add('Year',  TextType::class, array(
          'label' => 'Год',
          'attr' => array('class' => 'form-control')))
        ->add('save', SubmitType::class, array(
          'label' => 'Сохранить',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

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

      $form = $this->createFormBuilder($book)
        ->add('title', TextType::class, array(
          'label' => 'Название',
          'attr' => array('class' => 'form-control')))
        ->add('Author', TextType::class, array(
          'label' => 'Автор',
          'attr' => array('class' => 'form-control')))
        ->add('Year',  TextType::class, array(
          'label' => 'Год',
          'attr' => array('class' => 'form-control')))
        ->add('save', SubmitType::class, array(
          'label' => 'Сохранить',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

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
