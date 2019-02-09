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
              <h3 class="box-title">Form Master Supplier</h3>
            </div>
            <form role="form" id="form-supplier">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_supplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_supplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat_supplier" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" name="kota_supplier" class="form-control">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="tlp_supplier" class="form-control">
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
              <table id="m_supplier" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Telepon</th>
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
      tbSupplier();
    })
    function tbSupplier()
    {
      table = $('#m_supplier').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mSupplier')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addSupplier')?>':'<?= site_url('Crud/updSupplier')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-supplier').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Supplier');
            $('#form-supplier')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Supplier');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getSupplier/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_supplier"]').val(data.kode_supplier);
          $('[name="nama_supplier"]').val(data.nama_supplier);
          $('[name="alamat_supplier"]').val(data.alamat_supplier);
          $('[name="kota_supplier"]').val(data.kota_supplier);
          $('[name="tlp_supplier"]').val(data.tlp_supplier);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
    function del(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delSupplier/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus Supplier');
            $('#form-supplier')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menghapus Supplier');
          }
        }
      });
    }
  </script>