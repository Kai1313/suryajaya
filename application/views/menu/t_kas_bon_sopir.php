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
                      <label>Tanggal Berangkat Sby</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_berangkat" class="form-control pull-right" id="tgl_berangkat" placeholder="dd/mm/yyyy" onchange="diffDate()">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Datang Sby</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_datang" class="form-control pull-right" id="tgl_datang" placeholder="dd/mm/yyyy" onchange="diffDate()">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>PP</label>
                      <input type="text" name="jumlah_pp" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket_kasbon" rows="3"></textarea>
                    </div>
                    <div class="form-group">
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
                      <label>Berat Jenis</label>
                      <select class="form-control" name="berat_jenis" id="berat_jenis" onchange="beratStat()">
                        <option value="0">Berat (Kg)</option>
                        <option value="1">Volume (Dm3)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kendaraan</label>
                      <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan">
                        <option value="0">Bak</option>
                        <option value="1">Tangki</option>
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
                <li class="active"><a href="#tab_1" data-toggle="tab">Umum</a></li>
                <li><a href="#tab_2" data-toggle="tab">Perincian</a></li>
                <li><a href="#tab_3" data-toggle="tab">Potongan</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Cust Sby - Jkt 1</label>
                        <select class="form-control" name="kode_customer_a" id="dropPengirimA" style="width: 100%;">
                          <option value="">Pilih Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Berat Sby - Jkt 1</label>
                        <div class="input-group">
                          <input type="text" name="berat_muatan_a" class="form-control num_">
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
                        <label>Cust Sby - Jkt 2</label>
                        <select class="form-control" name="kode_customer_b" id="dropPengirimB" style="width: 100%;">
                          <option value="">Pilih Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Berat Sby - Jkt 2</label>
                        <div class="input-group">
                          <input type="text" name="berat_muatan_b" class="form-control num_">
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
                        <label>Cust Jkt - Sby 1</label>
                        <select class="form-control" name="kode_customer_c" id="dropPengirimC" style="width: 100%;">
                          <option value="">Pilih Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Berat Jkt - Sby 1</label>
                        <div class="input-group">
                          <input type="text" name="berat_muatan_c" class="form-control num_">
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
                        <label>Cust Jkt - Sby 2</label>
                        <select class="form-control" name="kode_customer_d" id="dropPengirimD" style="width: 100%;">
                          <option value="">Pilih Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Berat Jkt - Sby 2</label>
                        <div class="input-group">
                          <input type="text" name="berat_muatan_d" class="form-control num_">
                          <div class="input-group-addon">
                            <span class="beratSts">Kg</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_2">
                  <div class="row">
                    <div class="col-md-8 col-xs-12">
                      <div class="form-group">
                        <label>Biaya Jalan Sby - Jkt</label>
                        <select class="form-control" name="kode_biaya_sbyjkt" id="dropBiayaSbyJkt" style="width: 100%;" onchange="hitungPerincian()">
                          <option value="">Pilih Biaya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="biaya_sbyjkt" class="form-control perincianchg num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Bantuan 1</label>
                        <input type="text" name="bantuan1" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="def_bantuan1" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="total_bantuan1" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Bantuan 2</label>
                        <input type="text" name="bantuan2" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="def_bantuan2" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="total_bantuan2" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Ngepok</label>
                        <input type="text" name="ngepok" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_ngepok" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_ngepok" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-xs-12">
                      <div class="form-group">
                        <label>Biaya Jalan Jkt - Sby</label>
                        <select class="form-control" name="kode_biaya_jktsby" id="dropBiayaJktSby" style="width: 100%;" onchange="hitungPerincian()">
                          <option value="">Pilih Biaya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="biaya_jktsby" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Solar Ke Jkt</label>
                        <input type="text" name="solar_jkt" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_solar_jkt" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_solar_jkt" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Solar Ke Sby</label>
                        <input type="text" name="solar_sby" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_solar_sby" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_solar_sby" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Solar Naik</label>
                        <input type="text" name="solar_naik" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_solar_naik" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_solar_naik" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Retribusi Jalan</label>
                        <input type="text" name="retribusi" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_retribusi" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_retribusi" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-xs-12">
                      <div class="form-group">
                        <label>Pulang Kosong</label>
                        <select class="form-control" name="pulang" id="dropBiayaPulang" style="width: 100%;" onchange="hitungPerincian()">
                          <option value="">Pilih Biaya</option>
                          <?php $dtPlg = $this->db->get_where('profile_settings', array('id'=>'1'))->row(); ?>
                          <option value="<?= $dtPlg->pulang_kosonga; ?>"><?= number_format($dtPlg->pulang_kosonga, 2);?></option>
                          <option value="<?= $dtPlg->pulang_kosongb; ?>"><?= number_format($dtPlg->pulang_kosongb, 2);?></option>
                          <option value="<?= $dtPlg->pulang_kosongc; ?>"><?= number_format($dtPlg->pulang_kosongc, 2);?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="biaya_pulang" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Bantuan 3</label>
                        <input type="text" name="bantuan3" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_bantuan3" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_bantuan3" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label>Bantuan 4</label>
                        <input type="text" name="bantuan4" class="form-control perincianchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_bantuan4" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_bantuan4" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-8 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Total Perincian</label>
                        <input type="text" name="total_perincian" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_3">
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Bon Sangu Jkt</label>
                        <select class="form-control" name="bon_sangujkt" id="dropSanguJkt" style="width: 100%;" onchange="hitungPotongan()">
                          <option value="">Pilih Bon</option>
                          <?php $dtBon = $this->db->get_where('profile_settings', array('id'=>'1'))->row(); ?>
                          <option value="<?= $dtBon->bon_jkta; ?>"><?= number_format($dtBon->bon_jkta,2); ?></option>
                          <option value="<?= $dtBon->bon_jktb; ?>"><?= number_format($dtBon->bon_jktb,2); ?></option>
                          <option value="<?= $dtBon->bon_jktc; ?>"><?= number_format($dtBon->bon_jktc,2); ?></option>
                          <option value="<?= $dtBon->bon_jktd; ?>"><?= number_format($dtBon->bon_jktd,2); ?></option>
                          <option value="<?= $dtBon->bon_jkte; ?>"><?= number_format($dtBon->bon_jkte,2); ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="nom_bon_sangujkt" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Hutang Pribadi</label>
                        <input type="text" name="inp_hutangpribadi" class="form-control num_">
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_hutangpribadi" class="form-control potonganchg num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Klaim</label>
                        <input type="text" name="inp_klaim" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_klaim" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Uang Kenek</label>
                        <input type="text" name="inp_uangkenek" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_uangkenek" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_uangkenek" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Koreksi 1</label>
                        <input type="text" name="inp_koreksi1" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_koreksi1" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Koreksi 2</label>
                        <input type="text" name="inp_koreksi2" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_koreksi2" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Koreksi 3</label>
                        <input type="text" name="inp_koreksi3" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-offset-4 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_koreksi3" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Tabungan Sopir</label>
                        <input type="text" name="inp_tabsopir" class="form-control potonganchg num_">
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="def_tabsopir" class="form-control num_" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <label></label>
                        <input type="text" name="total_tabsopir" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-8 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Total Potongan</label>
                        <input type="text" name="total_potongan" class="form-control num_" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-offset-8 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Sisa/Kurang</label>
                        <input type="text" name="total_akhir" class="form-control num_" readonly>
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
              <div class="row">
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-success" onclick="saveDt()">Simpan</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-warning" onclick="cancelDt()">Batal</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-danger" onclick="delDt()">Hapus</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-primary" onclick="printDt()">Cetak</button>
                  </div>
                </div>
                <div class="col-md-1 col-xs-4">
                  <div class="form-group">
                    <button type="button" class="btn btn-md btn-primary" onclick="reportDt()">Laporan</button>
                  </div>
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
      var retBak = 0;
      var retTangki = 0;
      getSettings();
      $('.num_').number(true,2);
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'0';
      $('#tgl_bon').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_berangkat').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      $('#tgl_datang').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
      });
      perincianChg();
      potonganChg();
      bonsakuchg();
      beratBrgkt();
      beratKmb();
      $('#berat_jenis').select2({placeholder: 'Pilih Berat Jenis'});
      $('#nama_pom').select2({placeholder: 'Pilih Pom'});
      $('#jenis_kendaraan').select2({placeholder: 'Pilih Kendaraan'});
      $('#dropBiayaPulang').select2({placeholder: 'Pilih Biaya'});
      $('#dropSanguJkt').select2({placeholder: 'Pilih Sangu'});
      dropkendaraan();
      dropsopir();
      dropkernet();
      dropbiayasbyjkt();
      dropbiayajktsby();
      droppengirim_a();
      droppengirim_b();
      droppengirim_c();
      droppengirim_d();
      $('#dropBiayaSbyJkt').change(function()
      {
        pickBiayaSbyJkt($('#dropBiayaSbyJkt option:selected').val());
      });
      $('#dropBiayaJktSby').change(function()
      {
        pickBiayaJktSby($('#dropBiayaJktSby option:selected').val());
      });
      $('#jenis_kendaraan').change(function()
      {
        pickJenisKendaraan($('#jenis_kendaraan option:selected').val());
      });
      $('#dropBiayaPulang').change(function()
      {
        $('[name="biaya_pulang"]').val($('#dropBiayaPulang option:selected').val());
      });
      $('#dropSanguJkt').change(function()
      {
        $('[name="nom_bon_sangujkt"]').val($('#dropSanguJkt option:selected').val());
      });
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
    function dropbiayasbyjkt()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBiayaSopir')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBiayaSbyJkt');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_biaya_driver']
            option.text = data[i]['kode_biaya_driver']+' - '+data[i]['ket_biaya_driver'];
            select.add(option);
          }
          $('#dropBiayaSbyJkt').select2({placeholder: 'Pilih Biaya'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get biaya data');
        }
      });
    }
    function dropbiayajktsby()
    {
      $.ajax({
        url : "<?php echo site_url('Crud/getDropBiayaSopir')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
          var select = document.getElementById('dropBiayaJktSby');
          var option;
          for (var i = 0; i < data.length; i++)
          {
            option = document.createElement('option');
            option.value = data[i]['kode_biaya_driver']
            option.text = data[i]['kode_biaya_driver']+' - '+data[i]['ket_biaya_driver'];
            select.add(option);
          }
          $('#dropBiayaJktSby').select2({placeholder: 'Pilih Biaya'});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error get biaya data');
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
    function pickBiayaSbyJkt(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBiayaDriver/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="biaya_sbyjkt"]').val(data.nom_biaya_driver);
        }
      });
    }
    function pickBiayaJktSby(key)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/pickDropBiayaDriver/')?>'+key,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="biaya_jktsby"]').val(data.nom_biaya_driver);
        }
      });
    }
    function pickJenisKendaraan(key)
    {
      if(key != '1') {
        $('[name="def_retribusi"]').val(retTangki);
        hitungPerincian();
        hitungPotongan();
      }
      else {
        $('[name="def_retribusi"]').val(retBak);
        hitungPerincian();
        hitungPotongan();
      }
    }
    function getSettings()
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getSettings/1')?>',
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="def_solar_sby"]').val(data.solar_jktsby);
          $('[name="def_solar_jkt"]').val(data.solar_sbyjkt);
          $('[name="def_solar_naik"]').val(data.solar_naik);
          $('[name="def_bantuan2"]').val(data.bkr2t);
          $('[name="def_ngepok"]').val(data.ngepok);
          $('[name="def_uangkenek"]').val(data.uang_kernet);
          $('[name="def_tabsopir"]').val(data.tab_sopir);
          $('[name="def_retribusi"]').val(data.retribusi_bak);
          retBak = data.retribusi_bak;
          retTangki = data.retribusi_tangki;
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
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/cancelKasBonSopir')?>',
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
    function delDt()
    {
      key = ($('[name="no_bon"]').val()!='')?$('[name="no_bon"]').val():'';
      $.ajax({
        type: 'POST',
        url: '<?= site_url('Crud/delKasBonSopir')?>',
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
    function hitungPerincian()
    {
      biaya_sbyjkt = $('[name="biaya_sbyjkt"]').val()*1;
      bantuan1 = $('[name="bantuan1"]').val()*1;
      total_bantuan1 = parseFloat(bantuan1)*1;
      $('[name="total_bantuan1"]').val(total_bantuan1);
      bantuan2 = $('[name="bantuan2"]').val()*1;
      def_bantuan2 = $('[name="def_bantuan2"]').val()*1;
      total_bantuan2 = parseFloat(bantuan2)*parseFloat(def_bantuan2);
      $('[name="total_bantuan2"]').val(total_bantuan2);
      ngepok = $('[name="ngepok"]').val()*1;
      def_ngepok = $('[name="def_ngepok"]').val()*1;
      total_ngepok = parseFloat(ngepok)*parseFloat(def_ngepok);
      $('[name="total_ngepok"]').val(total_ngepok);
      biaya_jktsby = $('[name="biaya_jktsby"]').val()*1;
      solar_jkt = $('[name="solar_jkt"]').val()*1;
      def_solar_jkt = $('[name="def_solar_jkt"]').val()*1;
      total_solar_jkt = parseFloat(solar_jkt)*parseFloat(def_solar_jkt);
      $('[name="total_solar_jkt"]').val(total_solar_jkt);
      solar_sby = $('[name="solar_sby"]').val()*1;
      def_solar_sby = $('[name="def_solar_sby"]').val()*1;
      total_solar_sby = parseFloat(solar_sby)*parseFloat(def_solar_sby);
      $('[name="total_solar_sby"]').val(total_solar_sby);
      solar_naik = $('[name="solar_naik"]').val()*1;
      def_solar_naik = $('[name="def_solar_naik"]').val()*1;
      total_solar_naik = parseFloat(solar_naik)*parseFloat(def_solar_naik);
      $('[name="total_solar_naik"]').val(total_solar_naik);
      retribusi = $('[name="retribusi"]').val()*1;
      def_retribusi = $('[name="def_retribusi"]').val()*1;
      total_retribusi = parseFloat(retribusi)*parseFloat(def_retribusi);
      $('[name="total_retribusi"]').val(total_retribusi);
      biaya_pulang = $('[name="biaya_pulang"]').val()*1;
      bantuan3 = $('[name="bantuan3"]').val()*1;
      total_bantuan3 = parseFloat(bantuan3)*1;
      $('[name="total_bantuan3"]').val(total_bantuan3);
      bantuan4 = $('[name="bantuan4"]').val()*1;
      total_bantuan4 = parseFloat(bantuan4)*1;
      $('[name="total_bantuan4"]').val(total_bantuan4);
      total_perincian = parseFloat(biaya_sbyjkt)+parseFloat(total_bantuan1)+parseFloat(total_bantuan2)+parseFloat(total_ngepok)+parseFloat(total_solar_jkt)+parseFloat(total_solar_sby)+parseFloat(total_solar_naik)+parseFloat(total_retribusi)+parseFloat(biaya_pulang)+parseFloat(total_bantuan3)+parseFloat(total_bantuan4)
      $('[name="total_perincian"]').val(total_perincian);
    }
    function perincianChg()
    {
      $('.perincianchg').on('input', function()
      {
        hitungPerincian();
      });
    }
    function hitungPotongan()
    {
      nom_bon_sangujkt = $('[name="nom_bon_sangujkt"]').val()*1;
      inp_hutangpribadi = $('[name="inp_hutangpribadi"]').val()*1;
      total_hutangpribadi = parseFloat(inp_hutangpribadi)*1;
      $('[name="total_hutangpribadi"]').val(total_hutangpribadi);
      inp_klaim = $('[name="inp_klaim"]').val()*1;
      total_klaim = parseFloat(inp_klaim)*1;
      $('[name="total_klaim"]').val(total_klaim);
      inp_uangkenek = $('[name="inp_uangkenek"]').val()*1;
      def_uangkenek = $('[name="def_uangkenek"]').val()*1;
      total_uangkenek = parseFloat(inp_uangkenek)*parseFloat(def_uangkenek);
      $('[name="total_uangkenek"]').val(total_uangkenek);
      console.log($('[name="total_uangkenek"]').val());
      inp_koreksi1 = $('[name="inp_koreksi1"]').val()*1;
      total_koreksi1 = parseFloat(inp_koreksi1)*1;
      $('[name="total_koreksi1"]').val(total_koreksi1);
      inp_koreksi2 = $('[name="inp_koreksi2"]').val()*1;
      total_koreksi2 = parseFloat(inp_koreksi2)*1;
      $('[name="total_koreksi2"]').val(total_koreksi2);
      inp_koreksi3 = $('[name="inp_koreksi3"]').val()*1;
      total_koreksi3 = parseFloat(inp_koreksi3)*1;
      $('[name="total_koreksi3"]').val(total_koreksi3);
      inp_tabsopir = $('[name="inp_tabsopir"]').val()*1;
      def_tabsopir = $('[name="def_tabsopir"]').val()*1;
      total_tabsopir = parseFloat(inp_tabsopir)*parseFloat(def_tabsopir);
      $('[name="total_tabsopir"]').val(total_tabsopir);
      total_potongan = parseFloat(nom_bon_sangujkt)+parseFloat(total_hutangpribadi)+parseFloat(total_klaim)+parseFloat(total_uangkenek)+parseFloat(total_koreksi1)+parseFloat(total_koreksi2)+parseFloat(total_koreksi3)+parseFloat(total_tabsopir);
      $('[name="total_potongan"]').val(total_potongan);
      total_rinci = $('[name="total_perincian"]').val()*1;
      total_akhir = parseFloat(total_rinci)-parseFloat(total_potongan);
      $('[name="total_akhir"]').val(total_akhir);
    }
    function potonganChg()
    {
      $('.potonganchg').on('input', function()
      {
        hitungPotongan();
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
    function diffDate()
    {
      st = moment($('[name="tgl_berangkat"]').val(),'DD/MM/YYYY');
      ed = moment($('[name="tgl_datang"]').val(),'DD/MM/YYYY');
      $('[name="jumlah_pp"]').val(ed.diff(st,'days'));
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