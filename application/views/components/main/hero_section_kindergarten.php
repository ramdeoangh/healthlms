<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>
<?php
    $total_instructors    = $this->db->where('is_instructor', 1)->get('users');
    $total_active_courses = $this->db->where('status', 'active')->get('course');
    $free_courses         = $this->db->where('is_free_course', 1)->get('course');
?>
<!-- Hero Area Start -->
<section class="lms-hero-section3 mb-100px overflow-hidden">
    <div class="lms-hero-main3">
        <div class="container">
            <div class="col-12">
                <h1 class="title-9 text-dark-5 fw-semibold fs-88px lms-hero3-title"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>

                <div class="lms-hero-content3">
                    <div class="hero3-content-left">
                        <div class="hero3-quote-wrap">
                            <span class="svg-block mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                    <g clip-path="url(#clip0_35_170)">
                                        <path
                                            d="M26.6667 33.333L33.3333 33.333C35.1014 33.333 36.7971 32.6306 38.0474 31.3804C39.2976 30.1301 40 28.4345 40 26.6663L40 19.9997C40 19.1156 39.6488 18.2678 39.0237 17.6427C38.3986 17.0175 37.5507 16.6663 36.6667 16.6663L26.8167 16.6663C27.2121 14.3388 28.4175 12.2259 30.2199 10.701C32.0224 9.17612 34.3057 8.33739 36.6667 8.333C37.1087 8.333 37.5326 8.15741 37.8452 7.84485C38.1577 7.53229 38.3333 7.10837 38.3333 6.66634C38.3333 6.22431 38.1577 5.80039 37.8452 5.48783C37.5326 5.17526 37.1087 4.99967 36.6667 4.99967C33.1317 5.00364 29.7426 6.40968 27.243 8.9093C24.7433 11.4089 23.3373 14.798 23.3333 18.333L23.3333 29.9997C23.3333 30.8837 23.6845 31.7316 24.3096 32.3567C24.9348 32.9818 25.7826 33.333 26.6667 33.333Z"
                                            fill="#393ED5" />
                                        <path
                                            d="M3.33366 33.333L10.0003 33.333C11.7684 33.333 13.4641 32.6306 14.7144 31.3804C15.9646 30.1301 16.667 28.4345 16.667 26.6663L16.667 19.9997C16.667 19.1156 16.3158 18.2678 15.6907 17.6427C15.0656 17.0175 14.2177 16.6663 13.3337 16.6663L3.48366 16.6663C3.8791 14.3388 5.08453 12.2259 6.88694 10.701C8.68935 9.17612 10.9727 8.33739 13.3337 8.333C13.7757 8.333 14.1996 8.15741 14.5122 7.84485C14.8247 7.53229 15.0003 7.10837 15.0003 6.66634C15.0003 6.22431 14.8247 5.80039 14.5122 5.48783C14.1996 5.17526 13.7757 4.99967 13.3337 4.99967C9.79865 5.00364 6.40958 6.40968 3.90995 8.9093C1.41033 11.4089 0.00429373 14.798 0.000322938 18.333L0.000323958 29.9997C0.000324035 30.8837 0.351515 31.7316 0.976636 32.3567C1.60176 32.9818 2.4496 33.333 3.33366 33.333Z"
                                            fill="#393ED5" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_35_170">
                                            <rect width="40" height="40" fill="white" transform="translate(40 40) rotate(180)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <p class="subtitle-9 fs-18px text-dark-6 hero3-quote-subtitle"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                        </div>
                        <div>
                            <h4 class="mb-1 fs-40px title-10"><span class="counter"><?php echo $total_active_courses->num_rows(); ?></span>+</h4>
                            <p class="subtitle-9 fs-16px text-dark-6 builder-editable" builder-identity="1"><?php echo get_phrase('Online Courses'); ?></p>
                        </div>

                    </div>
                    <div class="hero3-content-banner">
                        <img class="banner builder-editable" builder-identity="2" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero3-banner.webp" alt="">
                        <div class="hero3-banner-buttons">
                            <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-blue-rounded hero3-banner-button"><?php echo get_phrase('Browse Courses'); ?></a>
                            <a href="#top-course-slider" class="btn btn-outline-secondary-rounded hero3-banner-button"><?php echo get_phrase('Learn more'); ?></a>
                        </div>
                    </div>

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
                    <div class="hero3-content-right">
                        <div class="hero3-mentor-wrap ms-0 ms-sm-auto">
                            <h4 class="mb-1 fs-40px title-10 text-start text-sm-end"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h4>
                            <p class="subtitle-9 fs-16px text-dark-6 text-start text-sm-end builder-editable" builder-identity="3"><?php echo get_phrase('Professional Mentors') ?></p>
                        </div>
                        <div class="ms-0 ms-sm-auto">
                            <div class="mb-12px">
                                <div class="mb-2px d-flex align-items-center gap-1 justify-content-start justify-content-sm-end">

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
                                <p class="subtitle-9 fs-16px text-start text-sm-end"><?php echo get_phrase('Based on') . ' ' . $total_number_of_ratings . ' ' . get_phrase('reviews'); ?></p>
                            </div>
                            <ul class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                <?php foreach ($latest_5_ratings as $rating): ?>
                                <?php $ratingUser = $this->user_model->get_all_user($rating['user_id'])->row_array(); ?>
                                <li class="user-list-item3">
                                    <img class="user" src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo $ratingUser['first_name'] . ' ' . $ratingUser['last_name']; ?>" alt="">
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero3-brand-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Swiper -->
                    <div class="swiper brandSlider brandSlider2-height">
                        <div class="swiper-wrapper gap-4">
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="4" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand5.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="5" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand6.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="6" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand7.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="7" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand8.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="8" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand9.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-slide1">
                                    <img class="logo builder-editable" builder-identity="9" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand10.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Slider -->
</section>
<!-- Hero Area End -->
