<?php 
session_start();


if (isset($_SESSION['user'])) {
    $iduser = $_SESSION['iduser'];
    $username = $_SESSION['user'];
    $menuLabel = $username; 
    $level = $_SESSION['level'];
    $jabatan = $_SESSION['jabatan'];
    $jk = $_SESSION['jk'];

    
	// var_dump($getjk);
    
} else {
    header('Location: login.php'); 
}
?>