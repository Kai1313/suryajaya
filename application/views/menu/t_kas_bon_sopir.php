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
          <div id="alertMsg"></div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kas Bon Sopir</h3>
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
                        <input type="text" name="tgl_bon" class="form-control pull-right" id="tgl_bon" placeholder="dd/mm/yyyy">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket_kasbon" rows="3"></textarea>
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
                      <input type="text" name="tab_sopir" class="form-control num_" value="100000">
                    </div>
                    <div class="form-group">
                      <label>Berat Jenis</label>
                      <select class="form-control" name="berat_jenis" id="berat_jenis" onchange="beratStat()">
                        <option value="0">Berat (Kg)</option>
                        <option value="1">Volume (Dm3)</option>
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
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_kota" class="form-control pull-right" id="tgl_bon_kota" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_a" class="form-control pull-right" id="tgl_bon_a" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_b" class="form-control pull-right" id="tgl_bon_b" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_c" class="form-control pull-right" id="tgl_bon_c" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_bon_d" class="form-control pull-right" id="tgl_bon_d" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <div class="row">
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Bon Sangu Kota</label>
                            <input type="text" name="uang_saku_kota" class="form-control num_ chgbonsaku">
                          </div>
                          <div class="form-group">
                            <label>Bon Uang Saku 1</label>
                            <input type="text" name="uang_saku_a" class="form-control num_ chgbonsaku">
                          </div>
                          <div class="form-group">
                            <label>Bon Uang Saku 2</label>
                            <input type="text" name="uang_saku_b" class="form-control num_ chgbonsaku">
                          </div>
                          <div class="form-group">
                            <label>Bon Uang Saku 3</label>
                            <input type="text" name="uang_saku_c" class="form-control num_ chgbonsaku">
                          </div>
                          <div class="form-group">
                            <label>Bon Uang Saku 4</label>
                            <input type="text" name="uang_saku_d" class="form-control num_ chgbonsaku">
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSangu" value="100000" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSangu" value="100000" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSangu" value="100000" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSangu" value="100000" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSangu" value="100000" readonly>
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_saku_kota_sum" class="form-control num_" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_saku_a_sum" class="form-control num_" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_saku_b_sum" class="form-control num_" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_saku_c_sum" class="form-control num_" readonly>
                          </div>
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_saku_d_sum" class="form-control num_" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group">
                            <label>Total Bon Uang Saku</label>
                            <input type="text" name="sub_uang_saku" class="form-control num_" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Nama Pom</label>
                        <select class="form-control" name="nama_pom" id="nama_pom">
                          <option value="0">Pom A</option>
                          <option value="1">Pom B</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tgl_solar" class="form-control pull-right" id="tgl_solar" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bon Solar</label>
                            <input type="text" name="uang_solar" class="form-control num_ chgbonsaku">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control num_ defSolar" value="100000" readonly>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="uang_solar_sum" class="form-control num_" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-4 col-md-8 col-xs-12">
                      <div class="form-group">
                        <label>Total Bon Uang Saku & Solar</label>
                        <input type="text" name="sub_bonall" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_2">
                  <div class="row">
                    <div class="col-md-8 col-xs-12">
                      <div class="row">
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Tanggal Muat</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tgl_muat" class="form-control pull-right" id="tgl_muat" placeholder="dd/mm/yyyy" onchange="diffBrgkt()">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Tanggal Bongkar</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tgl_bongkar" class="form-control pull-right" id="tgl_bongkar" placeholder="dd/mm/yyyy" onchange="diffBrgkt()">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Hari</label>
                            <input type="text" name="hari_berangkat" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan" class="form-control num_">
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
                        <div class="input-group">
                          <input type="text" name="berat_muatan_a" class="form-control num_ chgberatbrgkt">
                          <div class="input-group-addon">
                            <span class="beratSts">Kg</span>
                          </div>
                        </div>
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
                        <div class="input-group">
                          <input type="text" name="berat_muatan_b" class="form-control num_ chgberatbrgkt">
                          <div class="input-group-addon">
                            <span class="beratSts">Kg</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Berat Muat</label>
                        <input type="text" name="sub_beratmuat" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_3">
                  <div class="row">
                    <div class="col-md-8 col-xs-12">
                      <div class="row">
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Tanggal Muat</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tgl_muat_b" class="form-control pull-right" id="tgl_muat_b" placeholder="dd/mm/yyyy" onchange="diffKmb()">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Tanggal Bongkar</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tgl_bongkar_b" class="form-control pull-right" id="tgl_bongkar_b" placeholder="dd/mm/yyyy" onchange="diffKmb()">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                          <div class="form-group">
                            <label>Hari</label>
                            <input type="text" name="hari_berangkat_b" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Uang Makan</label>
                        <input type="text" name="uang_makan_b" class="form-control num_">
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
                        <div class="input-group">
                          <input type="text" name="berat_muatan_c" class="form-control num_ chgberatkmb">
                          <div class="input-group-addon">
                            <span class="beratSts">Kg</span>
                          </div>
                        </div>
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
                        <div class="input-group">
                          <input type="text" name="berat_muatan_d" class="form-control num_ chgberatkmb">
                          <div class="input-group-addon">
                            <span class="beratSts">Kg</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Total Berat Muat</label>
                        <input type="text" name="sub_beratmuat_b" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_4">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Solar Berangkat</label>
                        <input type="text" name="solar_berangkat" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 1</label>
                        <input type="text" name="bantuan_a" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 2</label>
                        <input type="text" name="bantuan_b" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 1</label>
                        <input type="text" name="tambah_a" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 2</label>
                        <input type="text" name="tambah_b" class="form-control num_">
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Solar Kembali</label>
                        <input type="text" name="solar_kembali" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 3</label>
                        <input type="text" name="bantuan_c" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Bantuan 4</label>
                        <input type="text" name="bantuan_d" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 3</label>
                        <input type="text" name="tambah_c" class="form-control num_">
                      </div>
                      <div class="form-group">
                        <label>Tambahan 4</label>
                        <input type="text" name="tambah_d" class="form-control num_">
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
                  <button type="button" class="btn btn-md btn-primary" onclick="reportDt()">Laporan</button>
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
      $('.num_').number(true,2);
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'0';
      $('#tgl_bon').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bon_kota').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bon_a').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bon_b').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bon_c').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bon_d').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_solar').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_muat').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_muat_b').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bongkar').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_bongkar_b').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      bonsakuchg();
      beratBrgkt();
      beratKmb();
      $('#berat_jenis').select2({placeholder: 'Pilih Berat Jenis'});
      $('#nama_pom').select2({placeholder: 'Pilih Pom'});
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
        url: '<?= site_url('Crud/gen_noKasBonSopir')?>',
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
        url: '<?= site_url('Crud/saveKasBonSopir')?>',
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
      key = ($('[name="no_pembelian"]').val()!='')?$('[name="no_pembelian"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelBeliBan')?>',
        data: $('form').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            msg = $('<div>').append(data.msg).appendTo('#alertMsg');
            $('#form-detail-pembelian')[0].reset();
            tbDetBeli(key);
            subTotal(key);
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
          "url": "<?php echo site_url('Datatables/listKasBonSopir')?>",
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
        url: '<?= site_url('Crud/getKasBonSopir/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          key = data.no_bon;
          $('[name="no_bon"]').val(data.no_bon);
          $('[name="tgl_bon"]').val(moment(data.tgl_bon).format('DD/MM/YYYY'));
          $('[name="ket_kasbon"]').val(data.ket_kasbon);
          $('[name="tab_sopir"]').val(data.tab_sopir);
          $('#dropKendaraan').val(data.kode_kendaraan).trigger('change');
          $('#dropSopir').val(data.kode_sopir).trigger('change');
          $('#dropKernet').val(data.kode_kernet).trigger('change');
          $('#berat_jenis').val(data.berat_jenis).trigger('change');
          $('[name="tgl_bon_kota"]').val((data.tgl_bon_kota != null)?moment(data.tgl_bon_kota).format('DD/MM/YYYY'):'');
          $('[name="tgl_bon_a"]').val((data.tgl_bon_a != null)?moment(data.tgl_bon_a).format('DD/MM/YYYY'):'');
          $('[name="tgl_bon_b"]').val((data.tgl_bon_b != null)?moment(data.tgl_bon_b).format('DD/MM/YYYY'):'');
          $('[name="tgl_bon_c"]').val((data.tgl_bon_c != null)?moment(data.tgl_bon_c).format('DD/MM/YYYY'):'');
          $('[name="tgl_bon_d"]').val((data.tgl_bon_d != null)?moment(data.tgl_bon_d).format('DD/MM/YYYY'):'');
          $('[name="uang_saku_kota"]').val(data.uang_saku_kota);
          $('[name="uang_saku_kota_sum"]').val(data.uang_saku_kota*100000);
          $('[name="uang_saku_a"]').val(data.uang_saku_a);
          $('[name="uang_saku_a_sum"]').val(data.uang_saku_a*100000);
          $('[name="uang_saku_b"]').val(data.uang_saku_a);
          $('[name="uang_saku_b_sum"]').val(data.uang_saku_b*100000);
          $('[name="uang_saku_c"]').val(data.uang_saku_b);
          $('[name="uang_saku_c_sum"]').val(data.uang_saku_c*100000);
          $('[name="uang_saku_d"]').val(data.uang_saku_d);
          $('[name="uang_saku_d_sum"]').val(data.uang_saku_d*100000);
          $('[name="sub_uang_saku"]').val(data.sub_uang_saku);
          $('#nama_pom').val(data.nama_pom).trigger('change');
          $('[name="uang_solar"]').val(data.uang_solar);
          $('[name="uang_solar_sum"]').val(data.uang_solar*100000);
          $('[name="tgl_solar"]').val((data.tgl_solar != null)?moment(data.tgl_solar).format('DD/MM/YYYY'):'');
          $('[name="sub_bonall"]').val(data.sub_bonall);
          $('[name="tgl_muat"]').val((data.tgl_muat != null)?moment(data.tgl_muat).format('DD/MM/YYYY'):'');
          $('[name="tgl_bongkar"]').val((data.tgl_bongkar != null)?moment(data.tgl_bongkar).format('DD/MM/YYYY'):'');
          diffBrgkt();
          $('[name="tgl_muat_b"]').val((data.tgl_muat_b != null)?moment(data.tgl_muat_b).format('DD/MM/YYYY'):'');
          $('[name="tgl_bongkar_b"]').val((data.tgl_bongkar_b != null)?moment(data.tgl_bongkar_b).format('DD/MM/YYYY'):'');
          diffKmb();
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
          $('[name="sub_beratmuat"]').val(data.sub_beratmuat);
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
          $('[name="sub_beratmuat_b"]').val(data.sub_beratmuat_b);
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
          $('#newBtn').prop('disabled',true);
          $('#modal-edit').modal('hide');
        }
      });
    }
    function hitungbonsaku_()
    {
      uangSakuKota = $('[name="uang_saku_kota"]').val()*100000;
      uangSakuA = $('[name="uang_saku_a"]').val()*100000;
      uangSakuB = $('[name="uang_saku_b"]').val()*100000;
      uangSakuC = $('[name="uang_saku_c"]').val()*100000;
      uangSakuD = $('[name="uang_saku_d"]').val()*100000;
      subUangSaku = parseFloat(uangSakuKota)+parseFloat(uangSakuA)+parseFloat(uangSakuB)+parseFloat(uangSakuC)+parseFloat(uangSakuD);
      $('[name="uang_saku_kota_sum"]').val(uangSakuKota);
      $('[name="uang_saku_a_sum"]').val(uangSakuA);
      $('[name="uang_saku_b_sum"]').val(uangSakuB);
      $('[name="uang_saku_c_sum"]').val(uangSakuC);
      $('[name="uang_saku_d_sum"]').val(uangSakuD);
      $('[name="sub_uang_saku"]').val(subUangSaku);
      uangSolar = $('[name="uang_solar"]').val()*100000;
      subBonAll = parseFloat(subUangSaku)+parseFloat(uangSolar);
      $('[name="uang_solar_sum"]').val(uangSolar);
      $('[name="sub_uang_saku"]').val(subUangSaku);
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
    function diffBrgkt()
    {
      st = moment($('[name="tgl_muat"]').val(),'DD/MM/YYYY');
      ed = moment($('[name="tgl_bongkar"]').val(),'DD/MM/YYYY');
      $('[name="hari_berangkat"]').val(ed.diff(st,'days'));
    }
    function diffKmb()
    {
      st = moment($('[name="tgl_muat_b"]').val(),'DD/MM/YYYY');
      ed = moment($('[name="tgl_bongkar_b"]').val(),'DD/MM/YYYY');
      $('[name="hari_berangkat_b"]').val(ed.diff(st,'days'));
    }
    function beratStat()
    {
      if($('[name="berat_jenis"]').val() != '0')
      {
        $('.beratSts').text('Dm3');
      }
      else
      {
        $('.beratSts').text('Kg');
      }
    }
    function printDt()
    {
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      window.open ( "<?= site_url('Crud/printKasBonSopir/')?>"+key,'_blank');
    }
    function reportDt()
    {
      window.open ( "<?= site_url('Crud/reportKasBonSopir')?>",'_blank');
    }
  </script>