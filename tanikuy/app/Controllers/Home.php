<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $products;

    function __construct()
    {
        $this->products = new ProductModel();
    }

    public function index(): string
    {
        $products = $this->products->findAll();
        $data['products'] = $products;

        return view('User/dashboard', $data);
    }

    public function beranda(): string
    {
        $products = $this->products->findAll();
        $data['products'] = $products;

        return view('User/dashboard', $data);
    }

    public function marketplace()
    {
        $products = $this->products->findAll();
        $data['products'] = $products;

        return view('User/marketplace', $data);
    }

    public function forum()
    {
        return view('User/forum');
    }

    public function berita()
    {
        return view('User/berita');
    }
}
