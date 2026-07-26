<!-- Start Banner -->
<section class="banner-six pt-60">
  <div class="container">
    <div class="row flex-column-reverse flex-lg-row align-items-center">
      <div class="col-lg-6">
        <div class="banner-six-content pb-30">
          <p class="subtitle text-uppercase"><?php echo get_phrase('Welcome to').' '.get_settings('system_name'); ?></p>
          <?php
            $banner_title = site_phrase(get_frontend_settings('banner_title'));
            $banner_title_arr = explode(' ', $banner_title);
          ?>
          <h4 class="title  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
              <?php
              foreach($banner_title_arr as $key => $value){
                  if(0 == $key){
                      echo '<span class="color-1">'.$value.'</span>';
                  }else{
                      echo $value.' ';
                  }
              }
              ?>
          </h4>
          <p class="info  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

           <?php if(get_settings('public_signup') == 'enable'): ?>  
          <a href="<?php echo site_url('sign_up'); ?>" class="btn-six  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"><?php echo get_phrase('Join for free'); ?></a>
             <?php endif;?>
        </div>
        <div class="brand-4  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
          <div class="item">
            <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
            <h1><?php echo nice_number($all_students->num_rows()); ?>+</h1>
            <p><?php echo get_phrase('Happy Student') ?></p>
          </div>
          <div class="item">
            <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
            <h1><?php echo nice_number($all_instructor->num_rows()); ?>+</h1>
            <p><?php echo get_phrase('Experienced Instructor') ?></p>
          </div>
          <div class="item">
            <?php $status_wise_courses = $this->crud_model->get_status_wise_courses_front(); ?>
            <h1><?php echo nice_number($status_wise_courses['active']->num_rows()); ?>+</h1>
            <p><?php echo get_phrase('Quality courses') ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="banner-six-img  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
          <img loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Banner -->