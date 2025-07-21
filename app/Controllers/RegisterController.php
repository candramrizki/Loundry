<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    
public function submit()
{
    // Mendapatkan data dari form
    $nama = $this->request->getPost('nama');
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $confirm_password = $this->request->getPost('password_confirm');
    $role = $this->request->getPost('role');
    

    // Validasi nama dan 
// Tambahkan debug
if (empty($nama)) {
    session()->setFlashdata('msg', 'Field nama kosong!');
    return redirect()->to('/register');
}
// ...


    // Validasi jika password dan konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        session()->setFlashdata('msg', 'Password dan konfirmasi password tidak cocok.');
        return redirect()->to('/register');
    }

    // Hash password sebelum disimpan
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Menyiapkan data untuk disimpan
    $model = new UserModel();
    $data = [
        'nama'     => $nama,
        'username' => $username,
        'email'    => $email,
        'password' => $passwordHash,
        'role'     => $role
    ];

    // Menyimpan data ke database
    if ($model->insert($data)) {
        session()->setFlashdata('msg', 'Registrasi berhasil, silakan login.');
        return redirect()->to('/login');
    } else {
        session()->setFlashdata('msg', 'Terjadi kesalahan saat registrasi.');
        return redirect()->to('/register');
    }
}
public function register()
{
    if ($this->request->getMethod() === 'post') {
        $nama   = $this->request->getPost('nama');
        $kontak = $this->request->getPost('kontak');
        $alamat = $this->request->getPost('alamat');
        // ...proses validasi dan simpan user ke tabel user...

        // Simpan ke tabel pelanggan
        $pelangganModel = new \App\Models\PelangganModel();
        $pelangganModel->insert([
            'id_plg'    => uniqid('PLG'), // atau generate sesuai kebutuhan
            'nama_plg'  => $nama,
            'kontak'    => $kontak,
            'alamat'    => $alamat
        ]);

        // ...redirect atau proses selanjutnya...
    }

    return view('auth/register');
}
}