<?php
include "config/koneksi.php";
$delete=$conn->query("delete from users where iduser='$_GET[id]'");

if($delete){
		echo "<script>alert('Berhasil dihapus'); window.open('staff.php','_self');</script>";
}

?>