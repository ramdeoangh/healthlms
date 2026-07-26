<!-- Start Latest Courses -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <!-- Title -->
    <div class="title-one text-center pb-60">
      <p class="subtitle"><?php echo get_phrase('Courses') ?></p>
      <h4 class="title"><?php echo get_phrase('Latest Courses') ?></h4>
      <div class="bar"></div>
    </div>
    <!-- Items -->
    <div class="row g-3">
      <?php
      $latest_courses = $this->crud_model->get_latest_10_course();
      foreach ($latest_courses as $key => $latest_course) :
        if($key == 8) break;
        $number_of_enrolled_students = $this->crud_model->enrol_history($latest_course['id'], true)->num_rows();
        $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
        $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
        $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
        if ($number_of_ratings > 0) {
            $average_ceil_rating = ceil($total_rating / $number_of_ratings);
        } else {
            $average_ceil_rating = 0;
        }
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="course-item-one">
            <div class="img-rating">
              <div class="img"><img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" /></div>
              <div class="rating">
                <p class="no"><?php echo $average_ceil_rating; ?></p>
                <span><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star.svg" alt="" /></span>
              </div>
            </div>
            <div class="content">
              <h4 class="title"><?php echo $latest_course['title']; ?></h4>
              <div class="d-flex justify-content-between align-items-center">
                <div class="price d-flex align-items-center">
                  <?php if($latest_course['is_free_course']): ?>
                    <h5 class="text-dark text-20px fw-600"><?php echo get_phrase('Free'); ?></h5>
                  <?php elseif($latest_course['discount_flag']): ?>
                    <h5 class="text-dark text-20px fw-600"><?php echo currency($latest_course['discounted_price']); ?></h5>
                    <p class="mt-1 ms-1 text-muted"><del><?php echo currency($latest_course['price']); ?></del></p>
                  <?php else: ?>
                    <h5 class="text-dark text-20px fw-600"><?php echo currency($latest_course['price']); ?></h5>
                  <?php endif; ?>
                </div>
                <div class="view-play">
                  <div class="item">
                    <div class="icon" title="<?php echo get_phrase('Number of enrolled students'); ?>" data-bs-toggle="tooltip">
                      <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/eye.svg" alt="" />
                    </div>
                    <p class="info"><?php echo $number_of_enrolled_students; ?></p>
                  </div>
                  <div class="item">
                    <div class="icon" title="<?php echo get_phrase('Total lessons'); ?>" data-bs-toggle="tooltip">
                      <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/play.svg" alt="" />
                    </div>
                    <p class="info"><?php echo $lessons->num_rows(); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Featured Courses -->