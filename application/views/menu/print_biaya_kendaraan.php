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
      <input type="hidden" name="">
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
            <div class="to-name" name="karyawan"></div>
            <div class="to-name" name="nopol"></div>
            <div class="to-name" name="sopir"></div>
            <div class="to-name" name="kernet"></div>
          </div>
          <div class="col-sm-8 col-xs-8 printing-info">
            <h4 class="info-code" name="data_code"></h4>
            <div class="reff-content">Tgl : <span name="data_date"></span></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center col-xs-1 col-sm-1">No</th>
                  <th class="text-center col-xs-8 col-sm-8">Keterangan</th>
                  <th class="text-center col-xs-3 col-sm-3">Jumlah</th>
                </tr>
              </thead>
              <tbody id="tb_content"></tbody>
              <tfoot>
                <tr>
                  <th colspan="2" class="text-right">GRAND TOTAL</th>
                  <th class="text-right chgnum"><span name="printing_total"></span></th>
                </tr>
                <tr>
                  <th colspan="3" class="notice-row">
                    <div class="row">
                      <div class="col-sm-2 col-xs-2">TERBILANG<br>KETERANGAN</div>
                      <div class="col-sm-9 col-xs-9"><span name="printing_spelled"></span><br><span name="printing_info"></span></div>
                    </div>
                  </th>
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
    function fetchData(key)
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getPrintBiayaKdr/')?>"+key,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="karyawan"]').text('Pencatat :'+data['a'].nama_karyawan);
          $('[name="nopol"]').text('Kendaraan :'+data['a'].nopol);
          $('[name="sopir"]').text('Sopir :'+data['a'].sopir);
          $('[name="kernet"]').text('Kernet :'+data['a'].kernet);
          $('[name="data_code"]').text(data['a'].no_biaya);
          $('[name="data_date"]').text(data['a'].tgl_biaya);
          $('[name="printing_total"]').text(data['a'].grand_total);
          var blankrow = 7-data['b'].length;
          for (var i = 0; i < data['b'].length; i++)
          {
            var $tr = $('<tr>').append(
              $('<td class="text-center">'+(i+1)+'</td>'),
              $('<td class="text-center">'+data['b'][i]["keterangan"]+'</td>'),
              $('<td class="text-right chgnum">'+data['b'][i]["jumlah"]+'</td>')
              ).appendTo('#tb_content');
          }
          for (var j = 0; j < blankrow; j++)
          {
            var $tr = $('<tr>').append(
              $('<td class="blank-row"></td>'),
              $('<td></td>'),$('<td class="text-center"><button type="button" class="btn btn-danger btn-sm hidden-print delBtn">X</button></td>')
              ).appendTo('#tb_content');
          }
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