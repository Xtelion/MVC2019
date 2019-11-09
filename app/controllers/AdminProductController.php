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
            $type = $_POST['type'] ?? '';
            //insercion
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

    }

    public function delete($id)
    {

    }

}