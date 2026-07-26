<?php include 'home_elegant_assets.php'; ?>


<!-- Corporate Training Hero Area Start -->
<section class="lms-hero-section2 mb-100px">
    <div class="container">
        <div class="row align-items-center gy-30px mb-80px">
            <div class="col-lg-6">
                <div class="lms-hero-content2">
                    <h1 class="title-9 fs-52px mb-12px"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-9 fs-16px mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-purple mb-32px"><?php echo get_phrase('Browse Courses'); ?></a>

                    <?php
                        $total_number_of_ratings = $this->db->get('rating')->num_rows();
                        $summation_of_ratings    = $this->db->select_sum('rating')->get('rating')->row()->rating;
                        $latest_5_ratings        = $this->db->order_by('id', 'desc')->get('rating', 5)->result_array();
                        // $average_ceil_rating     = ceil($summation_of_ratings / $total_number_of_ratings);
                        if ($total_number_of_ratings > 0) {
                            $average_ceil_rating = ceil($summation_of_ratings / $total_number_of_ratings);
                        } else {
                            $average_ceil_rating = 0;
                        }
                        if ($average_ceil_rating < 1) {
                            $average_ceil_rating = 1;
                        }
                        if ($average_ceil_rating > 5) {
                            $average_ceil_rating = 5;
                        }
                    ?>

                    <div class="d-flex align-items-center gap-12px flex-wrap">

                        <ul class="d-flex align-items-center">
                            <?php foreach ($latest_5_ratings as $rating): ?>
                            <?php
                                $ratingUser = $this->user_model->get_all_user($rating['user_id'])->row_array();
                            ?>
                            <li class="user-list-item2">
                                <img class="user" src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo $ratingUser['first_name'] . ' ' . $ratingUser['last_name']; ?>" alt="">
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div>
                            <div class="mb-2px d-flex align-items-center gap-1">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $average_ceil_rating): ?>
                                <span class="svg-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M8 0L10.3041 4.82865L15.6085 5.52786L11.7281 9.21135L12.7023 14.4721L8 11.92L3.29772 14.4721L4.27186 9.21135L0.391548 5.52786L5.69588 4.82865L8 0Z"
                                            fill="#F9B966" />
                                    </svg>
                                </span>
                                <?php else: ?>
                                <span class="svg-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                        <path d="M8 0L10.3041 4.82865L15.6085 5.52786L11.7281 9.21135L12.7023 14.4721L8 11.92L3.29772 14.4721L4.27186 9.21135L0.391548 5.52786L5.69588 4.82865L8 0Z"
                                            fill="#E0E0E0" />
                                    </svg>
                                </span>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <p class="subtitle-9 fs-12px"><?php echo get_phrase('Based on') . ' ' . $total_number_of_ratings . ' ' . get_phrase('reviews'); ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center justify-content-lg-end gap-32px flex-column flex-sm-row align-items-center align-items-sm-start">
                    <div>
                        <div class="lms-hero2-banner mb-32px">

                            <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-banner1.png" alt="">

                        </div>
                        <div class="hero2-iconbox1-rounded">
                            <div class="rounded-iconBox">
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.3828 16V22.0667C20.3828 22.3981 20.1142 22.6667 19.7828 22.6667H4.98281C4.65144 22.6667 4.38281 22.3981 4.38281 22.0667V9.93337C4.38281 9.602 4.65144 9.33337 4.98281 9.33337H19.7828C20.1142 9.33337 20.3828 9.602 20.3828 9.93337V16ZM20.3828 16L27.3987 10.1535C27.7895 9.8278 28.3828 10.1057 28.3828 10.6144V21.3857C28.3828 21.8944 27.7895 22.1723 27.3987 21.8466L20.3828 16Z"
                                        stroke="#09501E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h6 class="hero2-iconbox-category"><?php echo get_phrase('VIDEO'); ?></h6>
                                <h5 class="hero2-iconbox-title"><?php echo get_phrase('LESSONS'); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="hero2-banner-area2">
                        <div class="hero2-iconbox1-rounded mb-4">
                            <div class="rounded-iconBox" style="background: #99CAFB;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                    <path d="M3.04932 26.6667V23C3.04932 19.134 6.18332 16 10.0493 16H12.3826" stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M21.5706 16.2903C22.364 15.4192 23.7347 15.4192 24.528 16.2903L24.6941 16.4726C25.095 16.9129 25.6713 17.1516 26.2661 17.1238L26.5125 17.1123C27.6894 17.0573 28.6587 18.0265 28.6036 19.2035L28.5921 19.4498C28.5643 20.0447 28.803 20.6209 29.2433 21.0219L29.4256 21.1879C30.2968 21.9813 30.2968 23.352 29.4256 24.1453L29.2433 24.3114C28.803 24.7123 28.5643 25.2886 28.5921 25.8834L28.6036 26.1298C28.6587 27.3067 27.6894 28.276 26.5125 28.221L26.2661 28.2094C25.6713 28.1816 25.095 28.4203 24.6941 28.8606L24.528 29.0429C23.7347 29.9141 22.364 29.9141 21.5706 29.0429L21.4046 28.8606C21.0036 28.4203 20.4273 28.1816 19.8325 28.2094L19.5862 28.221C18.4092 28.276 17.44 27.3067 17.495 26.1298L17.5065 25.8834C17.5343 25.2886 17.2956 24.7123 16.8553 24.3114L16.673 24.1453C15.8019 23.352 15.8019 21.9813 16.673 21.1879L16.8553 21.0219C17.2956 20.6209 17.5343 20.0447 17.5065 19.4498L17.495 19.2035C17.44 18.0265 18.4092 17.0573 19.5862 17.1123L19.8325 17.1238C20.4273 17.1516 21.0036 16.9129 21.4046 16.4726L21.5706 16.2903Z"
                                        stroke="#003162" stroke-width="2" />
                                    <path d="M20.8672 22.6666L22.3217 24.1212L25.2308 21.2121" stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M12.3827 16C15.3282 16 17.716 13.6122 17.716 10.6667C17.716 7.72119 15.3282 5.33337 12.3827 5.33337C9.43713 5.33337 7.04932 7.72119 7.04932 10.6667C7.04932 13.6122 9.43713 16 12.3827 16Z"
                                        stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h6 class="hero2-iconbox-category"><?php echo get_phrase('BEST'); ?></h6>
                                <h5 class="hero2-iconbox-title"><?php echo get_phrase('MENTORS'); ?></h5>
                            </div>
                        </div>
                        <div class="lms-hero2-banner">

                            <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-banner2.png" alt="">
                        </div>
                        <!-- Shape -->
                        <div class="hero2-banner-shape1">
                            <img class="shape" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-shape1.png" alt="">
                        </div>
                        <div class="hero2-banner-shape2">
                            <img class="shape" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-shape2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-100px">
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
<!-- Corporate Training Hero Area End -->

<!-- Category Area 1 Start -->
<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Popular Categories'); ?></h1>
                    <p class="info"><?php echo get_phrase('The most popular categories of our courses'); ?></p>
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



<!--Courses Card Design 1 Start -->
<?php if (get_frontend_settings('top_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row wow animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="300">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Top Courses'); ?></h1>
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
            <div class="col-md-6 col-lg-4 single-popup-course epopCourse position-relative">
                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>"
                    class="lms1-course-card">
                    <div>
                        <figure class="lms1-cCard-banner">
                            <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="">
                        </figure>
                        <div class="lms1-cCard-body">
                            <h4 class="lms1-cCard-title"><?php echo $top_course['title']; ?></h4>
                            <div class="d-flex align-items-center row-gap-3 column-gap-30px flex-wrap mb-26px">
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
                                <span class="btn lms1-btn-dark">
                                    <?php if ($top_course['is_free_course']): ?>
                                    <?php echo get_phrase('Free'); ?>
                                    <?php elseif ($top_course['discount_flag']): ?>
                                    <?php echo currency($top_course['discounted_price']); ?>
                                    <del class="ms-1 text-12px"><?php echo currency($top_course['price']); ?></del>
                                    <?php else: ?>
                                    <?php echo currency($top_course['price']); ?>
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
                        style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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
<!--Courses Card Design 1 End -->

<!-- Why Choose Area Start -->
<?php
    $total_students    = $this->db->where('role_id', 2)->get('users');
    $total_instructors = $this->db->where('is_instructor', 1)->get('users');
    $free_courses      = $this->db->where('is_free_course', 1)->get('course');
    $premium_courses   = $this->db->where('is_free_course', 0)->get('course');
?>
<section class="why-choose-section1 mb-80">
    <div class="container">
        <!-- Section title -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Why Choose Us'); ?></h1>
                    <p class="info"><?php echo get_phrase('We provide a platform where you can learn something new and interesting from us to improve your skills'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="why-choose-area1">
                <div class="why-choose-wrap1">
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $total_students->num_rows(); ?></span>+</h1>
                        <p class="info"><?php echo get_phrase('Happy Students'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Quality Educators'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $premium_courses->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Premium Courses'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $free_courses->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Cost-free Courses'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Area End -->



<?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
<!-- Start Upcoming Courses -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if ($upcoming_courses->num_rows() > 0): ?>
<section class="pb-100 eUpcomingCourse my-5 py-5">
    <div class="container">
        <div class="row wow animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="300">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Explore our upcoming courses'); ?></h1>
                    <p class="info"><?php echo get_phrase('Discover a world of learning opportunities through our upcoming courses'); ?></p>
                </div>
            </div>
        </div>

        <div class="row wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="500">
            <div class="col-lg-12">
                <!-- Items -->
                <div class="row g-3">
                    <?php
                        foreach ($upcoming_courses->result_array() as $upcoming_course):
                            $instructor_details = $this->user_model->get_all_user($upcoming_course['creator'])->row_array();
                            $course_duration    = $this->crud_model->get_total_duration_of_lesson_by_course_id($upcoming_course['id']);
                            $lessons            = $this->crud_model->get_lessons('course', $upcoming_course['id']);
                        ?>
                    <?php
                                    $image_url = $upcoming_course['upcoming_image_thumbnail']
                                        ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail']
                                        : 'uploads/thumbnails/course_thumbnails/placeholder.png';
                                ?>
                    <div class="col-lg-4 col-md-6 col-sm-6    " data-wow-duration="500" data-wow-delay="300">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>"
                            id="top_course_<?php echo $upcoming_course['id']; ?>" class="course-item-one"
                            style="background: url('<?php echo $image_url; ?>') no-repeat center center; background-size: cover;">
                            <div class="ePosition">
                                <div class="eImage d-flex">
                                    <span class="px-3"><?php
                                                                   echo $this->db->where('id', $upcoming_course['sub_category_id'])->get('category')->row('name');
                                                                   ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
                                <h4 class="title pb-0"><?php echo $upcoming_course['title']; ?></h4>
                                <p class="info ellipsis-line-2 fw-400">
                                    <?php if ($upcoming_course['publish_date']) {
                                                        echo get_phrase('Release On') . ' : ' . date('j', strtotime($upcoming_course['publish_date'])) . ' ' . get_phrase(date('F', strtotime($upcoming_course['publish_date']))) . ' ' . date('Y', strtotime($upcoming_course['publish_date']));
                                                    }
                                                ?>
                                </p>

                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Upcoming Courses -->
<?php endif; ?>


<?php if (get_frontend_settings('faq_section') == 1): ?>
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<!---------- Questions Section Start  -------------->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">

        <!-- Section title -->
        <div class="row">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Frequently Asked Questions'); ?></h1>
                    <p class="info"><?php echo get_phrase('If you have any questions, we are here to help you'); ?></p>
                </div>
            </div>
        </div>
        <div class="accordion custom-accordion-two faq-5" id="accordionFaq">

            <?php foreach ($website_faqs as $key => $faq): ?>
            <?php if ($key > 4) {
                    break;
                }
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                    <button
                        class="accordion-button                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php if ($key > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo 'collapsed';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>"
                        type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
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
</section>
<!---------- Questions Section End  -------------->
<?php endif; ?>
<?php endif; ?>


<!-- Review Area 3 Start -->
<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('What the people Thinks About Us'); ?></h1>
                    <p class="info"><?php echo get_phrase('It highlights feedback and testimonials from users, reflecting their experiences and satisfaction.'); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
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


<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<!------------- Blog Section Start ------------>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="blog pb-100 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title"><?php echo get_phrase('Visit our latest blogs'); ?></h1>
                    <p class="info"><?php echo get_phrase('Visit our valuable articles to get more information.'); ?></p>
                </div>
            </div>
        </div>
        <div class="courses-card">
            <div class="row">
                <?php foreach ($latest_blogs->result_array() as $latest_blog):
                        $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                    $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
                <div class="col-lg-4 col-md-6 mb-3 wow  animate__animated animate__fadeIn" data-wow-duration="1000" data-wow-delay="700">
                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="courses-card-body blogCard">
                        <div class="courses-card-image">
                            <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                            if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                                $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                        endif; ?>
                            <div class="courses-card-image ">
                                <img loading="lazy" src="<?php echo $blog_thumbnail; ?>">
                            </div>
                            <div class="courses-card-image-text position-absolute">
                                <h3><?php echo $blog_category['title']; ?></h3>
                            </div>
                        </div>
                        <div class="courses-text">
                            <h5><?php echo $latest_blog['title']; ?></h5>
                            <p class="ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 100); ?></p>
                            <div class="courses-price-border">
                                <div class="courses-price">
                                    <div class="courses-price-left">
                                        <img loading="lazy" class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>">
                                        <div class="designation">
                                            <h5 class="mb-0"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></h5>
                                            <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.9222 6.41101L13.0888 0.577677C12.9317 0.425878 12.7212 0.341883 12.5027 0.343782C12.2842 0.34568 12.0752 0.433321 11.9207 0.587828C11.7662 0.742335 11.6785 0.951345 11.6766 1.16984C11.6747 1.38834 11.7587 1.59884 11.9105 1.75601L16.3213 6.16684H1.66634C1.44533 6.16684 1.23337 6.25464 1.07709 6.41092C0.920805 6.5672 0.833008 6.77916 0.833008 7.00018C0.833008 7.22119 0.920805 7.43315 1.07709 7.58943C1.23337 7.74571 1.44533 7.83351 1.66634 7.83351H16.3213L11.9105 12.2443C11.8309 12.3212 11.7674 12.4132 11.7238 12.5148C11.6801 12.6165 11.6571 12.7259 11.6561 12.8365C11.6552 12.9472 11.6763 13.0569 11.7182 13.1593C11.7601 13.2617 11.8219 13.3548 11.9002 13.433C11.9784 13.5112 12.0715 13.5731 12.1739 13.615C12.2763 13.6569 12.386 13.678 12.4967 13.6771C12.6073 13.6761 12.7167 13.6531 12.8183 13.6094C12.92 13.5658 13.012 13.5023 13.0888 13.4227L18.9222 7.58934C19.0784 7.43307 19.1662 7.22115 19.1662 7.00018C19.1662 6.77921 19.0784 6.56728 18.9222 6.41101Z"
                                                fill="#0D0C23" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>


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
