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
              <h3 class="box-title">Form Kas Bon Kantor</h3>
            </div>
            <form role="form" id="form-kas-bon-sopir">
              <input type="hidden" name="tipe_form" value="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>No Bon</label>
                      <input type="text" name="no_bon" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_bon" class="form-control pull-right" id="tgl_bon">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Berangkat</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_berangkat" class="form-control pull-right" id="tgl_berangkat">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Kembali</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_kembali" class="form-control pull-right" id="tgl_kembali">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket_kasbon"></textarea>
                    </div>
                    <div class="form-group">
                      <br>
                      <button type="button" id="newBtn" class="btn btn-sm btn-primary" onclick="newBon()">Bon Baru</button>
                      <button type="button" id="editBtn" class="btn btn-sm btn-primary" onclick="editBon()">Edit Bon</button>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label>Kode Kendaraan</label>
                      <select class="form-control" name="kode_kendaraan" id="dropKendaraan" style="width: 100%;">
                        <option value="">Pilih Kendaraan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kode Sopir</label>
                      <select class="form-control" name="kode_sopir" id="dropSopir" style="width: 100%;">
                        <option value="">Pilih Sopir</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kode Kernet</label>
                      <select class="form-control" name="kode_kernet" id="dropKernet" style="width: 100%;">
                        <option value="">Pilih Kernet</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tabungan Sopir</label>
                      <input type="text" name="tab_sopir" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Berat Jenis</label>
                      <select class="form-control" name="berat_jenis" id="berat_jenis">
                        <option value="0">Berat (Kg)</option>
                        <option value="0">Volume (Dm3)</option>
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
        <form>
          <div class="col-md-12 col-xs-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Bon-Uang Saku</a></li>
                <li><a href="#tab_2" data-toggle="tab">Berangkat</a></li>
                <li><a href="#tab_3" data-toggle="tab">Kembali</a></li>
                <li><a href="#tab_4" data-toggle="tab">Solar</a></li>
                <li><a href="#tab_5" data-toggle="tab">Sopir</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Bon Uang Saku Kota</label>
                        <input type="text" name="uang_saku_kota" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Bon Uang Saku 1</label>
                        <input type="text" name="uang_saku_a" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Bon Uang Saku 2</label>
                        <input type="text" name="uang_saku_b" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Bon Uang Saku 3</label>
                        <input type="text" name="uang_saku_c" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Bon Uang Saku 4</label>
                        <input type="text" name="uang_saku_d" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Total Bon Uang Saku</label>
                        <input type="text" name="sub_uang_saku" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_kota" class="form-control pull-right" id="tgl_bon_kota">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_a" class="form-control pull-right" id="tgl_bon_a">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_b" class="form-control pull-right" id="tgl_bon_b">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_c" class="form-control pull-right" id="tgl_bon_c">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_d" class="form-control pull-right" id="tgl_bon_d">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Bon Solar</label>
                        <input type="text" name="uang_solar" class="form-control chgbonsaku">
                      </div>
                      <div class="form-group">
                        <label>Nama Pom</label>
                        <input type="text" name="nama_pom" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_solar" class="form-control pull-right" id="tgl_solar">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Bon Uang Saku & Solar</label>
                        <input type="text" name="sub_bonall" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_2">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Tanggal Muat</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_muat" class="form-control pull-right" id="tgl_muat">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Bongkar</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bongkar" class="form-control pull-right" id="tgl_bongkar">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Alamat Pengirim 1</label>
                        <select class="form-control" name="kode_customer_a" id="dropPengirimA" style="width: 100%;">
                          <option value="">Pilih Pengirim</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Alamat Penerima 1</label>
                        <select class="form-control" name="kode_customer_b" id="dropPenerimaA" style="width: 100%;">
                          <option value="">Pilih Penerima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat Jalan 1</label>
                        <input type="text" name="surat_jalan_a" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Jenis Muatan 1</label>
                        <input type="text" name="jenis_muatan_a" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Berat Muatan 1</label>
                        <input type="text" name="berat_muatan_a" class="form-control chgberatbrgkt">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Ongkos Angkut 1</label>
                        <input type="text" name="ongkos_angkut" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Ongkos Angkut Bruto 1</label>
                        <input type="text" name="ongkos_bruto" class="form-control chgbrutobrgkt">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Borongan Sopir 1</label>
                        <select class="form-control" name="borong_sopir" id="borSopir" style="width: 100%;">
                          <option value="">Pilih Borongan</option>
                          <option value="0">Berat</option>
                          <option value="1">Volume</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tambah Borong 1</label>
                        <input type="text" name="tambah_borong_a" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Alamat Pengirim 2</label>
                        <select class="form-control" name="kode_customer_c" id="dropPengirimB" style="width: 100%;">
                          <option value="">Pilih Pengirim</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Alamat Penerima 2</label>
                        <select class="form-control" name="kode_customer_d" id="dropPenerimaB" style="width: 100%;">
                          <option value="">Pilih Penerima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat Jalan 2</label>
                        <input type="text" name="surat_jalan_b" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Jenis Muatan 2</label>
                        <input type="text" name="jenis_muatan_b" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Berat Muatan 2</label>
                        <input type="text" name="berat_muatan_b" class="form-control chgberatbrgkt">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Ongkos Angkut 2</label>
                        <input type="text" name="ongkos_angkut_2" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Ongkos Angkut Bruto 2</label>
                        <input type="text" name="ongkos_bruto_2" class="form-control chgbrutobrgkt">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Borongan Sopir 2</label>
                        <select class="form-control" name="borong_sopir_2" id="borSopir2" style="width: 100%;">
                          <option value="">Pilih Borongan</option>
                          <option value="0">Berat</option>
                          <option value="1">Volume</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tambah Borong 2</label>
                        <input type="text" name="tambah_borong_b" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Berat Muat</label>
                        <input type="text" name="sub_beratmuat" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Total Ongkos Bruto</label>
                        <input type="text" name="sub_bruto" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_3">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Tanggal Muat</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_muat_b" class="form-control pull-right" id="tgl_muat_b">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Bongkar</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bongkar_b" class="form-control pull-right" id="tgl_bongkar_b">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan_b" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Alamat Pengirim 3</label>
                        <select class="form-control" name="kode_customer_e" id="dropPengirimC" style="width: 100%;">
                          <option value="">Pilih Pengirim</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Alamat Penerima 3</label>
                        <select class="form-control" name="kode_customer_f" id="dropPenerimaC" style="width: 100%;">
                          <option value="">Pilih Penerima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat Jalan 3</label>
                        <input type="text" name="surat_jalan_c" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Jenis Muatan 3</label>
                        <input type="text" name="jenis_muatan_c" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Berat Muatan 3</label>
                        <input type="text" name="berat_muatan_c" class="form-control chgberatkmb">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Ongkos Angkut 3</label>
                        <input type="text" name="ongkos_angkut_3" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Ongkos Angkut Bruto 3</label>
                        <input type="text" name="ongkos_bruto_3" class="form-control chgbrutokmb">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Borongan Sopir 3</label>
                        <select class="form-control" name="borong_sopir_3" id="borSopir3" style="width: 100%;">
                          <option value="">Pilih Borongan</option>
                          <option value="0">Berat</option>
                          <option value="1">Volume</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tambah Borong 3</label>
                        <input type="text" name="tambah_borong_c" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Alamat Pengirim 4</label>
                        <select class="form-control" name="kode_customer_g" id="dropPengirimD" style="width: 100%;">
                          <option value="">Pilih Pengirim</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Alamat Penerima 4</label>
                        <select class="form-control" name="kode_customer_h" id="dropPenerimaD" style="width: 100%;">
                          <option value="">Pilih Penerima</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>No Surat Jalan 4</label>
                        <input type="text" name="surat_jalan_d" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Jenis Muatan 4</label>
                        <input type="text" name="jenis_muatan_d" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Berat Muatan 4</label>
                        <input type="text" name="berat_muatan_d" class="form-control chgberatkmb">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Ongkos Angkut 4</label>
                        <input type="text" name="ongkos_angkut_4" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Ongkos Angkut Bruto 4</label>
                        <input type="text" name="ongkos_bruto_4" class="form-control chgbrutokmb">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Borongan Sopir 4</label>
                        <select class="form-control" name="borong_sopir_4" id="borSopir4" style="width: 100%;">
                          <option value="">Pilih Borongan</option>
                          <option value="0">Berat</option>
                          <option value="1">Volume</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tambah Borong 4</label>
                        <input type="text" name="tambah_borong_d" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Berat Muat</label>
                        <input type="text" name="sub_beratmuat_b" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Total Ongkos Bruto</label>
                        <input type="text" name="sub_bruto_b" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_4">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Solar Berangkat</label>
                        <input type="text" name="solar_berangkat" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 1</label>
                        <input type="text" name="bantuan_a" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 2</label>
                        <input type="text" name="bantuan_b" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 1</label>
                        <input type="text" name="tambah_a" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 2</label>
                        <input type="text" name="tambah_b" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Solar Kembali</label>
                        <input type="text" name="solar_kembali" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 3</label>
                        <input type="text" name="bantuan_c" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 4</label>
                        <input type="text" name="bantuan_d" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 3</label>
                        <input type="text" name="tambah_c" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 4</label>
                        <input type="text" name="tambah_d" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_5">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Uang Sopir Berangkat 1</label>
                        <input type="text" name="uang_sopir_a" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Uang Sopir Berangkat 2</label>
                        <input type="text" name="uang_sopir_b" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Uang Sopir Kembali 1</label>
                        <input type="text" name="uang_sopir_c" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Uang Sopir Kembali 2</label>
                        <input type="text" name="uang_sopir_d" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Koreksi Berangkat 1</label>
                        <input type="text" name="koreksi_sopir_a" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Koreksi Berangkat 2</label>
                        <input type="text" name="koreksi_sopir_b" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Koreksi Kembali 1</label>
                        <input type="text" name="koreksi_sopir_c" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Koreksi Kembali 2</label>
                        <input type="text" name="koreksi_sopir_d" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Uang Sopir</label>
                        <input type="text" name="sub_uangsopir" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label>Total Koreksi</label>
                        <input type="text" name="sub_koreksi" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
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
            <table id="daftarKasBon" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Bon</th>
                  <th>Tgl. Bon</th>
                  <th>Nopol</th>
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
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'0';
      $('#tgl_bon').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_berangkat').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_kembali').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bon_kota').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bon_a').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bon_b').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bon_c').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bon_d').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_solar').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_muat').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bongkar').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_muat_b').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      $('#tgl_bongkar_b').datepicker({
        autoclose: true,
        format: 'yyyy-m-d'
      });
      bonsakuchg();
      beratBrgkt();
      beratKmb();
      brutoBrgkt();
      brutoKmb();
      $('#berat_jenis').select2({placeholder: 'Pilih Berat Jenis'});
      $('#borSopir').select2({placeholder: 'Pilih Salah Satu'});
      $('#borSopir2').select2({placeholder: 'Pilih Salah Satu'});
      $('#borSopir3').select2({placeholder: 'Pilih Salah Satu'});
      $('#borSopir4').select2({placeholder: 'Pilih Salah Satu'});
      dropkendaraan();
      dropsopir();
      dropkernet();
      droppengirim_a();
      droppengirim_b();
      droppengirim_c();
      droppengirim_d();
      droppenerima_a();
      droppenerima_b();
      droppenerima_c();
      droppenerima_d();
    })
    function newBon()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/gen_noKasBonKantor')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="no_bon"]').val(data.no_bon);
          $('#newBtn').prop('disabled',true);
        }
      });
    }
    function dropkendaraan()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropKendaraan')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropKendaraan');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_kendaraan']
            option.text = data[i]['nopol']+' - '+data[i]['tipe_kendaraan']+' - '+data[i]['jenis_kendaraan'];
            select.add(option);
          }
          $('#dropKendaraan').select2({placeholder: 'Pilih Kendaraan'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get supplier data');
        }
      });
    }
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
          alert('Error get ban data');
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
          alert('Error get ban data');
        }
      });
    }
    function droppengirim_a()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPengirimA');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPengirimA').select2({placeholder: 'Pilih Pengirim'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppengirim_b()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPengirimB');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPengirimB').select2({placeholder: 'Pilih Pengirim'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppengirim_c()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPengirimC');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPengirimC').select2({placeholder: 'Pilih Pengirim'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppengirim_d()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPengirimD');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPengirimD').select2({placeholder: 'Pilih Pengirim'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppenerima_a()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPenerimaA');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPenerimaA').select2({placeholder: 'Pilih Penerima'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppenerima_b()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPenerimaB');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPenerimaB').select2({placeholder: 'Pilih Penerima'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppenerima_c()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPenerimaC');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPenerimaC').select2({placeholder: 'Pilih Penerima'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function droppenerima_d()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropCustomer')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropPenerimaD');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_customer']
            option.text = data[i]['nama_customer']+' - '+data[i]['alamat_customer']+' - '+data[i]['kota_customer'];
            select.add(option);
          }
          $('#dropPenerimaD').select2({placeholder: 'Pilih Penerima'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get customer data');
        }
      });
    }
    function saveDt()
    {
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/saveKasBonKantor')?>',
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
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelKasBonKantor')?>',
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
    function editBon()
    {
      $('#modal-edit').modal('show');
      $('.modal-title').text('Daftar Kas Bon Sopir');
      table = $('#daftarKasBon').DataTable({
        "info": false,
        "destroy": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/listKasBonKantor')?>",
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
    function pilihKasBon(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getKasBonKantor/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_bon;
          $('[name="no_bon"]').val(data.no_bon);
          $('[name="tgl_bon"]').val(data.tgl_bon);
          $('[name="tgl_berangkat"]').val(data.tgl_berangkat);
          $('[name="tgl_kembali"]').val(data.tgl_kembali);
          $('[name="tab_sopir"]').val(data.tab_sopir);
          $('[name="ket_kasbon"]').val(data.ket_kasbon);
          $('#dropKendaraan').val(data.kode_kendaraan).trigger('change');
          $('#dropSopir').val(data.kode_sopir).trigger('change');
          $('#dropKernet').val(data.kode_kernet).trigger('change');
          $('#berat_jenis').val(data.berat_jenis).trigger('change');
          //Bon Uang Saku
          $('[name="uang_saku_kota"]').val(data.uang_saku_kota);
          $('[name="uang_saku_a"]').val(data.uang_saku_a);
          $('[name="uang_saku_b"]').val(data.uang_saku_b);
          $('[name="uang_saku_c"]').val(data.uang_saku_c);
          $('[name="uang_saku_d"]').val(data.uang_saku_d);
          $('[name="tgl_bon_kota"]').val(data.tgl_bon_kota);
          $('[name="tgl_bon_a"]').val(data.tgl_bon_a);
          $('[name="tgl_bon_b"]').val(data.tgl_bon_b);
          $('[name="tgl_bon_c"]').val(data.tgl_bon_c);
          $('[name="tgl_bon_d"]').val(data.tgl_bon_d);
          $('[name="uang_solar"]').val(data.uang_solar);
          $('[name="nama_pom"]').val(data.nama_pom);
          $('[name="tgl_solar"]').val(data.tgl_solar);
          //Berangkat
          $('[name="tgl_muat"]').val(data.tgl_muat);
          $('[name="tgl_bongkar"]').val(data.tgl_bongkar);
          $('[name="uang_makan"]').val(data.uang_makan);
          $('#dropPengirimA').val(data.kode_customer_a).trigger('change');
          $('#dropPenerimaA').val(data.kode_customer_b).trigger('change');
          $('[name="jenis_muatan_a"]').val(data.jenis_muatan_a);
          $('[name="berat_muatan_a"]').val(data.berat_muatan_a);
          $('[name="surat_jalan_a"]').val(data.surat_jalan_a);
          $('#dropPengirimB').val(data.kode_customer_c).trigger('change');
          $('#dropPenerimaB').val(data.kode_customer_d).trigger('change');
          $('[name="jenis_muatan_b"]').val(data.jenis_muatan_b);
          $('[name="berat_muatan_b"]').val(data.berat_muatan_b);
          $('[name="surat_jalan_b"]').val(data.surat_jalan_b);
          $('[name="ongkos_angkut"]').val(data.ongkos_angkut);
          $('[name="ongkos_bruto"]').val(data.ongkos_bruto);
          $('[name="tambah_borong_a"]').val(data.tambah_borong_a);
          $('#borSopir').val(data.borong_sopir).trigger('change');
          $('[name="ongkos_angkut_2"]').val(data.ongkos_angkut_2);
          $('[name="ongkos_bruto_2"]').val(data.ongkos_bruto_2);
          $('[name="tambah_borong_b"]').val(data.tambah_borong_b);
          $('#borSopir2').val(data.borong_sopir_2).trigger('change');
          //Kembali
          $('[name="tgl_muat_b"]').val(data.tgl_muat_b);
          $('[name="tgl_bongkar_b"]').val(data.tgl_bongkar_b);
          $('[name="uang_makan_b"]').val(data.uang_makan_b);
          $('#dropPengirimC').val(data.kode_customer_e).trigger('change');
          $('#dropPenerimaC').val(data.kode_customer_f).trigger('change');
          $('[name="jenis_muatan_c"]').val(data.jenis_muatan_c);
          $('[name="berat_muatan_c"]').val(data.berat_muatan_c);
          $('[name="surat_jalan_c"]').val(data.surat_jalan_c);
          $('#dropPengirimD').val(data.kode_customer_g).trigger('change');
          $('#dropPenerimaD').val(data.kode_customer_h).trigger('change');
          $('[name="jenis_muatan_d"]').val(data.jenis_muatan_d);
          $('[name="berat_muatan_d"]').val(data.berat_muatan_d);
          $('[name="surat_jalan_d"]').val(data.surat_jalan_d);
          $('[name="ongkos_angkut_3"]').val(data.ongkos_angkut_3);
          $('[name="ongkos_bruto_3"]').val(data.ongkos_bruto_3);
          $('[name="tambah_borong_c"]').val(data.tambah_borong_c);
          $('#borSopir3').val(data.borong_sopir_3).trigger('change');
          $('[name="ongkos_angkut_4"]').val(data.ongkos_angkut_4);
          $('[name="ongkos_bruto_4"]').val(data.ongkos_bruto_4);
          $('[name="tambah_borong_d"]').val(data.tambah_borong_d);
          $('#borSopir4').val(data.borong_sopir_4).trigger('change');
          //Solar
          $('[name="solar_berangkat"]').val(data.solar_berangkat);
          $('[name="solar_kembali"]').val(data.solar_kembali);
          $('[name="bantuan_a"]').val(data.bantuan_a);
          $('[name="bantuan_b"]').val(data.bantuan_b);
          $('[name="bantuan_c"]').val(data.bantuan_c);
          $('[name="bantuan_d"]').val(data.bantuan_d);
          $('[name="tambah_a"]').val(data.tambah_a);
          $('[name="tambah_b"]').val(data.tambah_b);
          $('[name="tambah_c"]').val(data.tambah_c);
          $('[name="tambah_d"]').val(data.tambah_d);
          //Sopir
          $('[name="uang_sopir_a"]').val(data.uang_sopir_a);
          $('[name="uang_sopir_b"]').val(data.uang_sopir_b);
          $('[name="uang_sopir_c"]').val(data.uang_sopir_c);
          $('[name="uang_sopir_d"]').val(data.uang_sopir_d);
          $('[name="koreksi_sopir_a"]').val(data.koreksi_sopir_a);
          $('[name="koreksi_sopir_b"]').val(data.koreksi_sopir_b);
          $('[name="koreksi_sopir_c"]').val(data.koreksi_sopir_c);
          $('[name="koreksi_sopir_d"]').val(data.koreksi_sopir_d);
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function hitungbonsaku_()
    {
      uangSakuKota = $('[name="uang_saku_kota"]').val();
      uangSakuA = $('[name="uang_saku_a"]').val();
      uangSakuB = $('[name="uang_saku_b"]').val();
      uangSakuC = $('[name="uang_saku_c"]').val();
      uangSakuD = $('[name="uang_saku_d"]').val();
      subUangSaku = parseFloat(uangSakuKota)+parseFloat(uangSakuA)+parseFloat(uangSakuB)+parseFloat(uangSakuC)+parseFloat(uangSakuD);
      $('[name="sub_uang_saku"]').val(subUangSaku);
      uangSolar = $('[name="uang_solar"]').val();
      subBonAll = parseFloat(subUangSaku)+parseFloat(uangSolar);
      $('[name="sub_bonall"]').val(subBonAll);
    }
    function bonsakuchg()
    {
      $('.chgbonsaku').on('input', function()
      {
        hitungbonsaku_();
      });
    }
    function hitungberatbrgkt_()
    {
      beratA = $('[name="berat_muatan_a"]').val();
      beratB = $('[name="berat_muatan_b"]').val();
      subBerat = parseFloat(beratA)+parseFloat(beratB);
      $('[name="sub_beratmuat"]').val(subBerat);
    }
    function beratBrgkt()
    {
      $('.chgberatbrgkt').on('input', function()
      {
        hitungberatbrgkt_();
      });
    }
    function hitungberatkmb_()
    {
      beratC = $('[name="berat_muatan_c"]').val();
      beratD = $('[name="berat_muatan_d"]').val();
      subBerat = parseFloat(beratC)+parseFloat(beratD);
      $('[name="sub_beratmuat_b"]').val(subBerat);
    }
    function beratKmb()
    {
      $('.chgberatkmb').on('input', function()
      {
        hitungberatkmb_();
      });
    }
    function hitungbrutobrgkt_()
    {
      brutoA = $('[name="ongkos_bruto"]').val();
      brutoB = $('[name="ongkos_bruto_2"]').val();
      subBruto = parseFloat(brutoA)+parseFloat(brutoB);
      $('[name="sub_bruto"]').val(subBruto);
    }
    function brutoBrgkt()
    {
      $('.chgbrutobrgkt').on('input', function()
      {
        hitungbrutobrgkt_();
      });
    }
    function hitungbrutokmb_()
    {
      brutoA = $('[name="ongkos_bruto_3"]').val();
      brutoB = $('[name="ongkos_bruto_4"]').val();
      subBruto = parseFloat(brutoA)+parseFloat(brutoB);
      $('[name="sub_bruto_b"]').val(subBruto);
    }
    function brutoKmb()
    {
      $('.chgbrutokmb').on('input', function()
      {
        hitungbrutokmb_();
      });
    }
  </script>