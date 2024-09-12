<?php 
include 'session.php';
include 'config/koneksi.php';

$query="SELECT * FROM users WHERE username='$username'";
$result=$conn->query($query);
$row = $result->fetch_array();

if (isset($_POST['update'])) {

    

    $newUsername = ucwords($_POST['username']);
    $newJK = $_POST['jk'];
    $nama=ucwords($_POST['nm_lengkap']);
    // Update other profile fields as needed

    $currentUsername = $_SESSION['user'];
    
    if ($_POST['password']) {
    $newPassword=password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query="UPDATE users SET username='$newUsername', password='$newPassword' ,nm_lengkap='$_POST[nm_lengkap]', jk='$newJK' WHERE iduser='$iduser'";
        $update=$conn->query($query);
    }else{
        $query="UPDATE users SET username='$newUsername',nm_lengkap='$nama', jk='$newJK' WHERE iduser='$iduser'";
        $update=$conn->query($query);
    }
    
    if ($update) {
        $_SESSION['user'] = $newUsername;
        $_SESSION['jk'] = $newJK;
        echo "<script>alert('Disimpan'); window.open('profile.php', '_self');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Profile</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { "families": ["Lato:300,400,700,900"] },
            custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css'] },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <style>
        .capitalize{
            text-transform: capitalize;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <?php include "header.php"?>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <?php include "navbar.php"?>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <?php include "sidebar.php"?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner mb-2">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Pengaturan Akun</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content  -->
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-12 mx-auto">
                            <div class="card card-round p-4">

                                <form action="" method="post">

                                    <div class="form-group">
                                        <label for="">User ID</label>
                                        <input type="text" class="form-control" name="iduser" id=""
                                            value="<?=$row['iduser']?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control capitalize" name="username" id="username"
                                            value="<?=$row['username']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" name="password" id="password">
                                        <small id="emailHelp2" class="form-text text-muted">kosongkan bila tidak ingin
                                            mengubah password</small>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control capitalize" name="nm_lengkap"
                                            value="<?=$row['nm_lengkap']?>">
                                    </div>
                                    <div class="form-check">
                                        <label>Jenis Kelamin</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="jk" value="L"
                                                <?=$row['jk']==='L' ?'checked':''?> >
                                            Laki-laki
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="jk" value="P"
                                                <?=$row['jk']==='P' ?'checked':''?> >
                                            Perempuan
                                        </label>
                                    </div>
                                    <?php  if ($level=='1'){?>
                                    <div class="form-group">
                                        <label for="">Posisi Jabatan</label>
                                        <input type="text" class="form-control capitalize" name="jabatan"
                                            value="<?=$row['posisi_jabatan']?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="1" <?=$row['level']=='1' ?'selected':''?>>1</option>
                                            <option value="2" <?=$row['level']=='2' ?'selected':''?>>2</option>
                                        </select>
                                    </div>
                                    <?php } ?>
                                    <button type="submit" name="update"
                                        class="btn  btn-primary btn-sm mt-2 ml-2 ">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content  -->

            </div>

            <!-- footer  -->
            <?php include "footer.php"?>
            <!-- end footer  -->
        </div>

    </div>
    <!-- script js  -->
    <?php include "script.php"?>
    <!-- end script js  -->
</body>

</html>