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
    <title>Halaman Edit Foto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
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

    <div class="container mt-4">
        <style>
            form {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 100%;
            }

            table td {
                padding: 8px;
            }

            input[type="text"] {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
        <center>
            <h1>Halaman Edit Foto</h1>
        </center>
        <section class="h-100">
            <div class="container h-100 mb-5">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg mt-12">
                            <div class="card-body p-5">
                                <form id="edit_foto_form" action="update_foto.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    include "koneksi.php";
                                    $fotoid = $_GET['fotoid'];
                                    $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                        <b>
                                            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
                                            <div class="form-group">
                                                <label for="judulFoto">Judul</label>
                                                <input type="text" class="form-control" name="judulfoto" value="<?= $data['judulfoto'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsiFoto">Deskripsi</label>
                                                <input type="text" class="form-control" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasiFile">Lokasi File</label>
                                                <input type="file" class="form-control-file" name="lokasifile">
                                            </div>
                                            <div class="form-group">
                                                <label for="albumId">Album</label>
                                                <select class="form-control" name="albumid">
                                        </b>
                                        <?php
                                        $userid = $_SESSION['userid'];
                                        $sql2 = mysqli_query($conn, "select * from album where userid='$userid'");
                                        while ($data2 = mysqli_fetch_array($sql2)) {
                                        ?>
                                            <option value="<?= $data2['albumid'] ?>" <?php if ($data2['albumid'] == $data['albumid']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $data2['namaalbum'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                            </div>
                            <br>
                            <button type="button" class="btn btn-success" onclick="showConfirmAlert()"><b><i class="bi bi-floppy"></i> Simpan</b></button>


                        <?php
                                    }
                        ?>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <footer class="bg-dark text-white fixed-bottom text-center py-1">
            <div class="container">
                <p>&copy; 2024 XXKING Project</p>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function showConfirmAlert() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menyimpan edit?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, kirimkan formulir
                    document.getElementById("edit_foto_form").submit();
                }
            });
        }
    </script>
</body>

</html>