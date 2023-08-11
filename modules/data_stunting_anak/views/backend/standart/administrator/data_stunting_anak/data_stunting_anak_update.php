

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
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Stunting Anak        <small>Edit Data Stunting Anak</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/data_stunting_anak'); ?>">Data Stunting Anak</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>

</style>
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
                            <h5 class="widget-user-desc">Edit Data Stunting Anak</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/data_stunting_anak/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_data_stunting_anak',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_data_stunting_anak',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-stunting_anak_anak_id">
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
                                        <option <?= $row->anak_id == $data_stunting_anak->stunting_anak_anak_id ? 'selected' : ''; ?> value="<?= $row->anak_id ?>"><?= $row->anak_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>


                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_dtks  ">
                                <label for="stunting_anak_dtks" class="col-sm-2 control-label">DTKS                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dtks" id="stunting_anak_dtks" placeholder="" value="<?= set_value('stunting_anak_dtks', $data_stunting_anak->stunting_anak_dtks); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_tgl_ukur  ">
                                <label for="stunting_anak_tgl_ukur" class="col-sm-2 control-label">Tanggal Pengukuran                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="stunting_anak_tgl_ukur" placeholder="" id="stunting_anak_tgl_ukur" value="<?= set_value('data_stunting_anak_stunting_anak_tgl_ukur_name', $data_stunting_anak->stunting_anak_tgl_ukur); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_berat_badan  ">
                                <label for="stunting_anak_berat_badan" class="col-sm-2 control-label">Berat Badan Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_berat_badan" id="stunting_anak_berat_badan" placeholder="" value="<?= set_value('stunting_anak_berat_badan', $data_stunting_anak->stunting_anak_berat_badan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_tinggi_badan  ">
                                <label for="stunting_anak_tinggi_badan" class="col-sm-2 control-label">Tinggi Badan Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_tinggi_badan" id="stunting_anak_tinggi_badan" placeholder="" value="<?= set_value('stunting_anak_tinggi_badan', $data_stunting_anak->stunting_anak_tinggi_badan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_anak_angkat  ">
                                <label for="stunting_anak_anak_angkat" class="col-sm-2 control-label">Anak Angkat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="yes" <?= $data_stunting_anak->stunting_anak_anak_angkat == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_anak_angkat" id="stunting_anak_anak_angkat" value="no" <?= $data_stunting_anak->stunting_anak_anak_angkat == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_anak_angkat_anggaran  ">
                                <label for="stunting_anak_anak_angkat_anggaran" class="col-sm-2 control-label">Anggaran Anak Angkat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_anak_angkat_anggaran" id="stunting_anak_anak_angkat_anggaran" placeholder="" value="<?= set_value('stunting_anak_anak_angkat_anggaran', $data_stunting_anak->stunting_anak_anak_angkat_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_pengasuh_balita  ">
                                <label for="stunting_anak_pengasuh_balita" class="col-sm-2 control-label">Pengasuh Balita                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="yes" <?= $data_stunting_anak->stunting_anak_pengasuh_balita == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_pengasuh_balita" id="stunting_anak_pengasuh_balita" value="no" <?= $data_stunting_anak->stunting_anak_pengasuh_balita == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_pengasuh_balita_anggaran  ">
                                <label for="stunting_anak_pengasuh_balita_anggaran" class="col-sm-2 control-label">Anggaran Pengasuh Balita                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_pengasuh_balita_anggaran" id="stunting_anak_pengasuh_balita_anggaran" placeholder="" value="<?= set_value('stunting_anak_pengasuh_balita_anggaran', $data_stunting_anak->stunting_anak_pengasuh_balita_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_day_care  ">
                                <label for="stunting_anak_day_care" class="col-sm-2 control-label">Day Care Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="yes" <?= $data_stunting_anak->stunting_anak_day_care == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_day_care" id="stunting_anak_day_care" value="no" <?= $data_stunting_anak->stunting_anak_day_care == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_day_care_anggaran  ">
                                <label for="stunting_anak_day_care_anggaran" class="col-sm-2 control-label">Anggaran Day Care Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_day_care_anggaran" id="stunting_anak_day_care_anggaran" placeholder="" value="<?= set_value('stunting_anak_day_care_anggaran', $data_stunting_anak->stunting_anak_day_care_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_asupan_gizi_pmt  ">
                                <label for="stunting_anak_asupan_gizi_pmt" class="col-sm-2 control-label">Asupan Gizi (PMT)                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="yes" <?= $data_stunting_anak->stunting_anak_asupan_gizi_pmt == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_asupan_gizi_pmt" id="stunting_anak_asupan_gizi_pmt" value="no" <?= $data_stunting_anak->stunting_anak_asupan_gizi_pmt == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_imunisasi  ">
                                <label for="stunting_anak_imunisasi" class="col-sm-2 control-label">Imunisasi Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="yes" <?= $data_stunting_anak->stunting_anak_imunisasi == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_imunisasi" id="stunting_anak_imunisasi" value="no" <?= $data_stunting_anak->stunting_anak_imunisasi == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_imunisasi_anggaran  ">
                                <label for="stunting_anak_imunisasi_anggaran" class="col-sm-2 control-label">Anggaran Imunisasi Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_imunisasi_anggaran" id="stunting_anak_imunisasi_anggaran" placeholder="" value="<?= set_value('stunting_anak_imunisasi_anggaran', $data_stunting_anak->stunting_anak_imunisasi_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_terapi_gizi  ">
                                <label for="stunting_anak_terapi_gizi" class="col-sm-2 control-label">Terapi Gizi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="yes" <?= $data_stunting_anak->stunting_anak_terapi_gizi == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_terapi_gizi" id="stunting_anak_terapi_gizi" value="no" <?= $data_stunting_anak->stunting_anak_terapi_gizi == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_terapi_gizi_anggaran  ">
                                <label for="stunting_anak_terapi_gizi_anggaran" class="col-sm-2 control-label">Anggaran Terapi Gizi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_terapi_gizi_anggaran" id="stunting_anak_terapi_gizi_anggaran" placeholder="" value="<?= set_value('stunting_anak_terapi_gizi_anggaran', $data_stunting_anak->stunting_anak_terapi_gizi_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_bpjs_stunting  ">
                                <label for="stunting_anak_bpjs_stunting" class="col-sm-2 control-label">BPJS Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="yes" <?= $data_stunting_anak->stunting_anak_bpjs_stunting == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bpjs_stunting" id="stunting_anak_bpjs_stunting" value="no" <?= $data_stunting_anak->stunting_anak_bpjs_stunting == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_bpjs_stunting_anggaran  ">
                                <label for="stunting_anak_bpjs_stunting_anggaran" class="col-sm-2 control-label">Anggaran BPJS Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_bpjs_stunting_anggaran" id="stunting_anak_bpjs_stunting_anggaran" placeholder="" value="<?= set_value('stunting_anak_bpjs_stunting_anggaran', $data_stunting_anak->stunting_anak_bpjs_stunting_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_bantuan_sembako  ">
                                <label for="stunting_anak_bantuan_sembako" class="col-sm-2 control-label">Bantuan Sembako                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="yes" <?= $data_stunting_anak->stunting_anak_bantuan_sembako == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_bantuan_sembako" id="stunting_anak_bantuan_sembako" value="no" <?= $data_stunting_anak->stunting_anak_bantuan_sembako == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_bantuan_sembako_anggaran  ">
                                <label for="stunting_anak_bantuan_sembako_anggaran" class="col-sm-2 control-label">Anggaran Bantuan Sembako                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_bantuan_sembako_anggaran" id="stunting_anak_bantuan_sembako_anggaran" placeholder="" value="<?= set_value('stunting_anak_bantuan_sembako_anggaran', $data_stunting_anak->stunting_anak_bantuan_sembako_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_dahsyat  ">
                                <label for="stunting_anak_dahsyat" class="col-sm-2 control-label">Dahsyat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="yes" <?= $data_stunting_anak->stunting_anak_dahsyat == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dahsyat" id="stunting_anak_dahsyat" value="no" <?= $data_stunting_anak->stunting_anak_dahsyat == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_dahsyat_anggaran  ">
                                <label for="stunting_anak_dahsyat_anggaran" class="col-sm-2 control-label">Anggaran Dahsyat                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dahsyat_anggaran" id="stunting_anak_dahsyat_anggaran" placeholder="" value="<?= set_value('stunting_anak_dahsyat_anggaran', $data_stunting_anak->stunting_anak_dahsyat_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_rtlh  ">
                                <label for="stunting_anak_rtlh" class="col-sm-2 control-label">RTLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="yes" <?= $data_stunting_anak->stunting_anak_rtlh == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_rtlh" id="stunting_anak_rtlh" value="no" <?= $data_stunting_anak->stunting_anak_rtlh == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_rtlh_anggaran  ">
                                <label for="stunting_anak_rtlh_anggaran" class="col-sm-2 control-label">Anggaran RTLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_rtlh_anggaran" id="stunting_anak_rtlh_anggaran" placeholder="" value="<?= set_value('stunting_anak_rtlh_anggaran', $data_stunting_anak->stunting_anak_rtlh_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_dlh  ">
                                <label for="stunting_anak_dlh" class="col-sm-2 control-label">DLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="yes" <?= $data_stunting_anak->stunting_anak_dlh == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_dlh" id="stunting_anak_dlh" value="no" <?= $data_stunting_anak->stunting_anak_dlh == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_dlh_anggaran  ">
                                <label for="stunting_anak_dlh_anggaran" class="col-sm-2 control-label">Anggaran DLH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_dlh_anggaran" id="stunting_anak_dlh_anggaran" placeholder="" value="<?= set_value('stunting_anak_dlh_anggaran', $data_stunting_anak->stunting_anak_dlh_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_akses_pangan  ">
                                <label for="stunting_anak_akses_pangan" class="col-sm-2 control-label">Akses Pangan / UMKM Lokal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="col-md-2 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="yes" <?= $data_stunting_anak->stunting_anak_akses_pangan == "yes" ? "checked" : ""; ?>>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="col-md-14">
                                        <label>
                                            <input type="radio" class="flat-red" name="stunting_anak_akses_pangan" id="stunting_anak_akses_pangan" value="no" <?= $data_stunting_anak->stunting_anak_akses_pangan == "no" ? "checked" : ""; ?>>
                                            No
                                        </label>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_akses_pangan_anggaran  ">
                                <label for="stunting_anak_akses_pangan_anggaran" class="col-sm-2 control-label">Anggaran Akses Pangan / UMKM Lokal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_akses_pangan_anggaran" id="stunting_anak_akses_pangan_anggaran" placeholder="" value="<?= set_value('stunting_anak_akses_pangan_anggaran', $data_stunting_anak->stunting_anak_akses_pangan_anggaran); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-stunting_anak_mitra_lain  ">
                                <label for="stunting_anak_mitra_lain" class="col-sm-2 control-label">Mitra Lain                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stunting_anak_mitra_lain" id="stunting_anak_mitra_lain" placeholder="" value="<?= set_value('stunting_anak_mitra_lain', $data_stunting_anak->stunting_anak_mitra_lain); ?>">
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
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
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
            url: form_data_stunting_anak.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#data_stunting_anak_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
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

    

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>