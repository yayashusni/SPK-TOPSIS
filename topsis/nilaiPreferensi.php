<?php
@session_start();
include ("config/koneksi.php");
error_reporting(0);


//  echo "<i>cek sessionn dplus</i>";    
// echo "<pre>";    
// print_r($_SESSION['dplus']);    
// echo "</pre>";  


// echo "<i>cek sessionn dmin</i>";    
// echo "<pre>";    
// print_r($_SESSION['dmin']);    
// echo "</pre>";  


// print_r($_SESSION);


if(! isset($_SESSION['ymax'])){
  include ('jarakSolusi.php');
}


?>

	<p>
    <h3 class="box-title mt-4" >Nilai Preferensi</h3>
  </p>


<table class="table table-bordered table-bordered-bd-primary">
<thead>
<tr>
<th class="w-25"><center>No</center></th>
<th ><center>Alternatif</center></th>
<th ><center>V<sub>i</sub></center></th>
</tr>

</thead>
<tbody>
<?php
$i=1;
$a=mysqli_query($conn,"select * from alternatif order by id_alternatif asc;");
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
			$jml_alternatif=mysqli_query($conn,"select * from alternatif order by id_alternatif asc;");
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
			
			$v=number_format(($dn['nilai']/sqrt($nilai_kuadrat))*$bot);

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
	
    
// echo $jarakm." / <br> ";	
// echo $dxmin." + ";	
// echo $jarakm."<br><br>";	
			
    
    
	 $nilaiPre=$dxmin+$jarakm;
    
	 $nilaid=$jarakm/$nilaiPre;
    
	
		$nilai=number_format($nilaid,4);
		
	//simpan ke tabel nilai preferensi
	$nm=$nm['nm_alternatif'];
	
	$sql2=mysqli_query($conn,"insert into nilai_preferensi (nm_alternatif,nilai) values('$nm','$nilai')");
	
		
	
}
 
 $i=1;
	$sql3=mysqli_query($conn,"select * from nilai_preferensi ");
	while($data3=mysqli_fetch_assoc($sql3)){
		echo "<tr>
		<td>".$i."</td>
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