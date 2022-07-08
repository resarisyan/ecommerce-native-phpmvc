<script>
    let urlStatus = "<?= BASEURL; ?>/kelolaproduk/editstatus/";
    let urlDelete = "<?= BASEURL; ?>/kelolaproduk/hapus/";
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
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm tombolTambahData" data-toggle="modal" data-target="#formModal"><i class="fas fa-plus"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Refresh Data" onclick="location.reload()"><i class="fas fa-sync-alt"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 5%;">No</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Desikripsi</th>
                                        <th>Status</th>
                                        <th style="text-align: center; width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['produk'] as $produk) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td>
                                                <img src="<?= BASEURL ?>/img/produk/<?= $produk['gambar'];  ?>" width="200px" height="125">
                                            </td>
                                            <td><?= $produk['nama_produk'] ?></td>
                                            <td>Rp.<?= number_format($produk['harga'], 2, ".", ",");  ?></td>
                                            <td><?= $produk['nama_kategori'] ?></td>
                                            <td><?= $produk['deskripsi'] ?></td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="<?= ($produk['status_produk'] == 1) ? 'Aktif' : 'Tidak Aktif' ?>" onclick="ajaxStatus(<?= $produk['id_produk'] ?>)">
                                                    <?= ($produk['status_produk'] == '0') ?
                                                        '<span class="badge badge-danger">Tidak Aktif</span>'
                                                        :
                                                        '<span class="badge badge-success">Aktif</span>'
                                                    ?>
                                                </a>
                        </div>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm tampilModalUbah" title="Ubah Data" data-toggle="modal" data-target="#formModal" data-id="<?= $produk['id_produk']; ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus Data" onclick="ajaxDelete(<?= $produk['id_produk']; ?>)">
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
                <h5 class="modal-title" id="judulModal">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kelolaproduk/tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="gambarLama" id="gambarLama">

                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Unduh Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="imgPreview()">
                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                        </div>
                        <span class="help-block text-danger"></span>
                        <img class="img-preview img-fluid mt-3 mb-3" width="100%" height="250px" src="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>