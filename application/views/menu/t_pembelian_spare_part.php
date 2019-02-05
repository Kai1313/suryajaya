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
                      <input type="text" name="no_nota" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nota Toko</label>
                      <input type="text" name="nota_toko" class="form-control">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newNota()">Nota Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editNota()">Edit Nota</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_nota" class="form-control pull-right" id="tgl_nota">
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
              <div id="alertMsg"></div>
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
                    <th class=""><span name="sub_total">0</span></th>
                  </tr>
                </tfoot>
              </table>
              <form role="form" id="form-hitung-pembelian">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Diskon</label>
                      <div class="input-group">
                        <span class="input-group-addon">%</span>
                        <input type="text" name="diskon" id="diskon" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Nominal Diskon</label>
                      <input type="text" name="nom_diskon" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Grand Total</label>
                      <input type="text" name="grand_total" class="form-control" readonly>
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
                  <button type="button" class="btn btn-md btn-primary" onclick="cancelDt()">Batal</button>
                </div>
              </div>
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="printDt()">Cetak</button>
                </div>
              </div>
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="reportDt()">Laporan</button>
                </div>
              </div>
              <div class="col-md-1 col-xs-1">
                <div class="form-group">
                  <button type="button" class="btn btn-md btn-primary" onclick="resetDt()">Reset</button>
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
                  <th>No Nota</th>
                  <th>Tgl. Nota</th>
                  <th>Supplier</th>
                  <th>Status</th>
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
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'0';
      tbDetBeli(key);
      $('#tgl_nota').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#diskon').on('input',function(){
        hitung();
      });
      dropsupplier();
      dropbarang();
    })
    function newNota()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noBeliBarang')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_nota"]').val(data.no_nota);
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
          $('#dropBarang').select2({placeholder: 'Pilih Barang'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }    
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
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pembelian')[0].reset();
              $('#dropBarang').select2({placeholder: 'Select an option'});
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
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveBeliBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
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
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBeliBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
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
        url: '<?= site_url('Crud/subTotalBeliBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="sub_total"]').text(data.subtotal);
        }
      });
    }
    function hitung()
    {
      sub = parseFloat($('[name="sub_total"]').text());
      dis = parseFloat($('[name="diskon"]').val())/100*sub;
      tot = parseFloat(sub*1)-parseFloat(dis*1);
      $('[name="nom_diskon"]').val(dis);
      $('[name="grand_total"]').val(tot);
    }
    function editNota()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pembelian Barang');
      table = $('#daftarPembelian').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listBeliBarang')?>",
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
    function pilihNotaBrg(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBeliBrg/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_nota;
          $('[name="no_nota"]').val(data.no_nota);
          $('[name="nota_toko"]').val(data.nota_toko);
          $('[name="tgl_nota"]').val(data.tgl_nota);
          $('[name="diskon"]').val(data.diskon);
          $('[name="nom_diskon"]').val(data.nom_diskon);
          $('[name="grand_total"]').val(data.grand_total);
          $('#dropSupplier').val(data.kode_supplier).trigger('change');
          tbDetBeli(key);
          subTotal(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_nota"]').val()!='')?$('[name="no_nota"]').val():'';
      window.open ( "<?= site_url('Crud/printBeliBarang/')?>"+key,'_blank');
    }
  </script>