<div class="card">
    <div class="card-header">
        <div class="card-head-row">
										<div class="card-title">Data kriteria</div>
										<div class="card-tools">
                                        <button type="button" class="btn btn-success btn-sm mr-2 " data-toggle="modal" data-target="#upload">
  Import
</button>
											<a href="?a=tambah" class="btn btn-primary btn-primary btn-sm mr-2">
												Tambah kriteria
											</a>
										</div>
									</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table mt-3 ">
            <thead>
                <tr>
                    <th>Id Kriteria</th>
                    <th class="w-25">Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Poin 1</th>
                    <th>Poin 2</th>
                    <th>Poin 3</th>
                    <th>Poin 4</th>
                    <th>Poin 5</th>
                    <th>Sifat Kriteria</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config/koneksi.php";
                $query = $conn->query("select * from kriteria order by id_kriteria ASC");
                while ($result = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?= $result['id_kriteria']; ?>
                    </td>
                    <td>
                        <?= $result['nama_kriteria']; ?>
                    </td>
                    <td>
                        <?= $result['bobot']; ?>
                    </td>
                    <td>
                        <?= $result['poin1']; ?>
                    </td>
                    <td>
                        <?= $result['poin2']; ?>
                    </td>
                    <td>
                        <?= $result['poin3']; ?>
                    </td>
                    <td>
                        <?= $result['poin4']; ?>
                    </td>
                    <td>
                        <?= $result['poin5']; ?>
                    </td>
                    <td>
                        <?= $result['sifat']; ?>
                    </td>
                    <td>
                        <a href="?a=kriteria&k=ubah&id=<?= $result['id_kriteria']; ?>"
                            class="btn btn-sm btn-warning m-1 ">Ubah</a>
                        <a href="?k=hapus&id=<?= $result['id_kriteria']; ?>"
                            class="btn btn-danger btn-sm  m-1" onclick="return confirm('Hapus Kriteria?')" >Hapus</a>
                    </td>
                </tr>
                <?php
}
?>
            </tbody>
        </table>
</div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Import Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                   <form action="?k=upload" enctype="multipart/form-data" method="post">
                   <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name='upload' value='Upload File'  class="btn btn-sm btn-primary">Upload</button>
            </div>
        </form>
        </div>
    </div>
</div>
