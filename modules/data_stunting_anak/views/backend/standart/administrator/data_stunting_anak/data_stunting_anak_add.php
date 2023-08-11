
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo() {

        // Binding keys
        $('*').bind('keydown', 'Ctrl+s', function assets() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function assets() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function assets() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<style>

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Stunting Anak        <small><?= cclang('new', ['Data Stunting Anak']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/data_stunting_anak'); ?>">Data Stunting Anak</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Data Stunting Anak</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Data Stunting Anak']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_data_stunting_anak',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_data_stunting_anak',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                                                                                                    <div class="form-group group-stunting_anak_anak_id ">
                                <label for="stunting_anak_anak_id" class="col-sm-2 control-label">Nama Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="stunting_anak_anak_id" id="stunting_anak_anak_id" data-placeholder="Select Nama Anak">
                                        <option value=""></option>
                                        <?php
                                        $conditions = [
                                            ];
                                        ?>
                                        
                                        <?php foreach (db_get_all_data('data_anak', $conditions) as $row): ?>
                                        <option value="<?= $row->anak_id ?>"><?= $row->anak_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        

                                                                                                                            <div class="form-group group-stunting_anak_dtks ">
                                <label for="stunting_anak_dtks" class="col-sm-2 control-label">DTKS                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dtks" id="stunting_anak_dtks" placeholder="DTKS" value="<?= set_value('stunting_anak_dtks'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_tgl_ukur ">
                                <label for="stunting_anak_tgl_ukur" class="col-sm-2 control-label">Tanggal Pengukuran                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="stunting_anak_tgl_ukur" placeholder="Tanggal Pengukuran" id="stunting_anak_tgl_ukur">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_berat_badan ">
                                <label for="stunting_anak_berat_badan" class="col-sm-2 control-label">Berat Badan Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_berat_badan" id="stunting_anak_berat_badan" placeholder="Berat Badan Anak" value="<?= set_value('stunting_anak_berat_badan'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_tinggi_badan ">
                                <label for="stunting_anak_tinggi_badan" class="col-sm-2 control-label">Tinggi Badan Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_tinggi_badan" id="stunting_anak_tinggi_badan" placeholder="Tinggi Badan Anak" value="<?= set_value('stunting_anak_tinggi_badan'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_anak_angkat ">
                                <label for="stunting_anak_anak_angkat" class="col-sm-2 control-label">Anak Angkat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_anak_angkat_anggaran ">
                                <label for="stunting_anak_anak_angkat_anggaran" class="col-sm-2 control-label">Anggaran Anak Angkat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_anak_angkat_anggaran" id="stunting_anak_anak_angkat_anggaran" placeholder="Anggaran Anak Angkat" value="<?= set_value('stunting_anak_anak_angkat_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_pengasuh_balita ">
                                <label for="stunting_anak_pengasuh_balita" class="col-sm-2 control-label">Pengasuh Balita                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_pengasuh_balita_anggaran ">
                                <label for="stunting_anak_pengasuh_balita_anggaran" class="col-sm-2 control-label">Anggaran Pengasuh Balita                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_pengasuh_balita_anggaran" id="stunting_anak_pengasuh_balita_anggaran" placeholder="Anggaran Pengasuh Balita" value="<?= set_value('stunting_anak_pengasuh_balita_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_day_care ">
                                <label for="stunting_anak_day_care" class="col-sm-2 control-label">Day Care Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_day_care_anggaran ">
                                <label for="stunting_anak_day_care_anggaran" class="col-sm-2 control-label">Anggaran Day Care Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_day_care_anggaran" id="stunting_anak_day_care_anggaran" placeholder="Anggaran Day Care Stunting" value="<?= set_value('stunting_anak_day_care_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_asupan_gizi_pmt ">
                                <label for="stunting_anak_asupan_gizi_pmt" class="col-sm-2 control-label">Asupan Gizi (PMT)                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_imunisasi ">
                                <label for="stunting_anak_imunisasi" class="col-sm-2 control-label">Imunisasi Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_imunisasi_anggaran ">
                                <label for="stunting_anak_imunisasi_anggaran" class="col-sm-2 control-label">Anggaran Imunisasi Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_imunisasi_anggaran" id="stunting_anak_imunisasi_anggaran" placeholder="Anggaran Imunisasi Anak" value="<?= set_value('stunting_anak_imunisasi_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_terapi_gizi ">
                                <label for="stunting_anak_terapi_gizi" class="col-sm-2 control-label">Terapi Gizi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_terapi_gizi_anggaran ">
                                <label for="stunting_anak_terapi_gizi_anggaran" class="col-sm-2 control-label">Anggaran Terapi Gizi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_terapi_gizi_anggaran" id="stunting_anak_terapi_gizi_anggaran" placeholder="Anggaran Terapi Gizi" value="<?= set_value('stunting_anak_terapi_gizi_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_bpjs_stunting ">
                                <label for="stunting_anak_bpjs_stunting" class="col-sm-2 control-label">BPJS Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_bpjs_stunting_anggaran ">
                                <label for="stunting_anak_bpjs_stunting_anggaran" class="col-sm-2 control-label">Anggaran BPJS Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_bpjs_stunting_anggaran" id="stunting_anak_bpjs_stunting_anggaran" placeholder="Anggaran BPJS Stunting" value="<?= set_value('stunting_anak_bpjs_stunting_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_bantuan_sembako ">
                                <label for="stunting_anak_bantuan_sembako" class="col-sm-2 control-label">Bantuan Sembako                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_bantuan_sembako_anggaran ">
                                <label for="stunting_anak_bantuan_sembako_anggaran" class="col-sm-2 control-label">Anggaran Bantuan Sembako                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_bantuan_sembako_anggaran" id="stunting_anak_bantuan_sembako_anggaran" placeholder="Anggaran Bantuan Sembako" value="<?= set_value('stunting_anak_bantuan_sembako_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_dahsyat ">
                                <label for="stunting_anak_dahsyat" class="col-sm-2 control-label">Dahsyat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_dahsyat_anggaran ">
                                <label for="stunting_anak_dahsyat_anggaran" class="col-sm-2 control-label">Anggaran Dahsyat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dahsyat_anggaran" id="stunting_anak_dahsyat_anggaran" placeholder="Anggaran Dahsyat" value="<?= set_value('stunting_anak_dahsyat_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_rtlh ">
                                <label for="stunting_anak_rtlh" class="col-sm-2 control-label">RTLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_rtlh_anggaran ">
                                <label for="stunting_anak_rtlh_anggaran" class="col-sm-2 control-label">Anggaran RTLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_rtlh_anggaran" id="stunting_anak_rtlh_anggaran" placeholder="Anggaran RTLH" value="<?= set_value('stunting_anak_rtlh_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_dlh ">
                                <label for="stunting_anak_dlh" class="col-sm-2 control-label">DLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_dlh_anggaran ">
                                <label for="stunting_anak_dlh_anggaran" class="col-sm-2 control-label">Anggaran DLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dlh_anggaran" id="stunting_anak_dlh_anggaran" placeholder="Anggaran DLH" value="<?= set_value('stunting_anak_dlh_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_akses_pangan ">
                                <label for="stunting_anak_akses_pangan" class="col-sm-2 control-label">Akses Pangan / UMKM Lokal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="yes">
                                            <?= cclang('yes'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="no">
                                            <?= cclang('no'); ?>
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_akses_pangan_anggaran ">
                                <label for="stunting_anak_akses_pangan_anggaran" class="col-sm-2 control-label">Anggaran Akses Pangan / UMKM Lokal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_akses_pangan_anggaran" id="stunting_anak_akses_pangan_anggaran" placeholder="Anggaran Akses Pangan / UMKM Lokal" value="<?= set_value('stunting_anak_akses_pangan_anggaran'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-stunting_anak_mitra_lain ">
                                <label for="stunting_anak_mitra_lain" class="col-sm-2 control-label">Mitra Lain                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_mitra_lain" id="stunting_anak_mitra_lain" placeholder="Mitra Lain" value="<?= set_value('stunting_anak_mitra_lain'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                        

                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>


                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>

                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                <?= form_close(); ?>
                        </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->

<script>
    $(document).ready(function() {
        
    window.event_submit_and_action = '';
        
    

      
      

                    
    $('#btn_cancel').click(function() {
        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/data_stunting_anak';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_data_stunting_anak = $('#form_data_stunting_anak');
    var data_post = form_data_stunting_anak.serializeArray();
    var save_type = $(this).attr('data-stype');

    data_post.push({
        name: 'save_type',
        value: save_type
    });

    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    

    $('.loading').show();

    $.ajax({
            url: BASE_URL + '/administrator/data_stunting_anak/add_save',
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('.steps li').removeClass('error');
            $('form').find('.error-input').remove();
            if (res.success) {
                
            if (save_type == 'back') {
                window.location.href = res.redirect;
                return;
            }

            $('.message').printMessage({
                message: res.message
            });
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            
            } else {
                if (res.errors) {

                    $.each(res.errors, function(index, val) {
                        $('form #' + index).parents('.form-group').addClass('has-error');
                        $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                    });
                    $('.steps li').removeClass('error');
                    $('.content section').each(function(index, el) {
                        if ($(this).find('.has-error').length) {
                            $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                        }
                    });
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
            $('.loading').hide();
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 2000);
        });

    return false;
    }); /*end btn save*/

    

    

    


    }); /*end doc ready*/
</script>