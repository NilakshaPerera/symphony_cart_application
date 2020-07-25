<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use App\Entity\Book;
use App\Entity\Category;

class BookController extends AbstractController
{

    /**
     * Created At : 22-7-2020
     * Created By : Nilaksha
     * Summary : Loads the books page in the system
     *
     * @Route("/books/show" , name="/books/show", methods={"GET"})
     *  
     */
    public function index()
    {

        $categories = $this->getDoctrine()
        ->getRepository(Category::class)
        ->findAll();

        return $this->render('site/books.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * Created At : 22-7-2020
     * Created By : Nilaksha
     * Summary : Used to add books in the book datatable
     *          category_id	name  author	isbn	price	image
     * 
     * @Route("/book/create" , name="/book/create", methods={"POST"})
     * 
     */
    public function create(Request $request, SluggerInterface $slugger){

        $submittedToken = $request->request->get('token');
        if ($this->isCsrfTokenValid('add-book', $submittedToken)) {

            $category = $this->getDoctrine()->getRepository(Category::class)->find($request->request->get('category'));

            if (!$category) {
                return new JsonResponse(['success' => false , "errors" => ["Undefined Category"]]);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $newFilename = '';
           
            $bookImage = $request->files->get('image-upload-logo');
           
            if ($bookImage) {
                $originalFilename = pathinfo($bookImage->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$bookImage->guessExtension();

                try {
                    $bookImage->move( $this->getParameter('books_directory'), $newFilename );
                } catch (FileException $e) {
                    return new JsonResponse(['success' => false , "message" => "We have issues uploading the file : " . $e->getMessage()]);
                }
            }else{
                return new JsonResponse(['success' => false , "errors" => ["You must select an image file"]]);
            }

            $book = new Book();

            $book->setCategory($category);
            $book->setName($request->request->get('name'));
            $book->setAuthor($request->request->get('author'));
            $book->setIsbn($request->request->get('isbn'));
            $book->setPrice($request->request->get('price'));
            $book->setImage("/uploads/books/" . $newFilename);
            $book->setCreatedAt(new \DateTime('@'.strtotime('now')));
            $book->setUpdatedAt(new \DateTime('@'.strtotime('now')));
        
            $entityManager->persist($book);
            $entityManager->flush();

            return new JsonResponse(['success' => true]);

        }else{
            return new JsonResponse(['success' => false , "errors" => ["Invalid Request"]]);
        }
    }

    
}
