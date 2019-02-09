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
              <h3 class="box-title">Form Master Barang</h3>
            </div>
            <form role="form" id="form-barang">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control">
                </div>
                <div class="form-group">
                  <label>Part Number</label>
                  <input type="text" name="part_number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Satuan</label>
                  <input type="text" name="nama_satuan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Minimum Quantity</label>
                  <input type="text" name="min_qty" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Quantity Perset</label>
                  <input type="text" name="qty_perset" class="form-control num">
                </div>
                <div class="form-group">
                  <label>Nomor Rak</label>
                  <input type="text" name="no_rak" class="form-control">
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
              <table id="m_barang" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Part Num</th>
                    <th class="text-center">Min Qty</th>
                    <th class="text-center">Qty Perset</th>
                    <th class="text-center">No Rak</th>
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
      tbBarang();
      $('.num').number(true,2);
    })
    function tbBarang()
    {
      table = $('#m_barang').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mBarang')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addBarang')?>':'<?= site_url('Crud/updBarang')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-barang').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Barang');
            $('#form-barang')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Barang');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_barang"]').val(data.kode_barang);
          $('[name="nama_barang"]').val(data.nama_barang);
          $('[name="part_number"]').val(data.part_number);
          $('[name="nama_satuan"]').val(data.nama_satuan);
          $('[name="min_qty"]').val(data.min_qty);
          $('[name="qty_perset"]').val(data.qty_perset);
          $('[name="no_rak"]').val(data.no_rak);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
    function del(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus Barang');
            $('#form-barang')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menghapus Barang');
          }
        }
      });
    }
  </script>