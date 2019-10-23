<?php

/**
* 
*/
class LoginController extends Controller
{
	private $model;

	public function __construct()
	{
		$this->model = $this->model('Login');
	}

	public function index()
	{
		$data = [
			'title' => 'Login',
            'menu' => false
		];
		$this->view('login', $data);
	}

	public function olvido()
    {
        print 'Me se ha olvidao la contraseña';
    }

    public function registro()
    {
        $errors = [];
        if( !$_POST )
        {
            $data = [
                'title' => 'Registro',
                'menu' => false
            ];
            $this->view('register', $data);
        }
        else
        {
            $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
            $last_name_1 = isset($_POST['last_name_1']) ? $_POST['last_name_1'] : '';
            $last_name_2 = isset($_POST['last_name_2']) ? $_POST['last_name_2'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
            $state = isset($_POST['state']) ? $_POST['state'] : '';
            $postCode = isset($_POST['postCode']) ? $_POST['postCode'] : '';
            $country = isset($_POST['country']) ? $_POST['country'] : '';
            $city = isset($_POST['city']) ? $_POST['city'] : '';

            if($first_name == '')
            {
                array_push($errors, 'El nombre no puede estar vacio');
            }
            if($last_name_1 == '')
            {
                array_push($errors, 'El apellido no puede estar vacio');
            }
            if($email == '')
            {
                array_push($errors, 'El email no puede estar vacio');
            }
            if($password1 == '')
            {
                array_push($errors, 'La contraseña no puede estar vacio');
            }
            if($password2 != $password1)
            {
                array_push($errors, 'Las contraseñas deben ser iguales');
            }
            if($address == '')
            {
                array_push($errors, 'La direccion no puede estar vacia');
            }
            if($city == '')
            {
                array_push($errors, 'La ciudad no puede estar vacia');
            }
            if($state == '')
            {
                array_push($errors, 'La provincia no puede estar vacia');
            }
            if($country == '')
            {
                array_push($errors, 'El pais no puede estar vacia');
            }
            if($postCode == '')
            {
                array_push($errors, 'El codigo postal no puede estar vacia');
            }
        }

    }
}