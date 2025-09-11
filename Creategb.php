<?php
include_once('templates/header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guestbook</title>
</head>

<body>
  <h1>Tambah Data Tamu</h1>
  <!-- menghubungkan ke database -->
  <form action="" method="post">
  <!-- membuat tabel -->
    <div>
      <label for="nama">Nama Tamu</label>
      <input type="text" name="nama" id="nama">
    </div>
    <div>
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" id="alamat">
    </div>
    <div>
      <label for="tanggal">Tanggal</label>
      <input type="date" name="tanggal" id="tgl">
    </div>
    <div>
      <label for="no">No. Hp</label>
      <input type="text" name="no" id="no">
    </div>
    <div>
      <label for="bertemu">Bertemu</label>
      <input type="text" name="bertemu" id="brtmu">
    </div>
    <div>
      <label for="kepentingan">Kepentingan</label>
      <input type="text" name="kepentingan" id="kpntgn">
    </div>
    <button type="submit" name="tambah" id="tambah">Tambah data</button>
    <a href="readgb.php">Kembali ke tabel</a>
  </form>
  <?php
  require_once('koneksi.php');
  if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $nomor = $_POST['no'];
    $bertemu = $_POST['bertemu'];
    $kepentingan = $_POST['kepentingan'];

    $query = mysqli_query($conn, "INSERT INTO bukutamu(Nama, Alamat, Tanggal, no_hp, bertemu, kepentingan) VALUES('$nama', '$alamat', '$tanggal', '$nomor', '$bertemu', '$kepentingan')");

    // cek query berhasil atau gagal
    if (isset($query)) {
      echo "data berhasil ditambahkan";
    } else {
      echo "data gagal ditambahkan";
    }
  }
  ?>
</body>
</html>
<?php
include_once('templates/footer.php')
?>