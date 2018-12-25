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
              <h3 class="box-title">Form Pemakaian Spare Part</h3>
            </div>
            <form role="form" id="form-master-pemakaian">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pemakaian</label>
                      <input type="text" name="no_pemakaian" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="text" name="tgl_pemakaian" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nopol Kendaraan</label>
                      <input type="text" name="nopol" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tipe Kendaraan</label>
                      <input type="text" name="tipe_kendaraan" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Kode Karyawan</label>
                      <input type="text" name="kode_karyawan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <input type="text" name="nama_karyawan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Sopir Kendaraan</label>
                      <input type="text" name="sopir_kendaraan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Kernet Kendaraan</label>
                      <input type="text" name="kernet_kendaraan" class="form-control">
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
              <form role="form" id="form-detail-pemakaian">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="kode_barang" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Qty Barang</label>
                      <input type="text" name="qty_barang" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="text" name="stok_barang" class="form-control">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
              <table id="m_pemakaian_spare_part" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-2 text-center">Kode</th>
                    <th class="col-xs-3 text-center">Nama</th>
                    <th class="col-xs-2 text-center">Qty</th>
                    <th class="col-xs-2 text-center">Karyawan</th>
                    <th class="col-xs-2 text-center">Sisa Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><button type="button" class="btn btn-sm btn-danger">Hapus</button></td>
                    <td>BRG0001</td>
                    <td>Barang A</td>
                    <td>5 Pcs</td>
                    <td>Joni</td>
                    <td>20 Pcs</td>
                  </tr>
                  <tr>
                    <td><button type="button" class="btn btn-sm btn-danger">Hapus</button></td>
                    <td>BRG0002</td>
                    <td>Barang B</td>
                    <td>4 Pcs</td>
                    <td>Joni</td>
                    <td>10 Pcs</td>
                  </tr>
                </tbody>
              </table>
              <form role="form" id="form-ket-pemakaian">
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket_pemakaian" class="form-control"></textarea>
                </div>
              </form>
            </div>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="col-md-2 col-xs-2">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="tempsaveDt()">Simpan Sementara</button>
                </div>
              </div>
              <div class="col-md-2 col-xs-2">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="tempsaveDt()">List Sementara</button>
                </div>
              </div>
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