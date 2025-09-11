<?php
include_once('templates/header.php')
?>
<?php
require_once('koneksi.php');
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM bukutamu WHERE id='$id'");
$guest = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $tanggal = $_POST['tanggal'];
  $nomor = $_POST['no'];
  $bertemu = $_POST['bertemu'];
  $kepentingan = $_POST['kepentingan'];
  mysqli_query($conn, "UPDATE bukutamu SET Nama='$nama', Alamat='$alamat', Tanggal='$tanggal', no_hp='$nomor', bertemu='$bertemu', kepentingan='$kepentingan' WHERE id='$id'");
  echo "<script>alert('Data berhasil diupdate');window.location='readgb.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Tamu</title>
</head>
<body>
  <h1>Update Data Tamu</h1>
  <form method="post">
    <div>
      <label for="nama">Nama Tamu</label>
      <input type="text" name="nama" value="<?php echo $guest['Nama']; ?>">
    </div>
    <div>
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" value="<?php echo $guest['Alamat']; ?>">
    </div>
    <div>
      <label for="tanggal">Tanggal</label>
      <input type="text" name="tanggal" value="<?php echo $guest['Tanggal']; ?>">
    </div>
    <div>
      <label for="no">No. Hp</label>
      <input type="text" name="no" value="<?php echo $guest['no_hp']; ?>">
    </div>
    <div>
      <label for="bertemu">Bertemu</label>
      <input type="text" name="bertemu" value="<?php echo $guest['bertemu']; ?>">
    </div>
    <div>
      <label for="kepentingan">Kepentingan</label>
      <input type="text" name="kepentingan" value="<?php echo $guest['kepentingan']; ?>">
    </div>
    <button type="submit" name="update">Update</button>
    <a href="readgb.php">Kembali</a>
  </form>
</body>
</html>
<?php
include_once('templates/footer.php')
?>