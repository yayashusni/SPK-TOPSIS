<?php
include "config/koneksi.php";
$query = $conn->query("SELECT count(*) AS jml FROM kriteria");
$result = $query->fetch_array();
$jml_k = $result['jml'];
?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">Alternatif</th>
                        <th colspan="<?= $jml_k; ?>" class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                        <?php
                        $q = $conn->query("SELECT * FROM kriteria");
                  
                        for ($j = 1; $j <= $jml_k; $j++) {
                            while ($r = $q->fetch_array()) {
                                echo "<th>";
                                # code...
                                echo "{$r['nama_kriteria']}</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $getKriteria = $conn->query("select * from alternatif order by id_alternatif asc;");
                    while ($data = $getKriteria->fetch_assoc()) {
                        echo "<tr>
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