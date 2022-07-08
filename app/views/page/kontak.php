<section class="container mt-5">
    <div class="row">
        <div class="col-sm-12 mb-4 col-md-5">
            <div class="border border-primary rounded-0" style="border: 1 px solid">
                <div class="card-header p-0">
                    <div class="bg-primary text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i>&nbsp;&nbsp;Hubungi Kami</h3>
                        <p class="m-0">Jika terdapat masalah silahkan hubungi kami melalui halaman kontak ini</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="<?= BASEURL; ?>/kontak/kirim" method="POST">
                        <div class="form-group mt-3">
                            <label for="judul">Judul</label>
                            <div class="input-group mb-2 mb-sm-0">
                                <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pesan">Isi Pesan</label>
                            <div class="input-group mb-2 mb-sm-0">
                                <textarea class="form-control" name="pesan" id="pesan" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-block rounded-0 py-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-sm-12 col-md-7">
            <!--Google map-->
            <div class="mb-4">
                <div id="map_canvas" data-latitude="-6.807512463118627" data-longitude="107.13986625227625"></div>

                <iframe src="https://maps.google.com/maps?q=cianjur&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <!--Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p>Jl. Pasirgede Raya, Bojongherang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43216</p>
                </div>
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                    <p>+62- 90000000</p>
                </div>
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                    <p>bukatoko@gmail.com</p>
                </div>
            </div>
        </div>
        <!--Grid column-->
    </div>
</section>