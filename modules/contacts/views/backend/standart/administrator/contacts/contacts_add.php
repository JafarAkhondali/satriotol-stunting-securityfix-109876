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
    /* .group-contact-name */
    .group-contact-name {}

    .group-contact-name .control-label {}

    .group-contact-name .col-sm-8 {}

    .group-contact-name .form-control {}

    .group-contact-name .help-block {}

    /* end .group-contact-name */

    /* .group-contact-image */
    .group-contact-image {}

    .group-contact-image .control-label {}

    .group-contact-image .col-sm-8 {}

    .group-contact-image .form-control {}

    .group-contact-image .help-block {}

    /* end .group-contact-image */

    /* .group-contact-url */
    .group-contact-url {}

    .group-contact-url .control-label {}

    .group-contact-url .col-sm-8 {}

    .group-contact-url .form-control {}

    .group-contact-url .help-block {}

    /* end .group-contact-url */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contacts <small><?= cclang('new', ['Contacts']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/contacts'); ?>">Contacts</a></li>
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
                            <h3 class="widget-user-username">Contacts</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Contacts']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'      => 'form_contacts',
                            'class'     => 'form-horizontal form-step',
                            'id'        => 'form_contacts',
                            'enctype'   => 'multipart/form-data',
                            'method'    => 'POST'
                        ]); ?>
                    <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                    ?>
                        <div class="form-group group-contact-name ">
                            <label for="contact_name" class="col-sm-2 control-label">Nama Kontak <i class="required">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Nama Kontak" value="<?= set_value('contact_name'); ?>">
                                <small class="info help-block"><b>Input Contact Name</b> Max Length : 60.</small>
                            </div>
                        </div>

                        <div class="form-group group-contact-image ">
                            <label for="contact_image" class="col-sm-2 control-label">Icon <i class="required">*</i></label>
                            <div class="col-sm-8">
                                <input type="hidden" name="contact_image" id="contact_image">
                                <div class="icon-preview">
                                    <span class="icon-preview-item"><i class="fa fa-book fa-lg"></i></span>
                                </div>

                                <br>

                                <a class="btn btn-default btn-select-icon btn-flat"><?= cclang('pilih_ikon') ?></a>
                                <small class="info help-block"></small>
                            </div>
                        </div>
                        <div class="form-group group-contact-url ">
                            <label for="contact_url" class="col-sm-2 control-label">Link URL <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="contact_url" id="contact_url"
                                    placeholder="Link URL" value="<?= set_value('contact_url'); ?>">
                                <small class="info help-block">
                                    <b>Input Contact Url</b> Max Length : 255.</small>
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

<div class="modal fade " tabindex="-1" role="dialog" id="modalIcon">
	<div class="modal-dialog full-width" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php $this->load->view('backend/standart/administrator/contacts/partial_icon'); ?></div>
			<div class="modal-footer">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Page script -->
<script>
    $(document).ready(function () {
        window.event_submit_and_action = '';

        (function () {
            var contact_name = $('#contact_name');
            /* 
             contact_name.on('change', function() {});
             */
            var contact_image = $('#contact_image');
            var contact_url = $('#contact_url');

        })()

        $('#btn_cancel').click(function () {
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
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = BASE_URL + 'administrator/contacts';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function () {
            $('.message').fadeOut();

            var form_contacts = $('#form_contacts');
            var data_post = form_contacts.serializeArray();
            var save_type = $(this).attr('data-stype');

            data_post.push({
                name: 'save_type',
                value: save_type
            });

            data_post.push({
                name: 'event_submit_and_action',
                value: window.event_submit_and_action
            });

            (function () {
                data_post.push({
                    name: '_example',
                    value: 'value_of_example',
                })
            })()

            $('.loading').show();

            $.ajax({
                    url: BASE_URL + '/administrator/contacts/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function (res) {
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

                            $.each(res.errors, function (index, val) {
                                $('form #' + index).parents('.form-group').addClass(
                                    'has-error');
                                $('form #' + index).parents('.form-group').find('small')
                                    .prepend(`<div class="error-input">` + val + `</div>`);
                            });
                            $('.steps li').removeClass('error');
                            $('.content section').each(function (index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find(
                                        'a').trigger('click');
                                }
                            });
                        }
                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });
                    }

                })
                .fail(function () {
                    $('.message').printMessage({
                        message: 'Error save data',
                        type: 'warning'
                    });
                })
                .always(function () {
                    $('.loading').hide();
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 2000);
                });

            return false;
        }); /*end btn save*/


        $('.btn-select-icon').click(function (event) {
            event.preventDefault();

            $('#modalIcon').modal('show');
        });

		function group_select() {
			var type = $('#category-icon-filter').val();
			$('.category-icon').hide();
			$('.category-icon#' + type).show();

			if (type == 'all') {
				$('.category-icon').show();
			}
		}

        $('.icon-container').click(function (event) {
            $('#modalIcon').modal('hide');
            var icon = $(this).find('.icon-class').html();

            icon = $.trim(icon);

            $('#contact_image').val(icon);

            $('.icon-preview-item .fa').attr('class', 'fa fa-lg ' + icon);
        });

        $('#find-icon').keyup(function (event) {
            $('.icon-container').hide();
            $('.category-icon').show();
            $('#category-icon-filter').val('all')
            var search = $(this).val();

            $('.icon-class').each(function (index, el) {
                var str = $(this).html();
                var patt = new RegExp(search);
                var res = patt.test(str);

                if (res) {
                    $(this).parent('.icon-container').show();
                }
            });
            $('.category-icon').each(function (index, el) {
                if ($(this).find('.icon-container:visible').length) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });

        $('.category-icon').each(function (index) {
			$('#category-icon-filter').append('<option value="' + $(this).attr('id') + '">' + $(this).attr('id') + '</option>');
		});

		$('#category-icon-filter').change(function (event) {
			group_select();
		});

    }); /*end doc ready*/
</script>