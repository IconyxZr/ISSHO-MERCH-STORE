<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- MENU DASHBOARD -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

        <!-- MENU TRANSAKSI -->
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check text-aqua"></i> <span>TRANSAKSI</span></a></li>

        <!-- MENU PRODUK -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>PRODUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

        <!-- MENU REKENING -->
        <li><a href="<?php echo base_url('admin/rekening') ?>"><i class="fa fa-dollar text-aqua"></i> <span>DATA REKENING</span></a></li>

        <!-- MENU USER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
          </ul>
        </li>

        <!-- MENU USER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-puzzle-piece"></i> Konfigurasi Icon</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
        <div class="box-body">