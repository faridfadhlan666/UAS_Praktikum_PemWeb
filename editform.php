<!DOCTYPE html>
<html lang="en">
<head>
 <title>Toko Buku</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <script src="js/jquery.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script>
 <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<?php 
$id = $_GET['id']; 
//koneksi database
include('koneksi.php');
//query
$query = "SELECT * FROM buku WHERE id_buku='$id'";
$result = mysqli_query($conn, $query);
?>

<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
 <h3>Update Data Buku</h3>
 <form role="form" action="edit.php" method="get">
 <?php
 while ($row = mysqli_fetch_assoc($result)) {
 ?>

 <input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">

 <div class="form-group">
  <label>Judul Buku</label>
  <input type="text" name="judul_bk" class="form-control" value="<?php echo $row['judul_buku']; ?>">   
 </div>

 <div class="form-group">
  <label>Penerbit Buku</label>
  <input type="text" name="terbit_bk" class="form-control" value="<?php echo $row['penerbit_buku']; ?>">   
 </div>

 <div class="form-group">
  <label>Genre Buku</label>
  <input type="text" name="genre_bk" class="form-control" value="<?php echo $row['genre_buku']; ?>">   
 </div>

 <div class="form-group">
  <label>Harga Buku</label>
  <input type="text" name="harga_bk" class="form-control" value="<?php echo $row['harga_buku']; ?>">   
 </div>
 <button type="submit" class="btn btn-success btn-block">Update Buku</button>

 <?php 
 }
 mysqli_close($conn);
 ?>    
 </form>
</div>
</body>
</html>