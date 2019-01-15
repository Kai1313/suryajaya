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
              <h3 class="box-title">Form Input Upah Karyawan</h3>
            </div>
            <form role="form" id="form-input-upah">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Kuitansi</label>
                      <input type="text" name="no_kuitansi" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newUpah()">Upah Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editUpah()">Edit Upah</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_upah" class="form-control pull-right" id="tgl_upah">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Karyawan</label>
                      <select class="form-control" name="kode_karyawan" id="dropKaryawan" style="width: 100%;">
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
                  <div class="col-md-4 col-xs-4">
                    <div class="form-group">
                      <label>Masuk Kerja</label>
                      <div class="input-group">
                        <span class="input-group-addon">Hari</span>
                        <input type="text" name="hari_kerja" id="hari_kerja" class="form-control chgcount">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Bonus Harian</label>
                      <input type="text" name="bonus_harian" class="form-control chgcount">
                    </div>
                    <div class="form-group">
                      <label>Uang Makan</label>
                      <div class="input-group">
                        <span class="input-group-addon">Hari</span>
                        <input type="text" name="uang_makan" id="uang_makan" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Uang Lembur</label>
                      <div class="input-group">
                        <span class="input-group-addon">Jam</span>
                        <input type="text" name="uang_lembur" id="uang_lembur" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Hari Minggu</label>
                      <div class="input-group">
                        <span class="input-group-addon">Hari</span>
                        <input type="text" name="uang_minggu" id="uang_minggu" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Hari Besar</label>
                      <div class="input-group">
                        <span class="input-group-addon">Hari</span>
                        <input type="text" name="uang_haribesar" id="uang_haribesar" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Gaji Bulanan</label>
                      <div class="input-group">
                        <span class="input-group-addon">Bulan</span>
                        <input type="text" name="uang_bulanan" id="uang_bulanan" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Bonus Bulanan</label>
                      <input type="text" name="bonus_bulanan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Lain-Lain</label>
                      <input type="text" name="uang_lain" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Minimum Lembur</label>
                      <div class="input-group">
                        <span class="input-group-addon">Jam</span>
                        <input type="text" name="min_lembur" id="min_lembur" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Sisa Bon</label>
                      <input type="text" name="sisa_bon" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-4">
                    <div class="form-group">
                      <label>Upah Harian</label>
                      <input type="text" name="upah_harian" class="form-control" readonly>
                    </div>
                    <div class="form-group" style="height: 59px; margin-bottom: 15px;">
                    </div>
                    <div class="form-group">
                      <label>Uang Makan harian</label>
                      <input type="text" name="makan_harian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Upah Lembur</label>
                      <input type="text" name="upah_lembur" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Upah Hari Minggu</label>
                      <input type="text" name="upah_minggu" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Upah Hari Besar</label>
                      <input type="text" name="upah_haribesar" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Upah Bulanan</label>
                      <input type="text" name="upah_bulanan" class="form-control" readonly>
                    </div>
                    <div class="form-group" style="height: 59px; margin-bottom: 15px;">
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="upah_lain" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-4">
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_harian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_bonusharian" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_makan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_lembur" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_minggu" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_haribesar" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_bulanan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_bonusbulanan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>&nbsp;</label>
                      <input type="text" name="sub_lain" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" name="sub_total" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Potong Bon</label>
                      <input type="text" name="sub_bon" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Grand Total</label>
                      <input type="text" name="g_total" class="form-control" readonly>
                    </div>
                  </div>
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
            <table id="daftarUpah" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Kuitansi</th>
                  <th>Tgl. Pembuatan</th>
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'0';
      $('#tgl_upah').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      dropkaryawan();
      $('#dropKaryawan').change(function()
      {
        pickKaryawan($('#dropKaryawan option:selected').val());
      });
      inputchg();
    })
    function newUpah()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noKuitansiUpah')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_kuitansi"]').val(data.no_kuitansi);
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
          $('[name="upah_harian"]').val(data.upah_harian);
          $('[name="upah_lembur"]').val(data.upah_lembur);
          $('[name="upah_minggu"]').val(data.upah_hari_minggu);
          $('[name="upah_haribesar"]').val(data.upah_hari_besar);
          $('[name="upah_bulanan"]').val(data.gaji_bulanan);
          $('[name="sisa_bon"]').val(data.jml_bon);
          $('[name="min_lembur"]').val(data.min_jam_lembur);
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveBayarUpahKaryawan')?>',
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
      key = ($('[name="no_kuitansi"]').val()!='')?$('[name="no_kuitansi"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBayarUpahKaryawan')?>',
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
    function editUpah()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Upah Karyawan');
      table = $('#daftarUpah').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listUpahKaryawan')?>",
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
    function pilihUpahKry(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getUpahKaryawan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_kuitansi;
          $('[name="no_kuitansi"]').val(data.no_kuitansi);
          $('[name="tgl_upah"]').val(data.tgl_upah);
          $('#dropKaryawan').val(data.kode_karyawan).trigger('change');
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function hitung_()
    {
      subHarian = parseFloat($('[name="hari_kerja"]').val())*parseFloat($('[name="upah_harian"]').val());
      $('[name="sub_harian"]').val(subHarian);
      subBonusHarian = parseFloat($('[name="bonus_harian"]').val());
      $('[name="sub_bonusharian"]').val(subBonusHarian);
    }
    function inputchg()
    {
      $('.chgcount').on('input', function()
      {
        hitung_();
      });
    }
  </script>