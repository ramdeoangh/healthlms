<!-- Start Banner -->
<section class="banner">
  <div class="container">
    <div class="banner-wrap">
      <div class="banner-img">
        <img loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" />
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="banner-content">

            <?php
              $banner_title = site_phrase(get_frontend_settings('banner_title'));
              $banner_title_arr = explode(' ', $banner_title);
            ?>
            <h4 class="title  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
                <?php
                foreach($banner_title_arr as $key => $value){
                    if($key == 0){
                        echo '<span class="graphic-1"><img loading="lazy" src="'.site_url('assets/frontend/default-new/').'image/graphic-2.png" alt="" /></span> '.$value.'<br>';
                    }elseif($key == 1){
                      echo '<span class="color-1">'.$value.'</span> ';
                    }elseif($key == count($banner_title_arr) - 1){
                      echo '<span class="size-1">'.$value.'</span> ';
                    }else{
                        echo $value.' ';
                    }
                }
                ?>
            </h4>
            <p class="mb-5  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500""><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

            <div class="search-option  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"">
                <form action="<?php echo site_url('home/search'); ?>" method="get">
                    <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                    <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                </form>
            </div>
          </div>
          <div class="brand-4 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"">
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
      </div>
    </div>
  </div>
</section>
<!-- End Banner -->