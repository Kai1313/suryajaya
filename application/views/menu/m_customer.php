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
              <table id="m_customer" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Jenis</th>
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
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Master Customer</h3>
            </div>
            <form role="form" id="form-customer">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Customer</label>
                  <input type="text" name="kode_customer" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" name="nama_customer" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat_customer" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input type="text" name="kota_customer" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" name="jenis_customer" class="form-control">
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="tlp_customer" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Master Harga</h3>
            </div>
            <form role="form" id="form-harga">
              <input type="hidden" name="tipe_form_harga" value="">
              <div class="box-body">
              <input type="hidden" name="kode_customer" class="form-control">
              <input type="hidden" name="id_harga" class="form-control">
                <div class="form-group">
                  <label>Tujuan</label>
                  <input type="text" name="tujuan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nominal</label>
                  <input type="text" name="nominal" class="form-control">
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="addHarga()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="box">
            <div class="box-body">
              <table id="m_customer_harga" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tujuan</th>
                    <th class="text-center">Nominal</th>
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
      tbCustomer();
    })
    function tbCustomer()
    {
      table = $('#m_customer').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mCustomer')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addCustomer')?>':'<?= site_url('Crud/updCustomer')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-customer').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Customer');
            $('#form-customer')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Customer');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getCustomer/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_customer"]').val(data.kode_customer);
          $('[name="nama_customer"]').val(data.nama_customer);
          $('[name="alamat_customer"]').val(data.alamat_customer);
          $('[name="kota_customer"]').val(data.kota_customer);
          $('[name="jenis_customer"]').val(data.jenis_customer);
          $('[name="tlp_customer"]').val(data.tlp_customer);
          $('[name="tipe_form"]').val('1');
          tbHarga(data.kode_customer);
        }
      });
    }
    function del(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delCustomer/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus Customer');
            $('#form-customer')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menghapus Customer');
          }
        }
      });
    }
    function addHarga()
    {
      var urls = ($('[name="tipe_form_harga"]').val()!='1')?'<?= site_url('Crud/addHargaCustomer')?>':'<?= site_url('Crud/updHargaCustomer')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-harga').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Harga');
            $('#form-harga')[0].reset();
            $('[name="tipe_form_harga"]').val('');
            $('[name="id_harga]').val('');
            tbHarga($('[name="kode_customer"]').val());
          }
          else
          {
            alert('Gagal Menambah Harga');
          }
        }
      });
    }
    function editHarga(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getCustomerHarga/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="id_harga"]').val(data.id_harga);
          $('[name="tujuan"]').val(data.tujuan);
          $('[name="nominal"]').val(data.nominal);
          $('[name="tipe_form_harga"]').val('1');
          tbHarga($('[name="kode_customer"]').val());
        }
      });
    }
    function delHarga(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delHargaCustomer/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus Harga');
            $('#form-harga')[0].reset();
            $('[name="tipe_form_harga"]').val('');
            tbHarga($('[name="kode_customer"]').val());
          }
          else
          {
            alert('Gagal Menghapus Harga');
          }
        }
      });
    }
    function tbHarga(kode)
    {
      table = $('#m_customer_harga').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "bDestroy": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mCustomerHarga/')?>"+kode,
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
  </script>