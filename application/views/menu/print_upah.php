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
          <!-- <div class="col-sm-2 col-xs-2"> -->
            <!-- <img id="img_logo" class="img-responsive" src=""> -->
            <!-- <h2>Suryajaya</h2> -->
          <!-- </div> -->
          <div class="col-sm-2 col-xs-2 text-left">
            <!-- <img id="img_logo" class="img-responsive" src=""> -->
            <h3><strong>Penggajian</strong></h3>
          </div>
          <!-- <div class="col-sm-2 col-xs-2 company-details">
            <div><span name="comp-address">Tulungagung</span></div>
            <div>Phone <span name="comp-phone">031 845557</span></div>
            <div>Fax <span name="comp-fax">031 845558</span></div>
          </div> -->
        </div>
      </header>
      <main>
        <div class="row">
          <div class="col-sm-4 col-xs-4 to-details">
            <div class="to-name" name="kodekaryawan"></div>
            <div class="to-name" name="karyawan"></div>
            <br>
            <!-- <h3>Sub Total <span name="sub_nom" class="chgnum"></span></h3>
            <h3>Bon <span name="sub_bon" class="chgnum"></span></h3>
            <hr>
            <h3>Jumlah <span name="grand_nom" class="chgnum"></span></h3> -->
          </div>
          <div class="col-sm-2 col-xs-2 printing-info">
            <h4 class="info-code" name="data_code"></h4>
            <div class="reff-content">Tgl : <span name="data_date"></span></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-xs-6 table-responsive">
            <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <th></th><th></th><th></th>
              </thead>
              <tr>
                <td class="col-xs-3">Masuk Kerja</td>
                <td class="col-xs-3"><?= $upah->hari_kerja; ?> hari</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_harian; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">6x Kerja Penuh</td>
                <td class="col-xs-3"></td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_bonusharian; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Hari Minggu</td>
                <td class="col-xs-3"><?= $upah->uang_minggu; ?> hari</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_minggu; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Lembur</td>
                <td class="col-xs-3"><?= $upah->uang_lembur; ?> hari</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_lembur; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Hari Besar</td>
                <td class="col-xs-3"><?= $upah->uang_haribesar; ?> hari</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_haribesar; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Uang Makan</td>
                <td class="col-xs-3"><?= $upah->uang_makan; ?> hari</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_makan; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Gaji Bulanan</td>
                <td class="col-xs-3"><?= $upah->uang_bulanan; ?> bulan</td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_bulanan; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Bonus Bulanan</td>
                <td class="col-xs-3"></td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_bonusbulanan; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Lain - Lain</td>
                <td class="col-xs-3"></td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_lain; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Jumlah</td>
                <td class="col-xs-3"></td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_total; ?></td>
              </tr>
              <tr>
                <td class="col-xs-3">Sisa Bon</td>
                <td class="col-xs-3"></td>
                <td class="col-xs-6 text-right chgnum"><?= $upah->sub_bon; ?></td>
              </tr>
              <tfoot>
                <th class="col-xs-3">Total Terima</th>
                <th class="col-xs-3"></th>
                <th class="col-xs-6 text-right chgnum"><?= $upah->grand_total; ?></th>
              </tfoot>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="5" class="text-right">GRAND TOTAL</th>
                      <th class="text-right chgnum"><span name="printing_total"></span></th>
                    </tr>
                    <tr>
                      <th colspan="6" class="notice-row">
                        <div class="row">
                          <div class="col-sm-2 col-xs-2">TERBILANG<br>KETERANGAN</div>
                          <div class="col-sm-9 col-xs-9"><span name="printing_spelled"></span><br><span name="printing_info"></span></div>
                        </div>
                      </th>
                    </tr>
                  </tfoot> -->
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-xs-6">
            <h3><span name="terbilang"></span></h3>
          </div>
        </div>
      </main>
      <footer>
        <div class="row text-center">
          <div class="col-xs-3 col-sm-3">
            <div>Dibuat</div>
          </div>
          <div class="col-xs-3 col-sm-3">
            <div>Dibayar</div>
          </div>
        </div>
        <div class="row signature">
          <div class="col-xs-3 col-sm-3">
            <div>(................)</div>
          </div>
          <div class="col-xs-3 col-sm-3">
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
        url : "<?php echo site_url('Crud/getPrintUpah/')?>"+key,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="kodekaryawan"]').text('Kode '+data['a'].kode_karyawan);
          $('[name="karyawan"]').text('Nama '+data['a'].nama_karyawan);
          $('[name="sub_nom"]').text('Sub Total '+data['a'].sub_total);
          $('[name="sub_bon"]').text('Potong '+data['a'].sub_bon);
          $('[name="grand_nom"]').text('Jumlah '+data['a'].grand_total);
          $('[name="data_code"]').text(data['a'].no_kuitansi);
          $('[name="data_date"]').text(data['a'].tgl_upah);
          $('[name="terbilang"]').text(data['b']+' Rupiah');
          $('.chgnum').number(true,2);
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