<?php

/**
 * Clase para la Administración
 */
class AdminController extends Controller
{
	private $model;
	
	public function __construct()
	{
		$this->model = $this->model('Admin');
	}

	public function index()
	{
		$data = [
			'title'	=> 'Adminstración',
			'subtitle' => 'Módulo de Administración',
			'menu'	=> false
		];

		$this->view('admin/index', $data);
	}

	public function verifyUser()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = isset($_POST['user']) ? $_POST['user'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $dataForm = [
                'email' => $email,
                'password' => $password
            ];

            if (empty($email)) {
                array_push($errors, 'El correo del usuario es obligatorio');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, 'El correo electrónico no es válido');
            }
            if (empty($password)) {
                array_push($errors, 'La contraseña es obligatoria');
            }

            if (count($errors) == 0)
            {

                $errors = $this->model->verifyUser($dataForm);

                if (!$errors)
                {
                    $session = new Session();

                    $session->login($dataForm);
                    header('location:' .ROOT. 'AdminShop');
                }
            }
        }
        $data = [
            'title'	=> 'Adminstración',
            'subtitle' => 'Módulo de Administración',
            'menu'	=> false,
            'errors' => $errors
        ];

        $this->view('admin/index', $data);
    }
}









