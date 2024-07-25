<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SellerController extends BaseController
{
    public function index()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('seller/dashboard', ['hlm' => $hlm]);
    }


    public function laporan()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }

        return view('seller/laporan', ['hlm' => $hlm]);
    }

    public function profile()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('seller/profile', ['hlm' => $hlm]);
    }
}
