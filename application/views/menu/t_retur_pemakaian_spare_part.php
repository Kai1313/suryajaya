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
              <h3 class="box-title">Form Retur Pemakaian Spare Part</h3>
            </div>
            <form role="form" id="form-master-retur">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Retur</label>
                      <input type="text" name="no_retur" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_retur" class="form-control pull-right" id="tgl_retur">
                      </div>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newRetur()">Retur Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editRetur()">Edit Retur</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pemakaian</label>
                      <select class="form-control" name="no_pemakaian" id="dropPakai" style="width: 100%;">
                        <option value="">Pilih No Pemakaian</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_pemakaian" class="form-control pull-right" id="tgl_pemakaian" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nopol</label>
                      <input type="text" name="nopol" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kendaraan</label>
                      <input type="text" name="jenis_kendaraan" class="form-control" readonly>
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
              <form role="form" id="form-detail-retur">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <select class="form-control" name="kode_barang" id="dropBarang" style="width: 100%;">
                        <option value="">Pilih Barang</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Qty Retur</label>
                      <input type="text" name="qty_retur" class="form-control">
                    </div>
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_retur" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-5 text-center">Nama</th>
                    <th class="col-xs-3 text-center">Qty</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
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
            <table id="daftarRetur" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Retur</th>
                  <th>Tgl. Retur</th>
                  <th>No Pemakaian</th>
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'0';
      tbDetRetur(key);
      $('#tgl_retur').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_pemakaian').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      droppakai();
      $('#dropPakai').change(function()
      {
        pickPakai($('#dropPakai option:selected').val());
      });
      dropbarang();
    })
    function newRetur()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noReturPakaiBarang')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_retur"]').val(data.no_retur);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function droppakai()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropPemakaian')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPakai');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['no_pakai_brg']
            option.text = data[i]['no_pakai_brg'];
            select.add(option);
          }
          $('#dropPakai').select2({placeholder: 'Pilih No Pemakaian'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get no pemakaian data');
        }
      });
    }
    function pickPakai(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropPemakaian/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="tgl_pemakaian"]').val(data.tgl_pakai_brg);
          $('[name="nopol"]').val(data.nopol);
          $('[name="jenis_kendaraan"]').val(data.tipe_kendaraan+' - '+data.jenis_kendaraan);
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
    function tbDetRetur(key)
    {
      table = $('#m_retur').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detReturPakaiBarang/')?>"+key,
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addReturPakaiBarang')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-retur')[0].reset();
              $('#dropPakai').select2({placeholder: 'Pilih No Pemakaian'});
              tbDetRetur(key);
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvReturPakaiBarang/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-retur')[0].reset();
            tbDetRetur(key);
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveReturPakaiBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-retur')[0].reset();
            tbDetRetur(key);
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelReturPakaiBarang')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-retur')[0].reset();
            tbDetRetur(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editRetur()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Retur Pemakaian Barang');
      table = $('#daftarRetur').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listReturPakaiBarang')?>",
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
    function pilihRetur(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getReturPakaiBrg/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_retur;
          $('[name="no_retur"]').val(data.no_retur);
          $('[name="tgl_retur"]').val(data.tgl_retur);
          $('#dropPakai').val(data.no_pakai_brg).trigger('change');
          tbDetRetur(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
  </script>