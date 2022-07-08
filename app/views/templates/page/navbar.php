<header>
    <div class="container-fluid border-bottom" style="background-color: #f7f7f7">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start px-5">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">About</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Contact</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Privacy Policy</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Terms of Service</a></li>
            </ul>
        </div>
    </div>

    <nav class="px-5 border-bottom navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="<?= BASEURL; ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none pe-3">
                <img class="bi me-2" height="32" src="<?= BASEURL; ?>/img/bukatoko.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form action="<?= BASEURL;  ?>/produk/cari" method="POST" class="px-2 d-flex pe-3 search-input" role="search">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" name="keyword" />
                        <button type=" button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li><a href="<?= BASEURL; ?>" class="nav-link px-2 text-dark">Home</a></li>
                    <li class="px-2 nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                <li><a class="dropdown-item" href="<?= BASEURL; ?>/kategori/<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="<?= BASEURL; ?>/artikel" class="nav-link px-2 text-dark">Artikel</a></li>
                    <li><a href="<?= BASEURL; ?>/about" class="nav-link px-2 text-dark">About</a></li>
                    <li><a href="<?= BASEURL; ?>/kontak" class="nav-link px-2 text-dark">Kontak</a></li>
                </ul>
                <div class="px-2 d-flex pe-3 text-end">
                    <a href="<?= BASEURL; ?>/login"><button type="button" class="btn btn-primary me-2">Login</button></a>
                    <a href="<?= BASEURL; ?>/signup"><button type="button" class="btn btn-warning me-2">Sign-up</button></a>
                    <a href="<?= BASEURL; ?>/keranjang" class="btn btn-primary me-2">
                        <span class="glyphicon glyphicon-shopping-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

</header>