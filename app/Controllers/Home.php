<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function pesanan(): string
    {
        return view('pesanan');
    }
    public function paket(): string
    {
        return view('paket');
    }
    public function login(): string
    {
        return view('auth/login');
    }
    public function dasboard(): string
    {
        return view('admin');
    }
    public function pelanggan(): string 
    {
        return view('pelanggan');
    }
    public function tambah_plg(): string 
    {
        return view('tambah_plg');
    }
    public function update_plg(): string 
    {
        return view('update_plg');
    
    }
    public function shop(): string
    {
        return view('shop');
    }
}
