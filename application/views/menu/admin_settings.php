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
              <h3 class="box-title">Form Master Ban</h3>
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
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 col-xs-12">
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
          $('[name="satuan_kasbon"]').val(data.satuan_kasbon);
        }
      });
    }
  </script>