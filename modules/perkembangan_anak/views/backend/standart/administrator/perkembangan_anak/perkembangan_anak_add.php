
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
<style>
   /* .group-perkembangan_anak_id */
   .group-perkembangan_anak_id {

   }

   .group-perkembangan_anak_id .control-label {

   }

   .group-perkembangan_anak_id .col-sm-8 {

   }

   .group-perkembangan_anak_id .form-control {

   }

   .group-perkembangan_anak_id .help-block {

   }
   /* end .group-perkembangan_anak_id */



   /* .group-perkembangan_tgl */
   .group-perkembangan_tgl {

   }

   .group-perkembangan_tgl .control-label {

   }

   .group-perkembangan_tgl .col-sm-8 {

   }

   .group-perkembangan_tgl .form-control {

   }

   .group-perkembangan_tgl .help-block {

   }
   /* end .group-perkembangan_tgl */



   /* .group-perkembangan_deskripsi */
   .group-perkembangan_deskripsi {

   }

   .group-perkembangan_deskripsi .control-label {

   }

   .group-perkembangan_deskripsi .col-sm-8 {

   }

   .group-perkembangan_deskripsi .form-control {

   }

   .group-perkembangan_deskripsi .help-block {

   }
   /* end .group-perkembangan_deskripsi */



   /* .group-perkembangan_foto */
   .group-perkembangan_foto {

   }

   .group-perkembangan_foto .control-label {

   }

   .group-perkembangan_foto .col-sm-8 {

   }

   .group-perkembangan_foto .form-control {

   }

   .group-perkembangan_foto .help-block {

   }
   /* end .group-perkembangan_foto */



   /* .group-perkembangan_indikasi */
   .group-perkembangan_indikasi {

   }

   .group-perkembangan_indikasi .control-label {

   }

   .group-perkembangan_indikasi .col-sm-8 {

   }

   .group-perkembangan_indikasi .form-control {

   }

   .group-perkembangan_indikasi .help-block {

   }
   /* end .group-perkembangan_indikasi */



   /* .group-perkembangan_keterangan */
   .group-perkembangan_keterangan {

   }

   .group-perkembangan_keterangan .control-label {

   }

   .group-perkembangan_keterangan .col-sm-8 {

   }

   .group-perkembangan_keterangan .form-control {

   }

   .group-perkembangan_keterangan .help-block {

   }
   /* end .group-perkembangan_keterangan */




</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Perkembangan Anak        <small><?= cclang('new', ['Perkembangan Anak']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/perkembangan_anak'); ?>">Perkembangan Anak</a></li>
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
                            <h3 class="widget-user-username">Perkembangan Anak</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Perkembangan Anak']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_perkembangan_anak',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_perkembangan_anak',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                                                                                                    <div class="form-group group-perkembangan_anak_id ">
                                <label for="perkembangan_anak_id" class="col-sm-2 control-label">Nama Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="perkembangan_anak_id" id="perkembangan_anak_id" data-placeholder="Select Nama Anak">
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

                        

                                                                                                                            <div class="form-group group-perkembangan_tgl ">
                                <label for="perkembangan_tgl" class="col-sm-2 control-label">Tanggal Perkembangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="perkembangan_tgl" placeholder="Tanggal Perkembangan" id="perkembangan_tgl">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-perkembangan_deskripsi ">
                                <label for="perkembangan_deskripsi" class="col-sm-2 control-label">Deskripsi Perkembangan                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="perkembangan_deskripsi" id="perkembangan_deskripsi" placeholder="Deskripsi Perkembangan" value="<?= set_value('perkembangan_deskripsi'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-perkembangan_foto ">
                                <label for="perkembangan_foto" class="col-sm-2 control-label">Foto Kegiatan Perkembangan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="perkembangan_anak_perkembangan_foto_galery"></div>
                                    <div id="perkembangan_anak_perkembangan_foto_galery_listed"></div>
                                    <small class="info help-block">
                                        <b>Extension file must</b> JPG,PNG,JPEG,  <b>Max size file</b>  2048 kb.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-perkembangan_indikasi ">
                                <label for="perkembangan_indikasi" class="col-sm-2 control-label">Indikasi Penyakit                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="perkembangan_indikasi" id="perkembangan_indikasi" placeholder="Indikasi Penyakit" value="<?= set_value('perkembangan_indikasi'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-perkembangan_keterangan ">
                                <label for="perkembangan_keterangan" class="col-sm-2 control-label">Keterangan                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="perkembangan_keterangan" id="perkembangan_keterangan" placeholder="Keterangan" value="<?= set_value('perkembangan_keterangan'); ?>">
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
    var perkembangan_anak_id = $('#perkembangan_anak_id');
   /* 
    perkembangan_anak_id.on('change', function() {});
    */
    var perkembangan_tgl = $('#perkembangan_tgl');
   var perkembangan_deskripsi = $('#perkembangan_deskripsi');
   var perkembangan_foto = $('#perkembangan_foto');
   var perkembangan_indikasi = $('#perkembangan_indikasi');
   var perkembangan_keterangan = $('#perkembangan_keterangan');
   
})()
      

      
      

                    
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
                    window.location.href = BASE_URL + 'administrator/perkembangan_anak';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_perkembangan_anak = $('#form_perkembangan_anak');
    var data_post = form_perkembangan_anak.serializeArray();
    var save_type = $(this).attr('data-stype');

    data_post.push({
        name: 'save_type',
        value: save_type
    });

    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    (function(){
    data_post.push({
        name : '_example',
        value : 'value_of_example',
    })
})()
      

    $('.loading').show();

    $.ajax({
            url: BASE_URL + '/administrator/perkembangan_anak/add_save',
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
            $('#perkembangan_anak_perkembangan_foto_galery').find('li').each(function() {
                $('#perkembangan_anak_perkembangan_foto_galery').fineUploader('deleteFile', $(this).attr('qq-file-id'));
            });
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

    

            var params = {};
        params[csrf] = token;

        $('#perkembangan_anak_perkembangan_foto_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: BASE_URL + '/administrator/perkembangan_anak/upload_perkembangan_foto_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: BASE_URL + '/administrator/perkembangan_anak/delete_perkembangan_foto_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            validation: {
                allowedExtensions: ["jpg","png","jpeg"],
                sizeLimit: 2097152,
                
            },
            showMessage: function(msg) {
                toastr['error'](msg);
            },
            callbacks: {
                onComplete: function(id, name, xhr) {
                    if (xhr.success) {
                        var uuid = $('#perkembangan_anak_perkembangan_foto_galery').fineUploader('getUuid', id);
                        $('#perkembangan_anak_perkembangan_foto_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="perkembangan_anak_perkembangan_foto_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="perkembangan_anak_perkembangan_foto_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#perkembangan_anak_perkembangan_foto_galery_listed').find('.listed_file_uuid[name="perkembangan_anak_perkembangan_foto_uuid[' + id + ']"]').remove();
                        $('#perkembangan_anak_perkembangan_foto_galery_listed').find('.listed_file_name[name="perkembangan_anak_perkembangan_foto_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end perkembangan_foto galery*/
        

    


    }); /*end doc ready*/
</script>