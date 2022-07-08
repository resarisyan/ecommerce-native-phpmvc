<main>
    <section class="container sproduct my-5 pt-5">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12">
                <img src="<?= BASEURL; ?>/img/produk/<?= $data['produk']['gambar'] ?>" class="img-fluid w-100 pb-1" id="MainImage">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $data['produk']['gambar'] ?>" class="img-thumbnail">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $data['produk']['gambar'] ?>" class="img-thumbnail">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $data['produk']['gambar'] ?>" class="img-thumbnail">
                    </div>
                    <div class="small-img-col">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $data['produk']['gambar'] ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <form action="<?= BASEURL ?>/keranjang/tambahkeranjang" method="POST">
                    <input type="hidden" name="idProduk" value="<?= $data['produk']['id_produk'] ?>">
                    <!-- <h6>Produk / T-Shirt</h6> -->
                    <h3 class="py-4"><?= $data['produk']['nama_produk'] ?></h3>
                    <h2>Rp. <?= number_format($data['produk']['harga'], 2, ".", ","); ?></h2>
                    <!-- <select class="my-3">
                    <option value="XL">XL</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="S">S</option>
                </select> -->
                    <input type="number" value="1" name="qty" min="1" max="100">
                    <button type="submit" class="cbtn buy-btn">Add To Cart</button>
                    <h4 class="mt-5 mb-5">Product Details</h4>
                    <span><?= $data['produk']['deskripsi'] ?></span>
                </form>
            </div>
        </div>
    </section>

    <section class="container my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h2 class="font-weight-bold pt-5">Related Product</h2>
            <hr class="line-title mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <?php $i = 0;
            foreach ($data['related'] as $related) :
                $i++;
                if ($i > 4) {
                    break;
                }
            ?>
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <a href="<?= BASEURL; ?>/produk/<?= $related['id_produk'] ?>"><img class="img-product mb-3" src="<?= BASEURL; ?>/img/produk/<?= $related['gambar'] ?>"></a>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?= $related['nama_produk'] ?></h5>
                    <h4 class="p-price">Rp. <?= number_format($related['harga'], 2, ".", ","); ?></h4>
                    <button class="cbtn buy-btn"><a href="<?= BASEURL; ?>/produk/<?= $related['id_produk'] ?>">Buy Now</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<script>
    const smallImage = Array.from(document.getElementsByClassName('img-thumbnail'));
    const mainImage = document.getElementById('MainImage')
    smallImage.forEach(smallimg => {
        smallimg.addEventListener('click', function handleClick(event) {
            console.log('smallimg clicked', event);
            mainImage.src = smallimg.src;
        });
    });
</script>