
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
        Galeri Rencana Kegiatan OPD        <small>Edit Galeri Rencana Kegiatan OPD</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/rentan_opd_galeri'); ?>">Galeri Rencana Kegiatan OPD</a></li>
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
                            <h3 class="widget-user-username">Galeri Rencana Kegiatan OPD</h3>
                            <h5 class="widget-user-desc">Edit Galeri Rencana Kegiatan OPD</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/rentan_opd_galeri/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_rentan_opd_galeri',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_rentan_opd_galeri',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-rentan-opd-galeri-file  ">
                                <label for="rentan_opd_galeri_file" class="col-sm-2 control-label">Gambar                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="rentan_opd_galeri_rentan_opd_galeri_file_galery"></div>
                                    <div id="rentan_opd_galeri_rentan_opd_galeri_file_galery_listed">
                                        <?php foreach ((array) explode(',', $rentan_opd_galeri->rentan_opd_galeri_file) as $idx => $filename): ?>
                                        <input type="hidden" class="listed_file_uuid" name="rentan_opd_galeri_rentan_opd_galeri_file_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="rentan_opd_galeri_rentan_opd_galeri_file_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                                        <?php endforeach; ?>
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-rentan-opd-id">
                                <label for="rentan_opd_id" class="col-sm-2 control-label">Kegiatan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="rentan_opd_id" id="rentan_opd_id" data-placeholder="Select Kegiatan">
                                        <option value=""></option>
                                                                            </select>
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
                    window.location.href = BASE_URL + 'administrator/rentan_opd_galeri';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_rentan_opd_galeri = $('#form_rentan_opd_galeri');
    var data_post = form_rentan_opd_galeri.serializeArray();
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
            url: form_rentan_opd_galeri.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#rentan_opd_galeri_image_galery').find('li').attr('qq-file-id');
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

        $('#rentan_opd_galeri_rentan_opd_galeri_file_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: BASE_URL + '/administrator/rentan_opd_galeri/upload_rentan_opd_galeri_file_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: BASE_URL + '/administrator/rentan_opd_galeri/delete_rentan_opd_galeri_file_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: BASE_URL + 'administrator/rentan_opd_galeri/get_rentan_opd_galeri_file_file/<?= $rentan_opd_galeri->rentan_opd_galeri_id; ?>',
                refreshOnRequest: true
            },
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
                        var uuid = $('#rentan_opd_galeri_rentan_opd_galeri_file_galery').fineUploader('getUuid', id);
                        $('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="rentan_opd_galeri_rentan_opd_galeri_file_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="rentan_opd_galeri_rentan_opd_galeri_file_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').find('.listed_file_uuid[name="rentan_opd_galeri_rentan_opd_galeri_file_uuid[' + id + ']"]').remove();
                        $('#rentan_opd_galeri_rentan_opd_galeri_file_galery_listed').find('.listed_file_name[name="rentan_opd_galeri_rentan_opd_galeri_file_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end rentan_opd_galeri_file galery*/
        

    function chained_rentan_opd_id(selected, complete) {
        var val = $('#rentan_opd_id').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: BASE_URL + '/administrator/rentan_opd_galeri/ajax_rentan_opd_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.rentan_opd_id ? 'selected' : '') + ' value="' + val.rentan_opd_id + '">' + val.rentan_opd_kegiatan + '</option>'
                });
                $('#rentan_opd_id').html(html);
                $('#rentan_opd_id').trigger('chosen:updated');
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


    $('#rentan_opd_id').change(function(event) {
        chained_rentan_opd_id('')
    });

    async function chain() {
         await chained_rentan_opd_id("<?= $rentan_opd_galeri->rentan_opd_id ?>");
            }

    chain();




    }); /*end doc ready*/
</script>