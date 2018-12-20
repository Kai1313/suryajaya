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
              <h3 class="box-title">Form Master Driver</h3>
            </div>
            <form role="form" id="form-driver">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_driver" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_driver" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat_driver" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" name="kota_driver" class="form-control">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="tlp_driver" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis</label><br>
                  <label>
                    <input type="radio" name="jenis_driver" value="0" class="flat-red" checked> Sopir
                  </label>
                  <label>
                    <input type="radio" name="jenis_driver" value="1" class="flat-red"> Kernet
                  </label>
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
              <table id="m_driver" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Jenis</th>
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
      tbDriver();
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
    })
    function tbDriver()
    {
      table = $('#m_driver').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mDriver')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addDriver')?>':'<?= site_url('Crud/updDriver')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-driver').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Driver');
            $('#form-driver')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Driver');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getDriver/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_driver"]').val(data.kode_driver);
          $('[name="nama_driver"]').val(data.nama_driver);
          $('[name="alamat_driver"]').val(data.alamat_driver);
          $('[name="kota_driver"]').val(data.kota_driver);
          $('[name="jenis_driver"]').parent().removeClass(' checked');
          $('[name="jenis_driver"][value="'+data.jenis_driver+'"]').parent().addClass(' checked');
          $('[name="tlp_driver"]').val(data.tlp_driver);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
  </script>