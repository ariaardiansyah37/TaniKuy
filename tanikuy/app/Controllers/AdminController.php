<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }

        // Mengirimkan data $hlm ke view
        return view('admin/dashboard', ['hlm' => $hlm]);
    }

    public function mpengguna()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/mpengguna', ['hlm' => $hlm]);
    }

    public function mproduk()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/mproduk', ['hlm' => $hlm]);
    }

    public function laporan()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/laporan', ['hlm' => $hlm]);
    }

    public function forum()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/forum', ['hlm' => $hlm]);
    }

    public function berita()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/berita', ['hlm' => $hlm]);
    }

    public function profile()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }
        return view('admin/profile', ['hlm' => $hlm]);
    }
}
