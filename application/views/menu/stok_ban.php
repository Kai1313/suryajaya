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
              <h3 class="box-title">Form Stok Ban</h3>
            </div>
            <form role="form" id="form-master-pembelian">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Opname</label>
                      <input type="text" name="no_opname" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newOpname()">Opname Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editOpname()">Edit Opname</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_opname" class="form-control pull-right" id="tgl_opname" placeholder="dd/mm/yyyy">
                      </div>
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
                      <label>Kode Ban</label>
                      <select class="form-control" name="kode_ban" id="dropBan" style="width: 100%;">
                        <option value="">Pilih Ban</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status Ban</label><br>
                      <label>
                        <input type="radio" name="sts_ban" value="0" checked> Baru
                      </label>
                      <label>
                        <input type="radio" name="sts_ban" value="1"> Bekas
                      </label>
                      <label>
                        <input type="radio" name="sts_ban" value="2"> Vulkanisir
                      </label>
                      <label>
                        <input type="radio" name="sts_ban" value="3"> Afkir/Buang
                      </label>
                      <label>
                        <input type="radio" name="sts_ban" value="4"> Terpasang
                      </label>
                    </div>
                    <div class="form-group">
                      <label>Qty Opname</label>
                      <input type="text" name="qty_opname" class="form-control num">
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Stok Saat Ini</label>
                      <input type="text" name="stok" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" class="btn btn-sm btn-primary" onclick="add()">Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_detOpname" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-2 text-center">Action</th>
                    <th class="col-xs-3 text-center">Part Number</th>
                    <th class="col-xs-4 text-center">Nama</th>
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
            <table id="daftarOpname" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Opname</th>
                  <th>Tgl. Opname</th>
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
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'0';
      tbDetOpname(key);
      $('#tgl_opname').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      dropban();
      $('#dropBan').change(function()
      {
        pickBan($('#dropBan option:selected').val());
      });
      $('.num').number(true,2);
    })
    function newOpname()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noOpnameBan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_opname"]').val(data.no_opname);
          $('#newBtn').prop('disabled',true);
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
            option.value = data[i]['kode_ban']
            option.text = data[i]['nama_ban']+' - '+data[i]['merk_ban']+' - '+data[i]['ukuran_ban'];
            select.add(option);
          }
          $('#dropBan').select2({placeholder: 'Pilih Ban'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    function pickBan(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          switch()
          {
            case '0':
            $('[name="stok"]').val(data.stok_baru);
            break;
            case '1':
            $('[name="stok"]').val(data.stok_bekas);
            break;
            case '2':
            $('[name="stok"]').val(data.stok_vulkanisir);
            break;
            case '3':
            $('[name="stok"]').val(data.stok_afkir);
            break;
            case '4':
            $('[name="stok"]').val(data.stok_pasang);
            break;
            default:
            break;
          }
        }
      });
    }
    function tbDetOpname(key)
    {
      table = $('#m_detOpname').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detOpnameBan/')?>"+key,
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
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addOpnameBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pembelian')[0].reset();
              $('#dropBan').select2({placeholder: 'Select an option'});
              tbDetOpname(key);
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
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvOpnameBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetOpname(key);
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
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveOpnameBan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetOpname(key);
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
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelOpnameBan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetOpname(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function editOpname()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Opname Ban');
      table = $('#daftarOpname').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listOpnameBan')?>",
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
    function pilihOpnameBan(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getOpnameBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_opname;
          $('[name="no_opname"]').val(data.no_opname);
          $('[name="tgl_opname"]').val(moment(data.tgl_opname).format('DD/MM/YYYY'));
          tbDetOpname(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_opname"]').val()!='')?$('[name="no_opname"]').val():'';
      window.open ( "<?= site_url('Crud/printOpnameBan/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/reportOpnameBan')?>",'_blank');
    }
  </script>