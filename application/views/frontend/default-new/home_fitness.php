<?php include 'home_fitness_assets.php'; ?>

<?php
    $total_instructors    = $this->db->where('is_instructor', 1)->get('users');
    $total_active_courses = $this->db->where('status', 'active')->get('course');
?>

<!-- Hero Area Start -->
<section class="lms-hero-section6">
    <div class="container">
        <div class="row gx-30px gy-30px mb-12px">
            <div class="col-lg-6 col-xl-7">
                <h1 class="title-13 fs-64px"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
            </div>
            <div class="col-lg-6 col-xl-5">
                <p class="subtitle-9 fw-medium fs-16px text-dark-6  mb-12px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                <div class="hero6-counter-wrap mb-32px">
                    <div>
                        <h4 class="mb-1 fs-40px title-10"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h4>
                        <p class="subtitle-9 fs-16px text-dark-6"><?php echo get_phrase('Skilled Trainers'); ?></p>
                    </div>
                    <span class="hero6-counter-line"></span>
                    <div>
                        <h4 class="mb-1 fs-40px title-10"><span class="counter"><?php echo $total_active_courses->num_rows(); ?></span>+</h4>
                        <p class="subtitle-9 fs-16px text-dark-6"><?php echo get_phrase('Online Courses'); ?></p>
                    </div>
                </div>
                <div class="hero6-button-wrap">
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-blue"><?php echo get_phrase('Browse Courses'); ?></a>
                    <a href="#top-course-slider" class="lms1-link-dark">
                        <span>Learn More</span>
                        <span class="fi-rr-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row g-20px align-items-end align-items-xl-start mt-4 mt-xl-0">
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap1">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner1.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap2">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner2.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap3">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner3.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap4">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner4.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->

<!-- Brand Slider Area Start -->
<section class="lms6-brand-section mb-100px" id="top-course-slider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="swiper brandSlider brandSlider1-height">
                    <div class="swiper-wrapper">
                        <?php $latest_courses = $this->crud_model->get_latest_10_course();
                        foreach ($latest_courses as $latest_course): ?>
                        <div class="swiper-slide">
                            <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"
                                class="brand-slide1 d-flex align-items-center h-100px">
                                <img class="logo rounded-3 me-4" loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>">
                                <div>
                                    <h5 class="title-10 fs-16px mb-1 text-white"><?php echo substr($latest_course['title'], 0, 25) . '...'; ?></h5>
                                    <p class="subtitle-10 fs-14px text-white"><?php echo substr($latest_course['short_description'], 0, 20) . '...'; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand Slider Area End -->



<?php if (get_frontend_settings('top_category_section') == 1): ?>
<!-- Program Area Start -->
<section class="fitness-program-section">
    <div class="container">
        <div class="row mb-50px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Select Your Needs'); ?></h1>
            </div>
        </div>
        <div class="row g-28px mb-100px">
            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details       = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <?php $category_total_courses = $this->db->where('sub_category_id', $top_10_category['sub_category_id'])->get('course'); ?>
            <div class="col-sm-6 col-md-4">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="d-block lms-2-card max-sml-350px-auto">
                    <div class="lms-2-card-image mb-14px">
                        <?php if ($category_details['sub_category_thumbnail'] && file_exists('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail'])): ?>
                        <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                        <?php else: ?>
                        <img src="<?php echo base_url(); ?>uploads/thumbnails/category_thumbnails/category-thumbnail.png" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="mb-2px d-flex align-items-center justify-content-between gap-1">
                        <div>
                            <p class="subtitle-7 mb-1 fw-semibold"><?php echo $category_details['name']; ?></p>
                            <p class="subtitle-3 fw-medium fs-15px text-yellow-2 lh-23px"><?php echo $category_total_courses->num_rows(); ?> <?php echo get_phrase('Courses'); ?></p>
                        </div>
                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-top-right-yellow-22.svg" alt="icon">
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Program Area End -->
<?php endif; ?>




<!-- GYM Courses Area Start -->
<section>
    <div class="container">
        <div class="row mb-50px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Special GYM - '); ?> <span class="text-yellow-2"><?php echo get_phrase('Courses'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-50px">
            <div class="col-12">
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <button type="button" data-filter="all" class="btn btn-outline-warning-1 outline-warning-rounded">All</button>

                    <?php if (get_frontend_settings('top_course_section') == 1): ?>
                    <button type="button" data-filter=".popular" class="btn btn-outline-warning-1 outline-warning-rounded">Popular</button>
                    <?php endif; ?>

                    <?php if (get_frontend_settings('latest_course_section') == 1): ?>
                    <button type="button" data-filter=".latest" class="btn btn-outline-warning-1 outline-warning-rounded">Latest</button>
                    <?php endif; ?>

                    <?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
                    <button type="button" data-filter=".upcoming" class="btn btn-outline-warning-1 outline-warning-rounded">Upcoming</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="mixitup row g-4 mb-50px">
            <!-- popular and trending are multiple filter class -->
            <?php if (get_frontend_settings('top_course_section') == 1): ?>
            <?php
                $top_courses = $this->crud_model->get_top_courses()->result_array();
                foreach ($top_courses as $top_course):
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
	            <div class="col-lg-4 col-md-6 mix popular">
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
	                    <div class="d-grid align-content-evenly gap-3 h-100">
	                        <div class="lms-2-card-image position-relative mb-18px mb-auto">
	                            <img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="banner">
	                            <div class="rating-overlay-1 d-flex align-items-center gap-1">
	                                <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
	                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
	                            </div>
	                        </div>
	                        <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
	                            <div class="d-flex align-items-center gap-2">
	                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
	                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
	                            </div>
	                            <div class="d-flex align-items-center gap-2">
	                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
	                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
	                            </div>
	                        </div>
	                        <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $top_course['title']; ?></h1>
	                        <div class="d-flex align-items-center justify-content-between gap-2">
	                            <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
	                                <?php if ($top_course['is_free_course']): ?>
	                                <?php echo get_phrase('Free'); ?>
	                                <?php elseif ($top_course['discount_flag']): ?>
                                <?php echo currency($top_course['discounted_price']); ?>
                                <span class="mt-1 text-14px text-secondary"><del><?php echo currency($top_course['price']); ?></del></span>
                                <?php else: ?>
                                <?php echo currency($top_course['price']); ?>
                                <?php endif; ?>
                            </h2>
                            <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                        <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_2_4171)">
                                        <path
                                            d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z"
                                            fill="white" />
                                    </g>
                                    <path
                                        d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_frontend_settings('latest_course_section') == 1): ?>
            <?php foreach ($latest_courses as $latest_course): ?>
            <?php
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
            <div class="col-lg-4 col-md-6 mix latest">
                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
                    <div class="d-grid align-content-evenly gap-3 h-100">
                        <div class="lms-2-card-image position-relative mb-18px mb-auto">
                            <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="banner">
                            <div class="rating-overlay-1 d-flex align-items-center gap-1">
                                <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
                            </div>
                        </div>
                        <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                            </div>
                        </div>
                        <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $latest_course['title']; ?></h1>
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
                                <?php if ($latest_course['is_free_course']): ?>
                                <?php echo get_phrase('Free'); ?>
                                <?php elseif ($latest_course['discount_flag']): ?>
                                <?php echo currency($latest_course['discounted_price']); ?>
                                <span class="mt-1 text-14px text-secondary"><del><?php echo currency($latest_course['price']); ?></del></span>
                                <?php else: ?>
                                <?php echo currency($latest_course['price']); ?>
                                <?php endif; ?>
                            </h2>
                            <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                        <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_2_4171)">
                                        <path
                                            d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z"
                                            fill="white" />
                                    </g>
                                    <path
                                        d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
            <?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(10)->get_where('course', ['status' => 'upcoming'])->result_array(); ?>
            <?php foreach ($upcoming_courses as $upcoming_course): ?>
            <?php
                $number_of_enrolled_students = $this->crud_model->enrol_history($upcoming_course['id'], true)->num_rows();
                $lessons                     = $this->crud_model->get_lessons('course', $upcoming_course['id']);
                $total_rating                = $this->crud_model->get_ratings('course', $upcoming_course['id'], true)->row()->rating;
                $number_of_ratings           = $this->crud_model->get_ratings('course', $upcoming_course['id'])->num_rows();
                if ($number_of_ratings > 0) {
                    $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                } else {
                    $average_ceil_rating = 0;
                }
            ?>
            <div class="col-lg-4 col-md-6 mix upcoming">
                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
                    <div class="d-grid align-content-evenly gap-3 h-100">
                        <div class="lms-2-card-image position-relative mb-18px mb-auto">
                            <img src="<?php echo $this->crud_model->get_course_thumbnail_url($upcoming_course['id']); ?>" alt="banner">
                            <div class="rating-overlay-1 d-flex align-items-center gap-1">
                                <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
                            </div>
                        </div>
                        <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
                                <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                            </div>
                        </div>
                        <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $upcoming_course['title']; ?></h1>
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
                                <?php if ($upcoming_course['is_free_course']): ?>
                                <?php echo get_phrase('Free'); ?>
                                <?php elseif ($upcoming_course['discount_flag']): ?>
                                <?php echo currency($upcoming_course['discounted_price']); ?>
                                <span class="mt-1 text-14px text-secondary"><del><?php echo currency($upcoming_course['price']); ?></del></span>
                                <?php else: ?>
                                <?php echo currency($upcoming_course['price']); ?>
                                <?php endif; ?>
                            </h2>
                            <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                    <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                        <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_2_4171)">
                                        <path
                                            d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z"
                                            fill="white" />
                                    </g>
                                    <path
                                        d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row mb-120px">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn btn-warning-1"><?php echo get_phrase('View All Courses'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- GYM Courses Area End -->


<!-- Why Choose Area Start -->
<?php
    $total_students    = $this->db->where('role_id', 2)->get('users');
    $total_instructors = $this->db->where('is_instructor', 1)->get('users');
    $free_courses      = $this->db->where('is_free_course', 1)->get('course');
    $premium_courses   = $this->db->where('is_free_course', 0)->get('course');
?>
<section>
    <div class="container">
        <div class="row mb-80px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Why Choose '); ?> <span class="text-yellow-2"><?php echo get_settings('system_name'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-120px row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-30px">
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $total_students->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Happy Students'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Quality Instructors'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $premium_courses->num_rows(); ?></span></h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Premium Courses'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $free_courses->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Cost-free Courses'); ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Area End -->

<!-- Event Area Start -->
<?php if (get_frontend_settings('motivational_speech_section') == 1): ?>
<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
<?php if (count($motivational_speechs) > 0): ?>
<section>
    <div class="container">
        <div class="row mb-60px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Think more clearly'); ?></h1>
            </div>
        </div>
        <div class="row mb-100px gy-30px">
            <?php $counter = 0; ?>
            <?php foreach ($motivational_speechs as $key => $motivational_speech): ?>
            <?php $counter = $counter + 1; ?>
            <div class="col-12">
                <div class="h-100 d-flex">
                    <div class="h-100 fit-event-number-date">
                        <!-- <p class="subtitle-3 fw-medium fs-16px lh-28px text-yellow-2 text-center mb-6px">SAT</p> -->
                        <h1 class="title-6 fs-44px lh-29px text-center"><?php echo $counter; ?></h1>
                    </div>
                    <div class="h-100 d-flex lms1-border-bottom pb-30px column-gap-5 row-gap-3 flex-column flex-lg-row">
                        <div>
                            <!-- <div class="d-flex gap-2 mb-10px">
                                            <span class="fi-rr-calendar text-yellow-2 fs-13px lh-18px"></span>
                                            <p class="subtitle-4 fs-12px lh-normal">Friday - Jan 01 7:00 am - 10:00 am</p>
                                        </div> -->
                            <h3 class="title-6 fs-20px mb-14px"><?php echo $motivational_speech['title']; ?></h3>
                            <!-- <div class="d-flex gap-12px align-items-center mb-20px">
                                            <div class="rounded-img-30px">
                                                <img src="assets/images/img/language-course-author.webp" alt="author">
                                            </div>
                                            <p class="subtitle-7 fs-13px lh-25px">Avril Lavigne</p>
                                        </div> -->
                            <p class="subtitle-3 fs-15px lh-25px text-white"><?php echo nl2br($motivational_speech['description']); ?></p>
                        </div>
                        <div class="img-wrap-313px">
                            <img loading="lazy" src="<?php echo site_url('uploads/system/motivations/' . $motivational_speech['image']) ?>" alt="" />
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
<!-- Event Area End -->

<?php if (get_frontend_settings('review_section') == 1): ?>
<!-- Testimonials Area Start -->
<section>
    <div class="container">
        <div class="row mb-50px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('What the people Thinks About'); ?> <span class="text-yellow-2"><?php echo get_phrase('US'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-100px">
            <div class="col-12">
                <div class="lms-multi-slider-wrap">
                    <div class="multi-slider-content-wrap">
                        <div class="multi-slider-content-wrap-inner">
                            <div class="swiper multi-slider-1 multi-slider-content">
                                <div class="swiper-wrapper">
                                    <?php
                                        $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                                        foreach ($reviews as $review):
                                            $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                        ?>
	                                    <div class="swiper-slide">
	                                        <h3 class="title-6 ls-1-7px fs-34px mb-2"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h3>
	                                        <ul class="d-flex align-items-center gap-1 mb-20px">
	                                            <?php for ($i = 1; $i <= 5; $i++): ?>
	                                            <?php if ($i <= $review->rating): ?>
	                                            <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt=""></li>
	                                            <?php else: ?>
                                            <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt=""></li>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        </ul>
                                        <!--<h5 class="subtitle-3 fs-20px lh-26px ls-1px text-yellow-2 mb-20px"><?php echo $review->rating; ?> <?php echo get_phrase('Star Rating'); ?></h5>-->
                                        <p class="subtitle-3 fs-15px lh-25px text-white mb-40px"><?php echo $review->review; ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="swiper-pagination multi-slider-pagination"></div>
                                    <div class="multi-slider-arrows d-flex align-items-center">
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper multi-slider-2 multi-slider-img-wrap">
                        <div class="swiper-wrapper">
                            <?php
                                $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                                foreach ($reviews as $review):
                                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                ?>
	                            <div class="swiper-slide multi-slider-img">
	                                <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
	                            </div>
	                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Area End -->
<?php endif; ?>


<!------------- Blog Section Start ------------>
<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section>
    <div class="container">
        <div class="row mb-50px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Visit our latest'); ?> <span class="text-yellow-2"><?php echo get_phrase('Blogs'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-100px g-28px">
            <?php foreach ($latest_blogs->result_array() as $latest_blog):
                    $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
	            <div class="col-md-6 col-lg-4">
	                <div class="h-100 max-mdm-450px-auto">
	                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="d-block lms-2-blog-banner">
	                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                    if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                endif; ?>
	                        <img src="<?php echo $blog_thumbnail; ?>" alt="banner">
	                    </a>
	                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="d-block lms-2-card fit-blog-card pb-auto">
	                        <h4 class="title-4 fs-18px lh-26px text-white mb-14px"><?php echo $blog_category['title']; ?></h4>
	                        <p class="subtitle-3 fs-13px lh-24px text-white pb-18px mb-12px lms1-border-bottom ellipsis-line-2">
	                            <?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 100); ?></p>
	                        <div class="d-flex gap-6px">
	                            <span class="fas fa-clock text-yellow-2 fs-13px lh-18px"></span>
	                            <p class="subtitle-4 fs-12px lh-normal text-white ms-2"><?php echo get_past_time($latest_blog['added_date']); ?></p>
	                        </div>
	                    </a>
	                </div>
	            </div>
	            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Blog Section End -->
<?php endif; ?>
<?php endif; ?>



<script>
// mixitup plugin
if ($('.mixitup') && $('.mixitup').length > 0) {
    var containerEl = document.querySelector('.mixitup');
    var mixer = mixitup(containerEl, {
        load: {
            filter: 'all'
        },
        animation: {
            effectsIn: 'fade translateY(-100%)',
            effects: 'fade translateZ(-100px)'
        }
    });
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Fitness
var swiper8 = new Swiper(".multi-slider-2", {
    cssMode: true,
    spaceBetween: 10,
    slidesPerView: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper9 = new Swiper(".multi-slider-1", {
    cssMode: true,
    spaceBetween: 10,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper8,
    },
});
</script>
