<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 20/11/19
 * Time: 16:30
 */

class CartController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = $this->model('Cart');
    }

    public function addProducts($product_id, $user_id)
    {
        $errors = [];

        if( ! $this->model->verifyProduct($product_id, $user_id))
        {
            if( ! $this->model->addProduct($product_id, $user_id))
            {
                array_push($errors, 'Error al insertar el producto en el carrito');
            }
        }
        //$this->index();
    }

}