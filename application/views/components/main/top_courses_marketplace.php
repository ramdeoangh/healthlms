   <?php
       if (! isset($home_marketplace_assets)) {
           $home_marketplace_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
           include $home_marketplace_assets;

       }
   ?>

   <?php if (get_frontend_settings('top_course_section') == 1): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <h1 class="title-4 fs-34px lh-44px fw-semibold mb-50px builder-editable" builder-identity="1"><?php echo get_phrase('Top Courses') ?></h1>
               </div>
           </div>
           <div class="row gy-30px gx-30px">

               <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                   foreach ($top_courses as $key => $top_course):
                       if ($key == 8) {
                           break;
                       }

                       $instructor_details          = $this->user_model->get_all_user($top_course['creator'])->row_array();
                       $course_duration             = $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']);
                       $number_of_enrolled_students = $this->crud_model->enrol_history($top_course['id'], true)->num_rows();
                       $lessons                     = $this->crud_model->get_lessons('course', $top_course['id']);
                       $total_rating                = $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                       $number_of_ratings           = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                       if ($number_of_ratings > 0) {
                           $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                       } else {
                           $average_ceil_rating = 0;
                       }
                   ?>
               <div class="col-md-6 col-lg-4 single-popup-course epopCourse position-relative">
                   <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>"
                       class="lms5-course-card">
                       <div>
                           <figure class="lms5-cCard-banner">
                               <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="">
                           </figure>
                           <div class="lms5-cCard-body">
                               <h4 class="lms5-cCard-title"><?php echo $top_course['title']; ?></h4>
                               <div class="course-meta-info-wrap mb-12px">
                                   <div class="meta-info5-wrap">
                                       <span class="svg-block">
                                           <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path
                                                   d="M14 10.5C14 10.9688 13.7812 11.3438 13.5 11.625V14.1562C13.7812 14.3438 14 14.6562 14 15C14 15.5625 13.5312 16 13 16H3C1.3125 16 0 14.6875 0 13V3C0 1.34375 1.3125 0 3 0H6V6C6 6.4375 6.46875 6.65625 6.78125 6.40625L8.5 5L10.1875 6.375C10.5 6.625 11 6.40625 11 6V0H12.5C13.3125 0 14 0.6875 14 1.5V10.5ZM12 14V12H3C2.4375 12 2 12.4688 2 13C2 13.5625 2.4375 14 3 14H12Z"
                                                   fill="#080808" fill-opacity="0.25" />
                                           </svg>
                                       </span>
                                       <p class="course-meta-info1"><?php echo get_phrase('Lessons : '); ?><?php echo $lessons->num_rows(); ?></p>
                                   </div>
                                   <div class="meta-info5-wrap">
                                       <span class="svg-block">
                                           <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path
                                                   d="M7 8C4.78125 8 3 6.21875 3 4C3 1.8125 4.78125 0 7 0C9.1875 0 11 1.8125 11 4C11 6.21875 9.1875 8 7 8ZM8.5625 9.5C11.5625 9.5 14 11.9375 14 14.9375C14 15.5312 13.5 16 12.9062 16H1.0625C0.46875 16 0 15.5312 0 14.9375C0 11.9375 2.40625 9.5 5.40625 9.5H8.5625Z"
                                                   fill="#080808" fill-opacity="0.25" />
                                           </svg>
                                       </span>
                                       <p class="course-meta-info1"><?php echo get_phrase('Students : '); ?><?php echo $number_of_enrolled_students; ?></p>
                                   </div>
                               </div>
                               <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
                                   <div class="d-flex align-items-center flex-wrap gap-1">
                                       <h6 class="cCard-course-by"><?php echo get_phrase('By') ?></h6>
                                       <h5 class="cCard-user-name2"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h5>
                                   </div>
                                   <div class="d-flex align-items-center gap-1 flex-wrap">
                                       <?php if ($top_course['is_free_course']): ?>
                                       <h4 class="cCard-new-price"><?php echo get_phrase('Free'); ?></h4>
                                       <?php elseif (! $top_course['discount_flag']): ?>
                                       <h4 class="cCard-new-price"><?php echo currency($top_course['price']); ?></h4>
                                       <?php else: ?>
                                       <h4 class="cCard-old-price"><?php echo currency($top_course['price']); ?></h4>
                                       <h4 class="cCard-new-price"><?php echo currency($top_course['discounted_price']); ?></h4>
                                       <?php endif; ?>
                                   </div>
                               </div>
                               <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                   <div class="d-flex align-items-center gap-1 flex-wrap">
                                       <span class="svg-block">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                               <path
                                                   d="M14.9313 11.934C14.8248 12.0371 14.7449 12.1645 14.6984 12.3053C14.652 12.4461 14.6404 12.5961 14.6646 12.7423L15.4063 16.8423C15.4368 17.0125 15.4177 17.1879 15.3512 17.3475C15.2847 17.5071 15.1736 17.6442 15.0313 17.7423C14.8916 17.8443 14.7259 17.9046 14.5534 17.9164C14.3809 17.9282 14.2085 17.891 14.0563 17.809L10.3646 15.884C10.2359 15.8162 10.0933 15.7791 9.94792 15.7757H9.72292C9.64409 15.7872 9.56792 15.8126 9.49792 15.8507L5.80626 17.784C5.62292 17.8757 5.41709 17.909 5.21459 17.8757C4.97749 17.8306 4.76733 17.6948 4.62882 17.4971C4.49031 17.2995 4.43438 17.0556 4.47292 16.8173L5.21459 12.7173C5.23887 12.5698 5.22732 12.4186 5.18091 12.2764C5.1345 12.1343 5.05459 12.0054 4.94792 11.9007L1.93959 8.98398C1.81625 8.86478 1.72954 8.71282 1.68968 8.54598C1.64982 8.37915 1.65846 8.2044 1.71459 8.04232C1.82709 7.71232 2.11209 7.47148 2.45626 7.41732L6.59792 6.81732C6.91292 6.78399 7.18959 6.59232 7.33126 6.30899L9.15626 2.56732C9.19876 2.48398 9.25459 2.40732 9.32292 2.34232L9.39792 2.28398C9.43652 2.24122 9.4815 2.20468 9.53126 2.17565L9.62292 2.14232L9.76459 2.08398H10.1146C10.4288 2.11732 10.7046 2.30398 10.8479 2.58398L12.6979 6.30899C12.8313 6.58149 13.0896 6.77065 13.3896 6.81732L17.5313 7.41732C17.8813 7.46732 18.1729 7.70898 18.2896 8.04232C18.3979 8.37648 18.3038 8.74315 18.0479 8.98398L14.9313 11.934Z"
                                                   fill="#F8BC24" />
                                           </svg>
                                       </span>
                                       <h5 class="cCard4-review">( <?php echo $average_ceil_rating; ?> <?php echo get_phrase('Reviews') ?>)</h5>
                                   </div>
                                   <span class="btn lms1-btn-dark-rounded"><?php echo get_phrase('Buy Now') ?></span>
                               </div>
                           </div>
                       </div>
                   </a>
                   <div id="top_course_feature_<?php echo $top_course['id']; ?>" class="course-popover-content">
                       <?php if ($top_course['last_modified'] == ""): ?>
                       <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['date_added']); ?></p>
                       <?php else: ?>
                       <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['last_modified']); ?></p>
                       <?php endif; ?>
                       <div class="course-title">
                           <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>"><?php echo $top_course['title']; ?></a>
                       </div>
                       <div class="course-meta">
                           <?php if ($top_course['course_type'] == 'general'): ?>
                           <span class=""><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path
                                       d="M7.97999 15.1666C4.03332 15.1666 0.813324 11.9533 0.813324 7.99998C0.813324 4.04665 4.03332 0.833313 7.97999 0.833313C11.9267 0.833313 15.1467 4.04665 15.1467 7.99998C15.1467 11.9533 11.9333 15.1666 7.97999 15.1666ZM7.97999 1.83331C4.57999 1.83331 1.81332 4.59998 1.81332 7.99998C1.81332 11.4 4.57999 14.1666 7.97999 14.1666C11.38 14.1666 14.1467 11.4 14.1467 7.99998C14.1467 4.59998 11.38 1.83331 7.97999 1.83331Z"
                                       fill="#AAAFB6" />
                                   <path
                                       d="M7.03999 11.3267C6.74666 11.3267 6.46666 11.2533 6.21999 11.1133C5.64666 10.78 5.32666 10.1267 5.32666 9.27333V7.04C5.32666 6.18666 5.63999 5.53333 6.21333 5.2C6.78666 4.86666 7.51333 4.92 8.25333 5.34666L10.1867 6.46C10.9267 6.88666 11.3333 7.48666 11.3333 8.15333C11.3333 8.81333 10.9267 9.42 10.1867 9.84666L8.25333 10.96C7.83999 11.2067 7.41999 11.3267 7.03999 11.3267ZM7.03999 5.98C6.91999 5.98 6.80666 6.00666 6.71999 6.06C6.46666 6.20666 6.32666 6.56 6.32666 7.04V9.27333C6.32666 9.74666 6.46666 10.1067 6.71999 10.2467C6.96666 10.3933 7.34666 10.3333 7.75999 10.1L9.69333 8.98666C10.1067 8.74666 10.34 8.44666 10.34 8.16C10.34 7.87333 10.1 7.57333 9.69333 7.33333L7.75999 6.22C7.49333 6.06 7.24666 5.98 7.03999 5.98Z"
                                       fill="#AAAFB6" />
                               </svg>

                               <?php echo $this->crud_model->get_lessons('course', $top_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
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
                           <?php elseif ($top_course['course_type'] == 'h5p'): ?>
                           <span class="badge bg-light"><?php echo site_phrase('h5p_course'); ?></span>
                           <?php elseif ($top_course['course_type'] == 'scorm'): ?>
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

                               <?php echo ucfirst($top_course['language']); ?></span>
                       </div>

                       <h6 class="text-white text-14px outCome"><?php echo get_phrase('Outcomes') ?>:</h6>
                       <ul class="will-learn">
                           <?php
                               $outcomes = json_decode($top_course['outcomes']);
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
                           style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
                           <?php echo site_phrase('View More') ?>
                       </button>

                       <div class="popover-btns">
                           <?php $cart_items = $this->session->userdata('cart_items'); ?>
                           <?php if (is_purchased($top_course['id'])): ?>
                           <a href="<?php echo site_url('home/lesson/' . slugify($top_course['title']) . '/' . $top_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i
                                   class="far fa-play-circle me-2"></i><?php echo get_phrase('Start Now'); ?></a>
                           <?php if ($top_course['is_free_course'] != 1): ?>
                           <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip"
                               onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $top_course['id'] . '?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                           <?php endif; ?>
                           <?php else: ?>
                           <?php if ($top_course['is_free_course'] == 1): ?>
                           <a class="purchase-btn green_purchase ms-auto"
                               href="<?php echo site_url('home/get_enrolled_to_free_course/' . $top_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                           <?php else: ?>

                           <!-- Cart button -->
                           <a id="added_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (! in_array($top_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'] . '/top_course'); ?>');">
                               <i class="fas fa-minus me-2"></i> <?php echo get_phrase('Remove from cart'); ?>
                           </a>
                           <a id="add_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($top_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'] . '/top_course'); ?>'); ">
                               <i class="fas fa-plus me-2"></i> <?php echo get_phrase('Add to cart'); ?>
                           </a>
                           <!-- Cart button ended-->
                           <?php endif; ?>
                           <?php endif; ?>
                       </div>
                       <script>
                       $(document).ready(function() {
                           $('#top_course_<?php echo $top_course['id']; ?>').webuiPopover({
                               url: '#top_course_feature_<?php echo $top_course['id']; ?>',
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
           </div>
       </div>
   </section>
   <?php endif; ?>
