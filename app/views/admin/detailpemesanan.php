<?php
// if ($id) :
//     $id = $id[0]->kd_pemesanan;
//    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> &nbsp; Cetak</a>
// endif;
?>

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
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/kelolaproduk">Kelola Produk</a></li>
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

                            <a href="<?= BASEURL; ?>/kelolapemesanan" class="btn btn-primary btn-sm"><i class="fas fa-chevron-left"></i> &nbsp; Kembali</a>
                        </div>
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['pemesanan'] as $pemesanan) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $pemesanan['nama_produk'] ?></td>
                                            <td>Rp.<?= number_format($pemesanan['harga'], 2, ".", ","); ?></td>
                                            <td><?= $pemesanan['qty'] ?></td>
                                            <td>Rp.<?= number_format($pemesanan['total'], 2, ".", ","); ?></td>
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