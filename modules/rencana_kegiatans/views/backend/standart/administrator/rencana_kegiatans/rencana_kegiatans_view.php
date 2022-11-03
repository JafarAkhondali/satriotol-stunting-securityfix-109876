
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Rencana Kegiatan      <small><?= cclang('detail', ['Rencana Kegiatan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/rencana_kegiatans'); ?>">Rencana Kegiatan</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Rencana Kegiatan</h3>
                     <h5 class="widget-user-desc">Detail Rencana Kegiatan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_rencana_kegiatans" id="form_rencana_kegiatans" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana_kegiatan_id"><?= _ent($rencana_kegiatans->rencana_kegiatan_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Definisi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-definisi"><?= _ent($rencana_kegiatans->rencana_kegiatan_definisi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tujuan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-tujuan"><?= _ent($rencana_kegiatans->rencana_kegiatan_tujuan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Output </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-output"><?= _ent($rencana_kegiatans->rencana_kegiatan_output); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Meliputi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-meliputi"><?= _ent($rencana_kegiatans->rencana_kegiatan_meliputi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Peran OPD </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-peran-opd"><?= _ent($rencana_kegiatans->rencana_kegiatan_peran_opd); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create At </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-create-at"><?= _ent($rencana_kegiatans->rencana_kegiatan_create_at); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Update At </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rencana-kegiatan-update-at"><?= _ent($rencana_kegiatans->rencana_kegiatan_update_at); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('rencana_kegiatans_update', function() use ($rencana_kegiatans){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit rencana_kegiatans (Ctrl+e)" href="<?= site_url('administrator/rencana_kegiatans/edit/'.$rencana_kegiatans->rencana_kegiatan_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Rencana Kegiatans']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/rencana_kegiatans/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Rencana Kegiatans']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->

<script>
$(document).ready(function(){
   (function(){
        var rencana_kegiatan_definisi = $('.detail_group-rencana-kegiatan-definisi');
        var rencana_kegiatan_tujuan = $('.detail_group-rencana-kegiatan-tujuan');
        var rencana_kegiatan_output = $('.detail_group-rencana-kegiatan-output');
        var rencana_kegiatan_meliputi = $('.detail_group-rencana-kegiatan-meliputi');
        var rencana_kegiatan_peran_opd = $('.detail_group-rencana-kegiatan-peran-opd');
    })()
      
   });
</script>