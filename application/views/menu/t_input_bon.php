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
              <h3 class="box-title">Form Input Bon Karyawan</h3>
            </div>
            <form role="form" id="form-bon-karyawan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Bon</label>
                      <input type="text" name="no_bon" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_bon" class="form-control pull-right" id="tgl_bon" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Karyawan</label>
                      <select class="form-control" name="kode_karyawan" id="dropKaryawan" style="width: 100%;">
                        <option value="">Pilih Karyawan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newBon()">Bon Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editBon()">Edit Bon</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="ket_bon" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Sisa Bon</label>
                      <input type="text" name="jml_bon" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nominal Bon</label>
                      <input type="text" name="nom_bon" class="form-control num">
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
            <table id="daftarBon" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Bon</th>
                  <th>Tgl. Bon</th>
                  <th>Karyawan</th>
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
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'0';
      $('#tgl_bon').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      dropkaryawan();
      $('#dropKaryawan').change(function()
      {
        pickKaryawan($('#dropKaryawan option:selected').val());
      });
      $('.num').number(true,2);
    })
    function newBon()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noBonKaryawan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_bon"]').val(data.no_bon);
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
    function pickKaryawan(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropKaryawan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="jml_bon"]').val(data.jml_bon);
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveBonKaryawan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
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
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBonKaryawan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editBon()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Bon Karyawan');
      table = $('#daftarBon').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listBonKaryawan')?>",
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
    function pilihBon(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getBonKaryawan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_bon;
          $('[name="no_bon"]').val(data.no_bon);
          $('[name="tgl_bon"]').val(moment(data.tgl_bon).format('DD/MM/YYYY'));
          $('[name="ket_bon"]').val(data.ket_bon);
          $('[name="nom_bon"]').val(data.nom_bon);
          $('#dropKaryawan').val(data.kode_karyawan).trigger('change');
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      window.open ( "<?= site_url('Crud/printBonKaryawan/')?>"+key,'_blank');
    }
  </script>