  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'dashboard') ? "" : "collapsed" ?>" href="dashboard">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
              <a class="nav-link <?php echo (uri_string() == 'pengguna') ? "" : "collapsed" ?>" href="pengguna">
                  <i class="bx bxs-user-detail"></i>
                  <span>Manajemen Pengguna</span>
              </a>
              <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
                  <i class="bx bxl-product-hunt"></i>
                  <span>manajemen Produk</span>
              </a>
              <a class="nav-link <?php echo (uri_string() == 'laporan') ? "" : "collapsed" ?>" href="laporan">
                  <i class="bx bxs-book-bookmark"></i>
                  <span>Laporan</span>
              </a>
              <a class="nav-link <?php echo (uri_string() == 'forum') ? "" : "collapsed" ?>" href="forum">
                  <i class="bx bxs-chat"></i>
                  <span>Forum</span>
              </a>
              <a class="nav-link <?php echo (uri_string() == 'berita') ? "" : "collapsed" ?>" href="berita">
                  <i class="bx bxs-news"></i>
                  <span>Cuaca & Berita Pertanian</span>
                  <!-- End Dashboard Nav -->
              </a>
              <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="profile">
                  <i class="bi bi-person"></i>
                  <span>profile</span>
                  <!-- End Dashboard Nav -->
              </a>

      </ul>

  </aside><!-- End Sidebar-->