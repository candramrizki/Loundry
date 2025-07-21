<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'layanan', 'berat', 'total_harga', 'waktu', 'metode_bayar', 'catatan', 'status'
    ];

   public function cetakNota($id)
    {
       return $this->select('pesanan.*, pelanggan.nama_plg')
                ->join('pelanggan', 'pelanggan.id = pesanan.user_id')
                ->where('pesanan.id', $id)
                ->first();
    }

    
}

