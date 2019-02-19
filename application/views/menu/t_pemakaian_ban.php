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
              <h3 class="box-title">Status Transaksi</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-xs-6">
                  <div class="form-group">
                    <label>
                      <input type="radio" id="sts_trx0" name="status_trx" value="0"  onclick="check_()" checked> Pemasangan
                    </label>
                    <label>
                      <input type="radio" id="sts_trx1" name="status_trx" value="1" onclick="check_()" > Pelepasan
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>        
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-info" id="pemasangan">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pemasangan Ban</h3>
            </div>
            <form role="form" id="form-pemasangan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pemasangan</label>
                      <input type="text" name="no_pemasangan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Bengkel</label>
                      <input type="text" name="bengkel_pemasangan" class="form-control">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newPasang()">Pemasangan Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editPasang()">Edit Pemasangan</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_pemasangan" class="form-control pull-right" id="tgl_pemasangan" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Kendaraan</label>
                      <select class="form-control" name="kode_kendaraan_pasang" id="dropKendaraanA" style="width: 100%;">
                        <option value="">Pilih Kendaraan</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="box box-info" id="pelepasan">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pelepasan Ban</h3>
            </div>
            <form role="form" id="form-pelepasan">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Pelepasan</label>
                      <input type="text" name="no_pelepasan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Bengkel</label>
                      <input type="text" name="bengkel_pelepasan" class="form-control">
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newLepas()">Pelepasan Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editLepas()">Edit Pelepasan</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_pelepasan" class="form-control pull-right" id="tgl_pelepasan" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kendaraan</label>
                      <select class="form-control" name="kode_kendaraan_lepas" id="dropKendaraanB" style="width: 100%;">
                        <option value="">Pilih Kendaraan</option>
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
          <div class="box" id="det_pemasangan">
            <div class="box-body">
              <form role="form" id="form-detail-pemasangan">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Ban</label>
                      <select class="form-control" name="kode_ban_pasang" id="dropBanPsg" style="width: 100%;">
                        <option value="">Pilih Ban</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty Pasang</label>
                      <input type="text" name="qty_pasang" class="form-control num">
                    </div>
                    <div class="form-group">
                      <label>Status Ban</label><br>
                      <label>
                        <input type="radio" name="status_pasang" value="0" checked> Baru
                      </label>
                      <label>
                        <input type="radio" name="status_pasang" value="1"> Bekas
                      </label>
                      <label>
                        <input type="radio" name="status_pasang" value="2"> Vulkanisir
                      </label>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addPasang()">Tambah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Ban</label>
                      <input type="text" name="jenis_ban_psg" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ukuran Ban</label>
                      <input type="text" name="ukuran_ban_psg" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Merk Ban</label>
                      <input type="text" name="merk_ban_psg" class="form-control" readonly>
                    </div>
                    <input type="hidden" name="g_total">
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_pemasangan_ban" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-2 text-center">Action</th>
                    <th class="col-xs-2 text-center">Jenis</th>
                    <th class="col-xs-2 text-center">Ukuran</th>
                    <th class="col-xs-2 text-center">Merk</th>
                    <th class="col-xs-2 text-center">Status</th>
                    <th class="col-xs-2 text-center">Qty</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
          <div class="box" id="det_pelepasan">
            <div class="box-body">
              <form role="form" id="form-detail-pelepasan">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Ban</label>
                      <select class="form-control" name="kode_ban_lepas" id="dropBanLps" style="width: 100%;">
                        <option value="">Pilih Ban</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty Lepas</label>
                      <input type="text" name="qty_lepas" class="form-control num">
                    </div>
                    <div class="form-group">
                      <label>Status Ban</label><br>
                      <label>
                        <input type="radio" name="status_lepas" value="0" checked> Bekas
                      </label>
                      <label>
                        <input type="radio" name="status_lepas" value="1"> Vulkanisir
                      </label>
                      <label>
                        <input type="radio" name="status_lepas" value="2"> Afkir/Buang
                      </label>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addLepas()">Tambah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Ban</label>
                      <input type="text" name="jenis_ban_lps" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ukuran Ban</label>
                      <input type="text" name="ukuran_ban_lps" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Merk Ban</label>
                      <input type="text" name="merk_ban_lps" class="form-control" readonly>
                    </div>
                    <input type="hidden" name="g_total">
                  </div>
                </div>
              </form>
              <div id="alertMsgLps"></div>
              <table id="m_pelepasan_ban" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-2 text-center">Action</th>
                    <th class="col-xs-2 text-center">Jenis</th>
                    <th class="col-xs-2 text-center">Ukuran</th>
                    <th class="col-xs-2 text-center">Merk</th>
                    <th class="col-xs-2 text-center">Status</th>
                    <th class="col-xs-2 text-center">Qty</th>
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
            <table id="daftarPemasangan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No. Transaksi</th>
                  <th>Tanggal</th>
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
      key1 = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'0';
      tbDetPsg(key1);
      key2 = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'0';
      tbDetLps(key2);
      $('#tgl_pemasangan').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_pelepasan').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      check_();
      dropkendaraanA();
      dropkendaraanB();
      dropbanpsg();
      dropbanlps();
      $('#dropBanPsg').change(function()
      {
        pickBanPsg($('#dropBanPsg option:selected').val());
      });
      $('#dropBanLps').change(function()
      {
        pickBanLps($('#dropBanLps option:selected').val());
      });
      $('.num').number(true,2);
    })
    function check_()
    {
      if($('#sts_trx0').is(':checked'))
      {
        $('#pemasangan').show();
        $('#det_pemasangan').show();
        $('#pelepasan').hide();
        $('#det_pelepasan').hide();
        key1 = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'0';
        tbDetPsg(key1);
      }
      if($('#sts_trx1').is(':checked'))
      {
        $('#pelepasan').show();
        $('#det_pelepasan').show();
        $('#pemasangan').hide();
        $('#det_pemasangan').hide();
        key2 = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'0';
        tbDetLps(key2);
      }
    }
    function newPasang()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noPasangBan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_pemasangan"]').val(data.no_pemasangan);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function newLepas()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noLepasBan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_pelepasan"]').val(data.no_pelepasan);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropkendaraanA()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKendaraan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKendaraanA');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_kendaraan']
            option.text = data[i]['nopol'];
            select.add(option);
          }
          $('#dropKendaraanA').select2({placeholder: 'Pilih Kendaraan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    function dropkendaraanB()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKendaraan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKendaraanB');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_kendaraan']
            option.text = data[i]['nopol'];
            select.add(option);
          }
          $('#dropKendaraanB').select2({placeholder: 'Pilih Kendaraan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
    function dropbanpsg()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBanPsg');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_ban']
            option.text = data[i]['kode_ban']+' - '+data[i]['nama_ban'];
            select.add(option);
          }
          $('#dropBanPsg').select2({placeholder: 'Pilih Ban'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get ban data');
        }
      });
    }
    function dropbanlps()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBanLps');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_ban']
            option.text = data[i]['kode_ban']+' - '+data[i]['nama_ban'];
            select.add(option);
          }
          $('#dropBanLps').select2({placeholder: 'Pilih Ban'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get ban data');
        }
      });
    }
    function pickBanPsg(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          var jenis;
          if(data.jenis_ban == '0')
          {
            jenis = 'Ban Dalam';
          }
          else if(data.jenis_ban == '1')
          {
            jenis = 'Ban Luar';
          }
          else
          {
            jenis = 'Marset Ban';
          }
          $('[name="jenis_ban_psg"]').val(jenis);
          $('[name="ukuran_ban_psg"]').val(data.ukuran_ban);
          $('[name="merk_ban_psg"]').val(data.merk_ban);
        }
      });
    }
    function pickBanLps(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBan/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          var jenis;
          if(data.jenis_ban == '0')
          {
            jenis = 'Ban Dalam';
          }
          else if(data.jenis_ban == '1')
          {
            jenis = 'Ban Luar';
          }
          else
          {
            jenis = 'Marset Ban';
          }
          $('[name="jenis_ban_lps"]').val(jenis);
          $('[name="ukuran_ban_lps"]').val(data.ukuran_ban);
          $('[name="merk_ban_lps"]').val(data.merk_ban);
        }
      });
    }
    function tbDetPsg(key)
    {
      table = $('#m_pemasangan_ban').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detPasangBan/')?>"+key,
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
    function tbDetLps(key)
    {
      table = $('#m_pelepasan_ban').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detLepasBan/')?>"+key,
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
    function addPasang()
    {
      key = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addPasangBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pemasangan')[0].reset();
              $('#dropBanPsg').select2({placeholder: 'Pilih Ban'});
              tbDetPsg(key);
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
        alert('No Pemasangan Masih Kosong');
      }
    }
    function removePsg(id)
    {
      key = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvPasangBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pemasangan')[0].reset();
            tbDetPsg(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
          }
        }
      });
    }
    function addLepas()
    {
      key = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addLepasBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
              $('#form-detail-pelepasan')[0].reset();
              $('#dropBanLps').select2({placeholder: 'Pilih Ban'});
              tbDetLps(key);
            }
            else
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
            }
          }
        });
      }
      else
      {
        alert('No Pelepasan Masih Kosong');
      }
    }
    function removeLps(id)
    {
      key = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvLepasBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
            $('#form-detail-pelepasan')[0].reset();
            tbDetLps(key);
          }
          else
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
          }
        }
      });
    }
    function saveDt()
    {
      if($('#sts_trx0').is(':checked'))
      {
        key = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'';
        url = '<?= site_url('Crud/savePasangBan')?>';
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/savePasangBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pemasangan')[0].reset();
              tbDetPsg(key);
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
        key = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'';
        url = '<?= site_url('Crud/saveLepasBan')?>';
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/saveLepasBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
              $('#form-detail-pelepasan')[0].reset();
              tbDetLps(key);
            }
            else
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
            }
          }
        });
      }
    }
    function cancelDt()
    {
      if($('#sts_trx0').is(':checked'))
      {
        key = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'';
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/cancelPasangBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              $('#form-detail-pemasangan')[0].reset();
              tbDetPsg(key);
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
        key = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'';
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/cancelLepasBan')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
              $('#form-detail-pelepasan')[0].reset();
              tbDetLps(key);
            }
            else
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsgLps');
            }
          }
        });
      }
    }
    function editPasang()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pemasangan Ban');
      table = $('#daftarPemasangan').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listPasangBan')?>",
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
    function editLepas()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Pelepasan Ban');
      table = $('#daftarPemasangan').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listLepasBan')?>",
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
    function pilihPasangBan(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getPasangBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_pemasangan;
          $('[name="no_pemasangan"]').val(data.no_pemasangan);
          $('[name="tgl_pemasangan"]').val(moment(data.tgl_pemasangan).format('DD/MM/YYYY'));
          $('[name="bengkel_pemasangan"]').val(data.bengkel_pemasangan);
          $('#dropKendaraanA').val(data.kode_kendaraan).trigger('change');
          tbDetPsg(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function pilihLepasBan(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getLepasBan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_pelepasan;
          $('[name="no_pelepasan"]').val(data.no_pelepasan);
          $('[name="tgl_pelepasan"]').val(moment(data.tgl_pelepasan).format('DD/MM/YYYY'));
          $('[name="bengkel_pelepasan"]').val(data.bengkel_pelepasan);
          $('#dropKendaraanB').val(data.kode_kendaraan).trigger('change');
          tbDetLps(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      if($('#sts_trx0').is(':checked'))
      {
        key = ($('[name="no_pemasangan"]').val()!='')?$('[name="no_pemasangan"]').val():'';
        window.open ( "<?= site_url('Crud/printPasangBan/')?>"+key,'_blank');
      }
      else
      {
        key = ($('[name="no_pelepasan"]').val()!='')?$('[name="no_pelepasan"]').val():'';
        window.open ( "<?= site_url('Crud/printLepasBan/')?>"+key,'_blank');
      }
    }
  </script>