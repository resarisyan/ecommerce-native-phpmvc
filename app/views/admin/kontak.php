<script>
    let urlDelete = "<?= BASEURL; ?>/kelolakontak/hapus/";
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $data['judul']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/dashboardadmin">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $data['judul']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Refresh Data" onclick="location.reload()"><i class="fas fa-sync-alt"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Pengirim</th>
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['kontak'] as $kontak) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $kontak['nama'] ?></td>
                                            <td><?= $kontak['judul'] ?></td>
                                            <td><?= $kontak['pesan'] ?></td>
                                            <td>
                                                <?= ($kontak['balas_pesan'] == null) ?
                                                    '<span class="badge badge-warning">Belum Dibalas</span>' :
                                                    '<span class="badge badge-success">Sudah Dibalas</span>';
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($kontak['balas_pesan'] == null) : ?>
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm tampilModalBalas" title="Balas Pesan" data-toggle="modal" data-target="#formModal" data-id="<?= $kontak['id_kontak']; ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus Data" onclick="ajaxDelete(<?= $kontak['id_kontak']; ?>)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Balas Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/kelolakontak/balaspesan" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="pesan">Balasan Pesan</label>
                                <textarea class="form-control" id="pesan" rows="3" name="pesan" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>