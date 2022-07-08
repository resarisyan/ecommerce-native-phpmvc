<main>
    <div class="container-fluid px-5 p-3">
        <div class="row justify-content-md-center">

            <div class="col-lg-7 col-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        foreach ($data['produk'] as $produk) :
                            $i++;
                            if ($i > 3) {
                                break;
                            } ?>
                            <div class="carousel-item <?= ($i == 1) ? 'active' : '' ?>">
                                <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk']; ?>"><img src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar']; ?>" class="rounded d-block w-100" height="390"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5 col-12 slider-img">
                <div class="row">
                    <?php
                    $i = 0;
                    foreach ($data['produk'] as $produk) :
                        $i++;
                        if ($i > 2) {
                            break;
                        } ?>
                        <div class="col-12 mt-2">
                            <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk']; ?>" class="card-content">
                                <img src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar'] ?>" class="rounded" height="150" width="500">
                                <h6 class="mt-2"><?= $produk['nama_produk']; ?></h6>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <?php $i = 0;
            foreach ($data['produk_desc'] as $produk) :
                $i++;
                if ($i > 3) {
                    break;
                }
            ?>
                <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk']; ?>" class="card-content col-lg-3 col-md-4 col-12">
                    <div class="text-center">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar']; ?>" class="img-fluid rounded" width="400">
                        <h6 class="mt-2">
                            <?= $produk['nama_produk']; ?>
                        </h6>
                    </div>
                </a>
            <?php endforeach; ?>

            <section class="text-center justify-content-center mb-3 mt-5">
                <h3 class="text-primary">Belanja Berdasarkan Kategori</h3>
            </section>
            <div class="row mt-5 mb-2">
                <?php $i = 0;
                foreach ($data['kategori'] as $kategori) : ++$i;
                    if ($i > 12) {
                        break;
                    }
                ?>
                    <a href="<?= BASEURL; ?>/kategori/<?= $kategori['id_kategori'] ?>" class="card-content col-lg-2 col-md-4 col-6">
                        <div class="text-center">
                            <img src="<?= BASEURL; ?>/img/kategori/<?= $kategori['gambar_kategori'] ?>" class="img-fluid rounded" height="180" width="180">
                            <h6 class="mt-2">
                                <?= $kategori['nama_kategori'] ?>
                            </h6>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Explore  -->
            <section class="text-center justify-content-center mb-3 mt-5">
                <h3 class="text-primary">Produk Terbaru</h3>
                <p>Belanja produk terbaru dari toko kami sekarang</p>
                <button type="button" class="btn btn-primary btn-lg">Belanja Sekarang</button>
            </section>
            <div class="row justify-content-center">
                <?php
                $i = 0;
                foreach ($data['produk'] as $produk) : $i++;
                    if ($i > 6) {
                        break;
                    }
                ?>
                    <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk'] ?>" class="col-lg-2 col-md-4 col-6 box-card-content has-bounce m-2" style="padding: 0;">
                        <div class="box-card-content-image text-center">
                            <img src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar'] ?>" class="" width="180px">
                        </div>
                        <div class="box-card-content-small text-center">
                            <h5 class="m-2">
                                <?= $produk['nama_produk'] ?>
                            </h5>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Explore  -->
            <section class="text-center justify-content-center mb-3 mt-5">
                <h3 class="text-primary">Poduk Terfavorit</h3>
                <p>Cari barang yang anda sukai sekarang</p>
                <button type="button" class="btn btn-primary btn-lg">Cari Lebih Banyak</button>
            </section>
            <div class="row justify-content-center">
                <?php $i = 0;
                foreach ($data['produk'] as $produk) : $i++;
                    if ($i > 2) {
                        break;
                    } ?>
                    <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk'] ?>" class="col box-card-content has-bounce m-2" style="padding: 0;">
                        <div class="box-card-content-image">
                            <img src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar']; ?>" height="500px">
                        </div>
                        <div class="box-card-content-large">
                            <h3 class="m-2">
                                <?= $produk['nama_produk']; ?>
                            </h3>
                            <!-- <p class="m-2"><?= $produk['deskripsi']; ?></p> -->
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col">
                    <img src="<?= BASEURL; ?>/img/banner/b21.jpg" class="rounded img-fluid">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <i class="fas fa-bolt fa-2x text-primary"></i>
                    <h3 class="mt-2 text-primary">Proses Cepat</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>
                <div class="col text-center">
                    <i class="fas fa-clock fa-2x text-primary"></i>
                    <h3 class="mt-2 text-primary">Pelayanan 24 Jam</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>
                <div class="col text-center">
                    <i class="fas fa-user-alt fa-2x text-primary"></i>
                    <h3 class="mt-2 text-primary">Ramah Pengguna</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>
                <div class="col text-center">
                    <i class="fa-solid fa-certificate fa-2x text-primary"></i>
                    <h3 class="mt-2 text-primary">Barang Terjamin</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>
            </div>
        </div>
</main>