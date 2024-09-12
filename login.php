<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 380px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
       
    </style>
   
</head>
<body class=" bubble-shadow">

<div class="login-container">
    <h1 class="text-center mt-3 mb-4">SPK TOPSIS</h1>

    
    <?php
    session_start();
    include 'config/koneksi.php';

    if (isset($_SESSION['user'])) {
        // Jika sudah login, arahkan ke halaman beranda atau halaman lain yang sesuai
        header('Location: index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Memverifikasi password
            if (password_verify($password, $row['password'])) {
                $_SESSION['iduser'] = $row['iduser'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['jabatan'] = $row['posisi_jabatan'];
                $_SESSION['jk'] = $row['jk'];
                header('Location: index.php');
                exit();
            } else {
                // Password tidak valid
                echo '<div id="alert" class="alert alert-danger" role="alert">Login failed. Please check your credentials.</div>';
                echo '<script>
                        setTimeout(function(){
                            document.getElementById("alert").style.display="none";
                        }, 1500);
                      </script>';
            }
        } else {
           // Username tidak ditemukan
           echo '<div id="alert" class="alert alert-danger" role="alert">Login failed. Please check your credentials.</div>';
           echo '<script>
                   setTimeout(function(){
                       document.getElementById("alert").style.display="none";
                   }, 1500);
                 </script>';
        }
    }
    ?>
    <form method="post" action="">
        <div class="form-group form-floating-label">
            <input id="username" name="username" type="text" class="form-control input-border-bottom" required="">
            <label for="inputFloatingLabel" class="placeholder">Username</label>
        </div>
        <div class="form-group form-floating-label">
            <input id="password" name="password" type="password" class="form-control input-border-bottom" required="">
            <label for="inputFloatingLabel" class="placeholder">Password</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-round btn-sm btn-primary btn-block bg-primary-gradient my-4">Login</button>
        </div>
        <a href="guest.php">Masuk sebagai tamu</a> 
    </form>
</div>
<?php include 'script.php'?>
</body>
</html>
