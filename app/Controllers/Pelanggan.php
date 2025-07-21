<?php

namespace App\Controllers;

use App\Models\PesananModel;
use CodeIgniter\Controller;

class Pelanggan extends BaseController
{
  

public function dashboard_plg()
{
    $id_plg = session()->get('user_id');
    $db = \Config\Database::connect();

    // Ambil data layanan
    $layanan = $db->table('layanan')->get()->getResultArray();

    // Ambil data pesanan user
    $jadwal = $db->table('pesanan')
        ->where('user_id', $id_plg)
        ->orderBy('waktu', 'DESC')
        ->get()->getResultArray();

    // Data lain...
    $ringkasan_pesanan = count($jadwal);
    $total_tagihan = array_sum(array_column($jadwal, 'total_harga'));
    $status = $jadwal[0]['status'] ?? '-';

    return view('pelanggan/dashboard_plg', [
        'layanan' => $layanan,
        'jadwal' => $jadwal,
        'ringkasan_pesanan' => $ringkasan_pesanan,
        'total_tagihan' => $total_tagihan,
        'status' => $status,
        // ...data lain jika ada
    ]);
}
    protected $pesananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
    }

    public function dashboard()
    {
        $id_pelanggan = session()->get('id'); // Pastikan session 'id' berisi ID user yang login

        // Data statistik
        $pesananAktif = $this->pesananModel
            ->where('id_pelanggan', $id_pelanggan)
            ->where('status !=', 'Selesai')
            ->countAllResults();

        $pesananSelesai = $this->pesananModel
            ->where('id_pelanggan', $id_pelanggan)
            ->where('status', 'Selesai')
            ->countAllResults();

        $totalTransaksi = $this->pesananModel
            ->where('id_pelanggan', $id_pelanggan)
            ->selectSum('total')
            ->get()
            ->getRow()
            ->total ?? 0;

        // Riwayat terakhir
        $riwayat = $this->pesananModel
            ->where('id_pelanggan', $id_pelanggan)
            ->orderBy('tanggal', 'DESC')
            ->limit(5)
            ->findAll();

        $data = [
            'pesanan_aktif'    => $pesananAktif,
            'pesanan_selesai'  => $pesananSelesai,
            'total_transaksi'  => $totalTransaksi,
            'riwayat'          => $riwayat,
        ];

        return view('pelanggan/dashboard_plg', $data);
    }
    
public function pesanan()
{
    $id_plg = session()->get('user_id');
    $db = \Config\Database::connect();
    $pesanan = $db->table('pesanan')->where('user_id', $id_plg)->get()->getResultArray();

    return view('pelanggan/pesanan', ['pesanan' => $pesanan]);
}

public function tambah_plg()
{
    return view('admin/tambah_plg');
}

public function simpan_pelanggan()
{
    $db = \Config\Database::connect();
    $data = [
        'nama_plg' => $this->request->getPost('nama_plg'),
        'kontak'   => $this->request->getPost('kontak'),
        'alamat'   => $this->request->getPost('alamat'),
    ];
    $db->table('pelanggan')->insert($data);
    return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan!');
}
}