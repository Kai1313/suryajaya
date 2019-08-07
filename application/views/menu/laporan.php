<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $page_header ;?>
        <small><?php if(isset($page_desc)){echo $page_desc;}?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div>
        <a href="<?= base_url('Crud/laporanStokBanBaru'); ?>">Laporan Stok Ban Baru</a><br>
        <a href="<?= base_url('Crud/laporanStokBanTerpasang'); ?>">Laporan Stok Ban Terpasang</a><br>
        <a href="<?= base_url('Crud/laporanStokBanTerpakai'); ?>">Laporan Stok Ban Terpakai</a><br>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/footer.php' ;?>
  <?php include 'application/views/layout/controlsidebar.php' ;?>
  <?php include 'application/views/layout/jspack.php' ;?>