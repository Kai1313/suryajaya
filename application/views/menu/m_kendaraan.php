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
            <form role="form">
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
                  <input type="text" name="sopir_kendaraan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kernet</label>
                  <input type="text" name="kernet_kendaraan" class="form-control">
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
      $("#m_kendaraan").DataTable({});
    })
    function add()
    {
      $.ajax({
        type: 'POST',
        url: '/addBarang',
        data: $('#form-customer').serialize(),
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah Barang');
          }
          else
          {
            alert('Gagal Menambah Barang');
          }
        }
      });
    }
  </script>