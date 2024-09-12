<div class="card">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Data Alternatif</div>
            <div class="card-tools">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm mr-2 " data-toggle="modal" data-target="#upload">
  Import
</button>
                <a href="?a=tambahAlternatif" class="btn btn-primary  btn-sm mr-2">
                    Tambah alternatif
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id Alternatif</th>
                        <th>Nama Alternatif</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include ("config/koneksi.php");
                    $query=$conn->query("select * from alternatif order by id_alternatif ASC");
                    while($result=$query->fetch_assoc()){
                    ?>

                    <tr>
                        <td>
                            <?= $result['id_alternatif']; ?>
                        </td>
                        <td>
                            <?= $result['nm_alternatif']; ?>
                        </td>
                        <td>
                            <a href="?k=ubahAlternatif&id=<?= $result['id_alternatif']; ?>"
                                class="btn btn-sm  btn-warning">Ubah</a>
                            <a href="?k=hapusalternatif&id=<?= $result['id_alternatif']; ?>"
                                class="btn btn-sm  btn-danger" onclick="return confirm('Hapus Alternatif?')">Hapus</a>
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

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM 
    });
</script>