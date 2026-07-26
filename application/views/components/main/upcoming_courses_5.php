<!-- Start Upcoming courses -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if($upcoming_courses->num_rows() > 0): ?>
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="title-three title-graphic-five">
          <h4 class="title"><?php echo get_phrase('Upcoming Courses') ?></h4>
          <p class="info"><?php echo get_phrase('Discover a world of learning opportunities through our upcoming courses, where industry experts and thought leaders will guide you in acquiring new expertise, expanding your horizons, and reaching your full potential.') ?></p>
          <a href="<?php echo site_url('home/courses'); ?>" class="link">
            <?php echo get_phrase('All courses') ?>
            <i class="fa fa-arrow-right ms-2"></i>
          </a>
          <span><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/graphic-5-1.svg" alt="" /></span>
        </div>
      </div>
      <div class="col-lg-8">
        <ul class="upcoming-course-five">
          <?php
          foreach($upcoming_courses->result_array() as $upcoming_course):
            $image_url = $upcoming_course['upcoming_image_thumbnail'] 
            ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail'] 
            : 'uploads/thumbnails/course_thumbnails/placeholder.png';
          ?>
          <li>
            <!-- <div class="date"><span>12</span> April, 2023</div> -->
            <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="course">
              <div class="img"><img loading="lazy" width="100%" src="<?php echo $image_url; ?>" alt="" /></div>
              <div class="content">
                <h4 class="title ellipsis-line-1"><?php echo $upcoming_course['title']; ?></h4>
                <p class="info"><?php 
                if($upcoming_course['publish_date']){
                  echo get_phrase('Release On').' : '. date('j F Y', strtotime($upcoming_course['publish_date'])); 
                }
                ?></p>
                <p class="price d-flex align-items-center">
                  <?php if($upcoming_course['is_free_course']): ?>
                    <?php echo get_phrase('Free'); ?>
                  <?php elseif($upcoming_course['discount_flag']): ?>
                    <?php echo currency($upcoming_course['discounted_price']); ?>
                    <del class="ms-1 text-12px"><?php echo currency($upcoming_course['price']); ?></del>
                  <?php else: ?>
                    <?php echo currency($upcoming_course['price']); ?>
                  <?php endif; ?>
                </p>
              </div>
            </a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>">
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- End Upcoming courses -->