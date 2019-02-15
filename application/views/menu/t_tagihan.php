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
                        <input type="text" name="tgl_tagihan" class="form-control pull-right" id="tgl_tagihan">
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
                    <div class="form-group">
                      <label>Tanggal Muat Berangkat</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_muat_a" class="form-control pull-right" id="tgl_muat_a">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Muat Kembali</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_muat_b" class="form-control pull-right" id="tgl_muat_b">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label>Kendaraan</label>
                      <input type="text" name="kendaraan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Bongkar Berangkat</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_bongkar_a" class="form-control pull-right" id="tgl_bongkar_a">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Bongkar Kembali</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_bongkar_b" class="form-control pull-right" id="tgl_bongkar_b">
                      </div>
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
                      <input type="text" name="berat_muat_a" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 1</label>
                      <input type="text" name="ongkos_muat_a" class="form-control num" readonly>
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
                      <input type="text" name="berat_muat_b" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 2</label>
                      <input type="text" name="ongkos_muat_b" class="form-control num" readonly>
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
                      <input type="text" name="berat_muat_c" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 3</label>
                      <input type="text" name="ongkos_muat_c" class="form-control num" readonly>
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
                      <input type="text" name="berat_muat_d" class="form-control num" readonly>
                    </div>
                    <div class="form-group">
                      <label>Ongkos Muatan 4</label>
                      <input type="text" name="ongkos_muat_d" class="form-control num" readonly>
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
                    <th class="num_"><span name="sub_total">0</span></th>
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
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'0';
      tbDetTagihan(key);
      $('#tgl_tagihan').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      dropcustomer();
      dropbon();
      $('#dropBon').change(function()
      {
        pickBon($('#dropBon option:selected').val());
      });
      $('.num').number(true,2);
    })
    function newTagihan()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noTagihan')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_tagihan"]').val(data.no_tagihan);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropcustomer()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropCustomer');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['kode_customer']+' - '+data[i]['nama_customer'];
            select.add(option);
          }
          $('#dropCustomer').select2({placeholder: 'Pilih Customer'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function dropbon()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKasBonKantor')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBon');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['no_bon']
            option.text = data[i]['no_bon'];
            select.add(option);
          }
          $('#dropBon').select2({placeholder: 'Pilih Bon'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get bon data');
        }
      });
    }
    function pickBon(key)
    {
      cust = ($('#dropCustomer option:selected').val()!='')?$('#dropCustomer option:selected').val():'';
      if(cust != '')
      {
        $.ajax({
          type: 'GET',
          url: '<?= site_url('Crud/pickDropKasBonKantor/')?>'+key,
          dataType: 'JSON',
          success: function(data)
          {
            $('[name="kendaraan"]').val(data.nopol);
            $('[name="tgl_muat_a"]').val(data.tgl_muat);
            $('[name="tgl_muat_b"]').val(data.tgl_muat_b);
            $('[name="tgl_bongkar_a"]').val(data.tgl_bongkar);
            $('[name="tgl_bongkar_b"]').val(data.tgl_bongkar_b);
            if(data.kode_customer_a === cust)
            {
              $('[name="jenis_muat_a"]').val(data.jenis_muatan_a);
              $('[name="surat_jalan_a"]').val(data.surat_jalan_a);
              $('[name="berat_muat_a"]').val(data.berat_muatan_a);
              $('[name="ongkos_muat_a"]').val(data.ongkos_bruto);
            }
            if(data.kode_customer_c === cust)
            {
              $('[name="jenis_muat_b"]').val(data.jenis_muatan_b);
              $('[name="surat_jalan_b"]').val(data.surat_jalan_b);
              $('[name="berat_muat_b"]').val(data.berat_muatan_b);
              $('[name="ongkos_muat_b"]').val(data.ongkos_bruto_b);
            }
            if(data.kode_customer_e === cust)
            {
              $('[name="jenis_muat_c"]').val(data.jenis_muatan_c);
              $('[name="surat_jalan_c"]').val(data.surat_jalan_c);
              $('[name="berat_muat_c"]').val(data.berat_muatan_c);
              $('[name="ongkos_muat_c"]').val(data.ongkos_bruto_c);
            }
            if(data.kode_customer_g === cust)
            {
              $('[name="jenis_muat_d"]').val(data.jenis_muatan_d);
              $('[name="surat_jalan_d"]').val(data.surat_jalan_d);
              $('[name="berat_muat_d"]').val(data.berat_muatan_d);
              $('[name="ongkos_muat_d"]').val(data.ongkos_bruto_d);
            }
          }
        });
      }
      else
      {
        alert('Belum Pilih Customer');
      }
    }
    function tbDetTagihan(key)
    {
      table = $('#m_tagihan').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/detTagihan/')?>"+key,
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
    function subTotal(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/subTotalTagihan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="sub_total"]').text(data.subtotal);
          $('th.num_').number(true,2);
        }
      });
    }
    function addA()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addTagihanA')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              tbDetTagihan(key);
              subTotal(key);
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
        alert('No Tagihan Masih Kosong');
      }
    }
    function addB()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addTagihanB')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              tbDetTagihan(key);
              subTotal(key);
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
        alert('No Tagihan Masih Kosong');
      }
    }
    function addC()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addTagihanC')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              tbDetTagihan(key);
              subTotal(key);
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
        alert('No Tagihan Masih Kosong');
      }
    }
    function addD()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      if(key!='')
      {
        $.ajax({
          type: 'POST',
          url: '<?= site_url('Crud/addTagihanD')?>',
          data: $('form').serialize(),
          dataType: 'JSON',
          success: function(data)
          {
            if(data.status)
            {
              msg = $('<div>').append(data.msg).appendTo('#alertMsg');
              tbDetTagihan(key);
              subTotal(key);
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
        alert('No Tagihan Masih Kosong');
      }
    }
    function remove(id)
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/rmvTagihan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            tbDetTagihan(key);
            subTotal(key);
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
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveTagihan')?>',
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
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelTagihan')?>',
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
    function editTagihan()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Tagihan');
      table = $('#daftarTagihan').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listTagihan')?>",
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
    function pilihTagihan(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getTagihan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_tagihan;
          $('[name="no_tagihan"]').val(data.no_tagihan);
          $('[name="tgl_tagihan"]').val(data.tgl_tagihan);
          $('#dropCustomer').val(data.kode_customer).trigger('change');
          tbDetTagihan(key);
          subTotal(key);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function printDt()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'';
      window.open ( "<?= site_url('Crud/printTagihan/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/lapTagihan')?>",'_blank');
    }
  </script>