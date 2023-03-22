

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
        Detail Data Dtks        <small>Edit Detail Data Dtks</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/detail_data_dtks'); ?>">Detail Data Dtks</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-detail_data_dtks_warga_id */
   .group-detail_data_dtks_warga_id {

   }

   .group-detail_data_dtks_warga_id .control-label {

   }

   .group-detail_data_dtks_warga_id .col-sm-8 {

   }

   .group-detail_data_dtks_warga_id .form-control {

   }

   .group-detail_data_dtks_warga_id .help-block {

   }
   /* end .group-detail_data_dtks_warga_id */



   /* .group-detail_data_dtks_pekerjaan */
   .group-detail_data_dtks_pekerjaan {

   }

   .group-detail_data_dtks_pekerjaan .control-label {

   }

   .group-detail_data_dtks_pekerjaan .col-sm-8 {

   }

   .group-detail_data_dtks_pekerjaan .form-control {

   }

   .group-detail_data_dtks_pekerjaan .help-block {

   }
   /* end .group-detail_data_dtks_pekerjaan */



   /* .group-detail_data_dtks_ibu_kandung */
   .group-detail_data_dtks_ibu_kandung {

   }

   .group-detail_data_dtks_ibu_kandung .control-label {

   }

   .group-detail_data_dtks_ibu_kandung .col-sm-8 {

   }

   .group-detail_data_dtks_ibu_kandung .form-control {

   }

   .group-detail_data_dtks_ibu_kandung .help-block {

   }
   /* end .group-detail_data_dtks_ibu_kandung */




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
                            <h3 class="widget-user-username">Detail Data Dtks</h3>
                            <h5 class="widget-user-desc">Edit Detail Data Dtks</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/detail_data_dtks/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_detail_data_dtks',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_detail_data_dtks',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-detail_data_dtks_warga_id">
                                <label for="detail_data_dtks_warga_id" class="col-sm-2 control-label">Data Nama Warga                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="detail_data_dtks_warga_id" id="detail_data_dtks_warga_id" data-placeholder="Select Data Nama Warga">
                                        <option value=""></option>
                                        <?php
                                        $conditions = [
                                            ];
                                        ?>
                                        <?php foreach (db_get_all_data('data_warga', $conditions) as $row): ?>
                                        <option <?= $row->dawar_id == $detail_data_dtks->detail_data_dtks_warga_id ? 'selected' : ''; ?> value="<?= $row->dawar_id ?>"><?= $row->dawar_nama_lengkap; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>


                        
                        
                                                    
                        
                        <div class="form-group group-detail_data_dtks_pekerjaan  ">
                                <label for="detail_data_dtks_pekerjaan" class="col-sm-2 control-label">Pekerjaan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="detail_data_dtks_pekerjaan" id="detail_data_dtks_pekerjaan" placeholder="" value="<?= set_value('detail_data_dtks_pekerjaan', $detail_data_dtks->detail_data_dtks_pekerjaan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-detail_data_dtks_ibu_kandung  ">
                                <label for="detail_data_dtks_ibu_kandung" class="col-sm-2 control-label">Nama Ibu Kandung                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="detail_data_dtks_ibu_kandung" id="detail_data_dtks_ibu_kandung" placeholder="" value="<?= set_value('detail_data_dtks_ibu_kandung', $detail_data_dtks->detail_data_dtks_ibu_kandung); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_keterangan_padan">
                                <label for="detail_data_dtks_keterangan_padan" class="col-sm-2 control-label">Keterangan Padan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_keterangan_padan == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_keterangan_padan" value="Y"> Padan                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_keterangan_padan == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_keterangan_padan" value="N"> Tidak Padan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_bansos_bpnt">
                                <label for="detail_data_dtks_bansos_bpnt" class="col-sm-2 control-label">Bansos BPNT                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_bpnt == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_bpnt" value="Y"> Dapat                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_bpnt == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_bpnt" value="N"> Tidak Dapat                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_bansos_pkh">
                                <label for="detail_data_dtks_bansos_pkh" class="col-sm-2 control-label">Bansos PKH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_pkh == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_pkh" value="Y"> Dapat                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_pkh == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_pkh" value="N"> Tidak Dapat                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_bansos_bpnt_ppkm">
                                <label for="detail_data_dtks_bansos_bpnt_ppkm" class="col-sm-2 control-label">Bansos BPNT PPKM                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_bpnt_ppkm == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_bpnt_ppkm" value="Y"> Dapat                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_bansos_bpnt_ppkm == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_bansos_bpnt_ppkm" value="N"> Tidak Dapat                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_pbi_jkn">
                                <label for="detail_data_dtks_pbi_jkn" class="col-sm-2 control-label">PBI JKN                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_pbi_jkn == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_pbi_jkn" value="Y"> Dapat                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_pbi_jkn == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_pbi_jkn" value="N"> Tidak Dapat                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_kepesertaan_bpnt">
                                <label for="detail_data_dtks_kepesertaan_bpnt" class="col-sm-2 control-label">Kepesertaan BPNT                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_kepesertaan_bpnt == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_kepesertaan_bpnt" value="Y"> Anggota Kepesertaan BPNT                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_kepesertaan_bpnt == "T" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_kepesertaan_bpnt" value="T"> Bukan Anggota Kepesertaan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-detail_data_dtks_ketbansos  ">
                                <label for="detail_data_dtks_ketbansos" class="col-sm-2 control-label">Keterangan Bansos                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="detail_data_dtks_ketbansos" id="detail_data_dtks_ketbansos" placeholder="" value="<?= set_value('detail_data_dtks_ketbansos', $detail_data_dtks->detail_data_dtks_ketbansos); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-detail_data_dtks_kepesertaan_pkh">
                                <label for="detail_data_dtks_kepesertaan_pkh" class="col-sm-2 control-label">Kepesertaan PKH                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_kepesertaan_pkh == "Y" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_kepesertaan_pkh" value="Y"> Anggota Kepesertaan PKH                                            </label>
                                        </div>
                                    <div class="col-md-3 padding-left-0">
                                            <label>
                                                <input <?= $detail_data_dtks->detail_data_dtks_kepesertaan_pkh == "N" ? "checked" : ""; ?> type="radio" class="flat-red" name="detail_data_dtks_kepesertaan_pkh" value="N"> Bukan Anggota Kepesertaan                                            </label>
                                        </div>
                                    </select>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            </small>
                                    </div>
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
            
    (function(){
    var detail_data_dtks_warga_id = $('#detail_data_dtks_warga_id');
   /* 
    detail_data_dtks_warga_id.on('change', function() {});
    */
    var detail_data_dtks_pekerjaan = $('#detail_data_dtks_pekerjaan');
   var detail_data_dtks_ibu_kandung = $('#detail_data_dtks_ibu_kandung');
   
})()
      
      
      
      
        
        
    
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
                    window.location.href = BASE_URL + 'administrator/detail_data_dtks';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_detail_data_dtks = $('#form_detail_data_dtks');
    var data_post = form_detail_data_dtks.serializeArray();
    var save_type = $(this).attr('data-stype');
    data_post.push({
        name: 'save_type',
        value: save_type
    });

    (function(){
    data_post.push({
        name : '_example',
        value : 'value_of_example',
    })
})()
      
      
    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    $('.loading').show();

    $.ajax({
            url: form_detail_data_dtks.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#detail_data_dtks_image_galery').find('li').attr('qq-file-id');
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