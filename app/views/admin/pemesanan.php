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
                                                <?php if ($pemesanan['status_pemesanan'] != '4') : ?>
                                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $pemesanan['id_pemesanan']; ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?= BASEURL; ?>/kelolapemesanan/detailpemesanan/<?= $pemesanan['id_pemesanan'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Detail Pemesanan">
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

        <!-- Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulModal">Edit Status Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/kelolapemesanan/ubahstatus" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="status">Status Pemesanan</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="0">Dibatalkan</option>
                                    <option value="1">Belum Diproses</option>
                                    <option value="2">Diproses</option>
                                    <option value="3">Dalam Perjalanan</option>
                                    <option value="4">Selesai</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>