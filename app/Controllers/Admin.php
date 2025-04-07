<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController {

    public function index() {
        return view('admin/login');
    }

    public function loginAction() {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => base64_encode($this->request->getPost('password')),
        ];
        $model = new AdminModel();
        $result = $model->where($data)->first();
        if (isset($result["id"])) {
            $session = \config\services::session();
            $session->set("username", $result["username"]);
            $session->set("password", $result["password"]);
            return redirect()->to('dashboard');
        } else {
            // Login failed
            $session = session();
            $session->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('admin/login')->withInput();
        }
    }

    public function logout() {
        $session = \config\services::session();

        $session->remove('username');
        $session->remove('password');

        return redirect()->to('admin');
    }

}
// public function loginAction() {
//     $username = $this->request->getPost('username');
//     $password = md5($this->request->getPost('password')); // Hash input with MD5

//     $model = new AdminModel();
//     $user = $model->where(['username' => $username, 'password' => $password])->first();

//     if ($user) {
//         $session = session();
//         $session->set('username', $user['username']);
//         return redirect()->to('dashboard');
//     } else {
//         $session = session();
//         $session->setFlashdata('error', 'Invalid username or password');
//         return redirect()->to('admin/login')->withInput();
//     }
// }
