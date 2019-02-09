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
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Master Kendaraan</h3>
            </div>
            <form role="form" id="form-kendaraan">
              <input type="hidden" name="tipe_form" value="">
              <input type="hidden" name="kode_kendaraan" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Nopol</label>
                  <input type="text" name="nopol" class="form-control">
                </div>
                <div class="form-group">
                  <label>No Mesin</label>
                  <input type="text" name="no_mesin" class="form-control">
                </div>
                <div class="form-group">
                  <label>No Rangka</label>
                  <input type="text" name="no_rangka" class="form-control">
                </div>
                <div class="form-group">
                  <label>Merk/Tipe</label>
                  <input type="text" name="tipe_kendaraan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis/Model</label>
                  <input type="text" name="jenis_kendaraan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Pemilik</label>
                  <input type="text" name="nama_pemilik" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tahun Pembuatan</label>
                  <input type="text" name="thn_pembuatan" class="form-control">
                </div>
                <div class="form-group">
                  <label>No BPKB</label>
                  <input type="text" name="no_bpkb" class="form-control">
                </div>
                <div class="form-group">
                  <label>Warna</label>
                  <input type="text" name="warna_kendaraan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tgl Masa Berlaku STNK</label>
                  <input type="text" name="masa_stnk" class="form-control">
                </div>
                <div class="form-group">
                  <label>Isi Silinder/CC</label>
                  <input type="text" name="cc_kendaraan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Sopir</label>
                  <select class="form-control" name="sopir_kendaraan" id="dropSopir" style="width: 100%;">
                    <option value=""></option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kernet</label>
                  <select class="form-control" name="kernet_kendaraan" id="dropKernet" style="width: 100%;">
                    <option value=""></option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="m_kendaraan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nopol</th>
                    <th class="text-center">Merk</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Warna</th>
                    <th class="text-center">Sopir</th>
                    <th class="text-center">Kernet</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/footer.php' ;?>
  <?php include 'application/views/layout/controlsidebar.php' ;?>
  <?php include 'application/views/layout/jspack.php' ;?>

  <script>
    $(function ()
    {
      tbKendaraan();
      dropsopir();
      dropkernet();
    })
    function dropsopir()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropSopir')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropSopir');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_driver']
            option.text = data[i]['kode_driver']+' - '+data[i]['nama_driver'];
            select.add(option);
          }
          $('#dropSopir').select2({placeholder: 'Pilih Sopir'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get sopir data');
        }
      });
    }
    function dropkernet()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKernet')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKernet');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_driver']
            option.text = data[i]['kode_driver']+' - '+data[i]['nama_driver'];
            select.add(option);
          }
          $('#dropKernet').select2({placeholder: 'Pilih Kernet'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get kernet data');
        }
      });
    }
    function tbKendaraan()
    {
      table = $('#m_kendaraan').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mKendaraan')?>",
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
    function reloadTb()
    {
      table.ajax.reload(null,false);
    }
    function add()
    {
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addKendaraan')?>':'<?= site_url('Crud/updKendaraan')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-kendaraan').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Kendaraan');
            $('#form-kendaraan')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Kendaraan');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKendaraan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_kendaraan"]').val(data.kode_kendaraan);
          $('[name="nopol"]').val(data.nopol);
          $('[name="no_mesin"]').val(data.no_mesin);
          $('[name="no_rangka"]').val(data.no_rangka);
          $('[name="tipe_kendaraan"]').val(data.tipe_kendaraan);
          $('[name="jenis_kendaraan"]').val(data.jenis_kendaraan);
          $('[name="nama_pemilik"]').val(data.nama_pemilik);
          $('[name="thn_pembuatan"]').val(data.thn_pembuatan);
          $('[name="no_bpkb"]').val(data.no_bpkb);
          $('[name="warna_kendaraan"]').val(data.warna_kendaraan);
          $('[name="masa_stnk"]').val(data.masa_stnk);
          $('[name="cc_kendaraan"]').val(data.cc_kendaraan);
          $('[name="sopir_kendaraan"]').val(data.sopir_kendaraan);
          $('#dropSopir').val(data.sopir_kendaraan).trigger('change');
          $('#dropKernet').val(data.kernet_kendaraan).trigger('change');
          $('[name="tipe_form"]').val('1');
        }
      });
    }
    function del(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delKendaraan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus Kendaraan');
            $('#form-kendaraan')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menghapus Kendaraan');
          }
        }
      });
    }
  </script>