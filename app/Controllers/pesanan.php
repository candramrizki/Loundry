<?php


namespace App\Controllers;

use App\Models\PesananModel;

class Pesanan extends BaseController
{
    // Menyimpan pesanan dari user
   
// app/Controllers/Pesanan.php

public function buat()
{
    // HAPUS dd() agar tidak berhenti di sini
    $db = \Config\Database::connect();
    $id_plg = session()->get('user_id');

    $nama_lengkap = $this->request->getPost('nama_lengkap');
    $alamat       = $this->request->getPost('alamat');
    $kontak       = $this->request->getPost('kontak');

    // Simpan/update pelanggan
    $pelanggan = $db->table('pelanggan')->where('id_plg', $id_plg)->get()->getRow();
    if ($pelanggan) {
        $db->table('pelanggan')->where('id_plg', $id_plg)->update([
            'nama_plg' => $nama_lengkap,
            'alamat'   => $alamat,
            'kontak'   => $kontak,
        ]);
    } else {
        $db->table('pelanggan')->insert([
            'id_plg'    => $id_plg,
            'nama_plg'  => $nama_lengkap,
            'alamat'    => $alamat,
            'kontak'    => $kontak,
        ]);
    }

    // Simpan pesanan
    $layanan_id = $this->request->getPost('layanan');
    $berat      = (float) $this->request->getPost('berat');

    if (!$layanan_id || $berat <= 0) {
        return redirect()->back()->with('error', 'Layanan dan berat harus diisi.');
    }

    $layanan      = $db->table('layanan')->where('id', $layanan_id)->get()->getRow();
    $harga_per_kg = $layanan ? $layanan->harga_per_kg : 0;
    $total_harga  = $berat * $harga_per_kg;

    $pesananModel = new \App\Models\PesananModel();
    $pesananModel->insert([
        'user_id'      => $id_plg,
        'layanan'      => $layanan_id,
        'berat'        => $berat,
        'total_harga'  => $total_harga,
        'waktu'        => $this->request->getPost('waktu'),
        'metode_bayar' => $this->request->getPost('metode_pembayaran'),
        'catatan'      => $this->request->getPost('catatan'),
        'status'       => 'Menunggu',
    ]);

    session()->setFlashdata('pesan_sukses', 'Pesanan berhasil dibuat!');

    // REDIRECT ke dashboard pelanggan lama
    return redirect()->to('/pelanggan/dashboard_plg');
}


    // Menampilkan daftar pesanan untuk admin
    public function index()
    {
        $db = \Config\Database::connect();

        $pesanan = $db->table('pesanan')
            ->select('pesanan.*, users.nama')
            ->join('users', 'users.id = pesanan.user_id')
            ->get()
            ->getResultArray();

        $semua_layanan = $db->table('layanan')->get()->getResultArray();

        $data['pesanan'] = $pesanan;
        $data['semua_layanan'] = $semua_layanan;
        return view('admin/pesanan', $data);
    }

    // Menampilkan dashboard pelanggan dengan data layanan dan data pelanggan
    public function dashboard_plg()
    {
        $db = \Config\Database::connect();
        $layanan = $db->table('layanan')->get()->getResultArray();

        $id_plg = session()->get('user_id');
        $pelanggan = $db->table('pelanggan')->where('id_plg', $id_plg)->get()->getRow();

        return view('pelanggan/dashboard_plg', [
            'layanan' => $layanan,
            'pelanggan' => $pelanggan, // bisa dipakai untuk menampilkan nama/alamat/kontak di dashboard
        ]);
    }
    
}