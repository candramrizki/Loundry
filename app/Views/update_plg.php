<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id_pelanggan'];
    $nama   = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];

    // Simpan sementara ke file
    $data = "$id|$nama|$kontak|$alamat\n";
    file_put_contents('pelanggan.txt', $data, FILE_APPEND);

    header("Location: pelanggan.php?status=sukses");
    exit;
} else {
    header("Location: tambah_plg.php");
    exit;
}
