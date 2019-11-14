<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 7/11/19
 * Time: 16:02
 */

class AdminProductController extends Controller
{

    private $model;
    function __construct()
    {
        $this->model = $this->model('AdminProduct');
    }

    public function index()
    {
        $session = new Session();

        if($session->getLogin())
        {
            $products = $this->model->getProducts();
            $type = $this->model->getConfig('productType');

            $data = [
                'title' => 'Administracion de productos',
                'menu' => false,
                'admin' => true,
                'data' => $products,
                'type' => $type
            ];
            $this->view('admin/products/index', $data);
        }
        else
        {
            header('location:' .ROOT. 'admin');
        }
    }

    public function create()
    {
        $errors = [];
        $dataForm = [];
        $type = $this->model->getConfig('productType');
        $status = $this->model->getConfig('productStatus');
        $catalogue = $this->model->getCatalogue();

        if($_POST)
        {
            $type2 = $_POST['type'] ?? '';
            $name = Validate::text($_POST['name'] ?? '');
            $description = Validate::text($_POST['description'] ?? '');
            $price = Validate::number($_POST['price'] ?? '');
            $discount = Validate::number($_POST['discount'] ?? '');
            $send = Validate::number($_POST['send'] ?? '');
            $image = Validate::file($_FILES['image']['name']);
            $published = $_POST['published'] ?? '';
            $relation1 = $_POST['relation1'] ?? 0;
            $relation2 = $_POST['relation2'] ?? 0;
            $relation3 = $_POST['relation3'] ?? 0;
            $status2 = $_POST['status'] ?? '';
            $mostSold = isset($_POST['mostSold']) ? '1' : '0';
            $new = isset($_POST['new']) ? '1' : '0';

            //book
            $author = Validate::text($_POST['author'] ?? '');
            $publisher = Validate::text($_POST['publisher'] ?? '');
            $pages = Validate::number($_POST['pages'] ?? '');

            //course
            $people = Validate::text($_POST['people'] ?? '');
            $objetives = Validate::text($_POST['objetives'] ?? '');
            $necesites = Validate::text($_POST['necesites'] ?? '');

            if(empty($name))
            {
                array_push($errors, "El nombre del producto no puede estar vacio");
            }
            if(empty($description))
            {
                array_push($errors, "La descripcion del producto no puede estar vacia");
            }
            if(! is_numeric($price))
            {
                array_push($errors, 'El precio del producto debe de ser un numero');
            }
            if(! is_numeric($discount))
            {
                array_push($errors, 'El descuento del producto debe de ser un numero');
            }
            if(! is_numeric($send))
            {
                array_push($errors, 'Los gastos de envio del producto debe de ser un numero');
            }
            if(is_numeric($price) && is_numeric($discount) && $price < $discount)
            {
                array_push($errors, 'El descuento no puede ser mayor que el precio');
            }
            if( ! Validate::date($published))
            {
                array_push($errors, 'La fecha o su formato no es correcto');
            }
            elseif(Validate::dateDiff($published))
            {
                array_push($errors, 'La fecha de publicacion no puede ser posterior a hoy');
            }
            if($type2 == 1)
            {
                if(empty($people))
                {
                    array_push($errors, "El publico objetivo del curso no puede estar vacio");
                }
                if(empty($objetives))
                {
                    array_push($errors, "Los objetivos del curso del curso no pueden estar vacios");
                }
                if(empty($necesites))
                {
                    array_push($errors, "Los requisitos del curso no pueden estar vacios");
                }
            }
            elseif($type2 == 2)
            {
                if(empty($author))
                {
                    array_push($errors, "El autor del libro no puede estar vacio");
                }
                if(empty($publisher))
                {
                    array_push($errors, "La editorial del libro no puede estar vacia");
                }
                if(! is_numeric($pages))
                {
                    $pages = 0;
                    array_push($errors, 'La cantidad de paginas de un libro debe de ser un numero');
                }
            }
            else
            {
                array_push($errors, 'Debe seleccionar un tipo valido');
            }

            if($image)
            {
                if(Validate::imageFile($_FILES['image']['tmp_name']))
                {
                    $image = strtolower($image);

                    if(is_uploaded_file($_FILES['image']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$image);
                        Validate::resizeImage($image, 240);
                    }
                    else
                    {
                        array_push($errors, 'Error al subir el fichero de imagen');
                    }
                }
                else
                {
                    array_push($errors, 'El formato de la imagen no es aceptado');
                }
            }
            else
            {
                array_push($errors, 'No he recibido la imagen');
            }

            $dataForm = [
                'type' => $type2,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'discount' => $discount,
                'send' => $send,
                'image' => $image,
                'published' => $published,
                'relation1' => $relation1,
                'relation2' => $relation2,
                'relation3' => $relation3,
                'status' => $status2,
                'mostSold' => $mostSold,
                'new' => $new,
                'author' => $author,
                'publisher' => $publisher,
                'pages' => $pages,
                'people' => $people,
                'objetives' => $objetives,
                'necesites' => $necesites
            ];

            if(empty($errors))
            {
                if($this->model->createProduct($dataForm))
                {
                 header('location:' .ROOT. 'AdminProduct');
                }
                array_push($errors, 'Se ha producido algún problema durante la inserción del registro en la base de datos');
            }
        }

        $data = [
            'title' => 'Administracion de productos | alta',
            'menu' => false,
            'admin' => true,
            'type' => $type,
            'status' => $status,
            'catalogue' => $catalogue,
            'errors' => $errors,
            'product' => $dataForm
        ];

        $this->view('admin/products/create', $data);
    }

    public function update($id)
    {
        $errors = [];
        $type = $this->model->getConfig('productType');
        $status = $this->model->getConfig('productStatus');
        $catalogue = $this->model->getCatalogue();

        if($_POST)
        {
            $type2 = $_POST['type'] ?? '';
            $name = Validate::text($_POST['name'] ?? '');
            $description = Validate::text($_POST['description'] ?? '');
            $price = Validate::number($_POST['price'] ?? '');
            $discount = Validate::number($_POST['discount'] ?? '');
            $send = Validate::number($_POST['send'] ?? '');
            $image = Validate::file($_FILES['image']['name']);
            $published = $_POST['published'] ?? '';
            $relation1 = $_POST['relation1'] ?? 0;
            $relation2 = $_POST['relation2'] ?? 0;
            $relation3 = $_POST['relation3'] ?? 0;
            $status2 = $_POST['status'] ?? '';
            $mostSold = isset($_POST['mostSold']) ? '1' : '0';
            $new = isset($_POST['new']) ? '1' : '0';

            //book
            $author = Validate::text($_POST['author'] ?? '');
            $publisher = Validate::text($_POST['publisher'] ?? '');
            $pages = Validate::number($_POST['pages'] ?? '');

            //course
            $people = Validate::text($_POST['people'] ?? '');
            $objetives = Validate::text($_POST['objetives'] ?? '');
            $necesites = Validate::text($_POST['necesites'] ?? '');

            if(empty($name))
            {
                array_push($errors, "El nombre del producto no puede estar vacio");
            }
            if(empty($description))
            {
                array_push($errors, "La descripcion del producto no puede estar vacia");
            }
            if(! is_numeric($price))
            {
                array_push($errors, 'El precio del producto debe de ser un numero');
            }
            if(! is_numeric($discount))
            {
                array_push($errors, 'El descuento del producto debe de ser un numero');
            }
            if(! is_numeric($send))
            {
                array_push($errors, 'Los gastos de envio del producto debe de ser un numero');
            }
            if(is_numeric($price) && is_numeric($discount) && $price < $discount)
            {
                array_push($errors, 'El descuento no puede ser mayor que el precio');
            }
            if( ! Validate::date($published))
            {
                array_push($errors, 'La fecha o su formato no es correcto');
            }
            elseif(Validate::dateDiff($published))
            {
                array_push($errors, 'La fecha de publicacion no puede ser posterior a hoy');
            }
            if($type2 == 1)
            {
                if(empty($people))
                {
                    array_push($errors, "El publico objetivo del curso no puede estar vacio");
                }
                if(empty($objetives))
                {
                    array_push($errors, "Los objetivos del curso del curso no pueden estar vacios");
                }
                if(empty($necesites))
                {
                    array_push($errors, "Los requisitos del curso no pueden estar vacios");
                }
            }
            elseif($type2 == 2)
            {
                if(empty($author))
                {
                    array_push($errors, "El autor del libro no puede estar vacio");
                }
                if(empty($publisher))
                {
                    array_push($errors, "La editorial del libro no puede estar vacia");
                }
                if(! is_numeric($pages))
                {
                    $pages = 0;
                    array_push($errors, 'La cantidad de paginas de un libro debe de ser un numero');
                }
            }
            else
            {
                array_push($errors, 'Debe seleccionar un tipo valido');
            }

            if($image)
            {
                if(Validate::imageFile($_FILES['image']['tmp_name']))
                {
                    $image = strtolower($image);

                    if(is_uploaded_file($_FILES['image']['tmp_name']))
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$image);
                        Validate::resizeImage($image, 240);
                    }
                    else
                    {
                        array_push($errors, 'Error al subir el fichero de imagen');
                    }
                }
                else
                {
                    array_push($errors, 'El formato de la imagen no es aceptado');
                }
            }

            $dataForm = [
                'id' => $id,
                'type' => $type2,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'discount' => $discount,
                'send' => $send,
                'image' => $image,
                'published' => $published,
                'relation1' => $relation1,
                'relation2' => $relation2,
                'relation3' => $relation3,
                'status' => $status2,
                'mostSold' => $mostSold,
                'new' => $new,
                'author' => $author,
                'publisher' => $publisher,
                'pages' => $pages,
                'people' => $people,
                'objetives' => $objetives,
                'necesites' => $necesites
            ];

            if(empty($errors))
            {
                if($this->model->updateProduct($dataForm))
                {
                    header('location:' .ROOT. 'AdminProduct');
                }
                array_push($errors, 'Se ha producido algún problema durante la actualizacion del registro en la base de datos');
            }
        }

        $product = $this->model->getProductById($id);

        $data = [
            'title' => 'Administracion de productos | alta',
            'menu' => false,
            'admin' => true,
            'type' => $type,
            'status' => $status,
            'catalogue' => $catalogue,
            'errors' => $errors,
            'product' => $product
        ];

        $this->view('admin/products/update', $data);
    }

    public function delete($id)
    {
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $errors = $this->model->delete($id);

            if(empty($errors))
            {
                header('location:' . ROOT . 'adminProduct');
            }
        }

        $product = $this->model->getProductById($id);
        $typeConfig = $this->model->getConfig('ProductType');

        $data = [
            'title' => 'Administracion de productos | Eliminar',
            'menu' => false,
            'admin' => true,
            'product' => $product,
            'type' => $typeConfig,
            'errors' => $errors
        ];

        $this->view('admin/products/delete', $data);
    }

}