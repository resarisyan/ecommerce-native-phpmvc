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
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/dashboardpelanggan">Dashboard</a></li>
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
                                        <th>Kode Pemesanan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($data['pemesanan'] as $pemesanan) : ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td>KD-<?= $pemesanan['id_pemesanan'] ?></td>
                                            <td><?= $pemesanan['tgl_pesan'] ?></td>
                                            <td>Rp.<?= number_format($pemesanan['total_bayar'], 2, ".", ","); ?></td>
                                            <td>
                                                <span>
                                                    <?php
                                                    if ($pemesanan['status_pemesanan'] == '1') {
                                                        $result = 'Belum Diproses';
                                                        $badge = 'badge-warning';
                                                    } else if ($pemesanan['status_pemesanan'] == '2') {
                                                        $result = 'Diproses';
                                                        $badge = 'badge-primary';
                                                    } else if ($pemesanan['status_pemesanan'] == '3') {
                                                        $result = 'Dalam Perjalanan';
                                                        $badge = 'badge-info';
                                                    } else if ($pemesanan['status_pemesanan'] == '4') {
                                                        $result = 'Selesai';
                                                        $badge = 'badge-success';
                                                    } else {
                                                        $result = 'Dibatalkan ';
                                                        $badge = 'badge-danger';
                                                    }
                                                    echo "<span class='badge $badge'>$result</span>";
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/cekpemesanan/detailpemesanan/<?= $pemesanan['id_pemesanan'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Detail Pemesanan">
                                                    <i class="fas fa-eye"></i>
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