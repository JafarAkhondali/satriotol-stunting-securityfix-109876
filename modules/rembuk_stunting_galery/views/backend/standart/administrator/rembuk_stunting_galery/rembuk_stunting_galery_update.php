
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

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
        Rembuk Stunting Galery        <small>Edit Rembuk Stunting Galery</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/rembuk_stunting_galery'); ?>">Rembuk Stunting Galery</a></li>
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
                            <h3 class="widget-user-username">Rembuk Stunting Galery</h3>
                            <h5 class="widget-user-desc">Edit Rembuk Stunting Galery</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/rembuk_stunting_galery/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_rembuk_stunting_galery',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_rembuk_stunting_galery',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-rembuk_stunting_id">
                                <label for="rembuk_stunting_id" class="col-sm-2 control-label">Reff Rembuk Stunting                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="rembuk_stunting_id" id="rembuk_stunting_id" data-placeholder="Select Reff Rembuk Stunting">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        <b>Input Rembuk Stunting Id</b> Max Length : 11.</small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-rembuk_stunting_galery_image  ">
                                <label for="rembuk_stunting_galery_image" class="col-sm-2 control-label">Gambar                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="rembuk_stunting_galery_rembuk_stunting_galery_image_galery"></div>
                                    <input class="data_file data_file_uuid" name="rembuk_stunting_galery_rembuk_stunting_galery_image_uuid" id="rembuk_stunting_galery_rembuk_stunting_galery_image_uuid" type="hidden" value="<?= set_value('rembuk_stunting_galery_rembuk_stunting_galery_image_uuid'); ?>">
                                    <input class="data_file" name="rembuk_stunting_galery_rembuk_stunting_galery_image_name" id="rembuk_stunting_galery_rembuk_stunting_galery_image_name" type="hidden" value="<?= set_value('rembuk_stunting_galery_rembuk_stunting_galery_image_name', $rembuk_stunting_galery->rembuk_stunting_galery_image); ?>">
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
                    window.location.href = BASE_URL + 'administrator/rembuk_stunting_galery';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_rembuk_stunting_galery = $('#form_rembuk_stunting_galery');
    var data_post = form_rembuk_stunting_galery.serializeArray();
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
            url: form_rembuk_stunting_galery.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#rembuk_stunting_galery_image_galery').find('li').attr('qq-file-id');
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

            $('#rembuk_stunting_galery_rembuk_stunting_galery_image_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/rembuk_stunting_galery/upload_rembuk_stunting_galery_image_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/rembuk_stunting_galery/delete_rembuk_stunting_galery_image_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/rembuk_stunting_galery/get_rembuk_stunting_galery_image_file/<?= $rembuk_stunting_galery->rembuk_stunting_galery_id; ?>',
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
                            var uuid = $('#rembuk_stunting_galery_rembuk_stunting_galery_image_galery').fineUploader('getUuid', id);
                            $('#rembuk_stunting_galery_rembuk_stunting_galery_image_uuid').val(uuid);
                            $('#rembuk_stunting_galery_rembuk_stunting_galery_image_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#rembuk_stunting_galery_rembuk_stunting_galery_image_uuid').val();
                        $.get(BASE_URL + '/administrator/rembuk_stunting_galery/delete_rembuk_stunting_galery_image_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#rembuk_stunting_galery_rembuk_stunting_galery_image_uuid').val('');
                            $('#rembuk_stunting_galery_rembuk_stunting_galery_image_name').val('');
                        }
                    }
                }
            }); /*end rembuk_stunting_galery_image galey*/
            

    

    function chained_rembuk_stunting_id(selected, complete) {
        var val = $('#rembuk_stunting_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/rembuk_stunting_galery/ajax_rembuk_stunting_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.rembuk_stunting_id ? 'selected' : '') + ' value="' + val.rembuk_stunting_id + '">' + val.rembuk_stunting_year + '</option>'
                });
                $('#rembuk_stunting_id').html(html);
                $('#rembuk_stunting_id').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#rembuk_stunting_id').change(function(event) {
        chained_rembuk_stunting_id('')
    });

    async function chain() {
         await chained_rembuk_stunting_id("<?= $rembuk_stunting_galery->rembuk_stunting_id ?>");
            }

    chain();




    }); /*end doc ready*/
</script>