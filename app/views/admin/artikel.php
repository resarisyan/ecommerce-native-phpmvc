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
                            <a href="<?= BASEURL; ?>/kelolaartikel/tambah" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Refresh Data" onclick="location.reload()"><i class="fas fa-sync-alt"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Gambar</th>
                                        <th>Judul Artikel</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['artikel'] as $artikel) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td>
                                                <img src="<?= BASEURL ?>/img/artikel/<?= $artikel['gambar'];  ?>" width="200px" height="125">
                                            </td>
                                            <td><?= $artikel['judul'] ?></td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/kelolaartikel/ubah/<?= $artikel['id_artikel'];  ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?= BASEURL; ?>/kelolaartikel/hapus/<?= $artikel['id_artikel'];  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');">
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
    </section>
</div>