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
              <h3 class="box-title">Form Pelunasan Piutang</h3>
            </div>
            <form role="form" id="form-master-pelunasan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pelunasan</label>
                      <input type="text" name="no_lunas" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_lunas" class="form-control pull-right" id="tgl_lunas" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newLunas()">Lunas Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editLunas()">Edit Lunas</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Klien</label>
                      <select class="form-control" name="kode_customer" id="dropCustomer" style="width: 100%;">
                        <option value=""></option>
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
              <form role="form" id="form-detail-biaya">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Tagihan</label>
                      <select class="form-control" name="no_tagihan" id="dropTagihan" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                    <input type="hidden" name="g_total">
                  </div>
                  <div class="col-md-6 col-xs-6">
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_piutang" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-2 text-center">No Tagihan</th>
                    <th class="col-xs-2 text-center">Bon</th>
                    <th class="col-xs-2 text-center">Surat Jalan</th>
                    <th class="col-xs-2 text-center">Tgl. Tagih</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="2" class="text-center">Grand Total</th>
                    <th class="num_" name="grand_total">0</th>
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
            <table id="daftarPelunasan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pelunasan</th>
                  <th>Tgl. Pelunasan</th>
                  <th>Klien</th>
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
      key = ($('[name="no_lunas"]').val()!='')?$('[name="no_lunas"]').val():'0';
      tbDetLunas(key);
      $('#tgl_lunas').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      droptagihan();
      dropcustomer();
      $('.num').number(true,2);
    })
    function newLunas()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noLunas')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_lunas"]').val(data.no_lunas);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function droptagihan()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropRekening')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropRekening');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_rekening']
            option.text = data[i]['nama_bank']+' - '+data[i]['no_rekening'];
            select.add(option);
          }
          $('#dropRekening').select2({placeholder: 'Pilih Rekening'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get rekening data');
        }
      });
    }
    function dropcustomer()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropCustomer');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer'];
            select.add(option);
          }
          $('#dropCustomer').select2({placeholder: 'Pilih Klien'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get klien data');
        }
      });
    }
    function tbDetLunas(key)
    {
      table = $('#m_piutang').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detLunas/')?>"+key,
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addKuitansi')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-biaya')[0].reset();
              tbDetKuitansi(key);
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
        alert('No Kuitansi Masih Kosong');
      }
    }
    function remove(id)
    {
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvKuitansi/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetKuitansi(key);
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveKuitansi')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetKuitansi(key);
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelKuitansi')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetKuitansi(key);
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
        url: '<?= site_url('Crud/subTotalKuitansi/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="grand_total"]').text(data.subtotal);
          $('[name="g_total"]').val(data.subtotal);
          $('th.num_').number(true,2);
        }
      });
    }
    function editLunas()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pelunasan Piutang');
      table = $('#daftarPelunasan').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listLunas')?>",
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
    function pilihLunas(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKuitansi/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_kuitansi;
          $('[name="no_kuitansi"]').val(data.no_kuitansi);
          $('[name="tgl_kuitansi"]').val(moment(data.tgl_kuitansi).format('DD/MM/YYYY'));
          $('[name="ket_kuitansi"]').val(data.ket_kuitansi);
          $('#dropRekening').val(data.kode_rekening).trigger('change');
          $('#dropCustomer').val(data.kode_customer).trigger('change');
          tbDetKuitansi(key);
          subTotal(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_lunas"]').val()!='')?$('[name="no_lunas"]').val():'';
      window.open ( "<?= site_url('Crud/printLunas/')?>"+key,'_blank');
    }
  </script>