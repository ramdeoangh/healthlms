<!-- Start Our Services -->
<section class="pt-110 pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <!-- Title -->
    <div class="title-one text-center pb-60">
      <p class="subtitle text-uppercase"><?php echo get_phrase('Create intelligence') ?></p>
      <h4 class="title"><?php echo get_phrase('Learn with us') ?></h4>
      <div class="bar"></div>
    </div>
    <!-- Items -->
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="service-item-one">
          <div class="icon"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/video-editing.svg" alt="" /></div>
            <?php
              $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
              $number_of_courses = $status_wise_courses['active']->num_rows();
            ?>
            <h4 class="title"><?php echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h4>
            <p class="info"><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="service-item-one">
          <div class="icon"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/retouching.svg" alt="" /></div>
          <h4 class="title"><?php echo site_phrase('expert_instruction'); ?></h4>
          <p class="info"><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="service-item-one">
          <div class="icon"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/color.svg" alt="" /></div>
          <h4 class="title"><?php echo get_phrase('Smart solution') ?></h4>
          <p class="info"><?php echo site_phrase('learn_on_your_schedule'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Our Services -->