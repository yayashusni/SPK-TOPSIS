<?php
include ("config/koneksi.php");
//ambil data \
$get_data=$conn->query("SELECT * from alternatif where id_alternatif='$_GET[id]'");
$result=$get_data->fetch_array(); ?>

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
 
 <input type="text" name="id_alternatif" class="form-control" value="<?= $result['id_alternatif']; ?>" readonly>
 <br />
 <input type="text" name="nama_alternatif" class="form-control" required  placeholder="Nama Alternatif" value="<?= $result['nm_alternatif']; ?>">
 <br />
 <input type="submit" name="ubah" value="Ubah" class="btn btn-primary btn-sm">
 <br />
 </form>
			</tbody>
		</table>
	</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $alternatif=ucwords($_POST['nama_alternatif']);
	$update=$conn->query("update alternatif set nm_alternatif='$alternatif' where id_alternatif='$_POST[id_alternatif]'"); 
	if($update){ 
		echo "<script>	
			  alert('Diubah'); 
			  window.open('alternatif.php', '_self');
				</script>"; 
	} 
}
 ?>