<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductModel;

use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $products;

    function __construct()
    {
        $this->products = new ProductModel();
    }
    public function index()
    {
        $products = $this->products->findAll();
        $data['products'] = $products;

        return view('Userlogin/dashboardlogin', $data);
    }

    public function dashboard()
    {
        return view('Userlogin/dashboardlogin');
    }
}
