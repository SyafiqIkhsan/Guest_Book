<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guestbook</title>
  <link rel="stylesheet" href="bukutamu.css">
</head>
<style>
  
</style>
<body>
  <h1 style="text-align: center;">Guestbook</h1>
  <table border="1">
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  <?php
  // mengkoneksikan ke database
  require_once('koneksi.php');
  $no = 1;
   $data = mysqli_query($conn, "SELECT * FROM bukutamu");
   while ($guest = mysqli_fetch_assoc($data)):
  ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $guest['Nama']?></td>
      <td><?php echo $guest['Alamat']?></td>
      <td><?php echo $guest['Email']?></td>
      <td>
          <a href="Updategb.php?id=<?php echo $guest['Id']?>">Edit</a> |
          <a href="readgb.php?hapus=<?php echo $guest['Id']?>" name="hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
      </td>
    </tr>
  <?php
    endwhile;
    ?>
  <?php
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM bukutamu WHERE id='$id'");
  echo "<script>window.location='readgb.php';</script>";
}
?>
  </table>
  <small><a href="Creategb.php">TAMBAH DATA</a></small>
</body>
</html>