<main>
    <div class="artikel container text-center mt-5 py-5">
        <h2 class="font-weight-bold pt-5">Artikel</h2>
        <hr class="line-title mx-auto">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>

    <div class="artikel-container container">
        <div class="row">
            <?php foreach ($data['artikel'] as $artikel) : ?>
                <div class="post col-lg-6 col-md-6 col-12" style="width: 300px;">
                    <div class="post-img">
                        <a href="<?= BASEURL; ?>/artikel/<?= $artikel['id_artikel'] ?>"><img class="img-fluid w-100" src="<?= BASEURL; ?>/img/artikel/<?= $artikel['gambar'] ?>"></a>
                    </div>
                    <h3 class="text-center font-weight-normal pt-3"><?= $artikel['judul'] ?></h3>
                    <p class="text-center"><?= $artikel['created_at'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>