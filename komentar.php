<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center py-2">
        <img src="XXKING.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top ml-3">

        <p class="text-white ms-4 ">Selamat datang <b><?= strtoupper($_SESSION['namalengkap']) ?></b></p>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link text-white" href="index.php"><b>Home</b></a></li>
                <li class="nav-item"><a class="nav-link text-white" href="album.php"><b>Album</b></a></li>
                <li class="nav-item"><a class="nav-link text-white" href="foto.php"><b>Foto</b></a></li>
                <li class="nav-item"><a class="nav-link text-white" href="logout.php"><b>Logout</b></a></li>
            </ul>
        </div>

    </nav>
    <div class="container mt-5">
        <form action="tambah_komentar.php" method="post">
            <?php
            include "koneksi.php";
            $fotoid = $_GET['fotoid'];
            $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
                <div class="mb-3">
                    <label for="judulfoto" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judulfoto" name="judulfoto" value="<?= $data['judulfoto'] ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsifoto" class="form-label"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsifoto" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>">
                </div>
                <div class="mb-3">
                    <label for="lokasifile" class="form-label"><b>Foto</b></label>
                    <img src="gambar/<?= $data['lokasifile'] ?>" class="img-fluid img-thumbnail" alt="Foto" width="150px">
                </div>
                <div class="mb-3">
                    <label for="isikomentar" class="form-label"><b>Komentar</b></label>
                    <input type="text" class="form-control" id="isikomentar" name="isikomentar">
                </div>
                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i><b> Tambah</b></button>
            <?php
            }
            ?>
        </form>

        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($conn, "select * from komentarfoto,user where komentarfoto.userid=user.userid");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?= $data['komentarid'] ?></td>
                        <td><?= $data['namalengkap'] ?></td>
                        <td><?= $data['isikomentar'] ?></td>
                        <td><?= $data['tanggalkomentar'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>