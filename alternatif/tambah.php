<?php

include ("config/koneksi.php");


$query =$conn->query("SELECT max(id_alternatif) as idMaks FROM alternatif");
// $hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($query);
$id = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($id, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "AL";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>

<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Tambah alternatif</div>
										
									</div>
    </div>
    <div class="card-body">
        <table class="table mt-3 table-responsive">
            <tbody>
            <form action="" method="POST">
 
 <input type="text" name="id_alternatif" class="form-control" value="<?= $IDbaru; ?>" readonly>
 <br />
 <input type="text" name="nama_alternatif" class="form-control"  placeholder="Nama Alternatif" required autofocus>
 <br />
 <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">
 <br />
 </form>
            </tbody>
        </table>
    </div>
</div>




 

<?php
if(isset($_POST['simpan'])){
    $alternatif=ucwords($_POST['nama_alternatif']);
	$query=$conn->query("insert into alternatif (id_alternatif,nm_alternatif) values('$_POST[id_alternatif]','$alternatif')");
	
	if($query){
		echo "<script>alert('Disimpan'); window.open('alternatif.php?a=tambahAlternatif','_self');</script>";
	}
}

?>

