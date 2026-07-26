   <?php include 'home_university2_assets.php'?>

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
                               <span><?php echo get_phrase('Buy Now') ?></span>
                               <span>
                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                       <path
                                           d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
                                           fill="#121314" stroke="#121314"></path>
                                   </svg>
                               </span>
                           </a>
                       </div>
                       <div class="uv-hero1-images">
                           <div class="uv-hero1-banner">
                               <!-- <img class="banner" loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" /> -->
                               <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/unv-hero-banner1.webp" alt="">
                           </div>
                           <div class="uv-hero1-userWrap">
                               <ul class="d-flex align-items-center flex-wrap justify-content-end mb-2 uv-hero1-banner-to">
                                   <?php
                                       $this->db->where_in('role_id', 2);
                                       $query       = $this->db->get('users');
                                       $users       = $query->result_array();
                                       $total_count = count($users);
                                   ?>
                                   <?php foreach ($users as $user): ?>
                                   <li class="user-list-item ">
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
                                       <p class="uv-hero1-counter-subtitle"><?php echo get_phrase('Skilled Instructors') ?></p>
                                   </div>
                                   <div class="uv-hero1-counter-single">
                                       <h4 class="uv-hero1-counter-title"><span class="counter"><?php echo $total_active_courses->num_rows(); ?></span>+</h4>
                                       <p class="uv-hero1-counter-subtitle"><?php echo get_phrase('Online Courses') ?></p>
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
                       <div class="swiper-wrapper">
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand1.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand2.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand3.png" alt="">
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="brand-slide1">
                                   <img class="logo" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand4.png" alt="">
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </section>
   <!-- Brand Area End -->

   <!-- Category Area 1 Start -->
   <?php if (get_frontend_settings('top_category_section') == 1): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px">
                       <h2 class="title-1 fs-32px lh-36px fw-bold text-center text-lg-start"><?php echo get_phrase('Explore Categories') ?></h2>
                       <a href="<?php echo site_url('home/courses') ?>" class="lms2-link-secondary fw-semibold gap-1">
                           <span><?php echo get_phrase('View All') ?></span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                               <path
                                   d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
                                   fill="#616161" stroke="#616161" />
                           </svg>
                       </a>
                   </div>
               </div>
           </div>
           <div class="row gy-30px gx-30px row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 justify-content-center">

               <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
               <?php foreach ($top_10_categories as $top_10_category): ?>
               <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>

               <div class="col">
                   <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="lms-category-type1">
                       <figure class="category-type1-banner">
                           <img class="banner" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                           <span class="category-type1-icon">
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                   <path
                                       d="M16.6663 4.16707V12.5004C16.6663 12.9604 16.2938 13.3337 15.8329 13.3337C15.3721 13.3337 14.9996 12.9604 14.9996 12.5004V6.17879L5.58878 15.5896C5.42628 15.7521 5.21292 15.8337 4.99958 15.8337C4.78625 15.8337 4.57289 15.7521 4.41039 15.5896C4.08456 15.2638 4.08456 14.737 4.41039 14.4112L13.8212 5.00041H7.49958C7.03875 5.00041 6.66625 4.62707 6.66625 4.16707C6.66625 3.70707 7.03875 3.33374 7.49958 3.33374H15.8329C15.9413 3.33374 16.0497 3.35616 16.1513 3.39783C16.3555 3.48199 16.518 3.64451 16.6022 3.84867C16.6447 3.95034 16.6663 4.05874 16.6663 4.16707Z"
                                       fill="white" />
                               </svg>
                           </span>
                       </figure>
                       <h6 class="category-type1-title"><?php echo $category_details['name']; ?></h6>
                   </a>
               </div>
               <?php endforeach?>
           </div>
       </div>
   </section>
   <?php endif?>
   <!-- Category Area 1 End -->

   <!--Course Card Design 2 Start -->
   <?php if (get_frontend_settings('latest_course_section') == 1): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <h1 class="title-1 fs-32px lh-36px fw-bold text-start mb-30"><?php echo get_phrase('Our Online Courses') ?></h1>
               </div>
           </div>
           <div class="row gy-30px gx-30px justify-content-center">

               <?php $latest_courses = $this->crud_model->get_latest_10_course();
                   foreach ($latest_courses as $key => $latest_course):
                       if ($key == 8) {
                           break;
                       }

                       $instructor_details          = $this->user_model->get_all_user($latest_course['creator'])->row_array();
                       $course_duration             = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                       $number_of_enrolled_students = $this->crud_model->enrol_history($latest_course['id'], true)->num_rows();
                       $lessons                     = $this->crud_model->get_lessons('course', $latest_course['id']);
                       $total_rating                = $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                       $number_of_ratings           = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                       if ($number_of_ratings > 0) {
                           $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                       } else {
                           $average_ceil_rating = 0;
                       }
                   ?>
	               <div class="col-md-10 col-lg-6">
	                   <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"
	                       id="latest_course_<?php echo $latest_course['id']; ?>" class="lms2-course-card">
	                       <div class="lms2-cCard-inner">
	                           <figure class="lms2-cCard-banner">
	                               <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="">
	                           </figure>
	                           <div class="lms2-cCard-body">
	                               <h4 class="lms2-cCard-title"><?php echo $latest_course['title']; ?></h4>
	                               <div class="d-flex align-items-center row-gap-3 column-gap-30px flex-wrap mb-14px">
	                                   <div class="d-flex align-items-center gap-2">
	                                       <span class="svg-block">
	                                           <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                               <path
	                                                   d="M14 10.5C14 10.9688 13.7812 11.3438 13.5 11.625V14.1562C13.7812 14.3438 14 14.6562 14 15C14 15.5625 13.5312 16 13 16H3C1.3125 16 0 14.6875 0 13V3C0 1.34375 1.3125 0 3 0H6V6C6 6.4375 6.46875 6.65625 6.78125 6.40625L8.5 5L10.1875 6.375C10.5 6.625 11 6.40625 11 6V0H12.5C13.3125 0 14 0.6875 14 1.5V10.5ZM12 14V12H3C2.4375 12 2 12.4688 2 13C2 13.5625 2.4375 14 3 14H12Z"
	                                                   fill="#080808" fill-opacity="0.25" />
	                                           </svg>
	                                       </span>
	                                       <p class="course-meta-info2"><?php echo get_phrase('Lessons : '); ?><?php echo $lessons->num_rows(); ?></p>
	                                   </div>
	                                   <div class="d-flex align-items-center gap-2">
	                                       <span class="svg-block">
	                                           <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                               <path
	                                                   d="M7 8C4.78125 8 3 6.21875 3 4C3 1.8125 4.78125 0 7 0C9.1875 0 11 1.8125 11 4C11 6.21875 9.1875 8 7 8ZM8.5625 9.5C11.5625 9.5 14 11.9375 14 14.9375C14 15.5312 13.5 16 12.9062 16H1.0625C0.46875 16 0 15.5312 0 14.9375C0 11.9375 2.40625 9.5 5.40625 9.5H8.5625Z"
	                                                   fill="#080808" fill-opacity="0.25" />
	                                           </svg>
	                                       </span>
	                                       <p class="course-meta-info2"><?php echo get_phrase('Students : '); ?><?php echo $number_of_enrolled_students; ?></p>
	                                   </div>

	                               </div>
	                               <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
	                                   <div class="image-circle-24px">
	                                       <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
	                                   </div>
	                                   <h5 class="cCard-user-name1"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h5>
	                               </div>
	                               <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
	                                   <span class="btn lms2-btn-dark">
	                                       <?php if ($latest_course['is_free_course']): ?>
	                                       <?php echo get_phrase('Free'); ?>
	                                       <?php elseif ($latest_course['discount_flag']): ?>
                                       <?php echo currency($latest_course['discounted_price']); ?>
                                       <del class="ms-1 text-12px"><?php echo currency($latest_course['price']); ?></del>
                                       <?php else: ?>
                                       <?php echo currency($latest_course['price']); ?>
                                       <?php endif; ?>
                                   </span>
                                   <!-- just set data-rating 1 to 5 or " " -->
                                   <div class="course1-rating" data-rating="4">
                                       <?php if ($average_ceil_rating == 1): ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-1.png" alt="">
                                       <?php elseif ($average_ceil_rating == 2): ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-2.png" alt="">
                                       <?php elseif ($average_ceil_rating == 3): ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-3.png" alt="">
                                       <?php elseif ($average_ceil_rating == 4): ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-4.png" alt="">
                                       <?php elseif ($average_ceil_rating == 5): ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-5.png" alt="">
                                       <?php else: ?>
                                       <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/img/rating-0.png" alt="">
                                       <?php endif; ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </a>
                   <div id="latest_course_feature_<?php echo $latest_course['id']; ?>" class="course-popover-content">
                       <?php if ($latest_course['last_modified'] == ""): ?>
                       <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></p>
                       <?php else: ?>
                       <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></p>
                       <?php endif; ?>
                       <div class="course-title">
                           <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                       </div>
                       <div class="course-meta">
                           <?php if ($latest_course['course_type'] == 'general'): ?>
                           <span class="">
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M7.97999 15.1666C4.03332 15.1666 0.813324 11.9533 0.813324 7.99998C0.813324 4.04665 4.03332 0.833313 7.97999 0.833313C11.9267 0.833313 15.1467 4.04665 15.1467 7.99998C15.1467 11.9533 11.9333 15.1666 7.97999 15.1666ZM7.97999 1.83331C4.57999 1.83331 1.81332 4.59998 1.81332 7.99998C1.81332 11.4 4.57999 14.1666 7.97999 14.1666C11.38 14.1666 14.1467 11.4 14.1467 7.99998C14.1467 4.59998 11.38 1.83331 7.97999 1.83331Z"
                                       fill="#AAAFB6" />
                                   <path
                                       d="M7.03999 11.3267C6.74666 11.3267 6.46666 11.2533 6.21999 11.1133C5.64666 10.78 5.32666 10.1267 5.32666 9.27333V7.04C5.32666 6.18666 5.63999 5.53333 6.21333 5.2C6.78666 4.86666 7.51333 4.92 8.25333 5.34666L10.1867 6.46C10.9267 6.88666 11.3333 7.48666 11.3333 8.15333C11.3333 8.81333 10.9267 9.42 10.1867 9.84666L8.25333 10.96C7.83999 11.2067 7.41999 11.3267 7.03999 11.3267ZM7.03999 5.98C6.91999 5.98 6.80666 6.00666 6.71999 6.06C6.46666 6.20666 6.32666 6.56 6.32666 7.04V9.27333C6.32666 9.74666 6.46666 10.1067 6.71999 10.2467C6.96666 10.3933 7.34666 10.3333 7.75999 10.1L9.69333 8.98666C10.1067 8.74666 10.34 8.44666 10.34 8.16C10.34 7.87333 10.1 7.57333 9.69333 7.33333L7.75999 6.22C7.49333 6.06 7.24666 5.98 7.03999 5.98Z"
                                       fill="#AAAFB6" />
                               </svg>

                               <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                           </span>
                           <?php if ($course_duration): ?>
                           <span class="">
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M7.99998 15.1666C4.04665 15.1666 0.833313 11.9533 0.833313 7.99998C0.833313 4.04665 4.04665 0.833313 7.99998 0.833313C11.9533 0.833313 15.1666 4.04665 15.1666 7.99998C15.1666 11.9533 11.9533 15.1666 7.99998 15.1666ZM7.99998 1.83331C4.59998 1.83331 1.83331 4.59998 1.83331 7.99998C1.83331 11.4 4.59998 14.1666 7.99998 14.1666C11.4 14.1666 14.1666 11.4 14.1666 7.99998C14.1666 4.59998 11.4 1.83331 7.99998 1.83331Z"
                                       fill="#AAAFB6" />
                                   <path
                                       d="M10.4733 10.62C10.3867 10.62 10.3 10.6 10.22 10.5467L8.15334 9.31332C7.64001 9.00665 7.26001 8.33332 7.26001 7.73999V5.00665C7.26001 4.73332 7.48668 4.50665 7.76001 4.50665C8.03334 4.50665 8.26001 4.73332 8.26001 5.00665V7.73999C8.26001 7.97999 8.46001 8.33332 8.66668 8.45332L10.7333 9.68665C10.9733 9.82665 11.0467 10.1333 10.9067 10.3733C10.8067 10.5333 10.64 10.62 10.4733 10.62Z"
                                       fill="#AAAFB6" />
                               </svg>
                               <?php echo $course_duration; ?>
                           </span>
                           <?php endif; ?>
                           <?php elseif ($latest_course['course_type'] == 'h5p'): ?>
                           <span class="badge bg-light"><?php echo site_phrase('h5p_course'); ?></span>
                           <?php elseif ($latest_course['course_type'] == 'scorm'): ?>
                           <span class="badge bg-light"><?php echo site_phrase('scorm_course'); ?></span>
                           <?php endif; ?>
                           <span class="">
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M8.00001 15.1666C4.04668 15.1666 0.833344 11.9533 0.833344 7.99998C0.833344 4.04665 4.04668 0.833313 8.00001 0.833313C11.9533 0.833313 15.1667 4.04665 15.1667 7.99998C15.1667 11.9533 11.9533 15.1666 8.00001 15.1666ZM8.00001 1.83331C4.60001 1.83331 1.83334 4.59998 1.83334 7.99998C1.83334 11.4 4.60001 14.1666 8.00001 14.1666C11.4 14.1666 14.1667 11.4 14.1667 7.99998C14.1667 4.59998 11.4 1.83331 8.00001 1.83331Z"
                                       fill="#AAAFB6" />
                                   <path
                                       d="M5.99341 10.4133C4.66007 10.4133 3.58008 9.33333 3.58008 8C3.58008 6.66667 4.66007 5.58667 5.99341 5.58667C6.58008 5.58667 7.14008 5.80002 7.58675 6.18669C7.79342 6.36669 7.81342 6.68668 7.63342 6.89335C7.45342 7.10002 7.13342 7.11998 6.92676 6.93998C6.66676 6.71332 6.34008 6.58667 5.99341 6.58667C5.21341 6.58667 4.58008 7.22 4.58008 8C4.58008 8.78 5.21341 9.41333 5.99341 9.41333C6.33341 9.41333 6.66676 9.28668 6.92676 9.06002C7.13342 8.88002 7.44676 8.89998 7.63342 9.10665C7.81342 9.31332 7.79342 9.63331 7.58675 9.81331C7.14008 10.2 6.57341 10.4133 5.99341 10.4133Z"
                                       fill="#AAAFB6" />
                                   <path
                                       d="M10.6601 10.4133C9.32673 10.4133 8.24673 9.33333 8.24673 8C8.24673 6.66667 9.32673 5.58667 10.6601 5.58667C11.2467 5.58667 11.8067 5.80002 12.2534 6.18669C12.4601 6.36669 12.4801 6.68668 12.3001 6.89335C12.1201 7.10002 11.8001 7.11998 11.5934 6.93998C11.3334 6.71332 11.0067 6.58667 10.6601 6.58667C9.88006 6.58667 9.24673 7.22 9.24673 8C9.24673 8.78 9.88006 9.41333 10.6601 9.41333C11.0001 9.41333 11.3334 9.28668 11.5934 9.06002C11.8001 8.88002 12.1134 8.89998 12.3001 9.10665C12.4801 9.31332 12.4601 9.63331 12.2534 9.81331C11.8067 10.2 11.2401 10.4133 10.6601 10.4133Z"
                                       fill="#AAAFB6" />
                               </svg>
                               <?php echo ucfirst($latest_course['language']); ?></span>
                       </div>

                       <h6 class="text-white text-14px outCome"><?php echo get_phrase('Outcomes') ?>:</h6>
                       <ul class="will-learn">
                           <?php
                               $outcomes = json_decode($latest_course['outcomes']);
                               $count    = 0;
                               foreach ($outcomes as $outcome):
                                   $count++;
                               ?>
	                           <li class="outcome-item<?php echo($count > 3) ? 'hidden' : ''; ?>">
	                               <?php echo $outcome; ?>
	                           </li>
	                           <?php endforeach; ?>
                       </ul>

                       <button class="view-more-btn"
                           style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
                           <?php echo site_phrase('View More') ?>
                       </button>
                       <div class="popover-btns">
                           <?php $cart_items = $this->session->userdata('cart_items'); ?>
                           <?php if (is_purchased($latest_course['id'])): ?>
                           <a href="<?php echo site_url('home/lesson/' . slugify($latest_course['title']) . '/' . $latest_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i
                                   class="far fa-play-circle me-2"></i><?php echo get_phrase('Start Now'); ?></a>
                           <?php if ($latest_course['is_free_course'] != 1): ?>
                           <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip"
                               onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $latest_course['id'] . '?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                           <?php endif; ?>
                           <?php else: ?>
                           <?php if ($latest_course['is_free_course'] == 1): ?>
                           <a class="purchase-btn green_purchase ms-auto"
                               href="<?php echo site_url('home/get_enrolled_to_free_course/' . $latest_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                           <?php else: ?>

                           <!-- Cart button -->
                           <a id="added_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (! in_array($latest_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'] . '/latest_course'); ?>');">
                               <i class="fas fa-minus me-2"></i>                                                                 <?php echo get_phrase('Remove from cart'); ?>
                           </a>
                           <a id="add_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($latest_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'] . '/latest_course'); ?>'); ">
                               <i class="fas fa-plus me-2"></i>                                                                <?php echo get_phrase('Add to cart'); ?>
                           </a>
                           <!-- Cart button ended-->
                           <?php endif; ?>
                           <?php endif; ?>
                       </div>
                       <script>
                       $(document).ready(function() {
                           $('#latest_course_<?php echo $latest_course['id']; ?>').webuiPopover({
                               url: '#latest_course_feature_<?php echo $latest_course['id']; ?>',
                               trigger: 'hover',
                               animation: 'pop',
                               cache: false,
                               multi: true,
                               direction: 'rtl',
                               placement: 'horizontal',
                           });
                       });
                       </script>
                   </div>
               </div>
               <?php endforeach; ?>
               <div class="row mb-100px">
                   <div class="col-12">
                       <div class="d-flex align-items-center justify-content-center">
                           <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-dark"><?php echo get_phrase('See More') ?></a>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </section>
   <?php endif?>
   <!--Course Card Design 2 End -->


   <?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
   <?php if (count($motivational_speechs) > 0): ?>
   <!---------  Motivetional Speech Start ---------------->
   <section class="expert-instructor top-categories mb-50px pb-100 pt-0 ">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <h2 class="title-1 fs-32px lh-36px fw-bold text-center text-lg-start mb-40"><?php echo get_phrase('Our Events') ?></h2>
               </div>

           </div>
           <ul class="speech-items">
               <?php $counter = 0; ?>
               <?php foreach ($motivational_speechs as $key => $motivational_speech): ?>
               <?php $counter++; ?>

               <li class="e_border">
                   <div class="Espeech-item">
                       <div class="row  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="700">

                           <div class="col-md-1 col-2">
                               <div class="speech-item-content Nspeech">
                                   <p class="no no-2"><?php echo $counter; ?></p>
                               </div>
                           </div>
                           <div class="col-lg-8 col-md-6 col-12  order-2 order-md-1">
                               <div class="speech-item-content Nspeech2">
                                   <div class="inner">
                                       <h4 class="title">
                                           <?php echo $motivational_speech['title']; ?>
                                       </h4>
                                       <p class="info">
                                           <?php echo nl2br($motivational_speech['description']); ?>
                                       </p>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-5 col-10 order-1 order-md-1">
                               <div class="speech-item-img">
                                   <img loading="lazy" src="<?php echo site_url('uploads/system/motivations/' . $motivational_speech['image']) ?>" alt="">
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
               <?php endforeach; ?>
           </ul>
       </div>
   </section>
   <!---------  Motivetional Speech end ---------------->
   <?php endif; ?>


   <!-- Review Area 1 Start -->
   <?php if (get_frontend_settings('review_section') == 1): ?>

   <section class="mb-100px ">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="max-w-692px mx-auto">
                       <h2 class="title-1 fs-32px lh-36px fw-bold text-center lms1-text-dark mb-12px"><?php echo get_phrase('What Our ') ?> <span
                               class="lms1-text-purple-gradient"><?php echo get_phrase('Customers Say') ?></span></h2>
                       <p class="subtitle-typo1 fs-16px lms1-text-secondary text-center"><?php echo get_phrase('Having enjoyed a breathlessly successful 2015, there can be no DJ dynamic set of teaching tools built to be
                        deployed.') ?></p>
                   </div>
               </div>
           </div>
       </div>
       <div class="lms1-review-wrap">
           <div class="swiper lms1-reviewSlider">
               <div class="swiper-wrapper">

                   <?php
                       $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                       foreach ($reviews as $review):
                           $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                       ?>
	                   <div class="swiper-slide">
	                       <div class="lms1-review-slide">
	                           <div class="d-flex align-items-center gap-12px mb-4">
	                               <div class="image-circle-52px">
	                                   <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="user">
	                               </div>
	                               <div>
	                                   <h4 class="lms1-reviewer-name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h4>
	                               </div>
	                           </div>
	                           <p class="lms1-review-comment mb-3"><?php echo $review->review; ?></p>
	                           <ul class="d-flex align-items-center gap-1">
	                               <?php for ($i = 1; $i <= 5; $i++): ?>
	                               <?php if ($i <= $review->rating): ?>
	                               <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt=""></li>
	                               <?php else: ?>
                               <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt=""></li>
                               <?php endif; ?>
                               <?php endfor; ?>
                           </ul>
                       </div>
                   </div>
                   <?php endforeach; ?>

               </div>
               <div class="swiper-pagination"></div>
           </div>
       </div>
   </section>
   <?php endif?>
   <!-- Review Area 1 End -->

   <!-- Blog Card 3 Area Start -->
   <?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
   <!------------- Blog Section Start ------------>
   <?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
   <?php if ($latest_blogs->num_rows() > 0): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px">
                       <h2 class="title-1 mb-26px fs-32px lh-36px fw-bold text-center text-lg-start"><?php echo get_phrase('Popular Post') ?></h2>
                       <a href="<?php echo site_url('blogs') ?>" class="lms1-link-secondary fw-semibold gap-1">
                           <span><?php echo get_phrase('View All') ?></span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                               <path
                                   d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
                                   fill="#616161" stroke="#616161" />
                           </svg>
                       </a>
                   </div>
               </div>
           </div>
           <div class="row gy-30px gx-30px justify-content-center">


               <?php foreach ($latest_blogs->result_array() as $latest_blog):
                       $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                   $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>

	               <div class="col-md-10 col-lg-6">
	                   <div class="lms4-blog-card">
	                       <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms4-bCard-banner">
	                           <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                       if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                           $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                   endif; ?>
	                           <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">
	                       </a>
	                       <div class="lms4-bCard-body">
	                           <div class="d-flex align-items-center flex-wrap column-gap-3 row-gap-2 mb-10px">
	                               <a href="#" class="lms4-bCard-category"><?php echo get_phrase('Innovate') ?></a>
	                               <span class="bCard4-category-date-line"></span>
	                               <p class="lms4-bCard-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>
	                           </div>
	                           <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
	                               class="lms4-bCard-title mb-4"><?php echo $latest_blog['title']; ?></a>
	                           <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms1-link-secondary">
	                               <span><?php echo get_phrase('Read More') ?></span>
	                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
	                                   <path
	                                       d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
	                                       fill="#616161" stroke="#616161"></path>
	                               </svg>
	                           </a>
	                       </div>
	                   </div>
	               </div>
	               <?php endforeach; ?>
           </div>
       </div>
   </section>
   <?php endif; ?>
   <?php endif; ?>
   <!-- Blog Card 4 Area End -->


   <script>
// Review Slider 1
if ($('.lms1-reviewSlider').length > 0) {
    var reviewSlider1 = new Swiper(".lms1-reviewSlider", {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        keyboard: true,
        breakpoints: {
            576: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: "auto",
            },
        },
    });
}
   </script>

   <script>
$(document).ready(function() {

    var swiper7 = new Swiper('.lms-testimonial-2', {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 28,
        keyboard: true,
        autoplay: true,
        breakpoints: {
            451: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        },
    });

});
   </script>
