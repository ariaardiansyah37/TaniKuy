<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\SellerModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function loginadmin()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // Validasi user
            $AdminModel = new AdminModel();
            $user = $AdminModel->where('username', $username)->first();

            if ($user && $user['role'] == 'admin') {
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLogined' => true,
                    ]);

                    return redirect()->to(base_url('/admin/dashboard'));
                } else {
                    session()->setFlashdata('failed', 'Username dan Password Admin Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username Admin Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            return view('auth/v_login');
        }
    }

    public function logoutadmin()
    {
        // Hancurkan sesi
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/admin/login');
    }

    public function loginuser()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $UserModel = new UserModel();
            //validasi
            $user = $UserModel->where('username', $username)->first();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'username' => $user['username'],
                        'isLoggedIn' => true,
                    ]);

                    return redirect()->to(base_url('user/dashboard'));
                } else {
                    session()->setFlashdata('failed', 'Password salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username tidak ditemukan');
                return redirect()->back();
            }
        }
        return view('auth/login_user');
    }

    public function registeruser()
    {
        return view('auth/register_user');
    }

    public function logoutuser()
    {
        // Hancurkan sesi
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('beranda');
    }

    public function loginseller()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $SellerModel = new SellerModel();
            $user = $SellerModel->where('username', $username)->first();

            if ($user && $user['role'] == 'seller') {
                if (password_verify($password, $user['password'])) {
                    session()->set([
                        'seller_id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLoggedIn' => true
                    ]);

                    return redirect()->to(base_url('/seller/dashboard'));
                } else {
                    session()->setFlashdata('failed', 'Password Seller Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username Seller Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            return view('auth/login_seller');
        }
    }
    public function logoutseller()
    {
        session()->destroy();

        return redirect()->to('seller/login');
    }
}
