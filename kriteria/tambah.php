<?php

include ("config/koneksi.php");


$query =$conn->query("SELECT max(id_kriteria) as idMaks FROM kriteria");
// $hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($query);
$id = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($id, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "KR";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>

<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Tambah kriteria</div>
										
									</div>
    </div>
    <div class="card-body">
        <table class="table mt-3 table-responsive">
            <tbody>
            <form action="" method="POST">
 
 <input type="text" name="id_kriteria" class="form-control" value="<?= $IDbaru; ?>" readonly>
 <br />
 <input type="text" name="nama_kriteria" class="form-control"  required placeholder="Nama Kriteria" >
 <br />
 <input type="number" name="bobot" class="form-control" required placeholder="Bobot">
 <br />
 <!-- <input type="text" name="poin1" class="form-control" placeholder="Poin 1">
 <br />
 <input type="text" name="poin2" class="form-control" placeholder="Poin 2">
 <br />
 <input type="text" name="poin3" class="form-control" placeholder="Poin 3">
 <br />
 <input type="text" name="poin4" class="form-control" placeholder="Poin 4">
 <br />
 <input type="text" name="poin5" class="form-control" placeholder="Poin 5">
 <br /> -->
 <select name="sifat" class="form-control" required>
    <option value="">--sifat kriteria--</option>
	<option value="Benefit">Benefit</option>
	<option value="Cost">Cost</option>
 </select>
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
    $namakriteria=ucwords($_POST['nama_kriteria']);
	$query=$conn->query("insert into kriteria (id_kriteria,nama_kriteria,bobot,poin1,poin2,poin3,poin4,poin5,sifat) values ('$_POST[id_kriteria]','$namakriteria','$_POST[bobot]','1','2','3','4','5','$_POST[sifat]')");
	
	if($query){
		echo "<script>alert('Disimpan'); window.open('kriteria.php?a=tambah','_self');</script>";
	}
}

?>

