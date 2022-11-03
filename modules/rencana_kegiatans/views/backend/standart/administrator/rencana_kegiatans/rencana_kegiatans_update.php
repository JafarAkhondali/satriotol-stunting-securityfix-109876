

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
        Rencana Kegiatan        <small>Edit Rencana Kegiatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/rencana_kegiatans'); ?>">Rencana Kegiatan</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-rencana-kegiatan-definisi */
   .group-rencana-kegiatan-definisi {

   }

   .group-rencana-kegiatan-definisi .control-label {

   }

   .group-rencana-kegiatan-definisi .col-sm-8 {

   }

   .group-rencana-kegiatan-definisi .form-control {

   }

   .group-rencana-kegiatan-definisi .help-block {

   }
   /* end .group-rencana-kegiatan-definisi */



   /* .group-rencana-kegiatan-tujuan */
   .group-rencana-kegiatan-tujuan {

   }

   .group-rencana-kegiatan-tujuan .control-label {

   }

   .group-rencana-kegiatan-tujuan .col-sm-8 {

   }

   .group-rencana-kegiatan-tujuan .form-control {

   }

   .group-rencana-kegiatan-tujuan .help-block {

   }
   /* end .group-rencana-kegiatan-tujuan */



   /* .group-rencana-kegiatan-output */
   .group-rencana-kegiatan-output {

   }

   .group-rencana-kegiatan-output .control-label {

   }

   .group-rencana-kegiatan-output .col-sm-8 {

   }

   .group-rencana-kegiatan-output .form-control {

   }

   .group-rencana-kegiatan-output .help-block {

   }
   /* end .group-rencana-kegiatan-output */



   /* .group-rencana-kegiatan-meliputi */
   .group-rencana-kegiatan-meliputi {

   }

   .group-rencana-kegiatan-meliputi .control-label {

   }

   .group-rencana-kegiatan-meliputi .col-sm-8 {

   }

   .group-rencana-kegiatan-meliputi .form-control {

   }

   .group-rencana-kegiatan-meliputi .help-block {

   }
   /* end .group-rencana-kegiatan-meliputi */



   /* .group-rencana-kegiatan-peran-opd */
   .group-rencana-kegiatan-peran-opd {

   }

   .group-rencana-kegiatan-peran-opd .control-label {

   }

   .group-rencana-kegiatan-peran-opd .col-sm-8 {

   }

   .group-rencana-kegiatan-peran-opd .form-control {

   }

   .group-rencana-kegiatan-peran-opd .help-block {

   }
   /* end .group-rencana-kegiatan-peran-opd */




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
                            <h3 class="widget-user-username">Rencana Kegiatan</h3>
                            <h5 class="widget-user-desc">Edit Rencana Kegiatan</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/rencana_kegiatans/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_rencana_kegiatans',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_rencana_kegiatans',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-rencana-kegiatan-definisi  ">
                                <label for="rencana_kegiatan_definisi" class="col-sm-2 control-label">Definisi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="rencana_kegiatan_definisi" name="rencana_kegiatan_definisi" rows="10" cols="80"> <?= set_value('rencana_kegiatan_definisi', $rencana_kegiatans->rencana_kegiatan_definisi); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rencana-kegiatan-tujuan  ">
                                <label for="rencana_kegiatan_tujuan" class="col-sm-2 control-label">Tujuan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="rencana_kegiatan_tujuan" name="rencana_kegiatan_tujuan" rows="10" cols="80"> <?= set_value('rencana_kegiatan_tujuan', $rencana_kegiatans->rencana_kegiatan_tujuan); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rencana-kegiatan-output  ">
                                <label for="rencana_kegiatan_output" class="col-sm-2 control-label">Output                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="rencana_kegiatan_output" name="rencana_kegiatan_output" rows="10" cols="80"> <?= set_value('rencana_kegiatan_output', $rencana_kegiatans->rencana_kegiatan_output); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rencana-kegiatan-meliputi  ">
                                <label for="rencana_kegiatan_meliputi" class="col-sm-2 control-label">Meliputi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="rencana_kegiatan_meliputi" name="rencana_kegiatan_meliputi" rows="10" cols="80"> <?= set_value('rencana_kegiatan_meliputi', $rencana_kegiatans->rencana_kegiatan_meliputi); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rencana-kegiatan-peran-opd  ">
                                <label for="rencana_kegiatan_peran_opd" class="col-sm-2 control-label">Peran OPD                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="rencana_kegiatan_peran_opd" name="rencana_kegiatan_peran_opd" rows="10" cols="80"> <?= set_value('rencana_kegiatan_peran_opd', $rencana_kegiatans->rencana_kegiatan_peran_opd); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rencana-kegiatan-create-at  ">
                                <label for="rencana_kegiatan_create_at" class="col-sm-2 control-label">Create At                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datetimepicker" name="rencana_kegiatan_create_at" placeholder="" id="rencana_kegiatan_create_at" value="<?= set_value('rencana_kegiatan_create_at', $rencana_kegiatans->rencana_kegiatan_create_at); ?>">
                                    </div>
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
    <script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function() {
    window.event_submit_and_action = '';
            
    (function(){
    var rencana_kegiatan_definisi = $('#rencana_kegiatan_definisi');
   /* 
    rencana_kegiatan_definisi.on('change', function() {});
    */
    var rencana_kegiatan_tujuan = $('#rencana_kegiatan_tujuan');
   var rencana_kegiatan_output = $('#rencana_kegiatan_output');
   var rencana_kegiatan_meliputi = $('#rencana_kegiatan_meliputi');
   var rencana_kegiatan_peran_opd = $('#rencana_kegiatan_peran_opd');
   
})()
      
      
      
      
        
        
    CKEDITOR.replace('rencana_kegiatan_definisi');
    var rencana_kegiatan_definisi = CKEDITOR.instances.rencana_kegiatan_definisi;
        CKEDITOR.replace('rencana_kegiatan_tujuan');
    var rencana_kegiatan_tujuan = CKEDITOR.instances.rencana_kegiatan_tujuan;
        CKEDITOR.replace('rencana_kegiatan_output');
    var rencana_kegiatan_output = CKEDITOR.instances.rencana_kegiatan_output;
        CKEDITOR.replace('rencana_kegiatan_meliputi');
    var rencana_kegiatan_meliputi = CKEDITOR.instances.rencana_kegiatan_meliputi;
        CKEDITOR.replace('rencana_kegiatan_peran_opd');
    var rencana_kegiatan_peran_opd = CKEDITOR.instances.rencana_kegiatan_peran_opd;
        
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
                    window.location.href = BASE_URL + 'administrator/rencana_kegiatans';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#rencana_kegiatan_definisi').val(rencana_kegiatan_definisi.getData());
        $('#rencana_kegiatan_tujuan').val(rencana_kegiatan_tujuan.getData());
        $('#rencana_kegiatan_output').val(rencana_kegiatan_output.getData());
        $('#rencana_kegiatan_meliputi').val(rencana_kegiatan_meliputi.getData());
        $('#rencana_kegiatan_peran_opd').val(rencana_kegiatan_peran_opd.getData());
        
    var form_rencana_kegiatans = $('#form_rencana_kegiatans');
    var data_post = form_rencana_kegiatans.serializeArray();
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
            url: form_rencana_kegiatans.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#rencana_kegiatans_image_galery').find('li').attr('qq-file-id');
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