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
              <h3 class="box-title">Form Pembelian Spare Part</h3>
            </div>
            <form role="form" id="form-master-pembelian">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Nota</label>
                      <input type="text" name="no_nota" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_nota" class="form-control pull-right" id="tgl_nota">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
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
                      <label>Kode Barang</label>
                      <select class="form-control" name="kode_barang" id="dropBarang" style="width: 100%;">
                        <option value="">Pilih Barang</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty Beli</label>
                      <input type="text" name="qty_beli" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Harga Satuan</label>
                      <input type="text" name="harga_satuan" class="form-control">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="alert alert-success alert-dismissible" id="alert_success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> <span name="successMsg"></span></h4>
              </div>
              <div class="alert alert-danger alert-dismissible" id="alert_failed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> <span name="failedMsg"></span></h4>
              </div>
              <table id="m_detBeli" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-2 text-center">Part Number</th>
                    <th class="col-xs-3 text-center">Nama</th>
                    <th class="col-xs-2 text-center">Harga Satuan</th>
                    <th class="col-xs-1 text-center">Qty</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-center">Sub Total</th>
                    <th class=""><span name="sub_total">20000</span></th>
                  </tr>
                </tfoot>
              </table>
              <form role="form" id="form-hitung-pembelian">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Diskon</label>
                      <input type="text" name="diskon" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Nominal Diskon</label>
                      <input type="text" name="nom_diskon" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Grand Total</label>
                      <input type="text" name="grand_total" class="form-control">
                    </div>
                  </div>
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
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'0';
      tbDetBeli(key);
      $('#tgl_nota').datepicker({
        autoclose: true
      });
      dropsupplier();
      dropbarang();
      alertCheck('');
      // $('#dropBarang').change(function()
      // {
      //   pickBarang($('#dropBarang option:selected').val());
      // });
    })
    function alertCheck(id)
    {
      if(id=='')
      {
        $('#alert_success').css('display','none');
        $('#alert_failed').css('display','none');
      }
      else
      {
        if(id=='0')
        {
          $('#alert_success').css('display','block');
          $('#alert_failed').css('display','none');
        }
        else
        {
          $('#alert_success').css('display','none');
          $('#alert_failed').css('display','block');
        }
      }
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
          $('#dropSupplier').select2();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    function dropbarang()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBarang')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBarang');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_barang']
            option.text = data[i]['kode_barang']+' - '+data[i]['nama_barang'];
            select.add(option);
          }
          $('#dropBarang').select2({placeholder: 'Select an option'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    // function pickBarang(key)
    // {
    //   $.ajax({
    //     type: 'GET',
    //     url: '<?= site_url('Crud/pickDropBarang/')?>'+key,
    //     dataType: 'JSON',
    //     success: function(data)
    //     {
    //       $('[name="nama_supplier"]').val(data.nama_supplier);
    //     }
    //   });
    // }
    function tbDetBeli(key)
    {
      table = $('#m_detBeli').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detBeliBarang/')?>"+key,
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
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addBeliBarang')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              $('[name="successMsg"]').text('Sukses Menambah Barang');
              alertCheck('0');
              $('#form-detail-pembelian')[0].reset();
              $('#dropBarang').select2({placeholder: 'Select an option'});
              tbDetBeli(key);
            }
            else
            {
              $('[name="failedMsg"]').text('Gagal Menambah Barang');
              alertCheck('1');
            }
          }
        });
      }
      else
      {
        alert('No Nota Masih Kosong');
      }
    }
    function remove(id)
    {
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvBeliBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            $('[name="successMsg"]').text('Sukses Menghapus Barang');
            alertCheck('0');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
          }
          else
          {
            $('[name="failedMsg"]').text('Gagal Menghapus Barang');
            alertCheck('1');
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