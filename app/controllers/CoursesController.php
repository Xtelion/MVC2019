<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 14/11/19
 * Time: 19:05
 */

class CoursesController extends Controller
{

    private $mode;

    function __construct()
    {
        $this->model = $this->model('Course');
    }

    public function index()
    {
        $session = new Session();
        if($session->getLogin())
        {
            $courses = $this->model->getCourses();

            $data = [
                'title' => 'Cursos en linea',
                'subtitle' => "Cursos",
                'menu' => true,
                'admin' => false,
                'courses' => $courses,
                'active' => 'courses'
            ];

            $this->view('courses/index', $data);
        }
        else
        {
            header('location:' .ROOT);
        }
    }

}