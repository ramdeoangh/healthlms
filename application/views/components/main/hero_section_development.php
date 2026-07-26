   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>

   <!-- Hero Area Start -->
   <section class="lms-hero-section8 mb-100px overflow-hidden">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="lms-hero-content8">
                       <div class="hero8-sm-title-wrap mb-3 mx-auto">
                           <span class="svg-block">
                               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                   <path
                                       d="M11.507 21.5H10.105C6.52 21.5 4.728 21.5 3.614 20.365C2.5 19.23 2.5 17.403 2.5 13.75C2.5 10.097 2.5 8.27 3.614 7.135C4.728 6 6.52 6 10.105 6H13.908C17.493 6 19.286 6 20.4 7.135C21.257 8.008 21.454 9.291 21.5 11.5V13"
                                       stroke="#002B6B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                   <path
                                       d="M19.5 18.5H16.5M16.5 21.5C15.7044 21.5 14.9413 21.1839 14.3787 20.6213C13.8161 20.0587 13.5 19.2956 13.5 18.5C13.5 17.7044 13.8161 16.9413 14.3787 16.3787C14.9413 15.8161 15.7044 15.5 16.5 15.5M19.5 21.5C20.2956 21.5 21.0587 21.1839 21.6213 20.6213C22.1839 20.0587 22.5 19.2956 22.5 18.5C22.5 17.7044 22.1839 16.9413 21.6213 16.3787C21.0587 15.8161 20.2956 15.5 19.5 15.5M16.5 6L16.4 5.69C15.905 4.15 15.658 3.38 15.069 2.94C14.479 2.5 13.697 2.5 12.131 2.5H11.868C10.303 2.5 9.52 2.5 8.931 2.94C8.341 3.38 8.094 4.15 7.599 5.69L7.5 6"
                                       stroke="#002B6B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                               </svg>
                           </span>
                           <p class="builder-editable" builder-identity="1"><?php echo get_phrase('Your #1 Platform for Tech & Programming Education') ?></p>
                       </div>
                       <!--<h1 class="title-typo4 fs-72px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>-->
                       <h1 class="title-typo2 text-dark-5 fw-bold fs-64px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                       <p class="subtitle-typo2 fs-16px text-center mb-32px max-w-436px mx-auto"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                       <div class="d-flex align-items-center column-gap-4 row-gap-3 flex-wrap justify-content-center">
                           <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-blue-rounded lms8-hero-btn builder-editable"
                               builder-identity="2"><?php echo get_phrase('Browse Course') ?></a>
                           <a href="#top-course-slider" class="btn lms1-btn-outline-blue lms8-hero-btn builder-editable" builder-identity="3"><?php echo get_phrase('Let’s talk') ?></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Banner Slider -->
       <!-- Swiper -->
       <div class="swiper curvedSlide">
           <span class="slide-top-curve"></span>
           <span class="slide-bottom-curve"></span>
           <div class="swiper-wrapper">
               <?php $latest_courses = $this->crud_model->get_latest_10_course();
               foreach ($latest_courses as $latest_course): ?>
               <div class="swiper-slide">
                   <div class="curved-slide-banner">
                       <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="brand-slide1">
                           <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>">
                       </a>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </section>
   <!-- Hero Area End -->
