<?php
include "config/koneksi.php";
$query = $conn->query("SELECT count(*) AS jml FROM kriteria");
$result = $query->fetch_array();
$jml_k = $result['jml'];
?>


<h3 class="mt-4">Nilai Bobot Ternormalisasi</h3>
<div class="table-responsive">
    <table class="table table-bordered table-bordered-bd-primary">
        <thead>
            <tr>
                <th scope="col" rowspan="2">No</th>
                <th scope="col" rowspan="2">Alternatif	</th>
                <th scope="col" colspan="<?= $jml_k; ?>">Kriteria</th>
            </tr>
            <tr>
                <?php
                        for ($j = 1; $j <= $jml_k; $j++) {
                            echo "<th>C{$j}</th>";
                        }
                        ?>
            </tr>
        </thead>
        <tbody>
            <?php
$i=0;
$getAlternatif=mysqli_query($conn,"select * from alternatif order by id_alternatif asc");



while($result=mysqli_fetch_assoc($getAlternatif)){


	echo "<tr>
		<td>".(++$i)."</td>
		<td>$result[nm_alternatif]</td>";
		$idAlternatif=$result['id_alternatif'];
	
		//ambil nilai
			
			$getNilai=mysqli_query($conn,"select * from nilai_matrik where id_alternatif='$idAlternatif' order by id_matrik asc");
	
		while($dataNilai=mysqli_fetch_assoc($getNilai)){
			$idKriteria=$dataNilai['id_kriteria'];
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$kriteria=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idKriteria' ");
			while($dkuadrat=mysqli_fetch_assoc($kriteria)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}

			//hitung jml alternatif
			$queryAlternatif=mysqli_query($conn,"select * from alternatif");
			$jmlAlternatif=mysqli_num_rows($queryAlternatif);	
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$kriteria2=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idKriteria' ");
			while($dbobot=mysqli_fetch_assoc($kriteria2)){
				$tnilai=$tnilai+$dbobot['nilai'];
			}	
			 $bobot=$tnilai/$jmlAlternatif;
			
			//nilai bobot input
			$getKriteria=mysqli_query($conn,"select * from kriteria where id_kriteria='$idKriteria'");
			$bobot=mysqli_fetch_assoc($getKriteria);
			$bobot_k=$bobot['bobot'];
			
			echo "<td align='center'>".number_format(($dataNilai['nilai']/sqrt($nilai_kuadrat))*$bobot_k,4)."</td>";
			
		}
		echo "</tr>\n";

}
?>

        </tbody>
    </table>
</div>