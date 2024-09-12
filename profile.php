<?php 
include 'session.php';
include 'config/koneksi.php';

$query="SELECT * FROM users WHERE username='$username'";
$result=$conn->query($query);
$row = $result->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Profile</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

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
								<h2 class="text-white pb-2 fw-bold">Profil</h2>
							</div>
						</div>
					</div>
				</div>

				<!-- content  -->
				<div class="page-inner mt--5">
                <div class="row mt--2">
                    <div class="col-lg-5 col-md-10\\\\\\\\\\\\\ mx-auto">
                <div class="card card-profile card-round  bubble-shadow skew-shadow ">
								<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="../assets/img/<?= strtolower($jk); ?>.png" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile">
                                        <div class="table-responsive">
                                        <table class="table">
                                        <tr>
                                            <td>ID User</td>
                                            <td>:</td>
                                            <td ><?=$row['iduser']?></td>
                                        </tr>
										<tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?=$row['username']?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td><?=$row['nm_lengkap']?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?=$row['jk']?></td>
                                        </tr>

                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td><?= $row['posisi_jabatan']?></td>
                                        </tr>
										</table>
										</div>
										
										
									</div>
								</div>
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