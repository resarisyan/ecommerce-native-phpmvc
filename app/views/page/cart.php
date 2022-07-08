<?php
$totalBayarProduk = 0;
$jumlahProduk = 0;

foreach ($data['keranjang'] as $keranjang) :
    $jumlahProduk += 1;
    $totalBayarProduk += $keranjang['total'];
endforeach;
$ongkir = ($totalBayarProduk * 2.5) / 100;
$totalBayar = $totalBayarProduk + $ongkir;
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
                <div class="row mt-5 gx-3">
                    <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
                        <h2 class="cart-title py-4 font-weight-bold">Cart (<?= $jumlahProduk ?> Produk)</h2>
                        <?php foreach ($data['keranjang'] as $keranjang) :  ?>
                            <div class="card p-4">
                                <div class="row">
                                    <div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                                        <img src="<?= BASEURL; ?>/img/produk/<?= $keranjang['gambar'] ?>" class="img-fluid" alt="cart img">
                                    </div>
                                    <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                                        <div class="row">
                                            <div class="col-6 card-title">
                                                <h1 class="mb-4 product_name"><?= $keranjang['nama_produk'] ?></h1>
                                                <!-- <p class="cart-text" class="mb-2">SHIRT - BLUE</p>
                                                <p class="cart-text" class="mb-2">COLOR: BLUE</p>
                                                <p class="cart-text" class="mb-3">SIZE: M</p> -->
                                                <p class="cart-text" class="mb-2">QTY: <?= $keranjang['qty'] ?></p>
                                            </div>

                                            <!-- <div class="col-6">
                                                <ul class="pagination justify-content-end set_quantity">
                                                    <li class="page-item">
                                                        <button class="page-link " onclick="decreaseNumber('textbox','itemval')">
                                                            <i class="fas fa-minus"></i> </button>
                                                    </li>
                                                    <li class="page-item"><input type="text" name="" class="page-link" value="<?= $keranjang['qty'] ?>" id="textbox">
                                                    </li>
                                                    <li class="page-item">
                                                        <button class="page-link" onclick="increaseNumber('textbox','itemval')"> <i class="fas fa-plus"></i></button>
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </div>

                                        <div class="row">
                                            <div class="col-8 d-flex justify-content-between remove_wish">
                                                <p class="cart-text"><i class="fas fa-trash-alt"></i> REMOVE ITEM</p>
                                                <p class="cart-text"><i class="fas fa-heart"></i>MOVE TO WISH LIST </p>
                                            </div>
                                            <div class="col-4 d-flex justify-content-end price_money">
                                                <h5>Rp.<span id="itemval"><?= number_format($keranjang['total'], 2, ".", ","); ?></span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        <?php endforeach; ?>
                    </div>
                    <!-- right side div -->
                    <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
                        <div class="right_side p-3 shadow bg-white">
                            <h2 class="cart-title product_name mb-5">Total Pembayaran</h2>
                            <div class="price_indiv d-flex justify-content-between">
                                <p class="cart-text">Pembayaran Produk</p>
                                <p class="cart-text">Rp.<span id="product_total_amt"><?= number_format($totalBayarProduk, 2, ".", ","); ?></span></p>
                            </div>
                            <div class="price_indiv d-flex justify-content-between">
                                <p class="cart-text">Ongkos Kirim</p>
                                <p class="cart-text">Rp.<span id="shipping_charge"><?= number_format($ongkir, 2, ".", ","); ?></span></p>
                            </div>
                            <hr />
                            <div class="total-amt d-flex justify-content-between font-weight-bold">
                                <p class="cart-text">Total Pembayaran Keseluruhan</p>
                                <p class="cart-text">Rp.<span id="total_cart_amt"><?= number_format($totalBayar, 2, ".", ","); ?></span></p>
                            </div>
                            <?php if ($jumlahProduk != 0) :  ?>
                                <form action="<?= BASEURL; ?>/pemesanan/" method="POST">
                                    <div class="form-group">
                                        <label for="alamat">Alamat Kirim</label>
                                        <textarea required class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea required class="form-control" id="catatan" rows="3" name="catatan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pembayaran">Metode Pembayaran</label>
                                        <select required id="pembayaran" class="form-control" name="pembayaran">
                                            <option selected value="1">Cash</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="mt-2 btn btn-primary text-uppercase">Checkout</button>
                                </form>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    var product_total_amt = document.getElementById('product_total_amt');
    var shipping_charge = document.getElementById('shipping_charge');
    var total_cart_amt = document.getElementById('total_cart_amt');
    var discountCode = document.getElementById('discount_code1');
    const decreaseNumber = (incdec, itemprice) => {
        var itemval = document.getElementById(incdec);
        var itemprice = document.getElementById(itemprice);
        console.log(itemprice.innerHTML);
        // console.log(itemval.value);
        if (itemval.value <= 0) {
            itemval.value = 0;
            alert('Negative quantity not allowed');
        } else {
            itemval.value = parseInt(itemval.value) - 1;
            itemval.style.background = '#fff';
            itemval.style.color = '#000';
            itemprice.innerHTML = parseInt(itemprice.innerHTML) - 15;
            product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) - 15;
            total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
        }
    }
    const increaseNumber = (incdec, itemprice) => {
        var itemval = document.getElementById(incdec);
        var itemprice = document.getElementById(itemprice);
        // console.log(itemval.value);
        if (itemval.value >= 5) {
            itemval.value = 5;
            alert('max 5 allowed');
            itemval.style.background = 'red';
            itemval.style.color = '#fff';
        } else {
            itemval.value = parseInt(itemval.value) + 1;
            itemprice.innerHTML = parseInt(itemprice.innerHTML) + 15;
            product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) + 15;
            total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
        }
    }
</script>