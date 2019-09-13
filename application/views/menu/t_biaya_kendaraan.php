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
              <h3 class="box-title">Form Biaya Kendaraan</h3>
            </div>
            <form role="form" id="form-master-biaya">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Kuitansi</label>
                      <input type="text" name="no_kuitansi" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_biaya" class="form-control pull-right" id="tgl_pembelian" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Karyawan</label>
                      <select class="form-control" name="kode_karyawan" id="dropKaryawan" style="width: 100%;">
                        <option value="">Pilih Karyawan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newBiaya()">Biaya Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editBiaya()">Edit Biaya</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Nopol Kendaraan</label>
                      <select class="form-control" name="nopol" id="dropNopol" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Merk Kendaraan</label>
                      <input type="text" name="tipe_kendaraan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Sopir Kendaraan</label>
                      <select class="form-control" name="sopir_kendaraan" id="dropSopir" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kernet Kendaraan</label>
                      <select class="form-control" name="kernet_kendaraan" id="dropKernet" style="width: 100%;">
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
                      <label>Keterangan</label>
                      <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" name="jumlah" class="form-control num">
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                    <input type="hidden" name="g_total">
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_biaya" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-8 text-center">Keterangan</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="2" class="text-center">Grand Total</th>
                    <th class="num_"><span name="grand_total">0</span></th>
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
              <div class="row">
                <div class="col-md-2 col-xs-12">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-primary" onclick="tempsaveDt()">Simpan Sementara</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-success" onclick="saveDt()">Simpan</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-warning" onclick="cancelDt()">Batal</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-danger" onclick="delDt()">Hapus</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-primary" onclick="printDt()">Cetak</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-primary" onclick="reportDt()">Laporan</button>
                  </div>
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
            <table id="daftarBiaya" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Kuitansi</th>
                  <th>Tgl. Kuitansi</th>
                  <th>Nopol</th>
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'0';
      tbDetBiaya(key);
      $('#tgl_pembelian').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      dropkaryawan();
      dropkendaraan();
      $('#dropNopol').change(function()
      {
        pickKendaraan($('#dropNopol option:selected').val());
      });
      dropsopir();
      dropkernet();
      $('.num').number(true,2);
    })
    function newBiaya()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noBiayaKendaraan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_kuitansi"]').val(data.no_biaya);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropkaryawan()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKaryawan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKaryawan');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_karyawan']
            option.text = data[i]['kode_karyawan']+' - '+data[i]['nama_karyawan'];
            select.add(option);
          }
          $('#dropKaryawan').select2({placeholder: 'Pilih Karyawan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get karyawan data');
        }
      });
    }
    function dropkendaraan()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKendaraan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropNopol');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_kendaraan']
            option.text = data[i]['nopol'];
            select.add(option);
          }
          $('#dropNopol').select2({placeholder: 'Pilih Kendaraan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get kendaraan data');
        }
      });
    }
    function pickKendaraan(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropKendaraan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="tipe_kendaraan"]').val(data.tipe_kendaraan+' - '+data.jenis_kendaraan);
        }
      });
    }
    function dropsopir()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropSopir')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropSopir');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_driver']
            option.text = data[i]['kode_driver']+' - '+data[i]['nama_driver'];
            select.add(option);
          }
          $('#dropSopir').select2({placeholder: 'Pilih Sopir'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get sopir data');
        }
      });
    }
    function dropkernet()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKernet')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKernet');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_driver']
            option.text = data[i]['kode_driver']+' - '+data[i]['nama_driver'];
            select.add(option);
          }
          $('#dropKernet').select2({placeholder: 'Pilih Kernet'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get kernet data');
        }
      });
    }
    function tbDetBiaya(key)
    {
      table = $('#m_biaya').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detBiayaKendaraan/')?>"+key,
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
          url: '<?= site_url('Crud/addBiayaKdr')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-biaya')[0].reset();
              tbDetBiaya(key);
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
        url: '<?= site_url('Crud/rmvBiayaKdr/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetBiaya(key);
            subTotal(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function tempsaveDt()
    {
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/tempBiayaKdr')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetBiaya(key);
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
        url: '<?= site_url('Crud/saveBiayaKdr')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetBiaya(key);
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
        url: '<?= site_url('Crud/cancelBiayaKdr')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-biaya')[0].reset();
            tbDetBiaya(key);
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
        url: '<?= site_url('Crud/subTotalBiayaKdr/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="grand_total"]').text(data.subtotal);
          $('[name="g_total"]').val(data.subtotal);
          $('th.num_').number(true,2);
        }
      });
    }
    function editBiaya()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Biaya Kendaraan');
      table = $('#daftarBiaya').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listBiayaKendaraan')?>",
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
    function pilihBiayaKdr(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBiayaKdr/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_biaya;
          $('[name="no_kuitansi"]').val(data.no_biaya);
          $('[name="tgl_biaya"]').val(moment(data.tgl_biaya).format('DD/MM/YYYY'));
          $('#dropKaryawan').val(data.kode_karyawan).trigger('change');
          $('#dropNopol').val(data.kode_kendaraan).trigger('change');
          $('#dropSopir').val(data.sopir_kendaraan).trigger('change');
          $('#dropKernet').val(data.kernet_kendaraan).trigger('change');
          tbDetBiaya(key);
          subTotal(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      window.open ( "<?= site_url('Crud/printBiayaKdr/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/reportBiayaKendaraan')?>",'_blank');
    }
  </script>