<?php
include ("config/koneksi.php");
//ambil data \
$get_data=$conn->query("SELECT * FROM kriteria where id_kriteria='$_GET[id]'");
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
					<input type="text" name="id_kriteria" class="form-control" required
						value="<?= $result['id_kriteria']; ?>" readonly />
					<br />
					<input type="text" name="nama_kriteria" class="form-control" required placeholder="Nama Kriteria"
						value="<?= $result['nama_kriteria']; ?>" />
					<br />
					<input type="number" name="bobot" class="form-control" required placeholder="Bobot"
						value="<?= $result['bobot']; ?>" />
					<br />
					
					<select name="sifat" class="form-control" required>
						<option value="<?= $result['sifat']; ?>">
							<?=$result['sifat']; ?>
						</option>
						<option value="Benefit">Benefit</option>
						<option value="Cost">Cost</option>
					</select>
					<br />
					<input type="submit" name="ubah" value="Ubah" class="btn btn-sm btn-primary" />
					<br />
				</form>
			</tbody>
		</table>
	</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $namakriteria=ucwords($_POST['nama_kriteria']);
	$update=$conn->query("update kriteria set nama_kriteria='$namakriteria', bobot='$_POST[bobot]',sifat='$_POST[sifat]' where id_kriteria='$_POST[id_kriteria]'"); 
	if($update){ 
		echo "<script>	
			  alert('Diubah'); 
			  window.open('kriteria.php', '_self');
				</script>"; 
	} 
}
 ?>