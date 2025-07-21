<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function dashboard_plg()
    {
        // Data dummy, ganti dengan query ke database sesuai kebutuhan Anda
        $status = 'pesan';
        $pesanan_terbaru = 'Cuci Kering - Dalam Proses';
        $promo = 'Diskon 10% untuk pelanggan baru!';
        $ringkasan_pesanan = 3;

        $jadwal = [
            ['tanggal' => '2025-06-06', 'jenis' => 'Jemput', 'status' => 'Selesai'],
            ['tanggal' => '2025-06-07', 'jenis' => 'Antar', 'status' => 'Menunggu'],
        ];

        $total_tagihan = 50000;
        $riwayat_bayar = [
            ['tanggal' => '2025-06-01', 'jumlah' => 50000, 'metode' => 'Transfer'],
        ];

        $ringkasan = [
            ['layanan' => 'Cuci Kering', 'harga' => 25000, 'status' => 'Selesai'],
            ['layanan' => 'Cuci Setrika', 'harga' => 25000, 'status' => 'Proses'],
        ];

        $user = [
            'nama' => 'Budi',
            'email' => 'budi@email.com',
            'no_hp' => '08123456789',
        ];

        return view('pelanggan/dashboard_plg', [
            'status' => $status,
            'pesanan_terbaru' => $pesanan_terbaru,
            'promo' => $promo,
            'ringkasan_pesanan' => $ringkasan_pesanan,
            'jadwal' => $jadwal,
            'total_tagihan' => $total_tagihan,
            'riwayat_bayar' => $riwayat_bayar,
            'ringkasan' => $ringkasan,
            'user' => $user,
        ]);
    }

    // Tambahkan method lain sesuai kebutuhan routes Anda
    public function buat_pesanan()
    {
        // Tampilkan form buat pesanan baru
        return view('pelanggan/buat_pesanan');
    }

    public function simpan_pesanan()
    {
        // Proses simpan pesanan baru
        // ...
        return redirect()->to('pelanggan/dashboard_plg');
    }

    public function cek_status()
    {
        // Tampilkan status pesanan
        return view('pelanggan/cek_status');
    }

    public function jadwal()
    {
        // Tampilkan jadwal jemput & antar
        return view('pelanggan/jadwal');
    }

    public function bayar()
    {
        // Tampilkan halaman pembayaran
        return view('pelanggan/bayar');
    }

    public function profil()
    {
        // Tampilkan profil user
        $user = [
            'nama' => 'Budi',
            'email' => 'budi@email.com',
            'no_hp' => '08123456789',
        ];
        return view('pelanggan/profil', ['user' => $user]);
    }
}