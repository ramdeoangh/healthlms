<!-- Start latest Course -->
<section class="featured-course pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <!-- Title -->
        <div class="title-two text-center pb-50">
          <h4 class="title"><?php echo get_phrase('Latest Courses') ?></h4>
          <p class="info"><?php echo get_phrase('These_are_the_most_latest_courses_among_Listen_Courses_learners_worldwide'); ?></p>
        </div>
      </div>
    </div>
    <!-- Items -->
    <div class="row g-3">
      <?php $latest_courses = $this->crud_model->get_latest_10_course();
      foreach ($latest_courses as $key => $latest_course) :
        if($key == 8) break;
        $instructor_details = $this->user_model->get_all_user($latest_course['creator'])->row_array();
        $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
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
          <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="course-item-6 checkPropagation">
            <div class="img">
              <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" />
            </div>
            <div class="content">
              <h4 class="title"><?php echo $latest_course['title']; ?></h4>
              <div class="time-rate d-flex justify-content-between align-items-center">
                <div class="time d-flex align-items-center">
                  <div class="icon">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/clock-6.svg" alt="" />
                  </div>
                  <p class="info"><?php echo $course_duration; ?></p>
                </div>
                <div class="rate d-flex align-items-center">
                  <p class="info"><?php echo $average_ceil_rating; ?></p>
                  <div class="icon">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star.svg" alt="" />
                  </div>
                </div>
              </div>
              <div class="user-price d-flex justify-content-between align-items-center">
                <div class="user d-flex align-items-center checkPropagation" onclick="redirectTo('<?php echo site_url('home/instructor_page/'.$instructor_details['id']) ?>')">
                  <div class="img">
                    <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
                  </div>
                  <h4 class="name"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h4>
                </div>
                <p class="price d-flex align-items-center">
                  <?php if($latest_course['is_free_course']): ?>
                    <?php echo get_phrase('Free'); ?>
                  <?php elseif($latest_course['discount_flag']): ?>
                    <?php echo currency($latest_course['discounted_price']); ?>
                    <del class="ms-1 text-12px"><?php echo currency($latest_course['price']); ?></del>
                  <?php else: ?>
                    <?php echo currency($latest_course['price']); ?>
                  <?php endif; ?>
                </p>
              </div>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End latest Course -->