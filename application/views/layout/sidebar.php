<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url()?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if($this->uri->segment(1)=='dashboard'){echo 'active';}?>"><a href="<?= base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashoard</span></a></li>
        <li class="treeview <?php $arr=array('master-barang','master-customer','master-kendaraan','master-karyawan','master-driver','master-biaya-driver','master-tujuan','master-supplier','master-ban'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
          <a href="#"><i class="fa fa-database"></i> <span>Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=='master-barang'){echo 'active';}?>"><a href="<?= base_url('master-barang')?>">Barang</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-customer'){echo 'active';}?>"><a href="<?= base_url('master-customer')?>">Customer</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-kendaraan'){echo 'active';}?>"><a href="<?= base_url('master-kendaraan')?>">Kendaraan</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-karyawan'){echo 'active';}?>"><a href="<?= base_url('master-karyawan')?>">Karyawan</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-driver'){echo 'active';}?>"><a href="<?= base_url('master-driver')?>">Sopir</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-biaya-driver'){echo 'active';}?>"><a href="<?= base_url('master-biaya-driver')?>">Biaya Sopir</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-tujuan'){echo 'active';}?>"><a href="<?= base_url('master-tujuan')?>">Tujuan</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-supplier'){echo 'active';}?>"><a href="<?= base_url('master-supplier')?>">Supplier</a></li>
            <li class="<?php if($this->uri->segment(1)=='master-ban'){echo 'active';}?>"><a href="<?= base_url('master-ban')?>">Ban</a></li>
          </ul>
        </li>
        <li class="treeview <?php $arr=array('transaksi-pembelian-spare-part','transaksi-pemakaian-spare-part','transaksi-pembelian-ban'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
          <a href="#"><i class="fa fa-cart-plus"></i> <span>Transaksi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=='transaksi-pembelian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-pembelian-spare-part')?>">Pembelian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pemakaian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-pemakaian-spare-part')?>">Pemakaian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pembelian-ban'){echo 'active';}?>"><a href="<?= base_url('transaksi-pembelian-ban')?>">Pembelian Ban</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cubes"></i> <span>Stock</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Ban</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-newspaper-o"></i> <span>Laporan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Barang</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>