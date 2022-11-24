
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
      Sliders      <small><?= cclang('detail', ['Sliders']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/sliders'); ?>">Sliders</a></li>
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
                     <h3 class="widget-user-username">Sliders</h3>
                     <h5 class="widget-user-desc">Detail Sliders</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_sliders" id="form_sliders" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-slider_id"><?= _ent($sliders->slider_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Judul </label>

                        <div class="col-sm-8">
                        <span class="detail_group-slider-title"><?= _ent($sliders->slider_title); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deskripsi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-slider-subtitle"><?= _ent($sliders->slider_subtitle); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Link URL </label>

                        <div class="col-sm-8">
                        <span class="detail_group-slider-url"><?= _ent($sliders->slider_url); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Image </label>
                        <div class="col-sm-8">
                             <?php if (is_image($sliders->slider_image)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/sliders/' . $sliders->slider_image; ?>">
                                <img src="<?= BASE_URL . 'uploads/sliders/' . $sliders->slider_image; ?>" class="image-responsive" alt="image sliders" title="slider_image sliders" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/sliders/' . $sliders->slider_image; ?>">
                                 <img src="<?= get_icon_file($sliders->slider_image); ?>" class="image-responsive" alt="image sliders" title="slider_image <?= $sliders->slider_image; ?>" width="40px"> 
                               <?= $sliders->slider_image ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('sliders_update', function() use ($sliders){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit sliders (Ctrl+e)" href="<?= site_url('administrator/sliders/edit/'.$sliders->slider_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Sliders']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/sliders/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Sliders']); ?></a>
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
        var slider_title = $('.detail_group-slider-title');
        var slider_subtitle = $('.detail_group-slider-subtitle');
        var slider_image = $('.detail_group-slider-image');
    })()
      
   });
</script>