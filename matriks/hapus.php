<?php
include "config/koneksi.php";
$delete=$conn->query("DELETE FROM nilai_matrik");

if($delete){
		echo "<script>alert('Berhasil dihapus'); window.open('nilaiMatriks.php','_self');</script>";
}else{
	echo "tidak";
}

?>