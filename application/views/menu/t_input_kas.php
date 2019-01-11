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
              <h3 class="box-title">Form Input Kas</h3>
            </div>
            <form role="form" id="form-bon-karyawan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Kas</label>
                      <input type="text" name="no_kas" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_kas" class="form-control pull-right" id="tgl_kas">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newKas()">Kas Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editKas()">Edit Kas</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Debet</label>
                      <input type="text" name="debet" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Kredit</label>
                      <input type="text" name="kredit" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="ket_kas" class="form-control" rows="4"></textarea>
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
            <table id="daftarKas" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Kas</th>
                  <th>Tgl. Kas</th>
                  <th>Nominal</th>
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
      key = ($('[name="no_kas"]').val()!='')?$('[name="no_kas"]').val():'0';
      $('#tgl_kas').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
    })
    function newKas()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noKas')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_kas"]').val(data.no_kas);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_kas"]').val()!='')?$('[name="no_kas"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveKas')?>',
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
      key = ($('[name="no_kas"]').val()!='')?$('[name="no_kas"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelKas')?>',
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
    function editKas()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Kas');
      table = $('#daftarKas').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listKas')?>",
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
    function pilihKas(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKas/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_kas;
          $('[name="no_kas"]').val(data.no_kas);
          $('[name="tgl_kas"]').val(data.tgl_kas);
          $('[name="ket_kas"]').val(data.ket_kas);
          $('[name="debet"]').val(data.debet);
          $('[name="kredit"]').val(data.kredit);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
  </script>