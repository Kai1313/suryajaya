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
              <h3 class="box-title">Form Katalog Kendaraan</h3>
            </div>
            <form role="form" id="form-master-pemakaian">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Katalog</label>
                      <input type="text" name="no_katalog" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newKatalog()">Katalog Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editKatalog()">Edit Katalog</button>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_katalog" class="form-control pull-right" id="tgl_katalog" placeholder="dd/mm/yyyy">
                      </div>
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
              <form role="form" id="form-detail-spare">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <select class="form-control" name="kode_barang" id="dropBarang" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addBrg()">Tambah Spare Part</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Qty Barang</label>
                      <input type="text" name="qty_barang" class="form-control num">
                    </div>
                  </div>
                </div>
              </form>
              <form role="form" id="form-detail-ban">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Ban</label>
                      <select class="form-control" name="kode_ban" id="dropBan" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addBan()">Tambah Ban</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Qty Ban</label>
                      <input type="text" name="qty_ban" class="form-control num">
                    </div>
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_detKatalog" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-8 text-center">Keterangan</th>
                    <th class="col-xs-3 text-center">Qty</th>
                  </tr>
                </thead>
                <tbody></tbody>
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
                  <button type="button" class="btn btn-md btn-primary" onclick="reportDt()">Laporan</button>
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
            <table id="daftarKatalog" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Katalog</th>
                  <th>Tgl. Katalog</th>
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
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'0';
      tbDetKatalog(key);
      $('#tgl_katalog').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      dropkendaraan();
      $('#dropNopol').change(function()
      {
        pickKendaraan($('#dropNopol option:selected').val());
      });
      dropsopir();
      dropkernet();
      dropbarang();
      dropban();
      $('.num').number(true,2);
    })
    function newKatalog()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noKatalog')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_katalog"]').val(data.no_katalog);
          $('#newBtn').prop('disabled',true);
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
            option.value = data[i]['nama_barang'];
            option.text = data[i]['kode_barang']+' - '+data[i]['nama_barang'];
            select.add(option);
          }
          $('#dropBarang').select2({placeholder: 'Pilih Barang'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get barang data');
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
            option.value = data[i]['nama_ban']+' - '+data[i]['merk_ban'];
            option.text = data[i]['nama_ban']+' - '+data[i]['merk_ban'];
            select.add(option);
          }
          $('#dropBan').select2({placeholder: 'Pilih Ban'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get Ban data');
        }
      });
    }
    function tbDetKatalog(key)
    {
      table = $('#m_detKatalog').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detKatalog/')?>"+key,
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
    function addBrg()
    {
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addKatalog1')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-spare')[0].reset();
              $('#dropBarang').select2({placeholder: 'Select an option'});
              tbDetKatalog(key);
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
        alert('No Pemakaian Dan/Atau Kode Karyawan Masih Kosong');
      }
    }
    function addBan()
    {
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addKatalog2')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-ban')[0].reset();
              $('#dropBarang').select2({placeholder: 'Select an option'});
              tbDetKatalog(key);
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
        alert('No Pemakaian Dan/Atau Kode Karyawan Masih Kosong');
      }
    }
    function remove(id)
    {
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvKatalog/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-spare')[0].reset();
            $('#form-detail-ban')[0].reset();
            tbDetKatalog(key);
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
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveKatalog')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-spare')[0].reset();
            $('#form-detail-ban')[0].reset();
            tbDetKatalog(key);
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
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelKatalog')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-spare')[0].reset();
            $('#form-detail-ban')[0].reset();
            tbDetKatalog(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editKatalog()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Katalog Kendaraan');
      table = $('#daftarKatalog').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listKatalog')?>",
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
    function pilihKatalog(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKatalog/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_katalog;
          $('[name="no_katalog"]').val(data.no_katalog);
          $('[name="tgl_katalog"]').val(moment(data.tgl_katalog).format('DD/MM/YYYY'));
          $('#dropNopol').val(data.kode_kendaraan).trigger('change');
          $('#dropSopir').val(data.kode_sopir).trigger('change');
          $('#dropKernet').val(data.kode_kernet).trigger('change');
          tbDetKatalog(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_katalog"]').val()!='')?$('[name="no_katalog"]').val():'';
      window.open ( "<?= site_url('Crud/printKatalog/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/reportKatalog')?>",'_blank');
    }
  </script>