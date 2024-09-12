<div class="card">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Tambah Nilai Matriks</div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label class="control-label col-lg-2">Alternatif</label>
                <div class="col-lg-4">
                    <select name="id_alt" class="form-control">

                        <?php
                        include("config/koneksi.php");
                        $query = $conn->query("select * from alternatif");
                        while ($result = $query->fetch_assoc()) {
                        ?>

                            <option value="<?= $result['id_alternatif'] ?>">
                                <?= $result['nm_alternatif'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br />
            <hr />
            <div class="form-group">

                <?php
                $i = 1;
                $getKriteria = $conn->query("SELECT * FROM kriteria");
                //hitung jml kriteria		
                while ($data = $getKriteria->fetch_array()) {
                ?>

                    <div class="table-responsive">
                        <table align="left">
                            <tr>
                                <td width="200">
                                    <label>
                                        <?= $data['nama_kriteria']; ?>
                                    </label>
                                    <input type="hidden" name="id_krite<?= $i; ?>" value="<?= $data['id_kriteria']; ?>" />
                                </td>
                                <div class="col-md-8">
                                    <td width="80">
                                        <input type="radio" <?= $data['poin1'] == 0 ? 'disabled' : ''; ?> name="nilai<?= $i; ?>" value="<?= $data['poin1']; ?>" />
                                        <?= $data['poin1'] != 0 ? $data['poin1'] : ''; ?>
                                    </td>
                                    <td width="80">
                                        <input type="radio" <?= $data['poin2'] == 0 ? 'disabled' : ''; ?> name="nilai<?= $i; ?>" value="<?= $data['poin2']; ?>" />
                                        <?= $data['poin2'] != 0 ? $data['poin2'] : ''; ?>
                                    </td>
                                    <td width="80">
                                        <input type="radio" <?= $data['poin3'] == 0 ? 'disabled' : ''; ?> name="nilai<?= $i; ?>" value="<?= $data['poin3']; ?>" />
                                        <?= $data['poin3'] != 0 ? $data['poin3'] : ''; ?>
                                    </td>
                                    <td width="80">
                                        <input type="radio" <?= $data['poin4'] == 0 ? 'disabled' : ''; ?> name="nilai<?= $i; ?>" value="<?= $data['poin4']; ?>" />
                                        <?= $data['poin4'] != 0 ? $data['poin4'] : ''; ?>
                                    </td>
                                    <td width="80">
                                        <input type="radio" <?= $data['poin5'] == 0 ? 'disabled' : ''; ?> name="nilai<?= $i; ?>" value="<?= $data['poin5']; ?>" />
                                        <?= $data['poin5'] != 0 ? $data['poin5'] : ''; ?>
                                    </td>
                            </tr>

                        <?php
                        $i++;
                    }
                        ?>

                        <tr>
                            <td colspan=5 align="center">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary mt-2">
                            </td>
                        </tr>
                        </table>
                        <div>
                        </div>
                    </div>
        </form>
    </div>
</div>
                </div>
<div class="card">   
<div class="card-header">
        <div class="card-head-row">
                <a href="?k=hapusMatriks" class="btn btn-danger  btn-sm" onclick="return confirm('Hapus nilai matriks?')">
                    Hapus data matriks
                </a>
        </div>
    </div>             
<div class="card-body">
    
        <div class="table-responsive">
            <?php include "matriksDataNilai.php";?>
        </div>
    </div>
    </div>
    
<?php

$query =$conn->query("SELECT count(*) AS jml FROM kriteria");
$result =$query->fetch_array();
$jml_k=$result['jml'];

if(isset($_POST['simpan'])){
 
    $o=1;
    
    //cek id alternatif
    $id_alt=$_POST['id_alt'];
    $cek=mysqli_query($conn,"select * from alternatif where id_alternatif='$id_alt'");
    $cek_l=mysqli_num_rows($cek);
    if($cek_l>0){
        $del=mysqli_query($conn,"delete from nilai_matrik where id_alternatif='$id_alt'");
    }
    
    for($n=1;$n<=$jml_k;$n++){
        $id_k=$_POST['id_krite'.$o];
         $nilai_k=$_POST['nilai'.$o];
        
        
        $m=mysqli_query($conn,"insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");
        
        if($m){
           // echo "OK <br>";
         echo "<script> window.open('nilaiMatriks.php','_self');</script>";
        }
        
        $o++;
    }
    
    
    }
    ?>			