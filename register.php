<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="XXKING.png" type="image/x-icon">

    <!-- Custom styles for this template -->
    <style>
        body {
            background-color: slategrey;
        }

        .container {
            background-color: rgba(250, 250, 250, 0.8);
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.00rem 1.25rem;
            margin-bottom: 0;
            background-color: black;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem 0.25rem 0 0;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
        }

        .card-body {
            padding: 1rem;
        }

        .btn-block {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-5 col-lg-5">
        <form class="card" action="proses_register.php" method="post">
            <div class="card-header">
                <h4 class="mb-0">Register</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username"><b>Username</b></label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="namalengkap"><b>Nama Lengkap</b></label>
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" required>
                </div>
                <div class="form-group">
                    <label for="alamat"><b>Alamat</b></label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        <b> Sudah punya akun? <a href="login.php" class="text-dark">Login</a></b>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <footer class="bg-dark fixed-bottom text-center py-1">
        <small class="text-white"><b><p>&copy; 2024 XXKING Project</p></b>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>