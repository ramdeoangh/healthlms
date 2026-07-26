<?php include 'home_cooking2_assets.php'; ?>


<style>
.ellipsis-line-1 {
    display: -webkit-box !important;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal
}

.upcoming-course-six-content .content .title {
    padding-bottom: 5px;
}

.upcoming-course-six-content .info {
    color: #909090;
    padding-bottom: 20px;
}

</style>

<!-- Hero Area Start -->
<section class="lms-hero-section7 mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="max-w-1088px mx-auto mb-4">
                    <h1 class="title-typo2 text-dark-5 fw-bold fs-64px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-typo1 fs-16px fw-medium text-center max-w-698px mx-auto mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="d-flex align-items-center column-gap-4 row-gap-3 flex-wrap justify-content-center">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-orange-rounded lms7-hero-btn"><?php echo get_phrase('Browse Course') ?></a>
                        <a href="#top-course-slider" class="btn lms1-btn-outline-orange lms7-hero-btn"><?php echo get_phrase('Let’s talk') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner -->
    <div class="hero7-banner-outer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="lms-hero7-banner">
                        <!-- <img class="banner" loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" /> -->
                        <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero7-banner.webp" alt="">
                    </div>
                    <div class="lms-hero7-banner-shape">
                        <img class="shape" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero7-banner-shape.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->


<?php
    if (! isset($all_students)) {
        $all_students = $this->db->get_where('users', ['role_id !=' => 1]);
    }
    if (! isset($all_instructor)) {
        $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]);
    }
?>
<!-- Start Counter -->
<section class="pb-110">
    <div class="container">
        <div class="counter-6">
            <div class="item">
                <h4 class="title"><span class="counter"><?php echo nice_number($all_students->num_rows()); ?></span>+</h4>
                <p class="info"><?php echo get_phrase('Happy Student') ?></p>
            </div>
            <div class="item">
                <h4 class="title"><span class="counter"><?php echo nice_number($all_instructor->num_rows()); ?></span>+</h4>
                <p class="info"><?php echo get_phrase('Quality Educators') ?></p>
            </div>

            <?php
                $premium_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => null])->num_rows();
                $free_course    = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => 1])->num_rows();
            ?>
            <div class="item">
                <h4 class="title"><span class="counter"><?php echo nice_number($premium_course); ?></span>+</h4>
                <p class="info"><?php echo get_phrase('Premium Courses') ?></p>
            </div>
            <div class="item">
                <h4 class="title"><span class="counter"><?php echo nice_number($free_course); ?></span>+</h4>
                <p class="info"><?php echo get_phrase('Cost-free course') ?></p>
            </div>
        </div>
    </div>
</section>
<!-- End Counter -->



<!-- Category Area 3 Start -->
<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Categories') ?></h4>
                    <p class="info"><?php echo get_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide'); ?></p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="category-type3-card">
                    <span class="category-type3-icon">
                        <i class="<?php echo $category_details['font_awesome_class']; ?> fa-lg"></i>
                    </span>
                    <h6 class="category-type3-title"><?php echo $category_details['name']; ?></h6>
                    <p class="category-type3-subtitle"><?php echo $top_10_category['course_number'] . ' ' . site_phrase('Courses'); ?></p>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Category Area 3 End -->
<?php endif; ?>


<!--Courses Card Design 3 Start -->
<?php if (get_frontend_settings('latest_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Top Rated Courses') ?></h4>
                    <p class="info"><?php echo get_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide'); ?></p>
                </div>
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
	            <div class="col-md-6 col-lg-4 single-popup-course epopCourse position-relative"">
						                <a href="						                          <?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>"
	                class="lms3-course-card">
	                <div>
	                    <figure class="lms3-cCard-banner">
	                        <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="">
	                    </figure>
	                    <div class="lms3-cCard-body">

	                        <div class="cCard-students-wrap">
	                            <ul class="d-flex align-items-center">
	                                <li class="user-list-item2">
	                                    <img class="user" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
	                                </li>
	                            </ul>
	                            <p class="cCard-student-count"><span
	                                    class="cCard-course-by"><?php echo get_phrase('By ') ?></span><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></p>
	                        </div>

	                        <h4 class="lms3-cCard-title mt-3"><?php echo $top_course['title']; ?></h4>
	                        <div class="d-flex align-items-center row-gap-3 column-gap-4 flex-wrap mb-26px justify-content-between">
	                            <div class="d-flex align-items-center gap-2">
	                                <span class="svg-block">
	                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path
	                                            d="M14 10.5C14 10.9688 13.7812 11.3438 13.5 11.625V14.1562C13.7812 14.3438 14 14.6562 14 15C14 15.5625 13.5312 16 13 16H3C1.3125 16 0 14.6875 0 13V3C0 1.34375 1.3125 0 3 0H6V6C6 6.4375 6.46875 6.65625 6.78125 6.40625L8.5 5L10.1875 6.375C10.5 6.625 11 6.40625 11 6V0H12.5C13.3125 0 14 0.6875 14 1.5V10.5ZM12 14V12H3C2.4375 12 2 12.4688 2 13C2 13.5625 2.4375 14 3 14H12Z"
	                                            fill="#080808" fill-opacity="0.25" />
	                                    </svg>
	                                </span>
	                                <p class="course-meta-info1"><?php echo get_phrase('Lessons : '); ?><?php echo $lessons->num_rows(); ?></p>
	                            </div>
	                            <div class="d-flex align-items-center gap-2">
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
	                        <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
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
                            <span class="btn lms1-btn-orange"><?php echo get_phrase('Buy Now') ?></span>
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
                        style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
                            <i class="fas fa-minus me-2"></i>                                                              <?php echo get_phrase('Remove from cart'); ?>
                        </a>
                        <a id="add_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($top_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'] . '/top_course'); ?>'); ">
                            <i class="fas fa-plus me-2"></i>                                                             <?php echo get_phrase('Add to cart'); ?>
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
<?php endif?>
<!--Courses Card Design 3 End -->

<!-- Start Upcoming Course -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if ($upcoming_courses->num_rows() > 0): ?>
<section class="featured-course pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Upcoming Courses'); ?></h4>
                    <p class="info"><?php echo get_phrase('Unlock new expertise with industry experts and thought leaders in our upcoming courses.') ?></p>
                </div>
            </div>
        </div>
        <!-- Items -->
        <ul class="upcoming-course-list-six">
            <?php
                foreach ($upcoming_courses->result_array() as $upcoming_course):
                    $instructor_details = $this->user_model->get_all_user($upcoming_course['creator'])->row_array();
                    $course_duration    = $this->crud_model->get_total_duration_of_lesson_by_course_id($upcoming_course['id']);
                    $lessons            = $this->crud_model->get_lessons('course', $upcoming_course['id']);

                    $image_url = $upcoming_course['upcoming_image_thumbnail']
                        ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail']
                        : 'uploads/thumbnails/course_thumbnails/placeholder.png';
                ?>
	            <li>
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="upcoming-course-six">
	                    <div class="row align-items-center">
	                        <div class="col-md-6">
	                            <div class="upcoming-course-six-content">
	                                <div class="img"><img loading="lazy" src="<?php echo $image_url; ?>" alt=""></div>
	                                <div class="content">
	                                    <h4 class="title ellipsis-line-1"><?php echo $upcoming_course['title']; ?></h4>
	                                    <p class="info"><?php
                                                                if ($upcoming_course['publish_date']) {
                                                                    echo get_phrase('Release On') . ' : ' . date('j F Y', strtotime($upcoming_course['publish_date']));
                                                            }
                                                            ?></p>
	                                    <div class="user" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $instructor_details['id']) ?>')">
	                                        <div class="img">
	                                            <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
	                                        </div>
	                                        <h4 class="name">
	                                            <?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name'] ?>
	                                        </h4>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="upcoming-course-six-info">
	                                <div class="item">
	                                    <p class="subtitle"><?php echo get_phrase('Lesson') ?></p>
	                                    <p class="title"><?php echo $lessons->num_rows(); ?></p>
	                                </div>
	                                <div class="item">
	                                    <p class="subtitle"><?php echo get_phrase('Duration') ?></p>
	                                    <p class="title"><?php echo $course_duration; ?></p>
	                                </div>
	                                <div class="item">
	                                    <p class="subtitle"><?php echo get_phrase('Price'); ?></p>
	                                    <p class="title price d-flex align-items-center">
	                                        <?php if ($upcoming_course['is_free_course']): ?>
	                                        <?php echo get_phrase('Free'); ?>
	                                        <?php elseif ($upcoming_course['discount_flag']): ?>
                                        <?php echo currency($upcoming_course['discounted_price']); ?>
                                        <del class="ms-1 text-12px"><?php echo currency($upcoming_course['price']); ?></del>
                                        <?php else: ?>
                                        <?php echo currency($upcoming_course['price']); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<!-- End Upcoming Course -->


<!-- End latest Course -->
<?php if (get_frontend_settings('latest_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Featured Courses') ?></h4>
                    <p class="info"><?php echo get_phrase('These_are_the_most_latest_courses_among_Listen_Courses_learners_worldwide'); ?></p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

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
	            <div class="col-md-6 col-lg-4">
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" id="latest_course_<?php echo $latest_course['id']; ?>"
	                    class="lms3-course-card">
	                    <div>
	                        <figure class="lms3-cCard-banner">
	                            <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="">
	                        </figure>
	                        <div class="lms3-cCard-body">

	                            <div class="cCard-students-wrap">
	                                <ul class="d-flex align-items-center">
	                                    <li class="user-list-item2">
	                                        <img class="user" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
	                                    </li>
	                                </ul>
	                                <p class="cCard-student-count"><span
	                                        class="cCard-course-by"><?php echo get_phrase('By ') ?></span><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></p>
	                            </div>

	                            <h4 class="lms3-cCard-title mt-3"><?php echo $latest_course['title']; ?></h4>
	                            <div class="d-flex align-items-center row-gap-3 column-gap-4 flex-wrap mb-26px justify-content-between">
	                                <div class="d-flex align-items-center gap-2">
	                                    <span class="svg-block">
	                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M14 10.5C14 10.9688 13.7812 11.3438 13.5 11.625V14.1562C13.7812 14.3438 14 14.6562 14 15C14 15.5625 13.5312 16 13 16H3C1.3125 16 0 14.6875 0 13V3C0 1.34375 1.3125 0 3 0H6V6C6 6.4375 6.46875 6.65625 6.78125 6.40625L8.5 5L10.1875 6.375C10.5 6.625 11 6.40625 11 6V0H12.5C13.3125 0 14 0.6875 14 1.5V10.5ZM12 14V12H3C2.4375 12 2 12.4688 2 13C2 13.5625 2.4375 14 3 14H12Z"
	                                                fill="#080808" fill-opacity="0.25" />
	                                        </svg>
	                                    </span>
	                                    <p class="course-meta-info1"><?php echo get_phrase('Lessons : '); ?><?php echo $lessons->num_rows(); ?></p>
	                                </div>
	                                <div class="d-flex align-items-center gap-2">
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
	                            <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
	                                <div class="d-flex align-items-center gap-1 flex-wrap">
	                                    <?php if ($latest_course['is_free_course']): ?>
	                                    <h4 class="cCard-new-price"><?php echo get_phrase('Free'); ?></h4>
	                                    <?php elseif (! $latest_course['discount_flag']): ?>
                                    <h4 class="cCard-new-price"><?php echo currency($latest_course['price']); ?></h4>
                                    <?php else: ?>
                                    <h4 class="cCard-old-price"><?php echo currency($latest_course['price']); ?></h4>
                                    <h4 class="cCard-new-price"><?php echo currency($latest_course['discounted_price']); ?></h4>
                                    <?php endif; ?>
                                </div>
                                <span class="btn lms1-btn-orange"><?php echo get_phrase('Buy Now') ?></span>
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
                        style="display:                                                                                                                                                                                                                                                                                                                                                                       <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
                            <i class="fas fa-minus me-2"></i>                                                              <?php echo get_phrase('Remove from cart'); ?>
                        </a>
                        <a id="add_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($latest_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'] . '/latest_course'); ?>'); ">
                            <i class="fas fa-plus me-2"></i>                                                             <?php echo get_phrase('Add to cart'); ?>
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

        </div>
    </div>
</section>
<?php endif?>


<!-- Instructor Area 3 Start -->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
<section class="mb-100px">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Let’s Meet The Experts') ?></h4>
                    <p class="info"><?php echo get_phrase('They efficiently serve large number of students on our platform'); ?></p>
                </div>
            </div>
        </div>

        <div class="row gy-30px gx-30px">

            <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                $social_links   = json_decode($top_instructor['social_links'], true); ?>
	            <div class="col-sm-6 col-lg-4 col-xl-3">
	                <div class="lms3-instructor-wrap">
	                    <img class="lms3-instructor-image cursor-pointer" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt=""
	                        onclick="window.location.href='<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>'">
	                    <div class="lms3-instructor-content">
	                        <h4 class="lms3-instructor-name cursor-pointer"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
	                        <p class="lms3-instructor-rol"><?php echo $top_instructor['title']; ?></p>
	                        <ul class="lms3-instructor-socials">
	                            <?php if ($social_links['facebook']): ?>
	                            <li>
	                                <a href="<?php echo $social_links['facebook']; ?>" target="_blank" class="lms3-instructor-social-link">
	                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
	                                        <g clip-path="url(#clip0_285_1543)">
	                                            <path
	                                                d="M16.0991 8C16.0991 3.58172 12.5174 0 8.09912 0C3.68084 0 0.0991211 3.58172 0.0991211 8C0.0991211 11.993 3.02459 15.3027 6.84912 15.9028V10.3125H4.81787V8H6.84912V6.2375C6.84912 4.2325 8.0435 3.125 9.87084 3.125C10.7458 3.125 11.6616 3.28125 11.6616 3.28125V5.25H10.6529C9.65912 5.25 9.34912 5.86672 9.34912 6.5V8H11.5679L11.2132 10.3125H9.34912V15.9028C13.1737 15.3027 16.0991 11.993 16.0991 8Z"
	                                                fill="white" />
	                                        </g>
	                                        <defs>
	                                            <clipPath id="clip0_285_1543">
	                                                <rect width="16" height="16" fill="white" transform="translate(0.0991211)" />
	                                            </clipPath>
	                                        </defs>
	                                    </svg>
	                                </a>
	                            </li>
	                            <?php endif?>
                            <?php if ($social_links['twitter']): ?>
                            <li>
                                <a href="<?php echo $social_links['twitter']; ?>" target="_blank" class="lms3-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1545)">
                                            <path
                                                d="M9.58842 6.77491L15.4167 0H14.0356L8.97489 5.88256L4.93292 0H0.270996L6.38324 8.89547L0.270996 16H1.65219L6.99642 9.78782L11.265 16H15.927L9.58808 6.77491H9.58842ZM7.69668 8.97384L7.07739 8.08805L2.14985 1.03974H4.27129L8.24786 6.72795L8.86716 7.61374L14.0362 15.0075H11.9148L7.69668 8.97418V8.97384Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1545">
                                                <rect width="16" height="16" fill="white" transform="translate(0.0991211)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>

                            <?php if ($social_links['linkedin']): ?>
                            <li>
                                <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" class="lms3-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1551)">
                                            <path
                                                d="M15.6573 0H1.33957C0.653714 0 0.0991211 0.515625 0.0991211 1.15313V14.8438C0.0991211 15.4813 0.653714 16 1.33957 16H15.6573C16.3431 16 16.901 15.4813 16.901 14.8469V1.15313C16.901 0.515625 16.3431 0 15.6573 0ZM5.0839 13.6344H2.58987V5.99687H5.0839V13.6344ZM3.83688 4.95625C3.03617 4.95625 2.38969 4.34062 2.38969 3.58125C2.38969 2.82188 3.03617 2.20625 3.83688 2.20625C4.63431 2.20625 5.28079 2.82188 5.28079 3.58125C5.28079 4.3375 4.63431 4.95625 3.83688 4.95625ZM14.4168 13.6344H11.9261V9.92188C11.9261 9.0375 11.9097 7.89687 10.6298 7.89687C9.33359 7.89687 9.13669 8.8625 9.13669 9.85938V13.6344H6.64923V5.99687H9.03824V7.04063H9.07106C9.4025 6.44063 10.2163 5.80625 11.4273 5.80625C13.9508 5.80625 14.4168 7.3875 14.4168 9.44375V13.6344Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1551">
                                                <rect width="16.8019" height="16" fill="white" transform="translate(0.0991211)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php endif; ?>
<!-- Instructor Area 3 End -->




<!-- Start FAQs -->
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Frequently Asked Questions') ?></h4>
                    <p class="info"><?php echo get_phrase('Have something to know? Check here if you have any questions about us.'); ?></p>
                </div>
            </div>
        </div>

        <!-- Faqs -->
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion custom-accordion-two faq-6" id="accordionFaq">
                    <?php foreach ($website_faqs as $key => $faq): ?>
                    <?php if ($key > 4) {
                            break;
                        }
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                            <button
                                class="accordion-button                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php if ($key > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo 'collapsed';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>"
                                type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true"
                                aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                                <?php echo $faq['question']; ?>
                            </button>
                        </h2>
                        <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse<?php if ($key == 0) {
        echo 'show';
}
?>" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                            <div class="accordion-body">
                                <p><?php echo nl2br($faq['answer']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End FAQs -->


<!-- Blog Card 4 Area Start -->
<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>

<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px">
                    <h2 class="title-3 mb-26px fs-40px lh-52px fw-medium text-center text-lg-start"><?php echo get_phrase('Popular Post') ?></h2>
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
