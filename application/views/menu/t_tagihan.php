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
              <h3 class="box-title">Form Tagihan</h3>
            </div>
            <form role="form" id="form-input-upah">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Kuitansi</label>
                      <input type="text" name="no_tagihan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newTagihan()">Tagihan Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editTagihan()">Edit Tagihan</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_tagihan" class="form-control pull-right" id="tgl_upah">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kode Customer</label>
                      <select class="form-control" name="kode_customer" id="dropCustomer" style="width: 100%;">
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
              <form role="form" id="form-detail-tagihan">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Bon</label>
                      <select class="form-control" name="kode_bon" id="dropBon" style="width: 100%;">
                        <option value="">Pilih Bon</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kendaraan</label>
                      <input type="text" name="kendaraan" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Surat Jalan 1</label>
                      <input type="text" name="surat_jalan_a" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Muatan 1</label>
                      <input type="text" name="jenis_muat_a" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addA()">Tambah 1</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Berat Muatan 1</label>
                      <input type="text" name="berat_muat_a" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 1</label>
                      <input type="text" name="ongkos_muat_a" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Surat Jalan 2</label>
                      <input type="text" name="surat_jalan_b" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Muatan 2</label>
                      <input type="text" name="jenis_muat_b" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addB()">Tambah 2</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Berat Muatan 2</label>
                      <input type="text" name="berat_muat_b" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 2</label>
                      <input type="text" name="ongkos_muat_b" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Surat Jalan 3</label>
                      <input type="text" name="surat_jalan_c" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Muatan 3</label>
                      <input type="text" name="jenis_muat_c" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addC()">Tambah 3</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Berat Muatan 3</label>
                      <input type="text" name="berat_muat_c" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 3</label>
                      <input type="text" name="ongkos_muat_c" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Surat Jalan 4</label>
                      <input type="text" name="surat_jalan_d" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Jenis Muatan 4</label>
                      <input type="text" name="jenis_muat_d" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="addD()">Tambah 4</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Berat Muatan 4</label>
                      <input type="text" name="berat_muat_d" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 4</label>
                      <input type="text" name="ongkos_muat_d" class="form-control" readonly>
                    </div>
                  </div>
                </div>
              </form>
              <div id="alertMsg"></div>
              <table id="m_tagihan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="col-xs-1 text-center">Action</th>
                    <th class="col-xs-1 text-center">No Bon</th>
                    <th class="col-xs-2 text-center">Kendaraan</th>
                    <th class="col-xs-2 text-center">Surat Jalan</th>
                    <th class="col-xs-2 text-center">Jenis Muatan</th>
                    <th class="col-xs-1 text-center">Qty</th>
                    <th class="col-xs-3 text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th colspan="6" class="text-center">Grand Total</th>
                    <th class=""><span name="grand_total">0</span></th>
                  </tr>
                </tfoot>
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
            <table id="daftarTagihan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Tagihan</th>
                  <th>Tgl. Pembuatan</th>
                  <th>Klien</th>
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
          $('[name="makan_harian"]').val(data.upah_makan);
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
      subMakan = parseFloat($('[name="uang_makan"]').val())*parseFloat($('[name="makan_harian"]').val());
      $('[name="sub_makan"]').val(subMakan);
      subLembur = parseFloat($('[name="uang_lembur"]').val())*parseFloat($('[name="upah_lembur"]').val());
      $('[name="sub_lembur"]').val(subLembur);
      subMinggu = parseFloat($('[name="uang_minggu"]').val())*parseFloat($('[name="upah_minggu"]').val());
      $('[name="sub_minggu"]').val(subMinggu);
      subHariBesar = parseFloat($('[name="uang_haribesar"]').val())*parseFloat($('[name="upah_haribesar"]').val());
      $('[name="sub_haribesar"]').val(subHariBesar);
      subBulanan = parseFloat($('[name="uang_bulanan"]').val())*parseFloat($('[name="upah_bulanan"]').val());
      $('[name="sub_bulanan"]').val(subBulanan);
      subBonusBulanan = parseFloat($('[name="bonus_bulanan"]').val());
      $('[name="sub_bonusbulanan"]').val(subBonusBulanan);
      subLain = parseFloat($('[name="uang_lain"]').val());
      $('[name="sub_lain"]').val(subLain);
      subJml = parseFloat(subHarian)+parseFloat(subBonusHarian)+parseFloat(subMakan)+parseFloat(subLembur)+parseFloat(subMinggu)+parseFloat(subHariBesar)+parseFloat(subBulanan)+parseFloat(subBonusBulanan)+parseFloat(subLain);
      $('[name="sub_total"]').val(subJml);
      subBon = parseFloat($('[name="sub_bon"]').val());
      grandTotal = parseFloat(subJml)-parseFloat(subBon);
      $('[name="g_total"]').val(grandTotal);
    }
    function inputchg()
    {
      $('.chgcount').on('input', function()
      {
        hitung_();
      });
    }
  </script>