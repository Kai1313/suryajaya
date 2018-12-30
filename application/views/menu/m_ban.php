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
            <form role="form" id="form-ban">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_ban" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_ban" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis</label><br>
                  <label>
                    <input type="radio" name="jenis_ban" value="0" class="flat-red" checked> Ban Dalam
                  </label>
                  <label>
                    <input type="radio" name="jenis_ban" value="1" class="flat-red"> Ban Luar
                  </label>
                  <label>
                    <input type="radio" name="jenis_ban" value="2" class="flat-red"> Marset Ban
                  </label>
                </div>
                <div class="form-group">
                  <label>Merk</label>
                  <input type="text" name="merk_ban" class="form-control">
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga_satuan" class="form-control">
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
              <table id="m_ban" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Merk</th>
                    <th class="text-center">Harga</th>
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
      tbBan();
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
    })
    function tbBan()
    {
      table = $('#m_ban').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mBan')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addBan')?>':'<?= site_url('Crud/updBan')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-ban').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Ban');
            $('#form-ban')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Ban');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_ban"]').val(data.kode_ban);
          $('[name="nama_ban"]').val(data.nama_ban);
          $('[name="jenis_ban"]').parent().removeClass(' checked');
          $('[name="jenis_ban"][value="'+data.jenis_ban+'"]').parent().addClass(' checked');
          $('[name="merk_ban"]').val(data.merk_ban);
          $('[name="harga_satuan"]').val(data.harga_satuan);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
  </script>