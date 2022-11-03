

    <!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <!-- Fine Uploader jQuery JS file
    ====================================================================== -->
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
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
        Analisa Situasi        <small>Edit Analisa Situasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/analisa_situasi'); ?>">Analisa Situasi</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-analisa-situasi-year */
   .group-analisa-situasi-year {

   }

   .group-analisa-situasi-year .control-label {

   }

   .group-analisa-situasi-year .col-sm-8 {

   }

   .group-analisa-situasi-year .form-control {

   }

   .group-analisa-situasi-year .help-block {

   }
   /* end .group-analisa-situasi-year */



   /* .group-analisa-situasi-image */
   .group-analisa-situasi-image {

   }

   .group-analisa-situasi-image .control-label {

   }

   .group-analisa-situasi-image .col-sm-8 {

   }

   .group-analisa-situasi-image .form-control {

   }

   .group-analisa-situasi-image .help-block {

   }
   /* end .group-analisa-situasi-image */




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
                            <h3 class="widget-user-username">Analisa Situasi</h3>
                            <h5 class="widget-user-desc">Edit Analisa Situasi</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/analisa_situasi/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_analisa_situasi',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_analisa_situasi',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-analisa-situasi-year  ">
                                <label for="analisa_situasi_year" class="col-sm-2 control-label">Tahun                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="analisa_situasi_year" id="analisa_situasi_year" placeholder="" value="<?= set_value('analisa_situasi_year', $analisa_situasi->analisa_situasi_year); ?>">
                                    <small class="info help-block">
                                        <b>Input Analisa Situasi Year</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-analisa-situasi-image  ">
                                <label for="analisa_situasi_image" class="col-sm-2 control-label">Gambar                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="analisa_situasi_analisa_situasi_image_galery"></div>
                                    <input class="data_file data_file_uuid" name="analisa_situasi_analisa_situasi_image_uuid" id="analisa_situasi_analisa_situasi_image_uuid" type="hidden" value="<?= set_value('analisa_situasi_analisa_situasi_image_uuid'); ?>">
                                    <input class="data_file" name="analisa_situasi_analisa_situasi_image_name" id="analisa_situasi_analisa_situasi_image_name" type="hidden" value="<?= set_value('analisa_situasi_analisa_situasi_image_name', $analisa_situasi->analisa_situasi_image); ?>">
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
            
    (function(){
    var analisa_situasi_year = $('#analisa_situasi_year');
   /* 
    analisa_situasi_year.on('change', function() {});
    */
    var analisa_situasi_image = $('#analisa_situasi_image');
   
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
                    window.location.href = BASE_URL + 'administrator/analisa_situasi';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_analisa_situasi = $('#form_analisa_situasi');
    var data_post = form_analisa_situasi.serializeArray();
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
            url: form_analisa_situasi.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#analisa_situasi_image_galery').find('li').attr('qq-file-id');
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

                        var params = {};
            params[csrf] = token;

            $('#analisa_situasi_analisa_situasi_image_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/analisa_situasi/upload_analisa_situasi_image_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/analisa_situasi/delete_analisa_situasi_image_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/analisa_situasi/get_analisa_situasi_image_file/<?= $analisa_situasi->analisa_situasi_id; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["*"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#analisa_situasi_analisa_situasi_image_galery').fineUploader('getUuid', id);
                            $('#analisa_situasi_analisa_situasi_image_uuid').val(uuid);
                            $('#analisa_situasi_analisa_situasi_image_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#analisa_situasi_analisa_situasi_image_uuid').val();
                        $.get(BASE_URL + '/administrator/analisa_situasi/delete_analisa_situasi_image_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#analisa_situasi_analisa_situasi_image_uuid').val('');
                            $('#analisa_situasi_analisa_situasi_image_name').val('');
                        }
                    }
                }
            }); /*end analisa_situasi_image galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>