<?php
// include "session.php";
@session_start();
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Hasil Perangkingan</title>
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

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header" data-background-color="blue">
                <a href="guest.php" class="logo">
                    <!-- <img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand" /> -->
            <label class="fw-bold text-light">SPK TOPSIS</label>        
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more">
                    <i class="icon-options-vertical"></i>
                </button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>

            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">


            </nav>
            </div>
            <div class="sidebar sidebar-style-2">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">


                        <!-- get url  current page -->
                        <?php
                $url = $_SERVER['REQUEST_URI'];
                $base= "/SPK_Padi/";
                $link= $_SERVER['REQUEST_URI'];
                ?>

                        <ul class="nav nav-primary">

                            <li class="nav-item">
                                <a href="guest.php">
                                    <p>Hasil Perangkingan</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-panel">
                <div class="content">
                    <div class="panel-header bg-primary-gradient">
                        <div class="page-inner mb-2">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                <div>
                                    <h2 class="text-white pb-2 fw-bold">Hasil Perangkingan</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- content  -->
                    <div class="page-inner mt--5">
                        <div class="row mt--2">
                            <div class="col">
                                <div class="card card-stats card-round p-4 ">
                                    <div class="card-body">

                                        <table class="table table-bordered table-bordered-bd-primary">

                                            <thead>
                                                <tr>
                                                    <th class="w-25">
                                                        <center>Rangking</center>
                                                    </th>
                                                    <th>
                                                        <center>Varietas Padi</center>
                                                    </th>
                                                    <th>
                                                        <center>Nilai</center>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <?php include 'cetak/dataCetak.php';?>

                                                <?php
$i=1;
$a=mysqli_query($conn,"select * from alternatif order by id_alternatif asc;");
echo "<tr>";
$sortir=array();
while($da=mysqli_fetch_assoc($a)){

	
		
		$idalt=$da['id_alternatif'];
	
		//ambil nilai
			
			$n=mysqli_query($conn,"select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik ASC");
		
		$c=0;
		$ymax=array();
		while($dn=mysqli_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dkuadrat=mysqli_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$jml_alternatif=mysqli_query($conn,"select * from alternatif order by id_alternatif asc;");
			$jml_a=mysqli_num_rows($jml_alternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dbobot=mysqli_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysqli_query($conn,"select * from kriteria where id_kriteria='$idk'");
			$nbot=mysqli_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot);

				$ymax[$c]=$v;
				$c;
				$mak=max($ymax);
				$min=min($ymax);	
			
		}

		$i++;

}




foreach(@$_SESSION['dplus'] as $key=>$dxmin){
#ubah ke nol hasil akhir
 $nilaid=0; 
$nilaiPre=0;     
$nilai=0;    
    
	$jarakm=$_SESSION['dmin'][$key];
	$id_alt=$_SESSION['id_alt'][$key];
	
	//nama alternatif
	$nama=mysqli_query($conn,"select * from alternatif where id_alternatif='$id_alt'");
	$nm=mysqli_fetch_assoc($nama);
	
    
// echo $jarakm." / <br> ";	
// echo $dxmin." + ";	
// echo $jarakm."<br><br>";	
			
    
    
	 $nilaiPre=$dxmin+$jarakm;
    
	 $nilaid=$jarakm/$nilaiPre;
    
	
		$nilai=round($nilaid,4);
		
	//simpan ke tabel nilai preferensi
	$nm=$nm['nm_alternatif'];
	
	$sql2=mysqli_query($conn,"insert into nilai_preferensi (nm_alternatif,nilai) values('$nm','$nilai')");
	
		
	
}
 
 //ambil data sesuai dengan nilai tertinggi
 $i=1;
	$sql3=mysqli_query($conn,"select * from nilai_preferensi  order by nilai desc");
	while($data3=mysqli_fetch_assoc($sql3)){
		echo "<tr>
		<td>".$i."</td>
		<td>$data3[nm_alternatif]</td>
		<td>$data3[nilai]</td>
		</tr>";
		
		$i++;
	}
 
 
 //kosongkan tabel nilai preferensi
 $del=mysqli_query($conn,"delete from nilai_preferensi");

echo "</tr>";
?>
                                            </tbody>
                                        </table>
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