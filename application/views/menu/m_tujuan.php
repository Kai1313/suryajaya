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
              <h3 class="box-title">Form Master Tujuan</h3>
            </div>
<<<<<<< HEAD
            <form role="form" id="form-tujuan">
              <input type="hidden" name="tipe_form" value="">
=======
            <form role="form">
>>>>>>> update
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_tujuan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket_tujuan" class="form-control"></textarea>
                </div>
<<<<<<< HEAD
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
=======
>>>>>>> update
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="m_tujuan" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
<<<<<<< HEAD
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
=======
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">BRG001</td>
                    <td class="text-center">BARANG A</td>
                    <td class="text-center">09876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1A</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">BRG002</td>
                    <td class="text-center">BARANG B</td>
                    <td class="text-center">09866</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1A</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">BRG003</td>
                    <td class="text-center">BARANG C</td>
                    <td class="text-center">06876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1A</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">4</td>
                    <td class="text-center">BRG004</td>
                    <td class="text-center">BARANG A</td>
                    <td class="text-center">09872</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1A</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">5</td>
                    <td class="text-center">BRG005</td>
                    <td class="text-center">BARANG E</td>
                    <td class="text-center">19876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1A</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">6</td>
                    <td class="text-center">BRG006</td>
                    <td class="text-center">BARANG F</td>
                    <td class="text-center">07876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1B</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">7</td>
                    <td class="text-center">BRG007</td>
                    <td class="text-center">BARANG G</td>
                    <td class="text-center">09816</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1B</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">8</td>
                    <td class="text-center">BRG008</td>
                    <td class="text-center">BARANG H</td>
                    <td class="text-center">29876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1B</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">9</td>
                    <td class="text-center">BRG009</td>
                    <td class="text-center">BARANG I</td>
                    <td class="text-center">39876</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1B</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">10</td>
                    <td class="text-center">BRG010</td>
                    <td class="text-center">BARANG J</td>
                    <td class="text-center">09873</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1B</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">11</td>
                    <td class="text-center">BRG011</td>
                    <td class="text-center">BARANG K</td>
                    <td class="text-center">09176</td>
                    <td class="text-center">1</td>
                    <td class="text-center">4</td>
                    <td class="text-center">1C</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-primary">Edit</button>
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                  </tr>
                </tbody>
>>>>>>> update
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
<<<<<<< HEAD
      tbTujuan();
    })
    function tbTujuan()
    {
      table = $('#m_tujuan').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/mTujuan')?>",
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
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addTujuan')?>':'<?= site_url('Crud/updTujuan')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-tujuan').serialize(),
        dataType: 'JSON',
=======
      $("#m_tujuan").DataTable({});
    })
    function add()
    {
      $.ajax({
        type: 'POST',
        url: '/addBarang',
        data: $('#form-customer').serialize(),
>>>>>>> update
        success: function(data)
        {
          if(data.status)
          {
<<<<<<< HEAD
            alert('Sukses Menambah Tujuan');
            $('#form-tujuan')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah Tujuan');
=======
            alert('Sukses Menambah Barang');
          }
          else
          {
            alert('Gagal Menambah Barang');
>>>>>>> update
          }
        }
      });
    }
<<<<<<< HEAD
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getTujuan/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="kode_tujuan"]').val(data.kode_tujuan);
          $('[name="ket_tujuan"]').val(data.ket_tujuan);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
=======
>>>>>>> update
  </script>