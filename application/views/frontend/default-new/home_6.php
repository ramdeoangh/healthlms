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
<!-- Start Banner -->
<section class="banner-six pt-60">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row align-items-center">
            <div class="col-lg-6">
                <div class="banner-six-content pb-30">
                    <p class="subtitle text-uppercase"><?php echo get_phrase('Welcome to') . ' ' . get_settings('system_name'); ?></p>
                    <?php
                        $banner_title     = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <h4 class="title  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
                        <?php
                            foreach ($banner_title_arr as $key => $value) {
                                if (0 == $key) {
                                    echo '<span class="color-1">' . $value . '</span>';
                                } else {
                                    echo $value . ' ';
                                }
                            }
                        ?>
                    </h4>
                    <p class="info  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

                    <?php if (get_settings('public_signup') == 'enable'): ?>
                    <a href="<?php echo site_url('sign_up'); ?>" class="btn-six  animate__animated  animate__fadeInUp " data-wow-duration="1000"
                        data-wow-delay="500"><?php echo get_phrase('Join for free'); ?></a>
                    <?php endif; ?>
                </div>
                <div class="brand-4  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
                    <div class="item">
                        <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                        <h1><?php echo nice_number($all_students->num_rows()); ?>+</h1>
                        <p><?php echo get_phrase('Happy Student') ?></p>
                    </div>
                    <div class="item">
                        <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
                        <h1><?php echo nice_number($all_instructor->num_rows()); ?>+</h1>
                        <p><?php echo get_phrase('Experienced Instructor') ?></p>
                    </div>
                    <div class="item">
                        <?php $status_wise_courses = $this->crud_model->get_status_wise_courses_front(); ?>
                        <h1><?php echo nice_number($status_wise_courses['active']->num_rows()); ?>+</h1>
                        <p><?php echo get_phrase('Quality courses') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-six-img  animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
                    <img loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner -->

<!-- Start Course -->
<section class="pb-110 pt-60 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="section-item-six">
            <div class="item">
                <div class="icon">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/kitchen-5.svg" alt="" />
                </div>
                <div class="content">
                    <h4 class="title"><?php echo get_phrase('Latest Top Skills') ?></h4>
                    <p class="info"><?php echo get_phrase('Stay ahead with our curated courses, mastering in-demand skills.') ?></p>
                </div>
            </div>
            <div class="item">
                <div class="icon">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/kitchen-7.svg" alt="" />
                </div>

                <div class="content">
                    <h4 class="title"><?php echo get_phrase('Globalization') ?></h4>
                    <p class="info"><?php echo get_phrase('Opportunity for global networking and collaboration with peers worldwide.') ?></p>
                </div>
            </div>
            <div class="item">
                <div class="icon">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/kitchen-6.svg" alt="" />
                </div>
                <div class="content">
                    <h4 class="title"><?php echo get_phrase('Cost-effectiveness') ?></h4>
                    <p class="info"><?php echo get_phrase('Cost-effective compared to traditional in-person education.') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Course -->


<?php if (get_frontend_settings('top_course_section') == 1): ?>
<!-- Start Top Rated Course -->
<section class="featured-course pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Top Courses') ?></h4>
                    <p class="info"><?php echo get_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide'); ?></p>
                </div>
            </div>
        </div>
        <!-- Items -->
        <div class="row g-3">
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
	            <div class="col-lg-3 col-md-4 col-sm-6">
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>"
	                    class="course-item-6 checkPropagation">
	                    <div class="img">
	                        <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="" />
	                    </div>
	                    <div class="content">
	                        <h4 class="title"><?php echo $top_course['title']; ?></h4>
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
	                            <div class="user d-flex align-items-center checkPropagation" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $instructor_details['id']) ?>')">
	                                <div class="img">
	                                    <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
	                                </div>
	                                <h4 class="name"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h4>
	                            </div>
	                            <p class="price d-flex align-items-center">
	                                <?php if ($top_course['is_free_course']): ?>
	                                <?php echo get_phrase('Free'); ?>
	                                <?php elseif ($top_course['discount_flag']): ?>
                                <?php echo currency($top_course['discounted_price']); ?>
                                <del class="ms-1 text-12px"><?php echo currency($top_course['price']); ?></del>
                                <?php else: ?>
                                <?php echo currency($top_course['price']); ?>
                                <?php endif; ?>
                            </p>
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
                        style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
<!-- End Top Rated Course -->
<?php endif; ?>


<?php if (get_frontend_settings('top_category_section') == 1): ?>
<!-- Start Categories -->
<section class="scategories-4 pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <!-- Title -->
        <div class="title-one text-center pb-60">
            <h4 class="title"><?php echo get_phrase('Popular Categories') ?></h4>
            <div class="bar"></div>
        </div>
        <!-- Items -->
        <div class="row justify-content-center">
            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a class="category-item" href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>">
                    <div class="icon text-center" style="color: #<?php echo rand(100000, 999999); ?>">
                        <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                    </div>
                    <h3 class="info">
                        <?php echo $category_details['name']; ?>
                        <p class="m-0 text-muted text-14px"><?php echo $top_10_category['course_number'] . ' ' . site_phrase('Courses'); ?></p>
                    </h3>

                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Categories -->
<?php endif; ?>

<?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
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
	                                <div class="img"><img loading="lazy" src="<?php echo $image_url; ?>" alt="" /></div>
	                                <div class="content">
	                                    <h4 class="title ellipsis-line-1"><?php echo $upcoming_course['title']; ?></h4>
	                                    <p class="info"><?php
                                                                if ($upcoming_course['publish_date']) {
                                                                    echo get_phrase('Release On') . ' : ' . date('j F Y', strtotime($upcoming_course['publish_date']));
                                                            }
                                                            ?></p>
	                                    <div class="user" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $instructor_details['id']) ?>')">
	                                        <div class="img">
	                                            <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
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
<?php endif; ?>


<?php if (get_frontend_settings('latest_course_section') == 1): ?>
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
	            <div class="col-lg-3 col-md-4 col-sm-6">
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" id="latest_course_<?php echo $latest_course['id']; ?>"
	                    class="course-item-6 checkPropagation">
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
	                            <div class="user d-flex align-items-center checkPropagation" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $instructor_details['id']) ?>')">
	                                <div class="img">
	                                    <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
	                                </div>
	                                <h4 class="name"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h4>
	                            </div>
	                            <p class="price d-flex align-items-center">
	                                <?php if ($latest_course['is_free_course']): ?>
	                                <?php echo get_phrase('Free'); ?>
	                                <?php elseif ($latest_course['discount_flag']): ?>
                                <?php echo currency($latest_course['discounted_price']); ?>
                                <del class="ms-1 text-12px"><?php echo currency($latest_course['price']); ?></del>
                                <?php else: ?>
                                <?php echo currency($latest_course['price']); ?>
                                <?php endif; ?>
                            </p>
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
                        style="display:                                                                                                                                                                                                                                                                                                                                <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
<!-- End latest Course -->
<?php endif; ?>


<!-- Start Counter -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="counter-6">
            <div class="item">
                <h4 class="title"><?php echo nice_number($all_students->num_rows()); ?><span>+</span></h4>
                <p class="info"><?php echo get_phrase('Happy Student') ?></p>
            </div>
            <div class="item">
                <h4 class="title"><?php echo nice_number($all_instructor->num_rows()); ?><span>+</span></h4>
                <p class="info"><?php echo get_phrase('Quality Educators') ?></p>
            </div>

            <?php
                $premium_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => null])->num_rows();
                $free_course    = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => 1])->num_rows();
            ?>
            <div class="item">
                <h4 class="title"><?php echo nice_number($premium_course); ?><span>+</span></h4>
                <p class="info"><?php echo get_phrase('Premium Courses') ?></p>
            </div>
            <div class="item">
                <h4 class="title"><?php echo nice_number($free_course); ?><span>+</span></h4>
                <p class="info"><?php echo get_phrase('Cost-free course') ?></p>
            </div>
        </div>
    </div>
</section>
<!-- End Counter -->

<?php if (get_frontend_settings('top_instructor_section') == 1): ?>
<!-- Start Instructor -->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
<section class="pb-110 eInstructor6 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Popular Instructor') ?></h4>
                    <p class="info">
                        <?php echo get_phrase('Our popular instructor is a charismatic and knowledgeable individual who captivates students with engaging lessons, making learning a delightful and enriching experience.') ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Items -->
        <div class="row">
            <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                $social_links   = json_decode($top_instructor['social_links'], true); ?>
	            <div class="col-lg-4 col-sm-6">
	                <div class="instructor-item-6">
	                    <div class="img cursor-pointer" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>')">
	                        <img loading="lazy" class="w-100" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt="" />
	                    </div>
	                    <div class="content">
	                        <a href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
	                            <h4 class="title">
	                                <?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?>
	                            </h4>
	                            <p class="subtitle ellipsis-line-2"><?php echo $top_instructor['title']; ?></p>
	                        </a>
	                        <ul class="social">
	                            <?php if ($social_links['facebook']): ?>
	                            <li>
	                                <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
	                                    <i class="fa-brands fa-facebook-f"></i>
	                                </a>
	                            </li>
	                            <?php endif; ?>
                            <?php if ($social_links['twitter']): ?>
                            <li>
                                <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if ($social_links['linkedin']): ?>
                            <li>
                                <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                            <?php endif; ?>
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
<?php endif; ?>


<?php if (get_frontend_settings('motivational_speech_section') == 1): ?>
<!---------  Motivetional Speech Start ---------------->
<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
<?php if (count($motivational_speechs) > 0): ?>
<section class="expert-instructor top-categories pb-110 mb-5 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center mt-4"><?php echo get_phrase('Think more clearly'); ?></h1>
                <p class="text-center mt-4 mb-4"><?php echo get_phrase('Gather your thoughts, and make your decisions clearly') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <ul class="speech-items">
            <?php foreach ($motivational_speechs as $key => $motivational_speech): ?>
            <li>
                <div class="speech-item">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5">
                            <div class="speech-item-img">
                                <img loading="lazy" src="<?php echo site_url('uploads/system/motivations/' . $motivational_speech['image']) ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="speech-item-content">
                                <p class="no"><?php echo ++$key; ?></p>
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
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<!---------  Motivetional Speech end ---------------->
<?php endif; ?>



<!-- Start Review Section -->
<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="expert-instructor top-categories pb-100 pt-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
                <h1 class="text-center f-36 mt-0 pt-0"><?php echo get_phrase('What the people Thinks About Us'); ?></h1>
                <p class="text-center mt-4 mb-30"><?php echo get_phrase('It highlights feedback and testimonials from users, reflecting their experiences and satisfaction.') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="course-group-slider  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
            <?php
                $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                foreach ($reviews as $review):
                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                ?>
	            <div class="elegant-testimonial-slide">
	                <div class="ele-testimonial-profile-area d-flex">
	                    <div class="profile">
	                        <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
	                    </div>
	                    <div class="ele-testimonial-profile-name">
	                        <h6 class="name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h6>
	                        <p class="time"><?php echo date('h:i A', $review->date_added); ?></p>
	                        <ul class="rating d-flex align-items-center">
	                            <?php
                                        for ($i = 1; $i <= 5; $i++):
                                            if ($i <= $review->rating):
                                        ?>
		                            <li><i class="fas fa-star"></i></li>
		                            <?php else: ?>
	                            <li class="thin"><i class="far fa-star"></i></li>
	                            <?php
                                    endif;
                                    endfor;
                                ?>
                        </ul>
                    </div>
                </div>
                <p class="review fw-400"><?php echo $review->review; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Review Section -->

<?php if (get_frontend_settings('faq_section') == 1): ?>
<!-- Start FAQs -->
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="pb-50">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="title-two">
                        <h4 class="title"><?php echo get_phrase('Frequently Asked Questions') ?></h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="title-two">
                        <p class="info"><?php echo get_phrase('Have something to know?') ?> <?php echo get_phrase('Check here if you have any questions about us.') ?></p>
                    </div>
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
                                class="accordion-button                                                                                                                                                                                                                                                                                                                                                                                                                  <?php if ($key > 0) {
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
<?php endif; ?>

<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<!-- Start Blog -->
<?php $latest_blogs = $this->crud_model->get_latest_blogs(4); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="pb-50 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title"><?php echo get_phrase('Follow The Latest News') ?></h4>
                    <p class="info"><?php echo site_phrase('Visit our valuable articles to get more information.') ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($latest_blogs->result_array() as $latest_blog):
                    $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
	            <div class="col-md-6">
	                <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="blog-item-6">
	                    <div class="img">
	                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                    if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                endif; ?>
	                        <img loading="lazy" src="<?php echo $blog_thumbnail; ?>" alt="" />
	                    </div>
	                    <div class="content">
	                        <div class="date">
	                            <div class="icon"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/calendar-6.svg" alt="" /></div>
	                            <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
	                        </div>
	                        <h4 class="title"><?php echo $latest_blog['title']; ?></h4>
	                        <p class="info ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
	                        <p class="link"><i class="fa-solid fa-long-arrow-right"></i></p>
	                    </div>
	                </a>
	            </div>
	            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Blog -->
<?php endif; ?>


<?php if (get_frontend_settings('promotional_section') == 1): ?>
<!------------- Become Students Section start --------->
<section class="student wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row">
            <div class="col-lg-6                                                                                                                                                                                                                                  <?php if (get_settings('allow_instructor') != 1) {
                                                                                                                                                                                                                                          echo 'w-100';
                                                                                                                                                                                                                                  }
                                                                                                                                                                                                                                  ?>">
                <div class="student-body-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                            <div class="student-body-text">

                                <h1><?php echo site_phrase('join_now_to_start_learning'); ?></h1>
                                <p><?php echo site_phrase('Learn from our quality instructors!') ?> </p>
                                <?php if (get_settings('public_signup') == 'enable'): ?>
                                <a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">

                        </div>
                    </div>
                </div>
            </div>
            <?php if (get_settings('allow_instructor') == 1): ?>
            <div class="col-lg-6 ">
                <div class="student-body-2">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 ">
                            <div class="student-body-text">
                                <h1><?php echo site_phrase('become_a_new_instructor'); ?></h1>
                                <p><?php echo site_phrase('Teach_thousands_of_students_and_earn_money!') ?> </p>
                                <?php if (get_settings('public_signup') == 'enable'): ?>
                                <?php if ($this->session->userdata('user_id')): ?>
                                <a href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                <?php else: ?>
                                <a href="<?php echo site_url('sign_up?instructor=yes'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!------------- Become Students Section End --------->
<?php endif; ?>
