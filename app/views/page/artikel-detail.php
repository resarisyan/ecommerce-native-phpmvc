<main>
    <div class="container text-center">
        <div class="content-area">
            <article class="post">
                <h1 class="entry-title"><?= $data['artikel']['judul'] ?></h1>
            </article>
        </div>
        <div class="entry-meta">
            <span class="posted-on"><?= $data['artikel']['created_at'] ?></span>
        </div>
        <div class="entry-img">
            <img class="img-artikel rounded" src="<?= BASEURL; ?>/img/artikel/<?= $data['artikel']['gambar'] ?>">
        </div>
        <div class="entry-content">
            <?= $data['artikel']['konten'] ?>
        </div>
</main>