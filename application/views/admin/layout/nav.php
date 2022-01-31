 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
     <!-- Sidebar user panel -->

     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu">
       <li class="header">MAIN NAVIGATION</li>
       <!-- Menu dashboard -->
       <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

       <!-- Menu transaksi -->
       <li><a href="<?= base_url('admin/transaksi'); ?>"><i class="fa fa-check"></i> <span>TRANSAKSI</span></a></li>
       <!-- Menu transaksi -->
       <li><a href="<?= base_url('admin/laporan'); ?>"><i class="fa fa-sticky-note-o"></i> <span>LAPORAN</span></a></li>

       <!-- Menu Produk -->
       <li class="treeview">
         <a href="#">
           <i class="fa fa-sitemap"></i> <span>PRODUK</span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?= base_url('admin/produk'); ?>"><i class="fa fa-table"></i> Data Produk</a></li>
           <li class="active"><a href="<?= base_url('admin/produk/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
           <li class="active"><a href="<?= base_url('admin/kategori'); ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
           <li class="active"><a href="<?= base_url('admin/ukuran'); ?>"><i class="fa fa-sitemap"></i> Ukururan Produk</a></li>
         </ul>
       </li>
       <!-- Menu rekening -->
       <li><a href="<?= base_url('admin/rekening'); ?>"><i class="fa fa-dollar"></i> <span>Data Rekening</span></a></li>

       <!-- Menu User -->
       <li class="treeview">
         <a href="#">
           <i class="fa fa-users"></i> <span>PENGGUNA</span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
           <li class="active"><a href="<?= base_url('admin/user/tambah'); ?>"><i class="fa fa-user-plus"></i> Tambah Pengguna</a></li>
         </ul>
       </li>

       <!-- User Profile -->
       <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i> <span>PROFILE</span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?= base_url('admin/user/detail/') . $this->session->userdata("id_user"); ?>"><i class="fa fa-user"></i> Detail Profile</a></li>
           <li class="active"><a href="<?= base_url('admin/user/editprofile/') . $this->session->userdata("id_user"); ?>"><i class="fa fa-cog"></i> Edit Profile</a></li>
           <li class="active"><a href="<?= base_url('admin/user/editpass/') . $this->session->userdata("id_user");; ?>"><i class="fa fa-edit"></i> Ganti Password</a></li>
         </ul>
       </li>

       <!-- Menu Konfigurasi -->
       <li class="treeview">
         <a href="#">
           <i class="fa fa-wrench"></i> <span>KONFIGURASI </span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="<?= base_url('admin/konfigurasi'); ?>"><i class="fa fa-home"></i> Konfigurasi Umun</a></li>
           <li class="active"><a href="<?= base_url('admin/konfigurasi/logo'); ?>"><i class="fa fa-image"></i>Konfigurasi Logo</a></li>
           <li class="active"><a href="<?= base_url('admin/konfigurasi/icon'); ?>"><i class="fa fa-home"></i>Konfigurasi Icon</a></li>

         </ul>
       </li>


     </ul>
   </section> <!-- /.sidebar -->
 </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <?= $title; ?>

     </h1>

   </section>
   <!-- Main content -->
   <section class="content">
     <!-- Info boxes -->
     <div class="row">
       <div class="col-xs-12">