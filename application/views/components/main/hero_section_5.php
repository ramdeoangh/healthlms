<!-- Start Banner -->
<section class="pb-50">
  <div class="container">
    <div class="row flex-column-reverse flex-lg-row align-items-center">
      <div class="col-lg-6">
        <div class="banner-five-content">
          <?php
            $banner_title = site_phrase(get_frontend_settings('banner_title'));
            $banner_title_arr = explode(' ', $banner_title);
          ?>
          <h4 class="title  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
              <?php
              foreach($banner_title_arr as $key => $value){
                  if($value == end($banner_title_arr)){
                      echo '<span class="graphic">'.$value.'</span>';
                  }else{
                      echo $value.' ';
                  }
              }
              ?>
          </h4>
          <p class="info  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

          <div class="search-option  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
            <form action="<?php echo site_url('home/search'); ?>" method="get">
              <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
              <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
            </form>
          </div>
          <div class="students-rating">
            <div class="row">
              <div class="col-auto">
                <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                <h1><?php echo nice_number($all_students->num_rows()); ?>+</h1>
                <p><?php echo get_phrase('Happy Students') ?></p>
              </div>
              <div class="col-auto ps-4">
                <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
                <h1><?php echo nice_number($all_instructor->num_rows()); ?>+</h1>
                <p><?php echo get_phrase('Experienced Instructors') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="banner-five-img wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
          <img loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Banner -->