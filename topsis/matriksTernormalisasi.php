<?php
include "config/koneksi.php";
$query = $conn->query("SELECT count(*) AS jml FROM kriteria");
$result = $query->fetch_array();
$jml_k = $result['jml'];
?>


<h3 class="mt-4">Nilai Matriks Ternormalisasi</h3>   
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-bordered-bd-primary ellipses" >
                                        <thead>
                    <tr>
                        <th scope="col" rowspan="2">No</th>
                        <th scope="col" rowspan="2">Alternatif</th>
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
$a=mysqli_query($conn,"select * from alternatif order by id_alternatif asc");



while($da=mysqli_fetch_assoc($a)){


	echo "<tr>
		<td>".(++$i)."</td>
		<td>$da[nm_alternatif]</td>";
		$idalt=$da['id_alternatif'];
	
		//ambil nilai
			
			$n=mysqli_query($conn,"select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc" );
	
		while($dn=mysqli_fetch_assoc($n)){
			$idk=$dn['id_kriteria'];
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;
			$k=mysqli_query($conn,"select * from nilai_matrik where id_kriteria='$idk' ");
			while($dkuadrat=mysqli_fetch_assoc($k)){
				$nilai_kuadrat=$nilai_kuadrat+($dkuadrat['nilai']*$dkuadrat['nilai']);
			}	
				
			echo "<td align='center'>".number_format(($dn['nilai']/sqrt($nilai_kuadrat)),4)."</td>";
			
		}
		echo "</tr>\n";

}
?>

                </tbody>
            </table>
        </div>
