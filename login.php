<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Raja Syah">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">

</head>

<body>
    <style>
        body {
            background-color: slategrey;
        }

        .card {
            border: 1px solid #e0e0e0;
            /* Card border color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Card box shadow */
        }

        .brand {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .brand img {
            width: 80px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px; 
        }
    </style>
</head>

<body>

    <section class="h-100 ">
        <div class="container h-100 mb-5">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

                    <div class="brand">
                        <img src="XXKING.png" width="80" alt="logo">
                    </div>

                    <div class="card shadow-lg mt-2">
                        <div class="card-body p-5">
                            <h4 class="text-center"><b>GALERI FOTO</b></h4>
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <!-- Alert registrasi berhasil -->
                            <?php if(isset($_GET['registrasi']) && $_GET['registrasi'] == 'sukses'): ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Registrasi berhasil!',
                                            text: 'Silakan login dengan akun yang sudah dibuat.'
                                        });
                                    });
                                </script>
                            <?php endif; ?>

                            <form method="POST" action="proses_login.php" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="username">Username</label>
                                    <input id="username" type="username" class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Username invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Password invalid
                                    </div>
                                </div>

                                
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </form>
                            <div class="mt-3 justify-content-center">
                        <a href="index.php" class="btn btn-dark"><b>Go to Home</b></a>
                    </div>
                        </div>
                        <div class="card-footer border-0 ">
                            <div class="text-center">
                                Belum punya akun? <a href="register.php" class="text-dark"> Registrasi</a>
                            </div>
                        </div>
                    </div>

                    <footer class="bg-dark fixed-bottom text-center py-1">
                        <small class="text-white">
                            <p><b>&copy; 2024 XXKING Project</b></p>
                        </small>
                    </footer>
                </div>
            </div>
        </div>
    </section>

    <!-- Tambahkan SweetAlert JS -->
    <script src="package/dist/sweetalert2.min.js"></script>
