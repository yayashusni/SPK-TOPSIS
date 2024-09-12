<?php
include "cetak/dataCetak.php";
?> 


<!-- batas  -->


<?php
@session_start();
include "config/koneksi.php";


// include "cetak/dataCetak.php";




?>


<title>Laporan</title>
<body onLoad="javascript:window:print()">
<?php include "config/koneksi.php";
 ?>
<style type="text/css"></style>

<div style="width:100%;" >
<br>    
<br>    
<center>
	<h5>
		Laporan Hasil Perhitungan TOPSIS<br>
Pemilihan Varietas Bibit Padi Unggul
	</h5>

</center>
    



<!-- <hr style="border-top:2px solid #333;" width="100%"> -->
</div>

<table id='theList' border=1 width='80%' align="center" cellpadding="6px" style="border-collapse:collapse" >
<thead>
<tr>
<th width="3%" bgcolor="#CCCCCC">Rangking</th>
<th width="10%" bgcolor="#CCCCCC">varietas Padi</th>
<th width="12%" bgcolor="#CCCCCC">Nilai</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$a=mysqli_query($conn,"select * from alternatif");
echo "<tr>";
$sortir=array();
while($da=mysqli_fetch_assoc($a)){

	
		
		$idalt=$da['id_alternatif'];
	
		//ambil nilai
			
			$n=mysqli_query($conn,"select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik ASC");
		
		$c=0;
		$ymax=array();
		while($dn=mysqli_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dkuadrat=mysqli_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$jml_alternatif=mysqli_query($conn,"select * from alternatif");
			$jml_a=mysqli_num_rows($jml_alternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$k2=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
			while($dbobot=mysqli_fetch_assoc($k2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jml_a;
			
			//nilai bobot input
			$b2=mysqli_query($conn,"select * from kriteria where id_kriteria='$idk'");
			$nbot=mysqli_fetch_assoc($b2);
			$bot=$nbot['bobot'];
			
			$v=round(($dn['nilai']/sqrt($nilai_kuadrat))*$bot);

				$ymax[$c]=$v;
				$c;
				$mak=max($ymax);
				$min=min($ymax);	
			
		}

		$i++;

}




foreach(@$_SESSION['dplus'] as $key=>$dxmin){
#ubah ke nol hasil akhir
 $nilaid=0; 
$nilaiPre=0;     
$nilai=0;    
    
	$jarakm=$_SESSION['dmin'][$key];
	$id_alt=$_SESSION['id_alt'][$key];
	
	//nama alternatif
	$nama=mysqli_query($conn,"select * from alternatif where id_alternatif='$id_alt'");
	$nm=mysqli_fetch_assoc($nama);
	
	
			
    
    
	 $nilaiPre=$dxmin+$jarakm;
    
	 $nilaid=$jarakm/$nilaiPre;
    
	
		$nilai=round($nilaid,4);
		
	//simpan ke tabel nilai preferensi
	$nm=$nm['nm_alternatif'];
	
	$sql2=mysqli_query($conn,"insert into nilai_preferensi (nm_alternatif,nilai) values('$nm','$nilai')");
    
		
	
}
 
 //ambil data sesuai dengan nilai tertinggi
 $i=1;
	$sql3=mysqli_query($conn,"select * from nilai_preferensi  order by nilai desc");
	while($data3=mysqli_fetch_assoc($sql3)){
		echo "<tr>
		<td><center>".$i."</center></td>
		<td>$data3[nm_alternatif]</td>
		<td>$data3[nilai]</td>
		</tr>";
		
		$i++;
	}
 
 
 //kosongkan tabel nilai preferensi
 $del=mysqli_query($conn,"delete from nilai_preferensi");

echo "</tr>";
?>

</tbody>
</table>
   









