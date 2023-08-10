<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function login()
    {
        $data = [
            'judul' => 'Login'
        ];
        return view('auth/v_login', $data);
    }

    public function cek_login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $cek = $this->ModelAuth->login($email, $password);
        if ($cek) {
            session()->set('log', true);
            session()->set('nama_user', $cek['nama_user']);
            session()->set('email', $cek['email']);
            session()->set('level', $cek['level']);

            return redirect()->to(base_url('/home'));
        } else {
            session()->setFlashdata('pesan', 'Login Gagal !! Email atau password salah.');
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');

        return redirect()->to(base_url('auth/login'));
    }

    public function register()
    {
        $data = [
            'judul' => 'Register'
        ];
        return view('auth/v_register', $data);
    }

    public function save_register()
    {
        $data = array(
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'password' => $this->request->getPost('password'),
            'level' => 3
        );

        $this->ModelAuth->save_register($data);
        session()->setFlashdata('pesan', 'Register Berhasil !!');
        return redirect()->to(base_url('auth/register'));
    }
}
