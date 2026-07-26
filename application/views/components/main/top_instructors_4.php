<!---------  Expert Instructor Start ---------------->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if(count($top_instructor_ids) > 0): ?>
<section class="pb-110 eInstructor4 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-6">
        <!-- Title -->
        <div class="title-one pb-20">
          <p class="subtitle text-uppercase"><?php echo get_phrase('Instructors') ?></p>
          <h4 class="title"><?php echo get_phrase('Our Popular Instructor'); ?></h4>
          <div class="bar"></div>
        </div>
        <p class="fz_15_m_24 c-8e8e96 pb-30"><?php echo get_phrase('Our popular instructor is a charismatic and knowledgeable individual who captivates students with engaging lessons, making learning a delightful and enriching experience.') ?></p>
      </div>

      <?php foreach($top_instructor_ids as $top_instructor_id):
        $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
        $social_links  = json_decode($top_instructor['social_links'], true); ?>
        <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
          <div class="instructor-item">
            <div class="img"><img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt="" /></div>
            <div class="content">
              <a href="<?php echo site_url('home/instructor_page/'.$top_instructor['id']); ?>">
                <h4 class="title">
                  <?php echo $top_instructor['first_name'].' '.$top_instructor['last_name']; ?>
                </h4>
                <p class="info ellipsis-line-2"><?php echo $top_instructor['title']; ?></p>
              </a>
              <ul class="social-nav justify-content-center">
                <?php $socio_ext = false; ?>
                <?php if($social_links['facebook']): ?>
                  <?php $socio_ext = true; ?>
                  <li>
                    <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($social_links['twitter']): ?>
                  <?php $socio_ext = true; ?>
                  <li>
                    <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($social_links['linkedin']): ?>
                  <?php $socio_ext = true; ?>
                  <li>
                    <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                      <i class="fa-brands fa-linkedin"></i>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if(!$socio_ext) echo '<li class="invisible">Socio</>'; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- End Instructor -->