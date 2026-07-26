<!-- Start Latest Courses -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <!-- Title -->
    <div class="row justify-content-center">
      <div class="col-lg-6">
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
          <?php
            $rand_val = rand(1, 3);
            if($rand_val == 1){
              $card_style = '--content-bg: #fff3b5; --price-color: #ffb629; --user-bg: #fff9db; --fill-bg: #ffb629';
            }elseif($rand_val == 1){
              $card_style = '--content-bg: #b4c4fe; --price-color: #7291ff; --user-bg: #dde5ff; --fill-bg: #7291ff';
            }elseif($rand_val == 3){
              $card_style = '--content-bg: #b9ffa1; --price-color: #3ae941; --user-bg: #e0ffd5; --fill-bg: #3ae941';
            }else{
              $card_style = '';
            }
          ;?>
          <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="course-item-5" style="<?php echo $card_style; ?>">
            <div class="img">
              <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="" />
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
            <div class="content">
              <div class="user">
                <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
              </div>
              <h4 class="title ellipsis-line-2"><?php echo $latest_course['title']; ?></h4>
              <p class="info">
                <span>
                  <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 7.75C5 7.15 6.91667 2.33333 7.25 0C7.65 5.4 11.9167 7.41667 14 7.75C8.09248 8.14383 7.03202 12.6092 7.23935 14.8943C7.24302 14.9294 7.24657 14.9646 7.25 15C7.24615 14.9653 7.24259 14.9301 7.23935 14.8943C6.59889 8.78615 2.1543 7.58428 0 7.75Z" fill="#FF5BE6" />
                  </svg>
                </span>
                <?php echo get_phrase($latest_course['level']); ?>
              </p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End latest Courses -->