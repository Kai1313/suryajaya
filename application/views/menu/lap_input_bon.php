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
    /*.table thead th
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
    }*/
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
          <label>Tanggal Awal</label>
          <div class="input-group date">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <input type="text" name="tgl_awal" class="form-control pull-right" id="tgl_awal" placeholder="dd/mm/yyyy">
          </div>
        </div>
        <div class="col-sm-2 col-xs-3">
          <label>Tanggal Akhir</label>
          <div class="input-group date">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <input type="text" name="tgl_akhir" class="form-control pull-right" id="tgl_akhir" placeholder="dd/mm/yyyy">
          </div>
        </div>
        <div class="col-sm-2 col-xs-3">
          <label>Karyawan</label>
          <select class="form-control" name="kode_karyawan" id="dropKaryawan" style="width: 100%;">
            <option value="">Pilih Karyawan</option>
          </select>
        </div>
        <div class="col-sm-2 col-xs-3">
          <label>&nbsp;</label>
          <button type="button" class="btn btn-block btn-primary" onclick="reloadTb()">Filter</button>
        </div>
      </div>
    </div>
    <div class="container printing" id="print-div">
      <header>
        <div class="row">
          <div class="col-sm-3 col-xs-3">
            <!-- <img id="img_logo" class="img-responsive" src=""> -->
            <h2 name="cpmp-name">Suryajaya</h2>
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
            <h4 class="info-code" name="data_code"></h4>
            <div class="reff-content">Tgl : <span name="data_date"></span></div>
            <!-- <div class="reff-content">Rekening : <span name="data_acc"></span></div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xs-12 table-responsive">
            <table id="rptInputBon" class="table table-bordered" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center col-xs-1 col-sm-1">Tanggal</th>
                  <th class="text-center col-xs-3 col-sm-3">No Bon</th>
                  <th class="text-center col-xs-3 col-sm-3">Karyawan</th>
                  <th class="text-center col-xs-3 col-sm-3">Keterangan</th>
                  <th class="text-center col-xs-2 col-sm-2">Jumlah</th>
                </tr>
              </thead>
              <tbody id="tb_content"></tbody>
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
      fetchData();
      appsData();
      dropkaryawan();
      $('#tgl_awal').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_akhir').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
    })
    function appsData()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getAppsData')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="comp-name"]').text(data.nama);
          $('[name="comp-address"]').text(data.alamat+', '+data.kota+', '+data.provinsi+' '+data.kodepos);
          $('[name="comp-phone"]').text(data.no_telepon);
          $('[name="comp-fax"]').text(data.no_fax);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get data');
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
            option.text = data[i]['nama_karyawan'];
            select.add(option);
          }
          $('#dropKaryawan').select2({placeholder: 'Pilih Karyawan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get Karyawan data');
        }
      });
    }
    function fetchData()
    {
      table = $('#rptInputBon').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "paging": false,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/rptInputBon')?>",
          "type": "POST",
          "data": function(data)
            {
              data.kode_karyawan = $('[name="kode_karyawan"]').val();
              data.tgl_awal = $('[name="tgl_awal"]').val();
              data.tgl_akhir = $('[name="tgl_akhir"]').val();
            },
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
        "dom": 'Bfrtip',
          "buttons": 
          {
            "dom": 
            {
              "button": 
              {
                "tag": 'button',
                "className": 'btn btn-sm btn-info'
              }
            },
            "buttons": ['excelHtml5','print']
          }
      });
    }
    function reloadTb()
    {
      table.ajax.reload(null,false);
    }
    function printDiv()
    {
      window.print();
    }
  </script>