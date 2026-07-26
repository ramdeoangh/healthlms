<?php
    if (! isset($home_fitness_assets)) {
        $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
        include $home_fitness_assets;
    }
?>

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
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-blue builder-editable" builder-identity="1"><?php echo get_phrase('Browse Courses'); ?></a>
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
                    <img class="banner builder-editable" builder-identity="2" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner1.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap2">
                    <img class="banner builder-editable" builder-identity="3" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner2.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap3">
                    <img class="banner builder-editable" builder-identity="4" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner3.webp" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="hero6-banner-wrap4">
                    <img class="banner builder-editable" builder-identity="5" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero6-banner4.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->
