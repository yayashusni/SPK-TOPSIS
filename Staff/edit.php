<?php
include ("config/koneksi.php");
//ambil data \
$get_data=$conn->query("SELECT * FROM users where iduser='$_GET[id]'");
$result=$get_data->fetch_array(); ?>

<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Tambah Data Staff</div>
										
									</div>
    </div>
    <div class="card-body">
        <table class="table mt-3 table-responsive">
            <tbody>
            <form action="" method="post">

<div class="form-group">
    <label for="">User ID</label>
    <input type="text" class="form-control" name="iduser" id=""
        value="<?=$result['iduser']?>" readonly>
</div>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username"
        value="<?=$result['username']?>">
</div>
<hr>
<div class="form-group">
    <label for="">Nama Lengkap</label>
    <input type="text" class="form-control" name="nm_lengkap"
        value="<?=$result['nm_lengkap']?>">
</div>
<div class="form-check">
    <label>Jenis Kelamin</label><br>
    <label class="form-radio-label">
        <input class="form-radio-input" type="radio" name="jk" value="L"
            <?=$result['jk']==='L' ?'checked':''?> >
        Laki-laki
    </label>
    <label class="form-radio-label ml-3">
        <input class="form-radio-input" type="radio" name="jk" value="P"
            <?=$result['jk']==='P' ?'checked':''?> >
        Perempuan
    </label>
</div>
<?php  if ($level==1){?>
<div class="form-group">
    <label for="">Posisi Jabatan</label>
    <input type="text" class="form-control" name="jabatan"
        value="<?=$result['posisi_jabatan']?>">
</div>

<div class="form-group">
    <label for="level">Level</label>
    <select class="form-control" name="level" id="level">
        <option value="1" <?=$result['level']=='1' ?'selected':''?>>1</option>
        <option value="2" <?=$result['level']=='2' ?'selected':''?>>2</option>
    </select>
</div>
<?php } ?>
<button type="submit" name="update"
    class="btn  btn-primary btn-sm mt-2 ml-2 ">Simpan</button>
</form>
            </tbody>
        </table>
    </div>
</div>




 

<?php
if(isset($_POST['update'])){
    $username=ucwords($_POST['username']);
    $nama=ucwords($_POST['nm_lengkap']);
    $query="UPDATE users SET username='$username',nm_lengkap='$nama', jk='$_POST[jk]', level='$_POST[level]', posisi_jabatan='$_POST[jabatan]' WHERE iduser='$_GET[id]'";
	$update=$conn->query($query);
	
    if($update){ 
		echo "<script>	
			  alert('Diubah'); 
			  window.open('staff.php', '_self');
				</script>"; 
	} 
}

?>

