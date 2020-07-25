<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Book;
use App\Entity\Category;

class HomeController extends AbstractController
{

    /**
     * Created At : 21-7-2020
     * Created By : Nilaksha
     * Summary : Loads the home page in the system
     *
     * @Route("/" , name="/", methods={"GET"})
     * @Route("/category/{cat}" , name="/category", methods={"GET"})
     */
    public function index($cat = null)
    {
        return $this->getView($cat);
    }

    /**
     * Created At : 21-7-2020
     * Created By : Nilaksha
     * Summary : Returns the home view with parameters
     */
    public function getView($cat){
        $books = $this->returnBooks($cat);
        $categories = $this->returnCategories();
        return $this->render('site/home.html.twig', [
            'books' => $books,
            'categories' => $categories,
            'selected' => $cat
        ]);
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * 
     * Summary : Returns the books array based on the parameters given
     * @param [type] $category
     */
    public function returnBooks($cat = null){
        $cat = ($cat)? ['category_id' => $cat] : [];
        return $this->getDoctrine()
        ->getRepository(Book::class)
        ->findBy($cat);
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * 
     * Summary : Returns all the categories
     */
    public function returnCategories(){
        return $this->getDoctrine()
        ->getRepository(Category::class)
        ->findAll();
    }

}