<?php include 'home_development_assets.php'; ?>

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
                        <p><?php echo get_phrase('Your #1 Platform for Tech & Programming Education') ?></p>
                    </div>
                    <h1 class="title-typo4 fs-72px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <!-- <h1 class="title-typo2 text-dark-5 fw-bold fs-64px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1> -->
                    <p class="subtitle-typo2 fs-16px text-center mb-32px max-w-436px mx-auto"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="d-flex align-items-center column-gap-4 row-gap-3 flex-wrap justify-content-center">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-blue-rounded lms8-hero-btn"><?php echo get_phrase('Browse Course') ?></a>
                        <a href="#top-course-slider" class="btn lms1-btn-outline-blue lms8-hero-btn"><?php echo get_phrase('Let’s talk') ?></a>
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


<!-- Software Development Area Start -->
<section>
    <div class="container">
        <div class="row row-20 align-items-center mb-100">
            <div class="col-lg-6">
                <div class="software-development-banner">
                    <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/soft-dev-banner.webp" alt="banner">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="software-development-details">
                    <h2 class="title"><?php echo get_phrase('Leading the Way in Software ') ?><span class="highlight"><?php echo get_phrase('Development') ?></span></h2>
                    <p class="subtitle-9 fs-16px fw-medium text-secondary-3 mb-20"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated they live in
                        Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                    <ul class="dashed-list-items mb-20">
                        <li><span>- </span><?php echo get_phrase('Education award achived') ?></li>
                        <li><span>- </span><?php echo get_phrase('Available online courses') ?></li>
                    </ul>
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn-black-arrow1">
                        <span><?php echo get_phrase('Learn More') ?></span>
                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Software Development Area End -->

<!-- Category Area 2 Start -->
<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex dev-section-title-category align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px dev-categories-section-title">
                    <h2 class="title text-lg-start"><?php echo get_phrase('Explore ') ?><span class="highlight"><?php echo get_phrase('Categories') ?></span></h2>

                    <a href="<?php echo site_url('home/courses') ?>" class="lms1-link-secondary fw-semibold gap-1">
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
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="lms-category-type2">
                    <figure class="category-type2-banner">
                        <img class="banner" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                    </figure>
                    <h6 class="category-type2-title"><?php echo $category_details['name']; ?></h6>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif?>
<!-- Category Area 2 End -->

<!-- Card Design 4 Start -->
<?php if (get_frontend_settings('latest_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dev-section-title">
                    <h1 class="title mb-20"><?php echo get_phrase('Pick A Course To ') ?> <span class="highlight"><?php echo get_phrase('Get Started') ?></span></h1>
                    <p class="subtitle-typo1 fs-16px lms1-text-secondary text-center">
                        <?php echo get_phrase('The industry standard dummy text ever since the unknown printer took a galley of type and scrambled') ?></p>
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
                <div class="lms4-course-card">
                    <div>
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"
                            id="latest_course_<?php echo $latest_course['id']; ?>" class="lms4-cCard-banner">
                            <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="">
                        </a>

                        <div class="lms4-cCard-body">
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-12px">
                                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"
                                    class="cCard-category1"><?php echo $this->db->where('id', $latest_course['sub_category_id'])->get('category')->row('name'); ?></a>
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
                            </div>
                            <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"
                                class="lms4-cCard-title"><?php echo $latest_course['title']; ?></a>
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap lms4-user-reviews">
                                <div class="d-flex align-items-center flex-wrap gap-2 mb-2">
                                    <div class="image-circle-24px">
                                        <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
                                    </div>
                                    <h5 class="cCard-user-name2"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h5>
                                </div>
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <span class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M14.9313 11.934C14.8248 12.0371 14.7449 12.1645 14.6984 12.3053C14.652 12.4461 14.6404 12.5961 14.6646 12.7423L15.4063 16.8423C15.4368 17.0125 15.4177 17.1879 15.3512 17.3475C15.2847 17.5071 15.1736 17.6442 15.0313 17.7423C14.8916 17.8443 14.7259 17.9046 14.5534 17.9164C14.3809 17.9282 14.2085 17.891 14.0563 17.809L10.3646 15.884C10.2359 15.8162 10.0933 15.7791 9.94792 15.7757H9.72292C9.64409 15.7872 9.56792 15.8126 9.49792 15.8507L5.80626 17.784C5.62292 17.8757 5.41709 17.909 5.21459 17.8757C4.97749 17.8306 4.76733 17.6948 4.62882 17.4971C4.49031 17.2995 4.43438 17.0556 4.47292 16.8173L5.21459 12.7173C5.23887 12.5698 5.22732 12.4186 5.18091 12.2764C5.1345 12.1343 5.05459 12.0054 4.94792 11.9007L1.93959 8.98398C1.81625 8.86478 1.72954 8.71282 1.68968 8.54598C1.64982 8.37915 1.65846 8.2044 1.71459 8.04232C1.82709 7.71232 2.11209 7.47148 2.45626 7.41732L6.59792 6.81732C6.91292 6.78399 7.18959 6.59232 7.33126 6.30899L9.15626 2.56732C9.19876 2.48398 9.25459 2.40732 9.32292 2.34232L9.39792 2.28398C9.43652 2.24122 9.4815 2.20468 9.53126 2.17565L9.62292 2.14232L9.76459 2.08398H10.1146C10.4288 2.11732 10.7046 2.30398 10.8479 2.58398L12.6979 6.30899C12.8313 6.58149 13.0896 6.77065 13.3896 6.81732L17.5313 7.41732C17.8813 7.46732 18.1729 7.70898 18.2896 8.04232C18.3979 8.37648 18.3038 8.74315 18.0479 8.98398L14.9313 11.934Z"
                                                fill="#F8BC24" />
                                        </svg>
                                    </span>
                                    <h5 class="cCard4-review">(<?php echo $average_ceil_rating; ?> <?php echo get_phrase('Reviews') ?>)</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-center row-gap-3 column-gap-4 flex-wrap justify-content-between">
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
                        </div>
                    </div>
                </div>
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
                        style="display:                                                                                                                                                                                                                                                                                         <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
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

            <!-- Button  -->
            <div class="col-xl-12">
                <div class="dev-course-btn-area d-flex justify-content-center">
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn-black-arrow1">
                        <span><?php echo get_phrase('View More') ?></span>
                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php endif?>
<!-- Card Design 4 End -->

<?php if (get_frontend_settings('faq_section') == 1): ?>
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<!-- QNA Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dev-section-title">
                    <h1 class="title"><?php echo get_phrase('Frequently Asked ') ?> <span class="highlight"><?php echo get_phrase('Questions') ?></span></h1>
                </div>
            </div>
        </div>
        <div class="two-accordion-wrap overflow-hidden">
            <div class="row mb-100px">
                <div class="accordion qna-three-accordion" id="accordionExample2">

                    <?php foreach ($website_faqs as $key => $faq): ?>
                    <?php if ($key > 4) {
                            break;
                        }
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true"
                                aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                                <?php echo $faq['question']; ?>
                            </button>
                        </h2>
                        <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                            <div class="accordion-body">
                                <p><?php echo nl2br($faq['answer']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php if (count($website_faqs) > 5): ?>
                    <a href="<?php echo site_url('home/faq') ?>" class="btn-black-arrow1 mt-5">
                        <span><?php echo get_phrase('See More') ?></span>
                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="">
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- QNA Course Area End -->
<?php endif; ?>
<?php endif; ?>

<!-- Review Area 1 Start -->
<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="mb-100px ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dev-section-title">
                    <h1 class="title mb-20"><?php echo get_phrase('What Our ') ?> <span class="highlight"><?php echo get_phrase('Customers Say') ?></span></h1>
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
<?php $latest_blogs = $this->crud_model->get_latest_blogs(4); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dev-section-title">
                    <h1 class="title mb-20"><?php echo get_phrase('Get News with ') ?> <span class="highlight"><?php echo get_phrase('Academy') ?></span></h1>
                    <p class="subtitle-typo1 fs-16px lms1-text-secondary text-center">
                        <?php echo get_phrase('The industry standard dummy text ever since the unknown printer took a galley of type and scrambled') ?></p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php foreach ($latest_blogs->result_array() as $latest_blog):
                    $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
            <div class="col-md-6 col-lg-4">
                <div class="lms3-blog-card">

                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms3-bCard-banner">
                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                        if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                            $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif; ?>
                        <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">

                    </a>
                    <div class="lms3-bCard-body">
                        <div class="d-flex align-items-start gap-1 flex-wrap mb-12px">
                            <p class="bCard3-author"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></p>
                            <p class="bCard3-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>
                        </div>
                        <div class="d-flex align-items-start column-gap-3 row-gap-2 justify-content-between mb-12px">
                            <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
                                class="lms3-bCard-title"><?php echo $latest_blog['title']; ?></a>
                            <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms3-bCard-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <p class="lms3-bCard-short-des"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>

<!-- Blog Card 3 Area End -->


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

    var swiper4 = new Swiper(".dev-student-swiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        keyboard: true,
        slidesPerView: 1,
        spaceBetween: 20,
        // loop: true,
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            991: {
                slidesPerView: 2,
            },
        },
    });

});
</script>
