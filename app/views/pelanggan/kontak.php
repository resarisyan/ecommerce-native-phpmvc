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
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Balasan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['kontak'] as $kontak) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $kontak['judul'] ?></td>
                                            <td><?= $kontak['pesan'] ?></td>
                                            <td><?= $kontak['balas_pesan'] ?></td>
                                            <td>
                                                <?= ($kontak['balas_pesan'] == null) ?
                                                    '<span class="badge badge-warning">Belum Dibalas</span>' :
                                                    '<span class="badge badge-success">Sudah Dibalas</span>';
                                                ?>
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
    </section>
</div>