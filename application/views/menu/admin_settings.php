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
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="settings" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">BKL Ban Dalam</th>
                    <th class="text-center">BKL Ban Luar</th>
                    <th class="text-center">BKL Marset Ban</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Satuan Kas Bon</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Setting Umum</h3>
            </div>
            <form role="form" id="form-settings">
              <div class="box-body">
                <input type="hidden" name="id" value="1">
                <div class="form-group">
                  <label>BKL Ban Dalam</label>
                  <input type="text" name="bkl_ban_dalam" class="form-control">
                </div>
                <div class="form-group">
                  <label>BKL Ban Luar</label>
                  <input type="text" name="bkl_ban_luar" class="form-control">
                </div>
                <div class="form-group">
                  <label>BKL Marset Ban</label>
                  <input type="text" name="bkl_marset" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" name="kota" class="form-control">
                </div>
                <div class="form-group">
                  <label>Provinsi</label>
                  <input type="text" name="provinsi" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kodepos</label>
                  <input type="text" name="kodepos" class="form-control">
                </div>
                <div class="form-group">
                  <label>Satuan Kasbon</label>
                  <input type="text" name="satuan_kasbon" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Bonus Upah Harian</label>
                  <input type="text" name="bonus_harian" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="no_telepon" class="form-control">
                </div>
                <div class="form-group">
                  <label>Fax</label>
                  <input type="text" name="no_fax" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Setting Umum</h3>
            </div>
            <form role="form" id="form-settings-1">
              <div class="box-body">
                <input type="hidden" name="id" value="1">
                <div class="form-group">
                  <label>Solar Jkt - Sby</label>
                  <input type="text" name="solar_jktsby" class="form-control">
                </div>
                <div class="form-group">
                  <label>Solar Sby - Jkt</label>
                  <input type="text" name="solar_sbyjkt" class="form-control">
                </div>
                <div class="form-group">
                  <label>Solar Naik</label>
                  <input type="text" name="solar_naik" class="form-control">
                </div>
                <div class="form-group">
                  <label>Retribusi Bak</label>
                  <input type="text" name="retribusi_bak" class="form-control">
                </div>
                <div class="form-group">
                  <label>Retribusi Tangki</label>
                  <input type="text" name="retribusi_tangki" class="form-control">
                </div>
                <div class="form-group">
                  <label>Stut Jkt - Sby</label>
                  <input type="text" name="stut_jktsby" class="form-control">
                </div>
                <div class="form-group">
                  <label>Stut Sby - Jkt</label>
                  <input type="text" name="stut_sbyjkt" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nginap Sby</label>
                  <input type="text" name="nginap_sby" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nginap Jkt</label>
                  <input type="text" name="nginap_jkt" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Biaya Jalan per-Kg</label>
                  <input type="text" name="biaya_perkg" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Bantuan</label>
                  <input type="text" name="bantuan" class="form-control">
                </div>
                <div class="form-group">
                  <label>BKR 2 T</label>
                  <input type="text" name="bkr2t" class="form-control">
                </div>
                <div class="form-group">
                  <label>Ngepok</label>
                  <input type="text" name="ngepok" class="form-control">
                </div>
                <div class="form-group">
                  <label>Uang Kernet</label>
                  <input type="text" name="uang_kernet" class="form-control">
                </div>
                <div class="form-group">
                  <label>Denda 1</label>
                  <input type="text" name="denda_a" class="form-control">
                </div>
                <div class="form-group">
                  <label>Denda 2</label>
                  <input type="text" name="denda_b" class="form-control">
                </div>
                <div class="form-group">
                  <label>Denda 3</label>
                  <input type="text" name="denda_c" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="addKiri()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Setting Umum</h3>
            </div>
            <form role="form" id="form-settings-2">
              <div class="box-body">
                <input type="hidden" name="id" value="1">
                <div class="form-group">
                  <label>Batas Kg Bak Sby - Jkt</label>
                  <input type="text" name="batas_kgbaksbyjkt" class="form-control">
                </div>
                <div class="form-group">
                  <label>Batas Kg Bak Jkt - Sby</label>
                  <input type="text" name="batas_kgbakjktsby" class="form-control">
                </div>
                <div class="form-group">
                  <label>Harga Batas Kg Bak</label>
                  <input type="text" name="harga_bataskgbak" class="form-control">
                </div>
                <div class="form-group">
                  <label>Batas Kg Tangki</label>
                  <input type="text" name="batas_kgtangki" class="form-control">
                </div>
                <div class="form-group">
                  <label>Harga Batas Kg Tangki</label>
                  <input type="text" name="harga_bataskgtangki" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kelebihan Berat Bak Sby - Jkt</label>
                  <input type="text" name="beratlebih_baksbyjkt" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kelebihan Berat Bak Jkt - Sby</label>
                  <input type="text" name="beratlebih_bakjktsby" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kelebihan Berat Tangki</label>
                  <input type="text" name="beratlebih_tangki" class="form-control">
                </div>
                <div class="form-group">
                  <label>Pulang Kosong 1</label>
                  <input type="text" name="pulang_kosonga" class="form-control">
                </div>
                <div class="form-group">
                  <label>Pulang Kosong 2</label>
                  <input type="text" name="pulang_kosongb" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Pulang Kosong 3</label>
                  <input type="text" name="pulang_kosongc" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Bon Jakarta 1</label>
                  <input type="text" name="bon_jkta" class="form-control">
                </div>
                <div class="form-group">
                  <label>Bon Jakarta 2</label>
                  <input type="text" name="bon_jktb" class="form-control">
                </div>
                <div class="form-group">
                  <label>Bon Jakarta 3</label>
                  <input type="text" name="bon_jktc" class="form-control">
                </div>
                <div class="form-group">
                  <label>Bon Jakarta 4</label>
                  <input type="text" name="bon_jktd" class="form-control">
                </div>
                <div class="form-group">
                  <label>Bon Jakarta 5</label>
                  <input type="text" name="bon_jkte" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tabungan Sopir</label>
                  <input type="text" name="tab_sopir" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="addKanan()">Simpan</button>
                </div>
              </div>
            </form>
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
      tbSettings();
      $('.num').number(true,2);
      getSettings(1);
    })
    function tbSettings()
    {
      table = $('#settings').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/adminSettings')?>",
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
        "dom": 'Bfrtip',
          "buttons": 
          {
            "dom": 
            {
              "button": 
              {
                "tag": 'button',
                "className": 'btn btn-sm btn-info'
              }
            },
            "buttons": ['excelHtml5','print']
          }
      });
    }
    function reloadTb()
    {
      table.ajax.reload(null,false);
    }
    function add()
    {
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/adminSettings')?>',
        data: $('#form-settings').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Update Settings');
            $('#form-settings')[0].reset();
            reloadTb();
            getSettings(1);
          }
          else
          {
            alert('Gagal Update Settings');
          }
        }
      });
    }
    function addKiri()
    {
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/adminSettingsKiri')?>',
        data: $('#form-settings-1').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Update Settings');
            $('#form-settings-1')[0].reset();
            reloadTb();
            getSettings(1);
          }
          else
          {
            alert('Gagal Update Settings');
          }
        }
      });
    }
    function addKanan()
    {
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/adminSettingsKanan')?>',
        data: $('#form-settings-2').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Update Settings');
            $('#form-settings-2')[0].reset();
            reloadTb();
            getSettings(1);
          }
          else
          {
            alert('Gagal Update Settings');
          }
        }
      });
    }
    function getSettings(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getSettings/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="id"]').val(data.id);
          $('[name="bkl_ban_dalam"]').val(data.bkl_ban_dalam);
          $('[name="bkl_ban_luar"]').val(data.bkl_ban_luar);
          $('[name="bkl_marset"]').val(data.bkl_marset);
          $('[name="nama"]').val(data.nama);
          $('[name="alamat"]').val(data.alamat);
          $('[name="kota"]').val(data.kota);
          $('[name="provinsi"]').val(data.provinsi);
          $('[name="kodepos"]').val(data.kodepos);
          $('[name="no_telepon"]').val(data.no_telepon);
          $('[name="no_fax"]').val(data.no_fax);
          $('[name="satuan_kasbon"]').val(data.satuan_kasbon);
          $('[name="bonus_harian"]').val(data.bonus_upah_harian);
          $('[name="solar_jktsby"]').val(data.solar_jktsby);
          $('[name="solar_sbyjkt"]').val(data.solar_sbyjkt);
          $('[name="solar_naik"]').val(data.solar_naik);
          $('[name="retribusi_bak"]').val(data.retribusi_bak);
          $('[name="retribusi_tangki"]').val(data.retribusi_tangki);
          $('[name="stut_jktsby"]').val(data.stut_jktsby);
          $('[name="stut_sbyjkt"]').val(data.stut_sbyjkt);
          $('[name="nginap_sby"]').val(data.nginap_sby);
          $('[name="nginap_jkt"]').val(data.nginap_jkt);
          $('[name="biaya_perkg"]').val(data.biaya_perkg);
          $('[name="bantuan"]').val(data.bantuan);
          $('[name="bkr2t"]').val(data.bkr2t);
          $('[name="ngepok"]').val(data.ngepok);
          $('[name="uang_kernet"]').val(data.uang_kernet);
          $('[name="denda_a"]').val(data.denda_a);
          $('[name="denda_b"]').val(data.denda_b);
          $('[name="denda_c"]').val(data.denda_c);
          $('[name="batas_kgbakjktsby"]').val(data.batas_kgbakjktsby);
          $('[name="batas_kgbaksbyjkt"]').val(data.batas_kgbaksbyjkt);
          $('[name="harga_bataskgbak"]').val(data.harga_bataskgbak);
          $('[name="batas_kgtangki"]').val(data.batas_kgtangki);
          $('[name="harga_bataskgtangki"]').val(data.harga_bataskgtangki);
          $('[name="beratlebih_bakjktsby"]').val(data.beratlebih_bakjktsby);
          $('[name="beratlebih_baksbyjkt"]').val(data.beratlebih_baksbyjkt);
          $('[name="beratlebih_tangki"]').val(data.beratlebih_tangki);
          $('[name="pulang_kosonga"]').val(data.pulang_kosonga);
          $('[name="pulang_kosongb"]').val(data.pulang_kosongb);
          $('[name="pulang_kosongc"]').val(data.pulang_kosongc);
          $('[name="bon_jkta"]').val(data.bon_jkta);
          $('[name="bon_jktb"]').val(data.bon_jktb);
          $('[name="bon_jktc"]').val(data.bon_jktc);
          $('[name="bon_jktd"]').val(data.bon_jktd);
          $('[name="bon_jkte"]').val(data.bon_jkte);
          $('[name="tab_sopir"]').val(data.tab_sopir);
        }
      });
    }
  </script>