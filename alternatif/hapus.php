<?php
include "config/koneksi.php";
$delete=$conn->query("delete from alternatif where id_alternatif='$_GET[id]' ");

if($delete){
		echo "<script>alert('Berhasil dihapus'); window.open('alternatif.php','_self');</script>";
	}else {
	echo "<script>alert('Tidak bisa dihapus'); window.open('alternatif.php','_self');</script>";
}

?>