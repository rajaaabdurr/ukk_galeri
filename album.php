<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit; // tambahkan exit untuk menghentikan eksekusi script setelah redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">
    <!-- Tambahkan SweetAlert CSS -->
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
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

    <div class="container mt-4 mb-5">
        <h1>Halaman Album</h1>
        <form action="tambah_album.php" method="post" class="col-lg-5">
            <div class="form-group">
                <label for="namaAlbum">Nama Album</label>
                <input type="text" class="form-control" name="namaalbum" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i><b> Tambah</b></button>
        </form>
        <div class="card border-secondary mt-3">
            <div class="card-header bg-dark text-white ">
                <h5><b>Galeri Foto</b></h5>
            </div>
            <table class="table table-bordered table-hover shadow-lg border-secondary">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $userid = $_SESSION['userid'];
                    $sql = mysqli_query($conn, "select * from album where userid='$userid'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?= $data['albumid'] ?></td>
                            <td><?= $data['namaalbum'] ?></td>
                            <td><?= $data['deskripsi'] ?></td>
                            <td><?= $data['tanggaldibuat'] ?></td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $data['albumid'] ?>)"><i class="bi bi-trash"></i><b> Hapus</b></a>
<<<<<<< HEAD
                                <a href="edit_album.php?albumid=<?= $data['albumid'] ?>" class="btn btn-primary text-white"><i class="bi bi-pencil-square"></i><b> Edit</b></a>
=======
                                <a href="edit_album.php?albumid=<?= $data['albumid'] ?>" class="btn btn-warning text-white"><i class="bi bi-pencil-square"></i><b> Edit</b></a>
>>>>>>> 23073ae38c33c93132a5e9c2ffe85a58e2dd3c71
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <footer class="bg-dark text-white fixed-bottom text-center py-1 ">
            <div class="container ml-5">
                <b>
                    <p>&copy; 2024 XXKING Project</p>
                </b>
            </div>
        </footer>
    </div>
<<<<<<< HEAD
    <!-- Tambahkan SweetAlert JS -->
    <script src="package/dist/sweetalert2.min.js"></script>
    <script>
        // Cek apakah parameter 'added' disertakan dalam URL
        const urlParams = new URLSearchParams(window.location.search);
        const added = urlParams.get('added');

        // Jika 'added' bernilai 'true', tampilkan alert berhasil tambah album
        if (added === 'true') {
            Swal.fire({
                icon: 'success',
                title: 'Album berhasil ditambahkan!',
                showConfirmButton: false,
                timer: 1500 // Durasi alert ditampilkan dalam milidetik (misalnya 1500 ms = 1,5 detik)
            });
        }
    </script>

=======

>>>>>>> 23073ae38c33c93132a5e9c2ffe85a58e2dd3c71
    <!-- Tambahkan SweetAlert JS -->
    <script src="package/dist/sweetalert2.min.js"></script>
    <script>
        function confirmDelete(albumId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi penghapusan, arahkan ke halaman hapus_album.php dengan mengirimkan albumId
                    window.location.href = 'hapus_album.php?albumid=' + albumId;
                }
            });
        }
    </script>

<<<<<<< HEAD
    
=======
    <!-- Tambahkan SweetAlert JS -->
    <script src="package/dist/sweetalert2.min.js"></script>
    <script>
        // Cek apakah parameter 'success' disertakan dalam URL
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        // Jika 'success' bernilai 'true', tampilkan alert berhasil
        if (success === 'true') {
            Swal.fire({
                icon: 'success',
                title: 'Edit berhasil!',
                showConfirmButton: false,
                timer: 1500 // Durasi alert ditampilkan dalam milidetik (misalnya 1500 ms = 1,5 detik)
            });
        }
    </script>
>>>>>>> 23073ae38c33c93132a5e9c2ffe85a58e2dd3c71

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>