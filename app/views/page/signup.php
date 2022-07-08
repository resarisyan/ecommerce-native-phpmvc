<main>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg">
            <div class="col-md-6 bg-white p-5">
                <h3 class="pb-3">Sign Up Form</h3>
                <div class="row">
                    <div class="col">
                        <?php Flasher::flash() ?>
                    </div>
                </div>
                <div class="form-style">
                    <form method="POST" action="<?= BASEURL; ?>/signup/daftar">
                        <div class="form-group pb-3">
                            <input type="text" placeholder="Nama" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="number" placeholder="No Telp" class="form-control" name="notelp" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="text" placeholder="Username" class="form-control" name="username" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Password" class="form-control" name="password" required>
                        </div>
                        <!-- <div class="form-group pb-3">
                            <input type="password" placeholder="Konfirmasi Password" class="form-control" name="passwordconfirm">
                        </div> -->
                        <div class="pb-2">
                            <button type="submit" name="signup" class="btn btn-dark w-100 font-weight-bold mt-2">Sign Up</button>
                        </div>
                    </form>
                    <div class="sideline">OR</div>
                    <div class="pt-4 text-center">
                        <a href="<?= BASEURL; ?>/login">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block side-img">
                <img src="<?= BASEURL; ?>/img/bglogin.jpg" class="img-fluid" style="min-height:100%;" />
            </div>
        </div>
    </div>
</main>