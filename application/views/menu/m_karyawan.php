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
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Master Karyawan</h3>
            </div>
            <form role="form" id="form-karyawan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_karyawan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_karyawan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat_karyawan" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" name="kota_karyawan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="tlp_karyawan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Uang Makan</label>
                  <input type="text" name="upah_makan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Upah Harian</label>
                  <input type="text" name="upah_harian" class="form-control">
                </div>
                <div class="form-group">
                  <label>Upah Hari Besar</label>
                  <input type="text" name="upah_hari_besar" class="form-control">
                </div>
                <div class="form-group">
                  <label>Upah Hari Minggu</label>
                  <input type="text" name="upah_hari_minggu" class="form-control">
                </div>
                <div class="form-group">
                  <label>Minimum Jam Lembur</label>
                  <input type="text" name="min_jam_lembur" class="form-control">
                </div>
                <div class="form-group">
                  <label>Upah Lembur per Jam</label>
                  <input type="text" name="upah_lembur" class="form-control">
                </div>
                <div class="form-group">
                  <label>Gaji Bulanan</label>
                  <input type="text" name="gaji_bulanan" class="form-control">
                </div>
                <div class="form-group">
                  <label>6x Kerja Penuh</label>
                  <input type="text" name="kerja_penuh_6x" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="m_karyawan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Gaji/Upah</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/footer.php' ;?>
  <?php include 'application/views/layout/controlsidebar.php' ;?>
  <?php include 'application/views/layout/jspack.php' ;?>

  <script>
    $(function ()
    {
      tbKaryawan();
    })
    function tbKaryawan()
    {
      table = $('#m_karyawan').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mKaryawan')?>",
          "type": "POST",
          },
        "columnDefs": [
          { 
            "targets": [ 0 ],
            "orderable": false,
          },
          {
            "className": "text-center", "targets": ['_all']
          }
        ],
      });
    }
    function reloadTb()
    {
      table.ajax.reload(null,false);
    }
    function add()
    {
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addKaryawan')?>':'<?= site_url('Crud/updKaryawan')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-karyawan').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Karyawan');
            $('#form-karyawan')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Karyawan');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKaryawan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_karyawan"]').val(data.kode_karyawan);
          $('[name="nama_karyawan"]').val(data.nama_karyawan);
          $('[name="alamat_karyawan"]').val(data.alamat_karyawan);
          $('[name="kota_karyawan"]').val(data.kota_karyawan);
          $('[name="tlp_karyawan"]').val(data.tlp_karyawan);
          $('[name="upah_makan"]').val(data.upah_makan);
          $('[name="upah_harian"]').val(data.upah_harian);
          $('[name="upah_hari_besar"]').val(data.upah_hari_besar);
          $('[name="upah_hari_minggu"]').val(data.upah_hari_minggu);
          $('[name="min_jam_lembur"]').val(data.min_jam_lembur);
          $('[name="upah_lembur"]').val(data.upah_lembur);
          $('[name="gaji_bulanan"]').val(data.gaji_bulanan);
          $('[name="kerja_penuh_6x"]').val(data.kerja_penuh_6x);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
  </script>