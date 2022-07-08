<?php
$url = ['login', 'sign up'];
if (!in_array(strtolower($data['judul']), $url)) : ?>
    <footer class="mt-5">
        <div style="background-color: #e6f1fc;">
            <div class="text-center pt-4 pb-4">
                <p>Punya Pertanyaan Mengenai Kami?</p>
                <a href="<?= BASEURL; ?>/kontak"><button type="button" class="btn btn-primary rounded-pill text-dark bg-white border-dark">Kontak Kami</button></a>
            </div>
            <div class="pt-2" style="background-color: #004f9a;">
                <ul class="d-flex justify-content-center text-white mt-5 list-unstyled">
                    <li class="px-3">About</li>
                    <li class="px-3">Contact</li>
                    <li class="px-3">Privacy Policy</li>
                    <li class="px-3">Terms of Service</li>
                </ul>
                <!-- Copyright -->
                <div class="text-center p-4 text-white">
                    © 2022 Copyright:
                    <a class="text-reset fw-bold" href="javascript:void(0)">BUKATOKO.COM</a>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.js"></script>
<script src="<?= BASEURL; ?>/admin-lte/plugins/toastr/toastr.min.js"></script>
<script src="<?= BASEURL; ?>/js/alert.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
<?php Flasher::flash() ?>
</body>

</html>