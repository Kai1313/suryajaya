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
            <div>Data :</div>
            <div class="to-name" name="kendaraan"></div>
            <div class="to-phone" name="sopir"></div>
            <div class="to-address" name="kernet"></div>
          </div>
          <div class="col-sm-8 col-xs-8 printing-info">
            <h4 class="info-code" name="data_code"></h4>
            <div class="reff-content">Tgl : <span name="data_date"></span></div>
            <!-- <div class="reff-content">Rekening : <span name="data_acc"></span></div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Jumlah</th>
                </tr>
              </thead>
              <tbody id="tb_content_a"></tbody>
              <tfoot>
                <tr>
                  <th colspan="2" class="text-right">TOTAL</th>
                  <th class="text-right chgnum"><span name="printing_total_a"></span></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Tanggal Muat</th>
                  <th class="text-center">Tanggal Bongkar</th>
                  <th class="text-center">Pengirim</th>
                  <th class="text-center">Penerima</th>
                  <th class="text-center">Surat Jalan</th>
                  <th class="text-center">Jenis Muatan</th>
                  <th class="text-center">Berat Muatan</th>
                </tr>
              </thead>
              <tbody id="tb_content_b"></tbody>
              <tfoot>
                <tr>
                  <th colspan="6" class="text-right">TOTAL</th>
                  <th class="text-right chgnum"><span name="printing_total_b"></span></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Tanggal Muat</th>
                  <th class="text-center">Tanggal Bongkar</th>
                  <th class="text-center">Pengirim</th>
                  <th class="text-center">Penerima</th>
                  <th class="text-center">Surat Jalan</th>
                  <th class="text-center">Jenis Muatan</th>
                  <th class="text-center">Berat Muatan</th>
                </tr>
              </thead>
              <tbody id="tb_content_c"></tbody>
              <tfoot>
                <tr>
                  <th colspan="6" class="text-right">TOTAL</th>
                  <th class="text-right chgnum"><span name="printing_total_c"></span></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Jumlah</th>
                </tr>
              </thead>
              <tbody id="tb_content_d"></tbody>
              <tfoot>
                <tr>
                  <th colspan="2">&nbsp;</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </main>
      <footer>
        <div class="row text-center">
          <div class="col-xs-3 col-sm-3">
            <div>Kepada</div>
          </div>
          <div class="col-xs-offset-2 col-sm-offset-2 col-xs-3 col-sm-3">
            <div>Mengetahui</div>
          </div>
        </div>
        <div class="row signature">
          <div class="col-xs-3 col-sm-3">
            <div>(................)</div>
          </div>
          <div class="col-xs-offset-2 col-sm-offset-2 col-xs-3 col-sm-3">
            <div>(................)</div>
          </div>
        </div>
      </footer>
    </div>
  </body>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/jspack.php' ;?>
  <script>
    $(function ()
    {
      key = '<?= $key ;?>';
      fetchData(key);
    })
    function fetchData(key)
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getPrintKasBonKantor/')?>"+key,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="kendaraan"]').text(data['a'].nopol+' - '+data['a'].tipe_kendaraan+' - '+data['a'].jenis_kendaraan);
          $('[name="sopir"]').text('Sopir : '+data['a'].sopir);
          $('[name="kernet"]').text('Kernet : '+data['a'].kernet);
          $('[name="data_code"]').text(data['a'].no_bon);
          $('[name="data_date"]').text(data['a'].tgl_bon);
          bjn = (data['a'].berat_jenis != 0)?'Dm3':'Kg';

          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_bon_kota"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Sangu Kota</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_saku_kota"])*parseFloat(100000)+'</td>'),
              ).appendTo('#tb_content_a');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_bon_a"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Sangu 1</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_saku_a"])*parseFloat(100000)+'</td>')
              ).appendTo('#tb_content_a');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_bon_b"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Sangu 2</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_saku_b"])*parseFloat(100000)+'</td>')
              ).appendTo('#tb_content_a');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_bon_c"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Sangu 3</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_saku_c"])*parseFloat(100000)+'</td>')
              ).appendTo('#tb_content_a');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_bon_d"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Sangu 4</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_saku_d"])*parseFloat(100000)+'</td>')
              ).appendTo('#tb_content_a');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_solar"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">Bon Solar</td>'),
              $('<td class="text-right chgnum">'+parseFloat(data['a']["uang_solar"])*parseFloat(100000)+'</td>')
              ).appendTo('#tb_content_a');
          $('[name="printing_total_a"]').text(data['a'].sub_bonall);

          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_muat"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+moment(data['a']["tgl_bongkar"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_a"]+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_b"]+'</td>'),
              $('<td class="text-center">'+data['a']["surat_jalan_a"]+'</td>'),
              $('<td class="text-center">'+data['a']["jenis_muatan_a"]+' '+bjn+'</td>'),
              $('<td class="text-right chgnum">'+data['a']["berat_muatan_a"]+'</td>')
              ).appendTo('#tb_content_b');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_muat"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+moment(data['a']["tgl_bongkar"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_c"]+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_d"]+'</td>'),
              $('<td class="text-center">'+data['a']["surat_jalan_b"]+'</td>'),
              $('<td class="text-center">'+data['a']["jenis_muatan_b"]+' '+bjn+'</td>'),
              $('<td class="text-right chgnum">'+data['a']["berat_muatan_b"]+'</td>')
              ).appendTo('#tb_content_b');
          $('[name="printing_total_b"]').text(data['a'].sub_beratmuat);

          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_muat_b"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+moment(data['a']["tgl_bongkar_b"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_e"]+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_f"]+'</td>'),
              $('<td class="text-center">'+data['a']["surat_jalan_c"]+'</td>'),
              $('<td class="text-center">'+data['a']["jenis_muatan_c"]+' '+bjn+'</td>'),
              $('<td class="text-right chgnum">'+data['a']["berat_muatan_c"]+'</td>')
              ).appendTo('#tb_content_c');
          var $tr = $('<tr>').append(
              $('<td class="text-center">'+moment(data['a']["tgl_muat_b"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+moment(data['a']["tgl_bongkar_b"]).locale('id').format('DD/MM/YYYY')+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_g"]+'</td>'),
              $('<td class="text-center">'+data['a']["kode_customer_h"]+'</td>'),
              $('<td class="text-center">'+data['a']["surat_jalan_d"]+'</td>'),
              $('<td class="text-center">'+data['a']["jenis_muatan_d"]+' '+bjn+'</td>'),
              $('<td class="text-right chgnum">'+data['a']["berat_muatan_d"]+'</td>')
              ).appendTo('#tb_content_c');
          $('[name="printing_total_c"]').text(data['a'].sub_beratmuat_b);

          var $tr = $('<tr>').append(
              $('<td class="text-center">Solar Berangkat</td>'),
              $('<td class="text-right chgnum">'+data['a']["solar_berangkat"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Solar Kembali</td>'),
              $('<td class="text-right chgnum">'+data['a']["solar_kembali"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Bantuan 1</td>'),
              $('<td class="text-right chgnum">'+data['a']["bantuan_a"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Bantuan 2</td>'),
              $('<td class="text-right chgnum">'+data['a']["bantuan_b"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Bantuan 3</td>'),
              $('<td class="text-right chgnum">'+data['a']["bantuan_c"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Bantuan 4</td>'),
              $('<td class="text-right chgnum">'+data['a']["bantuan_d"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Tambahan 1</td>'),
              $('<td class="text-right chgnum">'+data['a']["tambah_a"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Tambahan 2</td>'),
              $('<td class="text-right chgnum">'+data['a']["tambah_b"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Tambahan 3</td>'),
              $('<td class="text-right chgnum">'+data['a']["tambah_c"]+'</td>')
              ).appendTo('#tb_content_d');
          var $tr = $('<tr>').append(
              $('<td class="text-center">Tambahan 4</td>'),
              $('<td class="text-right chgnum">'+data['a']["tambah_d"]+'</td>')
              ).appendTo('#tb_content_d');

          $('td.chgnum').number(true,2);
          $('th.chgnum').number(true,2);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data from ajax');
        }
      });
    }
    function printDiv()
    {
      window.print();
    }
  </script>