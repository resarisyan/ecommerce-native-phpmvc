<?php
$url = (strtolower($data['judul']) == 'login admin' ? '/loginadmin' : '/login');
?>
<main>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg">
            <div class="col-md-6 d-none d-md-block side-img">
                <img src="<?= BASEURL; ?>/img/bglogin.jpg" class="img-fluid" style="min-height:100%;" />
            </div>
            <div class="col-md-6 bg-white p-5">
                <h3 class="pb-3">Login Form</h3>
                <div class="row">
                    <div class="col">
                        <?php Flasher::flash() ?>
                    </div>
                </div>
                <div class="form-style">
                    <form method="POST" action="<?php echo BASEURL;
                                                echo $url; ?>/masuk">
                        <div class="form-group pb-3">
                            <input type="text" placeholder="Username" class="form-control" name="username">
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center"><input name="remember" type="checkbox" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
                            <!-- <div><a href="#">Forget Password?</a></div> -->
                        </div>
                        <div class="pb-2">
                            <button type="submit" name="login" class="btn btn-dark w-100 font-weight-bold mt-2">Login</button>
                        </div>
                    </form>
                    <div class="sideline">OR</div>
                    <div class="pt-4 text-center">
                        <a href="<?= BASEURL; ?>/signup/">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>