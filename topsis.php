<?php include "session.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Hasil Topsis</title>
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
		.fixed-table {
  table-layout: fixed;
}
		.ellipses th,
.ellipses td {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
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
								<h2 class="text-white pb-2 fw-bold">Perhitungan Topsis</h2>
							</div>
						</div>
					</div>
				</div>

				<!-- content  -->
				<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">

		<div class="card">
			<div class="card-body">

			<?php

			//   $url = $_SERVER['REQUEST_URI'];
			//   $base= "/SPK_Padi/";

			// if ($url == '/topsis.php') {
			// 	include "topsis/matriks.php";
			// } else if (@$_GET['a'] == 'matriksTernormalisasi') {
			// 	include "topsis/matriksTernormalisasi.php";
			// } else if (@$_GET['a'] == 'nilaiBobotTernormalisasi') {
			// 	include "topsis/nilaiBobotTernormalisasi.php";
			// } else if (@$_GET['a'] == 'matriksIdeal') {
			// 	include "topsis/matriksIdeal.php";
			// } 
			//  else if (@$_GET['a'] == 'jarakSolusi') {
			// 	include "topsis/jarakSolusi.php";
			// } 
			//  else if (@$_GET['a'] == 'nilaiPreferensi') {
			// 	include "topsis/nilaiPreferensi.php";
			// } 
			// ?>

<?php

//   $url = $_SERVER['REQUEST_URI'];
//   $base= "/SPK_Padi/";

	include "topsis/matriks.php";
	echo "<hr>";
	include "topsis/matriksTernormalisasi.php";
	echo "<hr>";
	include "topsis/nilaiBobotTernormalisasi.php";
	echo "<hr>";
	include "topsis/matriksIdeal.php";
	echo "<hr>";
	include "topsis/jarakSolusi.php";
	echo "<hr>";
	include "topsis/nilaiPreferensi.php";
?>
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
