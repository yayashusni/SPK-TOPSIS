<?php
include "config/koneksi.php";
$delete=$conn->query("delete from kriteria where id_kriteria='$_GET[id]'");

if($delete){
		echo "<script>alert('Berhasil dihapus'); window.open('kriteria.php','_self');</script>";
}

?>