<?php

namespace Modules\Auth\Controllers;

use Modules\Todo\Main\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        array_push($this->helpers, 'form');
    }

    public function index()
    {
        return view('Modules\Auth\Views\login');
    }

    /*
    // teste para encriptar a senha...
    public function encriptar($str)
    {
        return password_hash($str, PASSWORD_DEFAULT);
    }
    */


    public function login()
    {
        if ($_POST) {

            $authModel = model('Modules\Auth\Models\AuthModel', false);

            $post = $this->request->getPost();

            $auth = $authModel->chkLogin([
                'email' => $post['email'],
                'password' => $post['password'],
            ]);

            if ($auth != false && $auth->id > 0) {
                // O login foi efetuado com sucesso.
                session()->set([
                    'isLoggedIn' => true,
                    'ip_login' => \Config\Services::request()->getIPAddress(),
                    'key' => PRIVATE_KEY, // Constants
                    'userData' => [
                        'name' => (string) $auth->name,
                        'id' => (int) $auth->id,
                        'email' => $auth->email,
                        'isAdmin' => false
                    ]
                ]);

                return redirect()->to(base_url('todo/dashboard'));
            } else {
                // em caso de erro.
                session()->setFlashdata('message', ['class' => 'danger', 'text' => 'Ocorreu um erro, verifique seus dados!']);
                //  return view('Modules\Auth\Views\login');
                return redirect()->to(base_url('auth'));
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('auth'));
    }
}
