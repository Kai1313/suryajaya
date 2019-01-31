  <?php include 'application/views/layout/head.php' ;?>
  <style>
    .printing
    {
      position: relative;
      background-color: #FFF;
      min-height: 680px;
      padding: 0px;
      font-family: Times New Roman;
    }
    .printing header
    {
      padding: 0px 0px 0px 0px;
      margin-bottom: 0px;
      border-bottom: 1px solid #3989c6;
    }
    .printing header img
    {
      max-width: 200px;
      margin-top: 0;
      margin-bottom: 0;
    }
    .printing .company-details
    {
      text-align: right;
      margin-top: 0;
      margin-bottom: 0;
    }
    .printing main
    {
      padding: 0px 0px 0px 0px;
      margin-bottom: 0px;
    }
    .printing .to-details
    {
      text-align: left;
    }
    .printing .to-name
    {
      font-weight: bold;
    }
    .printing .to-name .to-address .to-city .to-phone
    {
      margin-top: 0;
      margin-bottom: 0;
    }
    .printing .printing-reff
    {
      text-align: center;
    }        
    .printing .printing-info
    {
      text-align: right;
    }
    .printing-info .reff-content
    {
      margin-top: 0;
      margin-bottom: 0;
    }
    .printing-info .info-code
    {
      font-weight: bold;
    }
    .printing-info .info-code .info-date
    {
      margin-top: 0;
      margin-bottom: 0;
    }
    .table thead th
    {
      margin: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
      border: solid 1px black !important;
    }
    .table tfoot th
    {
      margin: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
      border: solid 1px black !important;
    }
    .table .notice-row
    {
      height: 63px !important;
    }
    .table td
    {
      margin: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
      border-top: none !important;
      border-bottom: none !important;
      border-left: solid 1px black !important;
      border-right: solid 1px black !important;            
    }
    .table .blank-row
    {
      height: 25px !important;
      background-color: #FFFFFF;
      border: none;
    }
    .printing .loc-info .loc-notice
    {
      margin-top: 0;
      margin-bottom: 0;
    }
    footer
    {
      padding-top: -1000px;
    }
    footer .signature
    {
      padding-top: 40px;
      text-align: center;
    }
    footer .foot-notice
    {
      margin-top: 0;
      margin-bottom: 0;
    }
    footer .notices
    {
      padding-left: 6px;
      border-left: 6px solid #3989c6
    }
    footer .notices-height
    {
      height: 42px;
    }
    @media print
    {
      .hidden-print
      {
        display: none;
      }
    }
    </style>
  <body>
    <div class="container hidden-print">
      <div class="row">
        <div class="col-sm-2 col-xs-3">
          <button class="btn btn-block btn-primary" type="button" onclick="printDiv()">Print</button>
        </div>
        <div class="col-sm-2 col-xs-3">
          <button class="btn btn-block btn-success addBtn" type="button">Tambah Kolom</button>
        </div>
    </div>
    <div class="container printing" id="print-div">
      <header>
        <div class="row">
          <div class="col-sm-3 col-xs-3">
            <!-- <img id="img_logo" class="img-responsive" src=""> -->
            <h2>Suryajaya</h2>
          </div>
          <div class="col-sm-9 col-xs-9 company-details">
            <div><span name="comp-address">Tulungagung</span></div>
            <div>Phone <span name="comp-phone">031 845557</span></div>
            <div>Fax <span name="comp-fax">031 845558</span></div>
          </div>
        </div>
      </header>
      <main>
        <div class="row">
          <div class="col-sm-4 col-xs-4 to-details">
            <div>Kepada :</div>
            <div class="to-name" name="to_name"></div>
            <div class="to-phone" name="to_phone"></div>
            <div class="to-address" name="to_address"></div>
          </div>
          <div class="col-sm-8 col-xs-8 printing-info">
            <h4 class="info-code" name="cashout_code"></h4>
            <div class="reff-content">Tgl : <span name="cashout_date"></span></div>
            <div class="reff-content">Rekening : <span name="cash_acc"></span></div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center col-xs-1 col-sm-2">Perkiraan</th>
                  <th class="text-center col-xs-7 col-sm-7">Deskripsi</th>
                  <th class="text-center col-xs-2 col-sm-2">Jumlah</th>
                </tr>
              </thead>
              <tbody id="tb_content"></tbody>
              <tfoot>
                <tr>
                  <th colspan="2" class="text-right">TOTAL</th>
                  <th class="text-right chgnum-perc"><span name="cashout_total"></span></th>
                </tr>
                <tr>
                  <th colspan="3" class="notice-row">
                    <div class="row">
                      <div class="col-sm-2 col-xs-2">TERBILANG<br>KETERANGAN</div>
                      <div class="col-sm-9 col-xs-9"><span name="cashout_spelled"></span><br><span name="cashout_info"></span></div>
                    </div>
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div> -->
      </main>
    </div>
  </body>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/jspack.php' ;?>
  <script>
    $(function ()
    {
      key = ($('[name="no_tagihan"]').val()!='')?$('[name="no_tagihan"]').val():'0';
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
  </script>