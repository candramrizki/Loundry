<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();  // Menggunakan UserModel
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],  // Menambahkan role
                    'logged_in' => TRUE
                ];
                $session->set([
    'user_id' => $user->id,
    'username' => $user->nama, // atau 'nama' sesuai field di tabel users
    // ...
]);
                $session->set($ses_data);

                // Redirect ke dashboard berdasarkan role
                if ($data['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/user/dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
