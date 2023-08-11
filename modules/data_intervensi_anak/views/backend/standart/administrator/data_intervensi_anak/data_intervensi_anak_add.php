    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

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
        Data Intervensi Anak        <small><?= cclang('new', ['Data Intervensi Anak']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/data_intervensi_anak'); ?>">Data Intervensi Anak</a></li>
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
                            <h3 class="widget-user-username">Data Intervensi Anak</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Data Intervensi Anak']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_data_intervensi_anak',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_data_intervensi_anak',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                                                                                                    <div class="form-group group-intervensi_kecamatan_id ">
                                <label for="intervensi_kecamatan_id" class="col-sm-2 control-label">Kecamatan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="intervensi_kecamatan_id" id="intervensi_kecamatan_id" data-placeholder="Select Kecamatan">
                                        <option value=""></option>
                                        <?php
                                        $conditions = [
                                            ];
                                        ?>
                                        
                                        <?php foreach (db_get_all_data('kecamatans', $conditions) as $row): ?>
                                        <option value="<?= $row->kecamatan_id ?>"><?= $row->kecamatan_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        

                                                                                                                            <div class="form-group group-intervensi_kelurahan_id ">
                                <label for="intervensi_kelurahan_id" class="col-sm-2 control-label">Kelurahan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="intervensi_kelurahan_id" id="intervensi_kelurahan_id" data-placeholder="Select Kelurahan">
                                        <option value=""></option>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        

                                                                                                                            <div class="form-group group-intervensi_anak_id ">
                                <label for="intervensi_anak_id" class="col-sm-2 control-label">Nama Anak                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="intervensi_anak_id" id="intervensi_anak_id" data-placeholder="Select Nama Anak">
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

                        

                                                                                                                            <div class="form-group group-intervensi_bulan ">
                                <label for="intervensi_bulan" class="col-sm-2 control-label">Bulan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="month" class="form-control" name="intervensi_bulan" id="intervensi_bulan" placeholder="Bulan" value="<?= set_value('intervensi_bulan'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_tahun ">
                                <label for="intervensi_tahun" class="col-sm-2 control-label">Tahun                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-2">
                                    <select class="form-control chosen chosen-select-deselect" name="intervensi_tahun" id="intervensi_tahun" data-placeholder="Select Tahun">
                                        <option value=""></option>
                                        <?php for ($i = 1970; $i < date('Y')+100; $i++){ ?> <option value="<?= $i;?>"><?= $i; ?></option>
                                            <?php }; ?>
                                    </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_tgl_masuk ">
                                <label for="intervensi_tgl_masuk" class="col-sm-2 control-label">Tanggal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="intervensi_tgl_masuk" placeholder="Tanggal" id="intervensi_tgl_masuk">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_kondisi ">
                                <label for="intervensi_kondisi" class="col-sm-2 control-label">Kondisi                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="intervensi_kondisi" id="intervensi_kondisi" placeholder="Kondisi" value="<?= set_value('intervensi_kondisi'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_nama_ortu_asuh ">
                                <label for="intervensi_nama_ortu_asuh" class="col-sm-2 control-label">Nama Orang Tua Asuh                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="intervensi_nama_ortu_asuh" id="intervensi_nama_ortu_asuh" placeholder="Nama Orang Tua Asuh" value="<?= set_value('intervensi_nama_ortu_asuh'); ?>">
                                    <small class="info help-block">
                                        <b>Input Intervensi Nama Ortu Asuh</b> Max Length : 80.</small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_deskripsi ">
                                <label for="intervensi_deskripsi" class="col-sm-2 control-label">Intervensi                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="intervensi_deskripsi" id="intervensi_deskripsi" placeholder="Intervensi" value="<?= set_value('intervensi_deskripsi'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_tgl_pasca ">
                                <label for="intervensi_tgl_pasca" class="col-sm-2 control-label">Tanggal Intervensi                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="intervensi_tgl_pasca" placeholder="Tanggal Intervensi" id="intervensi_tgl_pasca">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_pasca ">
                                <label for="intervensi_pasca" class="col-sm-2 control-label">Pasca Intervensi                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="intervensi_pasca" id="intervensi_pasca" placeholder="Pasca Intervensi" value="<?= set_value('intervensi_pasca'); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        

                                                                                                                            <div class="form-group group-intervensi_keterangan ">
                                <label for="intervensi_keterangan" class="col-sm-2 control-label">Keterangan                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="intervensi_keterangan" id="intervensi_keterangan" placeholder="Keterangan" value="<?= set_value('intervensi_keterangan'); ?>">
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
                    window.location.href = BASE_URL + 'administrator/data_intervensi_anak';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_data_intervensi_anak = $('#form_data_intervensi_anak');
    var data_post = form_data_intervensi_anak.serializeArray();
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
            url: BASE_URL + '/administrator/data_intervensi_anak/add_save',
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

    

    

    $('#intervensi_kecamatan_id').change(function(event) {
        var val = $(this).val();
        $.LoadingOverlay('show')
        $.ajax({
                url: BASE_URL + '/administrator/data_intervensi_anak/ajax_intervensi_kelurahan_id/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option value="' + val.kelurahan_id + '">' + val.kelurahan_nama + '</option>'
                });
                $('#intervensi_kelurahan_id').html(html);
                $('#intervensi_kelurahan_id').trigger('chosen:updated');

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });

    });

    


    }); /*end doc ready*/
</script>