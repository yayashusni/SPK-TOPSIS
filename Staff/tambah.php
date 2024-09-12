<?php

include ("config/koneksi.php");


$query =$conn->query("SELECT max(iduser) as idMaks FROM users");
// $hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($query);
$id = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($id, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "US";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>

<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Tambah Data Staff</div>
										
									</div>
    </div>
    <div class="card-body">
        <table class="table mt-3 table-responsive">
            <tbody>
            <form action="" method="POST">
 
 <input type="text" name="iduser" class="form-control" value="<?= $IDbaru; ?>" readonly>
 <br />
 <input type="text" name="username" class="form-control"  placeholder="Username" required autofocus>
 <br />
 <input type="text" name="nm_lengkap" class="form-control"  placeholder="Nama lengkap" required autofocus>
 <br />
 <div class="form-check">
    <label>Jenis Kelamin</label><br>
    <label class="form-radio-label">
        <input class="form-radio-input" type="radio" name="jk" value="L" required>
        Laki-laki
    </label>
    <label class="form-radio-label ml-3">
        <input class="form-radio-input" type="radio" name="jk" value="P" required>
        Perempuan
    </label>
</div>
 <input type="text" name="posisi" class="form-control"  placeholder="Posisi Jabatan" required autofocus>
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
    $username=ucwords($_POST['username']);
    $nm_lengkap=ucwords($_POST['nm_lengkap']);
    $posisi=ucwords($_POST['posisi']);
    $password=password_hash('12345678', PASSWORD_DEFAULT);
	$query=$conn->query("insert into users (iduser,username,password,nm_lengkap,jk,level,posisi_jabatan) values('$_POST[iduser]','$username','$password','$nm_lengkap','$_POST[jk]','2','$posisi')");
	

	if($query){
		echo "<script>alert('Disimpan'); window.open('staff.php','_self');</script>";
	}
}

?>

