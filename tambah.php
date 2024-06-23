<?php
//add dbconnect

include('koneksi.php');

$judul = $_POST['judul_bk'];
$penerbit = $_POST['terbit_bk'];
$genre = $_POST['genre_bk'];
$harga = $_POST['harga_bk'];

//query

$query =  "INSERT INTO buku(judul_buku , penerbit_buku , genre_buku , harga_buku) VALUES('$judul' , '$penerbit' , '$genre' , '$harga')";

if (mysqli_query($conn , $query)) {
 # code redicet setelah insert ke index
 header("location:index.php");
}
else{
 echo "ERROR, tidak berhasil". mysqli_error($conn);
}

mysqli_close($conn);
?>