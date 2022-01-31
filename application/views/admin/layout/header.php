<header class="main-header">

  <!-- Logo -->
  <a href="<?= base_url('admin/dashboard'); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>My</b>S</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>My</b> Store</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/upload/profile/') . $this->session->userdata('gambar'); ?>" class="user-image">
            <span class="hidden-xs"><?= $this->session->userdata('nama'); ?></span>

          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">

              <img src="<?= base_url('assets/upload/profile/') . $this->session->userdata('gambar'); ?>" class="img-circle img-thumbnail img-fluid">
              <p>

                <?= $this->session->userdata('nama'); ?> - <?= $this->session->userdata('akses_level'); ?>
                <small><?= date('d M Y'); ?></small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= base_url('admin/user/detail/') . $this->session->userdata('id_user'); ?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>

  </nav>
</header>