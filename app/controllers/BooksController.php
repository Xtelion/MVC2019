<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 19/11/19
 * Time: 15:30
 */

class BooksController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = $this->model('Book');
    }

    public function index()
    {
        $session = new Session();
        if($session->getLogin())
        {
            $books = $this->model->getBooks();

            $data = [
                'title' => 'Libros en linea',
                'subtitle' => "Libros",
                'menu' => true,
                'admin' => false,
                'books' => $books,
                'active' => 'books'
            ];

            $this->view('books/index', $data);
        }
        else
        {
            header('location:' .ROOT);
        }
    }

}