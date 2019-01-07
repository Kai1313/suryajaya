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
                      <input type="text" name="no_pembelian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newBeli()">Pembelian Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editBeli()">Edit Pembelian</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_pembelian" class="form-control pull-right" id="tgl_pembelian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Supplier</label>
                      <select class="form-control" name="kode_supplier" id="dropSupplier" style="width: 100%;">
                        <option value="">Pilih Supplier</option>
                      </select>
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
                      <select class="form-control" name="kode_ban" id="dropBan" style="width: 100%;">
                        <option value="">Pilih Ban</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty Ban</label>
                      <input type="text" name="qty_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Harga Ban</label>
                      <input type="text" name="harga_ban" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Ban</label>
                      <input type="text" name="jenis_ban" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ukuran Ban</label>
                      <input type="text" name="ukuran_ban" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Merk Ban</label>
                      <input type="text" name="merk_ban" class="form-control" readonly>
                    </div>
                    <input type="hidden" name="g_total">
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_pembelian_ban" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
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
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="6" class="text-center">Grand Total</th>
                    <th class=""><span name="grand_total">0</span></th>
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
                  <button type="button" class="btn btn-md btn-primary" onclick="cancelDt()">Batal</button>
                </div>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <table id="daftarPembelian" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pembelian</th>
                  <th>Tgl. Pembelian</th>
                  <th>Supplier</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Modal -->
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/footer.php' ;?>
  <?php include 'application/views/layout/controlsidebar.php' ;?>
  <?php include 'application/views/layout/jspack.php' ;?>

  <script>
    $(function ()
    {
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'0';
      tbDetBeli(key);
      $('#tgl_pembelian').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      dropsupplier();
      dropban();
      $('#dropBan').change(function()
      {
        pickBan($('#dropBan option:selected').val());
      });
    })
    function newBeli()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noBeliBan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_pembelian"]').val(data.no_pembelian);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropsupplier()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropSupplier')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropSupplier');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_supplier']
            option.text = data[i]['kode_supplier']+' - '+data[i]['nama_supplier'];
            select.add(option);
          }
          $('#dropSupplier').select2({placeholder: 'Pilih Supplier'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    function dropban()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBan');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_ban']
            option.text = data[i]['kode_ban']+' - '+data[i]['nama_ban'];
            select.add(option);
          }
          $('#dropBan').select2({placeholder: 'Pilih Ban'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get ban data');
        }
      });
    }
    function pickBan(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          var jenis;
          if(data.jenis_ban == '0')
          {
            jenis = 'Ban Dalam';
          }
          else if(data.jenis_ban == '1')
          {
            jenis = 'Ban Luar';
          }
          else
          {
            jenis = 'Marset Ban';
          }
          $('[name="jenis_ban"]').val(jenis);
          $('[name="ukuran_ban"]').val(data.ukuran_ban);
          $('[name="merk_ban"]').val(data.merk_ban);
        }
      });
    }
    function tbDetBeli(key)
    {
      table = $('#m_pembelian_ban').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detBeliBan/')?>"+key,
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
    function add()
    {
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addBeliBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pembelian')[0].reset();
              $('#dropBan').select2({placeholder: 'Select an option'});
              tbDetBeli(key);
              subTotal(key);
            }
            else
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            }
          }
        });
      }
      else
      {
        alert('No Pembelian Masih Kosong');
      }
    }
    function remove(id)
    {
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvBeliBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
            subTotal(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveBeliBan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
            subTotal(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function cancelDt()
    {
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBeliBan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
            subTotal(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function subTotal(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/subTotalBeliBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="grand_total"]').text(data.subtotal);
          $('[name="g_total"]').val(data.subtotal);
        }
      });
    }
    function editBeli()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pembelian Ban');
      table = $('#daftarPembelian').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listBeliBan')?>",
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
    function pilihBeliBan(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBeliBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_pembelian;
          $('[name="no_pembelian"]').val(data.no_pembelian);
          $('[name="tgl_pembelian"]').val(data.tgl_pembelian);
          $('#dropSupplier').val(data.kode_supplier).trigger('change');
          tbDetBeli(key);
          subTotal(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
  </script>