<script>
    let urlStatus = "<?= BASEURL; ?>/kelolapelanggan/editstatus/";
    let urlDelete = "<?= BASEURL; ?>/kelolapelanggan/hapus/";
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
                                        <th>Nama Pelanggan</th>
                                        <th>Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['pelanggan'] as $pelanggan) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $pelanggan['nama'] ?></td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="<?= ($pelanggan['status_pelanggan'] == 1) ? 'Aktif' : 'Tidak Aktif' ?>" onclick="ajaxStatus(<?= $pelanggan['id_pelanggan'] ?>)">
                                                    <?= ($pelanggan['status_pelanggan'] == '0') ?
                                                        '<span class="badge badge-danger">Tidak Aktif</span>'
                                                        :
                                                        '<span class="badge badge-success">Aktif</span>'
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus Data" onclick="ajaxDelete(<?= $pelanggan['id_pelanggan']; ?>)">
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
</div>