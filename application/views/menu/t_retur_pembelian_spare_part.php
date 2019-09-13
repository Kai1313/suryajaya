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
              <h3 class="box-title">Form Retur Pembelian Spare Part</h3>
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
                        <input type="text" name="tgl_retur" class="form-control pull-right" id="tgl_retur" placeholder="dd/mm/yyyy">
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
                      <label>No Nota</label>
                      <select class="form-control" name="no_nota" id="dropNota" style="width: 100%;">
                        <option value="">Pilih Nota</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_nota" class="form-control pull-right" id="tgl_nota" placeholder="dd/mm/yyyy" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nota Toko</label>
                      <input type="text" name="nota_toko" class="form-control" readonly>
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
                      <input type="text" name="qty_retur" class="form-control num">
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
              <div class="row">
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
            <table id="daftarRetur" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Retur</th>
                  <th>Tgl. Retur</th>
                  <th>No Nota</th>
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
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'0';
      tbDetRetur(key);
      $('#tgl_retur').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_nota').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      dropnota();
      $('#dropNota').change(function()
      {
        pickNota($('#dropNota option:selected').val());
      });
      dropbarang();
      $('.num').number(true,2);
    })
    function newRetur()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noReturBeliBarang')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_retur"]').val(data.no_retur);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropnota()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropNota')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropNota');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['no_nota']
            option.text = data[i]['no_nota'];
            select.add(option);
          }
          $('#dropNota').select2({placeholder: 'Pilih Nota'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get nota data');
        }
      });
    }
    function pickNota(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropNota/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="tgl_nota"]').val(moment(data.tgl_nota).format('DD/MM/YYYY'));
          $('[name="nota_toko"]').val(data.nota_toko);
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
          "url": "<?php echo site_url('Datatables/detReturBeliBarang/')?>"+key,
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
          url: '<?= site_url('Crud/addReturBeliBarang')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-retur')[0].reset();
              $('#dropBarang').select2({placeholder: 'Pilih Barang'});
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
        url: '<?= site_url('Crud/rmvReturBeliBarang/')?>'+id,
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
        url: '<?= site_url('Crud/saveReturBeliBarang')?>',
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
        url: '<?= site_url('Crud/cancelReturBeliBarang')?>',
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
      $('.modal-title').text('Daftar Retur Pembelian Barang');
      table = $('#daftarRetur').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listReturBeliBarang')?>",
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
        url: '<?= site_url('Crud/getReturBeliBrg/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_retur;
          $('[name="no_retur"]').val(data.no_retur);
          $('[name="tgl_retur"]').val(moment(data.tgl_retur).format('DD/MM/YYYY'));
          $('#dropNota').val(data.no_nota).trigger('change');
          tbDetRetur(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_retur"]').val()!='')?$('[name="no_retur"]').val():'';
      window.open ( "<?= site_url('Crud/printReturBeliBarang/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/reportReturBeliBarang')?>",'_blank');
    }
  </script>