<!-- Start Instructor -->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if(count($top_instructor_ids) > 0): ?>
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <!-- Title -->
        <div class="title-two text-center pb-50">
          <h4 class="title"><?php echo get_phrase('Popular Instructor') ?></h4>
          <p class="info"><?php echo get_phrase('Our popular instructor is a charismatic and knowledgeable individual who captivates students with engaging lessons, making learning a delightful and enriching experience.') ?></p>
        </div>
      </div>
    </div>
    <!-- Items -->
    <div class="row justify-content-center">
      <?php foreach($top_instructor_ids as $top_instructor_id):
        $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
        $social_links  = json_decode($top_instructor['social_links'], true); ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="instructor-item-5">
            <div class="img">
              <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt="" />
            </div>
            <a href="<?php echo site_url('home/instructor_page/'.$top_instructor['id']); ?>" class="content">
              <h4 class="title"><?php echo $top_instructor['first_name'].' '.$top_instructor['last_name']; ?></h4>
              <p class="subtitle ellipsis-line-2 px-4 text-center"><?php echo $top_instructor['title']; ?></p>
            </a>
            <ul class="social">
              <?php if($social_links['facebook']): ?>
                <li>
                  <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($social_links['twitter']): ?>
                <li>
                  <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                    <i class="fa-brands fa-twitter"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($social_links['linkedin']): ?>
                <li>
                  <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                    <i class="fa-brands fa-linkedin"></i>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- End Instructor -->