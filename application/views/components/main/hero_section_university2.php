   <?php
       if (! isset($home_university2_assets)) {
           $home_university2_assets = APPPATH . 'views/frontend/default-new/home_university2_assets.php';
           include $home_university2_assets;

       }
   ?>
   <?php
       $total_instructors    = $this->db->where('is_instructor', 1)->get('users');
       $total_active_courses = $this->db->where('status', 'active')->get('course');
   ?>
   <!-- Hero Area Start -->
   <section class="lms-hero-section1">
       <div class="container">
           <div class="row mb-80px">
               <div class="col-md-12">
                   <div class="lms-hero-area1">
                       <div class="uv-hero1-content">
                           <h1 class="title-8 fs-60px text-white mb-2"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                           <p class="subtitle-8 fs-16px text-white mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                           <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-white-rounded">
                               <span class="builder-editable" builder-identity="1"><?php echo get_phrase('Buy Now') ?></span>
                               <span class="fi-rr-arrow-right"></span>
                           </a>
                       </div>
                       <div class="uv-hero1-images">
                           <div class="uv-hero1-banner">
                               <img class="builder-editable" builder-identity="2" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/unv-hero-banner1.webp" alt="">
                           </div>
                           <div class="uv-hero1-userWrap">
                               <ul class="d-flex align-items-center mb-2">
                                   <?php
                                       $this->db->where_in('role_id', 2);
                                       $query       = $this->db->get('users');
                                       $users       = $query->result_array();
                                       $total_count = count($users);
                                   ?>
                                   <?php foreach ($users as $user): ?>
                                   <li class="user-list-item">
                                       <img class="user" src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="">
                                   </li>
                                   <?php endforeach; ?>
                               </ul>
                               <p class="subtitle-8 fs-16px text-white fw-medium text-end"><?php echo $total_count; ?>+<?php echo get_phrase(' Students') ?></p>
                           </div>
                           <div class="uv-hero1-counter-outer">
                               <div class="uv-hero1-counter-main">
                                   <div class="uv-hero1-counter-single">
                                       <h4 class="uv-hero1-counter-title"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h4>
                                       <p class="uv-hero1-counter-subtitle builder-editable" builder-identity="3"><?php echo get_phrase('Skilled Instructors') ?></p>
                                   </div>
                                   <div class="uv-hero1-counter-single">
                                       <h4 class="uv-hero1-counter-title"><span class="counter"><?php echo $total_active_courses->num_rows(); ?></span>+</h4>
                                       <p class="uv-hero1-counter-subtitle builder-editable" builder-identity="4"><?php echo get_phrase('Online Courses') ?></p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Hero Area End -->
   <!-- Brand Area Start -->
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <!-- Swiper -->

                   <div class="swiper brandSlider brandSlider1-height">
                       <div class="swiper-wrapper gap-4">
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo builder-editable" builder-identity="5" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand1.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo builder-editable" builder-identity="6" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand2.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo builder-editable" builder-identity="7" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand3.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo builder-editable" builder-identity="8" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand4.png" alt="">
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </section>
   <!-- Brand Area End -->
