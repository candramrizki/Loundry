<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "admin_ci4"); // ganti dengan host, user, password, dan nama database kamu

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$id_plg    = $_POST['id_plg'];
$nama_plg = $_POST['nama_plg'];
$kontak    = $_POST['kontak'];
$alamat    = $_POST['alamat'];

// Simpan data baru ke database
$sql = "INSERT INTO pelanggan (id_plg, nama_plg, kontak, alamat) 
        VALUES ('$id_plg', '$nama_plg', '$kontak', '$alamat')";

if ($koneksi->query($sql) === TRUE) {
    echo "<script>
            alert('Data pelanggan berhasil disimpan!');
            window.location.href = 'pelanggan.php';
          </script>";
} else {
    echo "Error saat menyimpan data: " . $koneksi->error;
}

$koneksi->close();
?>
