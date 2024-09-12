<?php include "session.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Alternatif</title>
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
	<style>
		input{
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
								<h2 class="text-white pb-2 fw-bold">Alternatif</h2>
							</div>
						</div>
					</div>
				</div>

				<!-- content  -->
				<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">

			<?php

			//   $url = $_SERVER['REQUEST_URI'];
			//   $base= "/SPK_Padi/";

			if ($url == '/alternatif.php') {
				include "alternatif/dataAlternatif.php";
			} else if (@$_GET['a'] == 'tambahAlternatif') {
				include "alternatif/tambah.php";
			} else if (@$_GET['k'] == 'ubahAlternatif') {
				include "alternatif/ubah.php";
			} else if (@$_GET['k'] == 'hapusalternatif') {
				include "alternatif/hapus.php";
			} else if (@$_GET['k'] == 'upload') {
				include "alternatif/upload.php";
			}
			?>

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