
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('certificate_settings'); ?></h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row justify-content-center">
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-12">
          <form class="required-form" action="<?php echo site_url('addons/certificate/settings/text_update'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label><?php echo ucwords(get_phrase('certificate_template_text')); ?></label>
              <p class="text-muted font-13">
                N.B: <strong>"{student}"</strong> <?php echo strtolower(get_phrase('and')); ?> <strong>"{course}"</strong> <?php echo strtolower(get_phrase('represents_student_name_and_course_title_on_the_certificate')); ?>.
              </p>
              <textarea name="certificate_template" data-toggle="maxlength" class="form-control" maxlength="120" rows="10"
              placeholder="This textarea has a limit of 120 chars." required><?php echo get_settings('certificate_template'); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo get_phrase('save'); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <form class="required-form" action="<?php echo site_url('addons/certificate/settings/template_update'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label><?php echo ucwords(get_phrase('certificate_template')); ?></label>
            <p class="text-muted font-13">
              N.B: <?php echo strtolower(get_phrase('make_sure_that_template_size_is_less_than')); ?> <strong>"1MB"</strong>.
            </p>
            <div class="form-group mb-2">
                <div class="wrapper-image-preview">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/certificates/template.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="certificate_template" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('certificate_template'); ?></label>
                            <input id="certificate_template" style="visibility:hidden;" type="file" class="image-upload" name="certificate_template" accept="image/*" required>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><?php echo get_phrase('save'); ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <style type="text/css">
          @import url('https://fonts.googleapis.com/css2?family=Italianno&display=swap');
          @import url('https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27');
          @import url('https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27');
        </style>
        <label><?php echo ucwords(get_phrase('certificate_text_position')); ?></label>
        <p class="text-muted font-13">
          N.B: <?php echo get_phrase('you_must_update_the_text_position_after_updating_the_certificate_template_text'); ?>
        </p>
        <div style="overflow: auto;">
          <style type="text/css">
            .draggable{
              border: 2px dashed #8d8d8d;
              padding: 0px 5px;
              cursor: move;
              background-color: #15b57e33;
              top: 0;
              max-width: 500px;
            }
          </style>
          <?php echo remove_js(htmlspecialchars_decode(get_settings('certificate-text-positons'))); ?>
        </div>
        <a class="btn btn-primary mt-2" href="<?php echo site_url('addons/certificate/position'); ?>"><?php echo get_phrase('edit_text_position'); ?> <i class="mdi mdi-arrow-right"></i></a>
      </div>
    </div>

  </div>
</div>


