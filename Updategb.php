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
  $email = $_POST['email'];
  mysqli_query($conn, "UPDATE bukutamu SET Nama='$nama', Alamat='$alamat', Email='$email' WHERE id='$id'");
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
      <label for="email">Email</label>
      <input type="email" name="email" value="<?php echo $guest['Email']; ?>">
    </div>
    <button type="submit" name="update">Update</button>
    <a href="readgb.php">Kembali</a>
  </form>
</body>
</html>
<?php
include_once('templates/footer.php')
?>