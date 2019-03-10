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
        <li class="treeview <?php $arr=array('master-barang','master-customer','master-kendaraan','master-karyawan','master-driver','master-biaya-driver','master-tujuan','master-supplier','master-ban','master-rekening'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
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
            <li class="<?php if($this->uri->segment(1)=='master-rekening'){echo 'active';}?>"><a href="<?= base_url('master-rekening')?>">Rekening</a></li>
          </ul>
        </li>
        <li class="treeview <?php $arr=array('transaksi-pembelian-spare-part','transaksi-pemakaian-spare-part','transaksi-pembelian-ban','transaksi-pemakaian-ban','transaksi-biaya-kendaraan','transaksi-retur-pembelian-spare-part','transaksi-retur-pemakaian-spare-part','transaksi-input-bon','transaksi-input-kas','transaksi-input-upah','transaksi-katalog-kendaraan','transaksi-input-bon-sopir','transaksi-input-klaim-sopir','transaksi-kas-bon-sopir','transaksi-kas-bon-kantor','transaksi-tagihan','transaksi-tagihan-manual','transaksi-pelunasan-piutang','transaksi-kuitansi','transaksi-pembayaran-bon-klaim-sopir'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
          <a href="#"><i class="fa fa-cart-plus"></i> <span>Transaksi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(1)=='transaksi-pembelian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-pembelian-spare-part')?>">Pembelian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pemakaian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-pemakaian-spare-part')?>">Pemakaian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pembelian-ban'){echo 'active';}?>"><a href="<?= base_url('transaksi-pembelian-ban')?>">Pembelian Ban</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pemakaian-ban'){echo 'active';}?>"><a href="<?= base_url('transaksi-pemakaian-ban')?>">Pemakaian Ban</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-biaya-kendaraan'){echo 'active';}?>"><a href="<?= base_url('transaksi-biaya-kendaraan')?>">Biaya Kendaraan</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-retur-pembelian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-retur-pembelian-spare-part')?>">Retur Pembelian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-retur-pemakaian-spare-part'){echo 'active';}?>"><a href="<?= base_url('transaksi-retur-pemakaian-spare-part')?>">Retur Pemakaian Spare Part</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-input-bon'){echo 'active';}?>"><a href="<?= base_url('transaksi-input-bon')?>">Input Bon</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-input-kas'){echo 'active';}?>"><a href="<?= base_url('transaksi-input-kas')?>">Input Kas</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-input-upah'){echo 'active';}?>"><a href="<?= base_url('transaksi-input-upah')?>">Input Upah</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-katalog-kendaraan'){echo 'active';}?>"><a href="<?= base_url('transaksi-katalog-kendaraan')?>">Katalog Kendaraan</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-input-bon-sopir'){echo 'active';}?>"><a href="<?= base_url('transaksi-input-bon-sopir')?>">Input Bon Sopir</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-input-klaim-sopir'){echo 'active';}?>"><a href="<?= base_url('transaksi-input-klaim-sopir')?>">Input Klaim Sopir</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-kas-bon-sopir'){echo 'active';}?>"><a href="<?= base_url('transaksi-kas-bon-sopir')?>">Kas Bon Sopir</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-kas-bon-kantor'){echo 'active';}?>"><a href="<?= base_url('transaksi-kas-bon-kantor')?>">Kas Bon Kantor</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-tagihan'){echo 'active';}?>"><a href="<?= base_url('transaksi-tagihan')?>">Tagihan</a></li>
            <!-- <li class="<?php if($this->uri->segment(1)=='transaksi-tagihan-manual'){echo 'active';}?>"><a href="<?= base_url('transaksi-tagihan-manual')?>">Tagihan Manual</a></li> -->
            <li class="<?php if($this->uri->segment(1)=='transaksi-pelunasan-piutang'){echo 'active';}?>"><a href="<?= base_url('transaksi-pelunasan-piutang')?>">Pelunasan Piutang</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-kuitansi'){echo 'active';}?>"><a href="<?= base_url('transaksi-kuitansi')?>">Kuitansi</a></li>
            <li class="<?php if($this->uri->segment(1)=='transaksi-pembayaran-bon-klaim-sopir'){echo 'active';}?>"><a href="<?= base_url('transaksi-pembayaran-bon-klaim-sopir')?>">Pembayaran Bon/Klaim</a></li>
          </ul>
        </li>
        <li class="treeview <?php $arr=array('stok-ban','stok-spare-part'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
          <a href="#"><i class="fa fa-cubes"></i> <span>Stock</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1)=='stok-ban'){echo 'active';}?>><a href="<?= base_url('stok-ban')?>">Ban</a></li>
            <li <?php if($this->uri->segment(1)=='stok-spare-part'){echo 'active';}?>><a href="<?= base_url('stok-spare-part')?>">Barang</a></li>
          </ul>
        </li>
        <li class="treeview <?php $arr=array('laporan-master-barang','laporan-master-customer','laporan-master-kendaraan','laporan-master-karyawan','laporan-master-driver','laporan-master-biaya-driver','laporan-master-tujuan','laporan-master-supplier','laporan-master-ban'); if(in_array($this->uri->segment(1),$arr)){echo ' active';} ?>">
          <a href="#"><i class="fa fa-newspaper-o"></i> <span>Laporan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1)=='laporan-master-barang'){echo 'active';}?>><a href="<?= base_url('laporan-master-barang')?>">Barang</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-customer'){echo 'active';}?>><a href="<?= base_url('laporan-master-customer')?>">Customer</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-kendaraan'){echo 'active';}?>><a href="<?= base_url('laporan-master-kendaraan')?>">Kendaraan</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-karyawan'){echo 'active';}?>><a href="<?= base_url('laporan-master-karyawan')?>">Karyawan</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-sopir'){echo 'active';}?>><a href="<?= base_url('laporan-master-sopir')?>">Sopir</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-biaya-sopir'){echo 'active';}?>><a href="<?= base_url('laporan-master-biaya-sopir')?>">Biaya Sopir</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-tujuan'){echo 'active';}?>><a href="<?= base_url('laporan-master-tujuan')?>">Tujuan</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-supplier'){echo 'active';}?>><a href="<?= base_url('laporan-master-supplier')?>">Supplier</a></li>
            <li <?php if($this->uri->segment(1)=='laporan-master-ban'){echo 'active';}?>><a href="<?= base_url('laporan-master-ban')?>">Ban</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>