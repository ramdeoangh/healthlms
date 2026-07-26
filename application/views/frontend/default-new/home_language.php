<?php include 'home_language_assets.php'; ?>


<!-- Hero Area Start -->
<section class="lms-hero-section5">
    <div class="container">
        <div class="row mb-80px align-items-center gy-30px">
            <div class="col-lg-6 order-lg-2">
                <div class="lms-hero5-banner ms-auto me-auto me-lg-0">
                    <img class="banner" loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="" />
                    <!-- <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero5-bannar.png" alt="location"> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lms-hero-content5">
                    <h1 class="title-12 fs-68px mb-20px"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-10 fs-16px mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <div class="subscribe-input-wrap d-flex align-items-center flex-wrap flex-sm-nowrap gap-12px">
                            <input class="form-control subscribe-form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                            <button class="btn lms1-btn-orange-rounded text-nowrap" type="submit"><?php echo get_phrase('Get Started') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Brand Wrap -->
        <div class="row mb-100px">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between gap-30px flex-wrap">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <ul class="d-flex align-items-center">
                            <?php
                                $this->db->where_in('role_id', 2);
                                $query       = $this->db->get('users');
                                $users       = $query->result_array();
                                $total_count = count($users);
                            ?>
                            <?php foreach ($users as $user): ?>
                            <li class="user-list-item4">
                                <img class="user" src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="">
                            </li>
                            <?php endforeach?>
                        </ul>
                        <p class="subtitle-10 fs-16px text-dark-5 fw-normal"><?php echo get_phrase('Students') ?></p>
                    </div>
                    <ul class="brand-list-group2">
                        <li class="brand-list2-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand12.png" alt="">
                        </li>
                        <li class="brand-list2-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand13.png" alt="">
                        </li>
                        <li class="brand-list2-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand14.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->

<!-- Category Area 3 Start -->
<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="mb-32px max-w-565px mx-auto">
                    <h3 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><?php echo get_phrase('Categories') ?></h3>
                    <p class="subtits16 fs-16px lms1-text-secondary text-center">
                        <?php echo get_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="category-type3-card-language">
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

<!--Course Card Design 2 Start -->
<?php if (get_frontend_settings('latest_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><?php echo get_phrase('Language Courses') ?></h1>
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
                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" id="latest_course_<?php echo $latest_course['id']; ?>"
                    class="lms2-course-card">
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
                        style="display:                                                                                                                                                                                                                                                                                                                                                                                                              <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
                            <i class="fas fa-minus me-2"></i> <?php echo get_phrase('Remove from cart'); ?>
                        </a>
                        <a id="add_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($latest_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'] . '/latest_course'); ?>'); ">
                            <i class="fas fa-plus me-2"></i> <?php echo get_phrase('Add to cart'); ?>
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
            <div class="col-lg-12">
                <div class="d-flex justify-content-center mt-2">
                    <a href="<?php echo site_url('home/courses') ?>" class="btn btn-outline-primary-1"><?php echo get_phrase('View More') ?></a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php endif?>
<!--Course Card Design 2 End -->


<!-- About Us Area Start -->
<section>
    <div class="container">
        <div class="row g-20px mb-100px align-items-center">
            <div class="col-xl-5 col-lg-6 order-2 order-lg-1">
                <div>
                    <p class="text-bordered-1 mb-12px"><?php echo get_phrase('ABOUT US') ?></p>
                    <h1 class="title-1 fs-32px lh-38px fw-bold mb-20px"><?php echo get_phrase('Know About Academy LMS Learning Platform') ?></h1>
                    <p class="subtitle-16 fs-16px lh-24px mb-26px"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                    <div class="about-text-items mb-26px">
                        <div class="mb-20px">
                            <h3 class="title-1 fs-20px lh-28px fw-semibold mb-12px"><?php echo get_phrase('Flexible Classes') ?></h3>
                            <p class="subtitle-16 fs-16px lh-24px"><?php echo get_phrase('Awesome site. on the top advertising a business online includes assembling Having services.') ?></p>
                        </div>

                    </div>
                    <a href="<?php echo site_url('home/about_us') ?>" class="btn btn-primary-2"><?php echo get_phrase('Learn More') ?></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 order-1 order-lg-2">
                <div class="about-area-banner1">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/about-us-r-2.png" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area End -->



<?php
    $total_students       = $this->db->where('role_id', 2)->get('users');
    $total_active_courses = $this->db->where('status', 'active')->get('course');
?>
<!-- Form and Why choose Area Start -->
<section>
    <div class="container">
        <div class="row g-20px mb-100px align-items-center">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
                <div class="me-lg-3 signup-form-wrap">
                    <!-- Card -->
                    <div class="lms-1-card">
                        <div class="lms-1-card-body p-26px">
                            <h3 class="title-1 fs-32px lh-38px fw-bold mb-3"><?php echo get_phrase('Sign Up for Resources') ?></h3>
                            <p class="subtitle-16 fs-16px lh-24px"><?php echo get_phrase('Explore, learn, and grow with us. enjoy a seamless and enriching educational journey. lets begin!') ?>
                            </p>
                            <form action="<?php echo site_url('login/register') ?>" method="post" enctype="multipart/form-data" id="signup-form">
                                <div>
                                    <div class="mb-4">
                                        <label for="first_name" class="form-label form-label-2"><?php echo get_phrase('Name') ?></label>
                                        <input type="text" class="form-control form-control-2" id="first_name" name="first_name" placeholder="<?php echo get_phrase('Enter your name') ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="last_name" class="form-label form-label-2"><?php echo get_phrase('Last Name') ?></label>
                                        <input type="text" class="form-control form-control-2" id="last_name" name="last_name" placeholder="<?php echo get_phrase('Enter your last name') ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label form-label-2"><?php echo get_phrase('Email') ?></label>
                                        <input type="email" id="email" name="email" class="form-control form-control-2" placeholder="<?php echo get_phrase('Enter your email') ?>">
                                    </div>
                                    <div class="mb-26px">
                                        <label for="password" class="form-label form-label-2"><?php echo get_phrase('Password') ?></label>
                                        <input type="password" id="password" name="password" class="form-control form-control-2" placeholder="<?php echo get_phrase('Enter password') ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary-3 py-3 w-100"><?php echo get_phrase('Get it now') ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <p class="text-bordered-1 mb-12px"><?php echo get_phrase('WHY CHOOSE US') ?></p>
                    <h1 class="title-1 fs-32px lh-38px fw-bold mb-20px"><?php echo get_phrase('Resources Learning English for Beginner') ?></h1>
                    <p class="subtitle-16 fs-16px lh-24px mb-30px"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                    <div class="d-flex gap-20px flex-wrap flex-sm-nowrap">
                        <div class="bgcolor-card-1" style="--bgcolor:linear-gradient(160deg, #ffeff8 10.78%, #f6f0f4 91.29%);">
                            <h2 class="title-1 fs-44px lh-60px fw-semibold mb-1"><?php echo $total_students->num_rows(); ?>+</h2>
                            <p class="title-1 fs-16px lh-24px fw-normal"><?php echo get_phrase('User already register and signing up for using it') ?></p>
                        </div>
                        <div class="bgcolor-card-1" style="--bgcolor:linear-gradient(164deg, #e8f7fc 0%, #f1f9fc 100%);">
                            <h2 class="title-1 fs-44px lh-60px fw-semibold mb-1"><?php echo $total_active_courses->num_rows(); ?>+</h2>
                            <p class="title-1 fs-16px lh-24px fw-normal"><?php echo get_phrase('Total courses.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form and Why choose Area End -->

<!-- Instructor Area 1 Start -->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-32px max-w-565px mx-auto">
                    <h3 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><?php echo get_phrase('Let’s Meet ') ?> <span
                            class="lms1-text-purple-gradient"><?php echo get_phrase('The Experts') ?></span></h3>
                    <p class="subtits16 fs-16px lms1-text-secondary text-center">
                        <?php echo get_phrase('Our popular instructor is a charismatic and knowledgeable individual who captivates students with engaging lessons, making learning a delightful and enriching experience.') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">
            <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links   = json_decode($top_instructor['social_links'], true);

                ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 lms1-instructor-col">
                <div class="lms1-instructor-wrap">
                    <div class="lms1-instructor-image">
                        <img class="cursor-pointer" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt=""
                            onclick="window.location.href='<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>'">
                    </div>
                    <div class="lms1-instructor-content">
                        <h4 class="lms1-instructor-name"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                        <p class="lms1-instructor-rol"><?php echo $top_instructor['title']; ?></p>
                        <ul class="lms1-instructor-socials">
                            <?php if (! empty($social_links['facebook'])): ?>
                            <li>
                                <a href="<?php echo $social_links['facebook']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1440)">
                                            <path
                                                d="M16.5991 8C16.5991 3.58172 13.0174 0 8.59912 0C4.18084 0 0.599121 3.58172 0.599121 8C0.599121 11.993 3.52459 15.3027 7.34912 15.9028V10.3125H5.31787V8H7.34912V6.2375C7.34912 4.2325 8.5435 3.125 10.3708 3.125C11.2458 3.125 12.1616 3.28125 12.1616 3.28125V5.25H11.1529C10.1591 5.25 9.84912 5.86672 9.84912 6.5V8H12.0679L11.7132 10.3125H9.84912V15.9028C13.6737 15.3027 16.5991 11.993 16.5991 8Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1440">
                                                <rect width="16" height="16" fill="white" transform="translate(0.599121)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>

                            <?php if (! empty($social_links['twitter'])): ?>
                            <li>
                                <a href="<?php echo $social_links['twitter']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1442)">
                                            <path
                                                d="M10.0884 6.77491L15.9167 0H14.5356L9.47489 5.88256L5.43292 0H0.770996L6.88324 8.89547L0.770996 16H2.15219L7.49642 9.78782L11.765 16H16.427L10.0881 6.77491H10.0884ZM8.19668 8.97384L7.57739 8.08805L2.64985 1.03974H4.77129L8.74786 6.72795L9.36716 7.61374L14.5362 15.0075H12.4148L8.19668 8.97418V8.97384Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1442">
                                                <rect width="16" height="16" fill="white" transform="translate(0.599121)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>


                            <?php if (! empty($social_links['linkedin'])): ?>
                            <li>
                                <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                        <g clip-path="url(#clip0_285_1448)">
                                            <path
                                                d="M16.1573 0H1.83957C1.15371 0 0.599121 0.515625 0.599121 1.15313V14.8438C0.599121 15.4813 1.15371 16 1.83957 16H16.1573C16.8431 16 17.401 15.4813 17.401 14.8469V1.15313C17.401 0.515625 16.8431 0 16.1573 0ZM5.5839 13.6344H3.08987V5.99687H5.5839V13.6344ZM4.33688 4.95625C3.53617 4.95625 2.88969 4.34062 2.88969 3.58125C2.88969 2.82188 3.53617 2.20625 4.33688 2.20625C5.13431 2.20625 5.78079 2.82188 5.78079 3.58125C5.78079 4.3375 5.13431 4.95625 4.33688 4.95625ZM14.9168 13.6344H12.4261V9.92188C12.4261 9.0375 12.4097 7.89687 11.1298 7.89687C9.83359 7.89687 9.63669 8.8625 9.63669 9.85938V13.6344H7.14923V5.99687H9.53824V7.04063H9.57106C9.9025 6.44063 10.7163 5.80625 11.9273 5.80625C14.4508 5.80625 14.9168 7.3875 14.9168 9.44375V13.6344Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1448">
                                                <rect width="16.8019" height="16" fill="white" transform="translate(0.599121)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
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
<!-- Instructor Area 1 End -->


<!-- Review Area 3 Start -->
<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-32px max-w-565px mx-auto">
                    <h3 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><?php echo get_phrase('What Our ') ?> <span
                            class="lms1-text-purple-gradient"><?php echo get_phrase('Customers Say') ?></span></h3>
                    <p class="subtits16 fs-16px lms1-text-secondary text-center">
                        <?php echo get_phrase('Lorem Ipsum has been the industry standard dummy text ever since the unknown printer took a galley of type and scrambled') ?>
                    </p>
                </div>
            </div>
            <div clxts="col-12">
                <div class="lms2-reviewSlider-main">
                    <div class="lms3-reviewSlider-content mb-12px">

                        <!-- No 1 -->
                        <?php
                            $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                            foreach ($reviews as $review):
                                $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                            ?>
                        <div class="lms3-review-content-slide">
                            <div class="lms3-review-stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $review->rating): ?>
                                <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt="">
                                <?php else: ?>
                                <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt="">
                                <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <p class="lms3-review-comment mb-4"><?php echo $review->review; ?></p>
                            <div>
                                <h4 class="lms3-reviewer-name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>


                    </div>
                    <div class="reviewSlider3-author-wrap">
                        <div class="lms3-reviewSlider-author">
                            <!-- No 1 -->
                            <?php
                                $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                                foreach ($reviews as $review):
                                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                ?>
                            <div class="lms3-review-profile-slide">
                                <div class="lms3-review-profile">
                                    <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif?>
<!-- Review Area 3 End -->

<!-- Blog Card 2 Area Start -->
<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><?php echo get_phrase('Blogs') ?></h2>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php foreach ($latest_blogs->result_array() as $latest_blog):
                    $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>

            <div class="col-md-6 col-lg-4">
                <div class="lms2-blog-card">
                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms2-bCard-banner">
                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                        if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                            $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif; ?>
                        <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">
                    </a>
                    <div class="lms2-bCard-body">
                        <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
                            class="lms2-bCard-title mb-2"><?php echo $latest_blog['title']; ?></a>
                        <p class="lms2-bCard-short-des"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
                        <div class="d-flex align-items-center gap-10px">
                            <div class="image-circle-40px">
                                <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" alt="">
                            </div>
                            <div>
                                <h5 class="bCard2-author-name"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></h5>
                                <p class="bCard2-post-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<!-- Blog Card 2 Area End -->

<script>
function onSignupSubmit(token) {
    document.getElementById("signup-form").submit();
}
</script>

<script>
$(document).ready(function() {
    // Review 3
    if ($('.lms3-reviewSlider-content').length > 0) {
        $(".lms3-reviewSlider-content").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.lms3-reviewSlider-author',
            autoplay: false,
            loop: true,
            fade: false,
            margin: 20,
        });
        $(".lms3-reviewSlider-author").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.lms3-reviewSlider-content',
            dots: false,
            arrows: false,
            variableWidth: true,
            autoplay: false,
            loop: true,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true,
            autoplaySpeed: 3000,
            speed: 700,
        });
    }

});
</script>
