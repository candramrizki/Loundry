<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nota Pesanan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 40px 0;
    }
    .nota {
      background: #fff;
      max-width: 600px;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .row {
      margin-bottom: 10px;
    }
    .row b {
      display: inline-block;
      width: 140px;
      color: #555;
    }
    .section {
      border-top: 1px dashed #ccc;
      margin-top: 20px;
      padding-top: 15px;
    }
    .footer {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      font-style: italic;
      color: #777;
    }
    .btn {
      display: block;
      width: 150px;
      margin: 30px auto 0;
      background-color: #007bff;
      color: white;
      padding: 10px;
      text-align: center;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn:hover {
      background-color: #0056b3;
    }
    @media print {
      .btn {
        display: none;
      }
      .nota {
        box-shadow: none;
        border: none;
      }
    }
  </style>
</head>
<body>
  <div class="nota">
    <h2>Nota Pesanan</h2>

    <div class="row"><b>ID Pesanan:</b> <?= esc($pesanan['id']) ?></div>
    <div class="row"><b>Nama Pemesan:</b> <?= esc($pesanan['nama_plg']) ?></div>
    <div class="row"><b>Tanggal:</b> <?= esc(date('d-m-Y H:i', strtotime($pesanan['waktu']))) ?></p>

    <div class="section">
      <div class="row"><b>Layanan:</b> <?= esc($pesanan['layanan']) ?></div>
      <div class="row"><b>Berat:</b> <?= esc($pesanan['berat']) ?> kg</div>
      <div class="row"><b>Harga per Kg:</b> Rp<?= number_format($pesanan['harga_per_kg'], 0, ',', '.') ?></div>
      <div class="row"><b>Total Harga:</b> Rp<?= number_format($pesanan['total_harga'], 0, ',', '.') ?></div>
      <div class="row"><b>Status:</b> <?= esc($pesanan['status']) ?></div>
    </div>

    <div class="footer">Terima kasih atas pesanan Anda</div>

    <button class="btn" onclick="window.print()">Cetak Nota</button>
  </div>
</body>
</html>
