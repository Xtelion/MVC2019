<?php

/**
 * Controlador Shop para la tienda
 */
class ShopController extends Controller
{
	private $model;
	
	function __construct()
	{
		$this->model = $this->model('Shop');
	}

	public function index()
	{
		$session = new Session();

		if ($session->getLogin()) {
		    $mostSold = $this->model->getMostSold();
		    $news = $this->model->getNews();

			$data = [
				'title'	=> 'Bienvenid@ a nuestra tienda',
				'menu'	=> true,
                'subtitle' => 'Top ventas',
                'subtitle2' => 'Los mas nuevos',
                'data' => $mostSold,
                'news' => $news
			];
			
			$this->view('shop/index', $data);
		} else {
			header('location:' . ROOT);
		}
	}

	public function logout()
    {
        $session = new Session();
        $session->logout();
        header('location:' . ROOT);
    }

    public function show($id, $back = 'shop')
    {
        $session = new Session();
        $product = $this->model->getProductById($id);
        $user = $session->getUserId();

        $data = [
            'title' => 'Detalle del producto',
            'subtitle' => $product->name,
            'menu' => true,
            'admin' => false,
            'data' => $product,
            'user' => $user,
            'back' => $back
        ];

        $this->view('shop/show', $data);
    }

    public function whoami()
    {
        $session = new Session();

        if($session->getLogin())
        {
            $data = [
              'title' => 'Quienes somos',
              'menu' => true,
              'active' => 'whoami'
            ];

            $this->view('shop/whoami', $data);
        }
        else
        {
            header('location:' . ROOT);
        }
    }

    public function contact()
    {
        $errors = [];
        if($_POST)
        {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if($name == '')
            {
                array_push($errors, 'El nombre es obligatorio');
            }
            if($email == '')
            {
                array_push($errors, 'El email es obligatorio');
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                array_push($errors, 'El email no es un email valido');
            }
            if($message == '')
            {
                array_push($errors, 'No tiene sentido mandar un correo sin ningun mensaje');
            }

            if(count($errors) == 0)
            {
                if($this->model->sendEmail($name, $email, $message))
                {
                    $data = [
                        'title'	=> 'Mensaje del usuario',
                        'menu'	=> true,
                        'subtitle' => 'Gracias por su mensaje',
                        'text' => 'En breve recibira noticias nuestras',
                        'color'	=> 'success',
                        'url'	=> 'shop',
                        'colorButton' => 'success',
                        'textButton'  => 'Volver'
                    ];
                    $this->view('mensaje', $data);
                }
                else
                {
                    $data = [
                        'title'	=> 'Error en el envio del mensaje',
                        'menu'	=> true,
                        'subtitle' => 'Algo funcionó mal',
                        'text' => 'Lo sentimos, pero ha habido algun problema, pruebe a mandar el correo mas tarde',
                        'color'	=> 'info',
                        'url'	=> 'shop',
                        'colorButton' => 'info',
                        'textButton'  => 'Volver'
                    ];
                    $this->view('mensaje', $data);
                }
            }
            else
            {
                $data = [
                    'title' => 'Contacta con nosotros',
                    'menu' => true,
                    'active' => 'contact',
                    'errors' => $errors
                ];

                $this->view('shop/contact', $data);
            }

        }
        else
        {
            $session = new Session();

            if($session->getLogin())
            {
                $data = [
                    'title' => 'Contacta con nosotros',
                    'menu' => true,
                    'active' => 'contact'
                ];

                $this->view('shop/contact', $data);
            }
            else
            {
                header('location:' . ROOT);
            }
        }
    }
}