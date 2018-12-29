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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pembelian Ban</h3>
            </div>
            <form role="form" id="form-master-pembelian">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pembelian</label>
                      <input type="text" name="no_pembelian" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="text" name="tgl_pembelian" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Kode Supplier</label>
                      <input type="text" name="kode_supplier" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Supplier</label>
                      <input type="text" name="nama_supplier" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-body">
              <form role="form" id="form-detail-pembelian">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Ban</label>
                      <input type="text" name="kode_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Harga Ban</label>
                      <input type="text" name="harga_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Qty Ban</label>
                      <input type="text" name="qty_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Ban</label>
                      <input type="text" name="jenis_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Ukuran Ban</label>
                      <input type="text" name="ukuran_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Merk Ban</label>
                      <input type="text" name="merk_ban" class="form-control">
                    </div>
                  </div>
                </div>
              </form>
              <table id="m_pembelian_spare_part" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-1 text-center">Jenis</th>
                    <th class="col-xs-2 text-center">Ukuran</th>
                    <th class="col-xs-2 text-center">Merk</th>
                    <th class="col-xs-2 text-center">Harga Satuan</th>
                    <th class="col-xs-1 text-center">Qty</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><button type="button" class="btn btn-sm btn-danger">Hapus</button></td>
                    <td>Ban Dalam</td>
                    <td>290x20</td>
                    <td>Dunlop</td>
                    <td>2000000</td>
                    <td>4 Pcs</td>
                    <td>8000000</td>
                  </tr>
                  <tr>
                    <td><button type="button" class="btn btn-sm btn-danger">Hapus</button></td>
                    <td>Ban Luar</td>
                    <td>290x30</td>
                    <td>Federal Ban</td>
                    <td>2500000</td>
                    <td>4 Pcs</td>
                    <td>10000000</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="6" class="text-center">Grand Total</th>
                    <th class=""><span name="grand_total">18000000</span></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="saveDt()">Simpan</button>
                </div>
              </div>
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="printDt()">Cetak</button>
                </div>
              </div>
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="resetDt()">Batal</button>
                </div>
              </div>
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
      // tbTujuan();
    })
    function tbTujuan()
    {
      table = $('#m_tujuan').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mTujuan')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addTujuan')?>':'<?= site_url('Crud/updTujuan')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-tujuan').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Tujuan');
            $('#form-tujuan')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Tujuan');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getTujuan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_tujuan"]').val(data.kode_tujuan);
          $('[name="ket_tujuan"]').val(data.ket_tujuan);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
  </script>