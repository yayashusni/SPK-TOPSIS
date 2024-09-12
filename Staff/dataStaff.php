<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Data Staff</div>
                                        <?php if($level==='1'){ ?>
										<div class="card-tools">
											<a href="?a=tambahStaff" class="btn btn-primary  btn-sm mr-2">
												Tambah Staff
											</a>
										</div>
                                        <?php }?>
									</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table mt-3 table-sm">
            <thead>
                <tr>
                    <th>Id Staff</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Posisi Jabatan</th>
                    <?php if($level==='1'){?><th>Aksi</th><?php } ?>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                include "config/koneksi.php";
                $query = $conn->query("select * from users order by iduser ASC");
                while ($result = $query->fetch_array()) {
                ?>
                <tr>
                    <td>
                        <?= $result['iduser']; ?>
                    </td>
                    
                    <td>
                        <?= $result['nm_lengkap']; ?>
                    </td>
                    <td>
                        <?= $result['jk']==='L'?'Laki-laki':'Perempuan' ?>
                    </td>
                    <td>
                        <?= $result['posisi_jabatan']; ?>
                    </td>
                    <?php if($level==='1'){?>
                    <td>
                        <a href="?a=staff&k=ubahStaff&id=<?= $result['iduser']; ?>"
                            class="btn btn-sm btn-warning m-1">Ubah</a>
                        <a href="?k=hapus&id=<?= $result['iduser']; ?>"
                            class="btn btn-danger btn-sm  m-1" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                    <?php } ?>
                </tr>
                <?php
}
?>
            </tbody>
        </table>
</div>
    </div>
</div>