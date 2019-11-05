<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 5/11/19
 * Time: 15:47
 */

class AdminShopController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = $this->model('AdminShop');
    }

    public function index()
    {
        $data = [
            'title' => 'Administración | Inicio',
            'menu' => false,
            'admin' => true,
            'subtitle' => 'Administracion de la tienda'
        ];

        $this->view('admin/shop/index', $data);
    }

}