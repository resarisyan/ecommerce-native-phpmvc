<?php
$judul = "";
$konten = "";
$gambar = "";
$id = "";
$url = BASEURL . "/kelolaartikel/tambah/save";
if (isset($data['artikel'])) {
    $judul = $data['artikel']['judul'];
    $konten = $data['artikel']['konten'];
    $gambar = $data['artikel']['gambar'];
    $id = $data['artikel']['id_artikel'];
    $url = BASEURL . "/kelolaartikel/ubah/" . $id . "/save";
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $data['judul'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/dashboardadmin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/kelolaartikel">Kelola Artikel</a></li>
                        <li class="breadcrumb-item active"><?= $data['judul'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                    <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $gambar; ?>">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <div class="form-group">
                                <label for="judul">Judul Artikel</label>
                                <input type="text" class="form-control" id="judul" placeholder="Masukan Judul" name="judul" value="<?= $judul; ?>">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Artikel</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="imgPreview()">
                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                </div>
                                <span class="help-block text-danger"></span>
                                <img class="img-preview img-fluid mt-3 mb-3" width="100%" height="250px" src="">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <label for="summernote">Isi Konten</label>
                            <textarea id="summernote" name="konten">
                                <?= $konten; ?>
                            </textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>