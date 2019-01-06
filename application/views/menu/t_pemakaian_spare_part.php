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
                      <input type="text" name="no_pemakaian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newPakai()">Pemakaian Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editPakai()">Edit Pemakaian</button>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_pemakaian" class="form-control pull-right" id="tgl_pemakaian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Karyawan</label>
                      <select class="form-control" name="kode_karyawan" id="dropKaryawan" style="width: 100%;">
                        <option value=""></option>
                      </select>
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
              <form role="form" id="form-detail-pemakaian">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <select class="form-control" name="kode_barang" id="dropBarang" style="width: 100%;">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty Barang</label>
                      <input type="text" name="qty_barang" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="text" name="stok_barang" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_detPakai" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-2 text-center">Kode</th>
                    <th class="col-xs-3 text-center">Nama</th>
                    <th class="col-xs-3 text-center">Qty</th>
                    <th class="col-xs-3 text-center">Sisa Stok</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-center">Total</th>
                    <th class=""><span name="total">0</span></th>
                  </tr>
                </tfoot>
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
            <table id="daftarPemakaian" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pemakaian</th>
                  <th>Tgl. Pemakaian</th>
                  <th>Karyawan</th>
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'0';
      tbDetPakai(key);
      $('#tgl_pemakaian').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      dropkaryawan();
      dropkendaraan();
      $('#dropNopol').change(function()
      {
        pickKendaraan($('#dropNopol option:selected').val());
      });
      dropsopir();
      dropkernet();
      dropbarang();
      $('#dropBarang').change(function()
      {
        pickBarang($('#dropBarang option:selected').val());
      });
    })
    function newPakai()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noPakaiBarang')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_pemakaian"]').val(data.no_pakai_brg);
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
          alert('Error get barang data');
        }
      });
    }
    function pickBarang(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBarang/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="stok_barang"]').val(data.stok_barang+' '+data.nama_satuan);
        }
      });
    }
    function tbDetPakai(key)
    {
      table = $('#m_detPakai').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detPakaiBarang/')?>"+key,
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addPakaiBarang')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pemakaian')[0].reset();
              $('#dropBarang').select2({placeholder: 'Select an option'});
              tbDetPakai(key);
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvPakaiBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pemakaian')[0].reset();
            tbDetPakai(key);
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/tempPakaiBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pemakaian')[0].reset();
            tbDetPakai(key);
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/savePakaiBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pemakaian')[0].reset();
            tbDetPakai(key);
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
      key = ($('[name="no_pemakaian"]').val()!='')?$('[name="no_pemakaian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelPakaiBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pemakaian')[0].reset();
            tbDetPakai(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editPakai()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pemakaian Barang');
      table = $('#daftarPemakaian').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listPakaiBarang')?>",
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
    function pilihPakaiBrg(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getPakaiBrg/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_pakai_brg;
          $('[name="no_pemakaian"]').val(data.no_pakai_brg);
          $('[name="tgl_pemakaian"]').val(data.tgl_pakai_brg);
          $('[name="ket_pemakaian"]').val(data.ket_pakai_brg);
          $('#dropNopol').val(data.kode_kendaraan).trigger('change');
          $('#dropKaryawan').val(data.kode_karyawan).trigger('change');
          $('#dropKendaraan').val(data.kode_kendaraan).trigger('change');
          $('#dropSopir').val(data.kode_sopir).trigger('change');
          $('#dropKernet').val(data.kode_kernet).trigger('change');
          tbDetPakai(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
  </script>