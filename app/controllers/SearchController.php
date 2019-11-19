<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 19/11/19
 * Time: 16:38
 */

class SearchController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = $this->model('Search');
    }

    public function products($url = '')
    {
        $search = $_POST['search'] ?? '';
        if($url == 'courses')
        {
            $url = 1;
        }
        elseif($url == 'books')
        {
            $url = 2;
        }
        else
        {
            $url = 0;
        }

        $data = [
          'search' => $search,
          'url' => $url
        ];

        if($search != '')
        {
            $dataSearch = $this->model->getProducts($data);

            if(count($dataSearch) > 0)
            {
                $data = [
                    'title' => 'Resultados de la busqueda',
                    'menu' => true,
                    'search' => $dataSearch
                ];
                $this->view('search/index', $data);
            }
            else
            {
                $data = [
                    'title'	=> 'No hay productos',
                    'menu'	=> true,
                    'subtitle' => 'Consulta vacia',
                    'text' => 'No hay productos con ese patron de busqueda',
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
            header('location:' .ROOT);
        }
    }

}