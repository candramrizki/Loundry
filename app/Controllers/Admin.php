<?php

namespace App\Controllers;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\PesananModel; // ←

class Admin extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModel = new PesananModel();
    }
    // Dashboard Admin
    public function dashboard()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
        return redirect()->to('/login');
    }

    $this->trackingOtomatis(); // ← Tambahkan ini agar auto update juga di dashboard

    $db = \Config\Database::connect();
    $layanan = $db->table('layanan')->get()->getResultArray();
    $pesananBaru = $db->table('pesanan')->where('status', 'Menunggu')->countAllResults();

    return view('admin/dashboard', [
        'layanan' => $layanan,
        'pesananBaru' => $pesananBaru
    ]);
    }

    // Paket
    public function paket()
    {
        $model = new PaketModel();
        $data['paket'] = $model->findAll();
        return view('admin/paket', $data);
    }

    public function tbh_paket()
    {
        return view('admin/tbh_paket');
    }

    public function simpanPaket()
    {
        $model = new PaketModel();
        $data = [
            'kode_paket' => $this->request->getPost('kode_paket'),
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga'      => $this->request->getPost('harga'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/paket')->with('error', 'Gagal menambahkan data paket.');
        }
    }

    public function edit_paket($id)
    {
        $model = new PaketModel();
        $paket = $model->find($id);

        if (!$paket) {
            return redirect()->to('/admin/paket')->with('error', 'Data paket tidak ditemukan.');
        }

        return view('admin/edit_paket', ['paket' => $paket]);
    }

    public function up_paket($id)
    {
        $model = new PaketModel();
        $data = [
            'kode_paket' => $this->request->getPost('kode_paket'),
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga'      => $this->request->getPost('harga'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil diupdate.');
        } else {
            return redirect()->to('/admin/paket')->with('error', 'Gagal mengupdate data paket.');
        }
    }

    public function hapus_paket($id)
    {
        $model = new PaketModel();
        if ($model->delete($id)) {
            return redirect()->to('/admin/paket')->with('success', 'Data paket berhasil dihapus.');
        } else {
            return redirect()->to('/admin/paket')->with('error', 'Gagal menghapus data paket.');
        }
    }

    // Data Pelanggan
    public function pelanggan()
    {
        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->findAll();
        return view('admin/pelanggan', $data);
    }

    public function tambah_plg()
    {
        return view('admin/tambah_plg');
    }

    public function simpan_pelanggan()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pelanggan' => [
                'label' => 'Nama Pelanggan',
                'rules' => 'required|min_length[3]'
            ],
            'kontak' => [
                'label' => 'Kontak',
                'rules' => 'required'
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pelangganModel = new PelangganModel();
        $data = [
            'nama'   => $this->request->getPost('nama_pelanggan'),
            'kontak' => $this->request->getPost('kontak'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($pelangganModel->insert($data)) {
            return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/pelanggan')->with('error', 'Gagal menambahkan data pelanggan.');
        }
    }

    public function edit_plg($id)
    {
        $pelangganModel = new PelangganModel();
        $data['pelanggan'] = $pelangganModel->find($id);
        if (!$data['pelanggan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pelanggan tidak ditemukan');
        }
        return view('admin/edit_plg', $data);
    }

    public function update_plg($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pelanggan' => [
                'label' => 'Nama Pelanggan',
                'rules' => 'required|min_length[3]'
            ],
            'kontak' => [
                'label' => 'Kontak',
                'rules' => 'required'
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pelangganModel = new PelangganModel();
        $data = [
            'nama'   => $this->request->getPost('nama_pelanggan'),
            'kontak' => $this->request->getPost('kontak'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($pelangganModel->update($id, $data)) {
            return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil diperbarui.');
        } else {
            return redirect()->to('/admin/edit_plg/' . $id)->with('error', 'Gagal memperbarui data pelanggan.');
        }
    }

    public function hapus_plg($id)
    {
        $pelangganModel = new PelangganModel();
        if ($pelangganModel->delete($id)) {
            return redirect()->to('/admin/pelanggan')->with('success', 'Data pelanggan berhasil dihapus.');
        } else {
            return redirect()->to('/admin/pelanggan')->with('error', 'Gagal menghapus data pelanggan.');
        }
    }

    // Pesanan
    public function pesanan()
    {
        $this->trackingOtomatis(); // ← Auto update sebelum ambil data

    $db = \Config\Database::connect();
    $pesanan = $db->table('pesanan')
        ->join('users', 'users.id = pesanan.user_id')
        ->select('pesanan.*, users.nama as nama_pemesan')
        ->get()->getResultArray();

    $semua_layanan = $db->table('layanan')->get()->getResultArray();

    return view('admin/pesanan', [
        'pesanan' => $pesanan,
        'semua_layanan' => $semua_layanan
    ]);
    }

  public function update_status()
{
    $id = $this->request->getPost('id');
    $status = $this->request->getPost('status');

    $data = ['status' => $status];

    if ($status == 'diantar') {
        $data['waktu_diantar'] = date('Y-m-d H:i:s'); // waktu diantar tercatat
    }

    $db = \Config\Database::connect();
    $db->table('pesanan')->where('id', $id)->update($data); // gunakan $data lengkap

    return redirect()->to('/admin/pesanan')->with('success', 'Status pesanan berhasil diubah!');
}


    public function simpanPelanggan()
{
    $id_plg   = $this->request->getPost('id_plg');
    $nama_plg = $this->request->getPost('nama_plg');
    $kontak   = $this->request->getPost('kontak');
    $alamat   = $this->request->getPost('alamat');

    $db = \Config\Database::connect();
    $builder = $db->table('pelanggan');

    $builder->insert([
        'id_plg' => $id_plg,
        'nama_plg' => $nama_plg,
        'kontak' => $kontak,
        'alamat' => $alamat
    ]);

    return redirect()->to(base_url('admin/pelanggan'))->with('success', 'Data pelanggan berhasil disimpan.');
}

public function hapusPelanggan($id_plg)
{
    $db = \Config\Database::connect();
    $builder = $db->table('pelanggan');

    // Hapus berdasarkan id_plg
    $builder->where('id_plg', $id_plg);
    $deleted = $builder->delete();

    if ($deleted) {
        return redirect()->to(base_url('admin/pelanggan'))->with('success', 'Pelanggan berhasil dihapus.');
    } else {
        return redirect()->to(base_url('admin/pelanggan'))->with('error', 'Gagal menghapus pelanggan.');
    }
}

public function editPelanggan($id_plg)
{
    $db = \Config\Database::connect();
    $builder = $db->table('pelanggan');
    $pelanggan = $builder->where('id_plg', $id_plg)->get()->getRowArray();

    if (!$pelanggan) {
        return redirect()->to(base_url('admin/pelanggan'))->with('error', 'Pelanggan tidak ditemukan.');
    }

    return view('admin/edit_pelanggan', ['pelanggan' => $pelanggan]);
}
public function updatePelanggan()
{
    $id_plg   = $this->request->getPost('id_plg');
    $nama_plg = $this->request->getPost('nama_plg');
    $kontak   = $this->request->getPost('kontak');
    $alamat   = $this->request->getPost('alamat');

    $db = \Config\Database::connect();
    $builder = $db->table('pelanggan');

    $builder->where('id_plg', $id_plg);
    $update = $builder->update([
        'nama_plg' => $nama_plg,
        'kontak'   => $kontak,
        'alamat'   => $alamat
    ]);

    if ($update) {
        return redirect()->to(base_url('admin/pelanggan'))->with('success', 'Data pelanggan berhasil diperbarui.');
    } else {
        return redirect()->to(base_url('admin/pelanggan'))->with('error', 'Gagal memperbarui data.');
    }
}
    // Cetak Nota
  public function cetakNota($id)
{
$builder = $this->db->table('pesanan');
$builder->select('pesanan.*, pelanggan.nama_plg, pelanggan.alamat, pelanggan.kontak, layanan.harga_per_kg');
$builder->join('pelanggan', 'pelanggan.id_plg = pesanan.user_id');
$builder->join('layanan', 'layanan.id = pesanan.layanan');
$builder->where('pesanan.id', $id);
$query = $builder->get();
$data['pesanan'] = $query->getRowArray();

$data['pesanan'] = $query->getRowArray();

// Tambah ini kalau pakai array mapping manual:
$layanan_map = [
    1 => ['nama' => 'Cuci Kering', 'harga_per_kg' => 7000],
    2 => ['nama' => 'Setrika', 'harga_per_kg' => 5000],
    3 => ['nama' => 'Cuci + Setrika', 'harga_per_kg' => 9000],
];

$data['harga_per_kg'] = $layanan_map[$data['pesanan']['layanan']]['harga_per_kg'];
$data['layanan_map'] = array_column($layanan_map, 'nama', 'id');
return view('admin/cetak_nota', $data);

}

public function trackingOtomatis()
{ $pesanan = $this->pesananModel
        ->where('status', 'diantar')
        ->where('waktu_diantar IS NOT NULL')
        ->findAll();

    // Tambahkan untuk debug
    // dd($pesanan);

    foreach ($pesanan as $row) {
        $waktuMulai = strtotime($row['waktu_diantar']);
        $sekarang   = time();
        $durasi     = $sekarang - $waktuMulai;

        if ($durasi >= 1800) {
            $this->pesananModel->update($row['id'], ['status' => 'Selesai']);
        }
    }
}

}




    
