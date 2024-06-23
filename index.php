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
    <script src="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <style>
        .form-group {
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>

    <?php
    //tambahkan dbconnect
    include('koneksi.php');

    //query
    $query = "SELECT * FROM buku";

    $result = mysqli_query($conn, $query);

    ?>

    <div class="container bg-info" style="padding-top: 25px; padding-bottom: 25px;">
        <h3>Crud Aplikasi Toko Buku</h3>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <h3>Form Tambah Buku</h3>
                <form role="form" action="tambah.php" method="post">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_bk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Penerbit Buku</label>
                        <input type="text" name="terbit_bk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Genre Buku</label>
                        <input type="text" name="genre_bk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga Buku</label>
                        <input type="text" name="harga_bk" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-2">Tambah Buku</button>
                </form>

            </div>
            <div class="col-sm-8">
                <h3>Tabel Daftar Buku</h3>
                <table class="table table-striped table-hover dtabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penerbit Buku</th>
                            <th>Genre Buku</th>
                            <th>Harga Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['judul_buku']; ?></td>
                                <td><?php echo $row['penerbit_buku']; ?></td>
                                <td><?php echo $row['genre_buku']; ?></td>
                                <td><?php echo $row['harga_buku']; ?></td>
                                <td>
                                    <a href="editform.php?id=<?php echo $row['id_buku']; ?>" class="btn btn-success" role="button">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id_buku'] ?>" class="btn btn-danger" role="button">Delete</a>
                                </td>
                            </tr>

                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dtabel').DataTable();
    });
</script>

</html>