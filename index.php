<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">
</head>

<style>
    p {
        color: #495057;
        font-family:sans-serif;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center py-2">
        <img src="XXKING.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top ml-3">

        <?php
        session_start();
        if (!isset($_SESSION['userid'])) {
        ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="register.php"><b>Register</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="login.php"><b>Login</b></a></li>
                </ul>
            </div>
        <?php
        } else {
        ?>
            <p class="text-white ms-4 ">Selamat datang <b><?= strtoupper($_SESSION['namalengkap']) ?></b></p>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php"><b>Home</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="album.php"><b>Album</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="foto.php"><b>Foto</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="logout.php"><b>Logout</b></a></li>
                </ul>
            </div>
        <?php
        }
        ?>
    </nav>

    <section class="container mt-4 mb-4">
        <!-- Tambahkan margin-bottom di sini -->
        <h1>Halaman Home</h1>
        <p>Di sini, kami mengundang Anda untuk menjelajahi keindahan yang tertangkap dalam setiap momen. Melalui lensa kami, setiap foto adalah kisah yang menceritakan perjalanan, kebahagiaan, dan keajaiban yang ada di sekitar kita.</p>

        <p>Kami percaya bahwa foto memiliki kekuatan untuk membangkitkan kenangan, menginspirasi, dan menyampaikan emosi tanpa kata. Dari keindahan alam hingga momen-momen berharga dalam kehidupan sehari-hari, setiap gambar adalah ungkapan visual dari kehidupan yang berwarna.</p>

        <p>Mari nikmati setiap detiknya, dan biarkan galeri foto ini menjadi perjalanan visual yang membawa Anda ke dalam dunia yang penuh warna dan keajaiban. Terima kasih telah berbagi momen-momen ini bersama kami. Selamat menikmati!</p>
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5><b>Galeri Foto</b></h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    include "koneksi.php";
                    $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg border-secondary">
                                <a href="gambar/<?= $data['lokasifile'] ?>" target="_blank">
                                    <img src="gambar/<?= $data['lokasifile'] ?>" alt="<?= $data['judulfoto'] ?>" class="card-img-top" style="object-fit: cover; width: 100%; height: 200px;">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['judulfoto'] ?></h5>
                                    <p class="card-text"><?= $data['deskripsifoto'] ?></p>
                                    <p class="card-text"><strong>Uploader: </strong><?= $data['namalengkap'] ?></p>
                                    <p class="card-text"><strong>Jumlah Like: </strong>
                                        <?php
                                        $fotoid = $data['fotoid'];
                                        $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                        echo mysqli_num_rows($sql2);
                                        ?>
                                    </p>
                                    <a href="like.php?fotoid=<?= $data['fotoid'] ?>" class="btn btn-danger"><i class="bi bi-heart-fill"></i> Like</a>
                                    <a href="komentar.php?fotoid=<?= $data['fotoid'] ?>" class="btn btn-primary"><i class="bi bi-chat-dots-fill"></i> Komentar</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <br>
            <footer class="bg-dark text-white fixed-bottom text-center py-1">
                <div class="container">
                    <b>
                        <p>&copy; 2024 XXKING Project</p>
                    </b>
                </div>
            </footer>
        </div>

    </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>