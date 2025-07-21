<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class LaporanKeuangan extends BaseController
{
    public function lp_keuangan()
    {
        $db = \Config\Database::connect();



$total_harian = $db->table('pesanan')
    ->select('COALESCE(SUM(total_harga),0) as total')
    ->where('DATE(waktu)', date('Y-m-d'))
    ->get()->getRow()->total ?? 0;

$total_mingguan = $db->table('pesanan')
    ->select('COALESCE(SUM(total_harga),0) as total')
    ->where('waktu >=', date('Y-m-d', strtotime('-6 days')))
    ->where('waktu <=', date('Y-m-d'))
    ->get()->getRow()->total ?? 0;

$total_bulanan = $db->table('pesanan')
    ->select('COALESCE(SUM(total_harga),0) as total')
    ->where('MONTH(waktu)', date('m'))
    ->where('YEAR(waktu)', date('Y'))
    ->get()->getRow()->total ?? 0;
        return view('admin/lp_keuangan', [
            'total_harian'   => $total_harian,
            'total_mingguan' => $total_mingguan,
            'total_bulanan'  => $total_bulanan,
        ]);
    }
}