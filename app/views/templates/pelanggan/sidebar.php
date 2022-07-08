  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?= BASEURL; ?>/img/logoadmin.png" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">BUKATOKO</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= BASEURL; ?>/admin-lte/dist/img/avatar6.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="javascript:void(0)" class="d-block"><?= strtoupper($_SESSION["nama"]) ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= BASEURL; ?>/dashboardadmin" class="nav-link <?= (strtolower($data['judul']) == 'dashboard') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= BASEURL; ?>/cekpemesanan" class="nav-link <?= (strtolower($data['judul']) == 'cek pemesanan') ? 'active' : '' ?>">
                          <i class="nav-icon fas fas fa-exchange-alt"></i>
                          <p>
                              Pemesanan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= BASEURL; ?>/cekkontak" class="nav-link <?= (strtolower($data['judul']) == 'cek kontak') ? 'active' : '' ?>"">
                          <i class=" nav-icon fas fa-address-book"></i>
                          <p>
                              Kontak
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>