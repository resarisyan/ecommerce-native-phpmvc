<main>
    <section class="page-header">
        <h2>#StayAtHome</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, placeat!</p>
    </section>

    <section class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h2 class="font-weight-bold pt-5">Cari Produk</h2>
            <hr class="line-title mx-auto">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php
            if ($data['produk'] == null) { ?>
                <div class="product text-center col">
                    <h3 class="font-weight-bold">Produk Kosong!</h3>
                </div>
                <?php } else {
                foreach ($data['produk'] as $produk) :
                ?>
                    <div class="product text-center col-lg-3 col-md-4 col-12">
                        <a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk'] ?>"><img class="img-product mb-3" src="<?= BASEURL; ?>/img/produk/<?= $produk['gambar'] ?>"></a>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?= $produk['nama_produk'] ?></h5>
                        <h4 class="p-price">Rp. <?= number_format($produk['harga'], 2, ".", ","); ?></h4>
                        <button class="cbtn buy-btn"><a href="<?= BASEURL; ?>/produk/<?= $produk['id_produk'] ?>"> Buy Now</a></button>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php } ?>
    </section>
</main>