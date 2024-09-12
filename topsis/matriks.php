<?php
include "config/koneksi.php";
error_reporting(0);



$cekData = $conn->query("SELECT count(*) AS jmlData FROM nilai_matrik group by id_alternatif");
$data = $cekData->fetch_array();
$barisMatriks= $data['jmlData'];

if (is_null($barisMatriks)) {
    echo "<script>alert('Nilai matriks tidak boleh kosong'); window.open('nilaiMatriks.php','_self');</script>";
}else{

$query = $conn->query("SELECT count(*) AS jml FROM kriteria");
$result = $query->fetch_array();
$jml_k = $result['jml'];
?>
<h3>Nilai Matriks</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-bordered-bd-primary ">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Alternatif</th>
                        <th colspan="<?= $jml_k; ?>">Kriteria</th>
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
                    $i = 0;
                    $getKriteria = $conn->query("select * from alternatif order by id_alternatif asc;");
                    while ($data = $getKriteria->fetch_assoc()) {
                        echo "<tr>
                              <td>" . (++$i) . "</td>
                              <td>" . $data['nm_alternatif'] . "</td>";
                             $idalt = $data['id_alternatif'];
                             //ambil nilai
                             $j = $conn->query("select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");
                             while ($dn = $j->fetch_assoc()) {
                                echo "<td align='center'>$dn[nilai]</td>";
                            }
                        echo "</tr>\n";
                    }
                    ?>

                </tbody>
            </table>
        </div>

<?php } ?>