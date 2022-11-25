
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
      Indikator Analisa Situasi      <small><?= cclang('detail', ['Indikator Analisa Situasi']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/analisa_situasi_indikator'); ?>">Indikator Analisa Situasi</a></li>
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
                     <h3 class="widget-user-username">Indikator Analisa Situasi</h3>
                     <h5 class="widget-user-desc">Detail Indikator Analisa Situasi</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_analisa_situasi_indikator" id="form_analisa_situasi_indikator" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-analisa_situasi_indikator_id"><?= _ent($analisa_situasi_indikator->analisa_situasi_indikator_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Indikator </label>

                        <div class="col-sm-8">
                        <span class="detail_group-analisa-situasi-indikator-nama"><?= _ent($analisa_situasi_indikator->analisa_situasi_indikator_nama); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-analisa-situasi-indikator-deskripsi"><?= _ent($analisa_situasi_indikator->analisa_situasi_indikator_deskripsi); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('analisa_situasi_indikator_update', function() use ($analisa_situasi_indikator){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit analisa_situasi_indikator (Ctrl+e)" href="<?= site_url('administrator/analisa_situasi_indikator/edit/'.$analisa_situasi_indikator->analisa_situasi_indikator_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Analisa Situasi Indikator']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/analisa_situasi_indikator/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Analisa Situasi Indikator']); ?></a>
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
   
   });
</script>