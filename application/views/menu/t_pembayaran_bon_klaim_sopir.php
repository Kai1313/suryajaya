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
      <div id="alertMsg"></div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pembayaran Bon/Klaim Sopir</h3>
            </div>
            <form role="form" id="form-bon-karyawan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Bayar</label>
                      <input type="text" name="no_bayar" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_bayar" class="form-control pull-right" id="tgl_bayar">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Sopir</label>
                      <select class="form-control" name="kode_sopir" id="dropSopir" style="width: 100%;">
                        <option value="">Pilih Sopir</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newBayar()">Bayar Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editBayar()">Edit Bayar</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Sisa Bon</label>
                      <input type="text" name="jml_bon" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nominal Bon</label>
                      <input type="text" name="nom_bon" class="form-control num">
                    </div>
                    <div class="form-group">
                      <label>Sisa Klaim</label>
                      <input type="text" name="jml_klaim" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nominal Klaim</label>
                      <input type="text" name="nom_klaim" class="form-control num">
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
            <table id="daftarBayar" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Bayar</th>
                  <th>Tgl. Bayar</th>
                  <th>Sopir</th>
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
      key = ($('[name="no_bayar"]').val()!='')?$('[name="no_bayar"]').val():'0';
      $('#tgl_bayar').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      dropsopir();
      $('#dropSopir').change(function()
      {
        pickSopir($('#dropSopir option:selected').val());
      });
      $('.num').number(true,2);
    })
    function newBayar()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noBayarSopir')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_bayar"]').val(data.no_bayar);
          $('#newBtn').prop('disabled',true);
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
    function pickSopir(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropSopir/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="jml_bon"]').val(data.jml_bon);
          $('[name="jml_klaim"]').val(data.jml_klaim);
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_bayar"]').val()!='')?$('[name="no_bayar"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveBayarSopir')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            pickSopir($('#dropSopir option:selected').val());
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
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
      key = ($('[name="no_bayar"]').val()!='')?$('[name="no_bayar"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBayarSopir')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            pickSopir($('#dropSopir option:selected').val());
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editBayar()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Bayar Sopir');
      table = $('#daftarBayar').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listBayarSopir')?>",
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
    function pilihBayar(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBayarSopir/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_bayar;
          $('[name="no_bayar"]').val(data.no_bayar);
          $('[name="tgl_bayar"]').val(data.tgl_bayar);
          $('[name="nom_bon"]').val(data.nom_bon);
          $('[name="nom_klaim"]').val(data.nom_klaim);
          $('#dropSopir').val(data.kode_driver).trigger('change');
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_bayar"]').val()!='')?$('[name="no_bayar"]').val():'';
      window.open ( "<?= site_url('Crud/printBonKlaimSopir/')?>"+key,'_blank');
    }
  </script>