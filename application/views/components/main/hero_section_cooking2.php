<?php
    if (! isset($home_cooking2_assets)) {
        $home_cooking2_assets = APPPATH . 'views/frontend/default-new/home_cooking2_assets.php';
        include $home_cooking2_assets;
    }
?>


<!-- Hero Area Start -->
<section class="lms-hero-section7 mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="max-w-1088px mx-auto mb-4">
                    <h1 class="title-typo2 text-dark-5 fw-bold fs-64px text-center mb-3"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-typo1 fs-16px fw-medium text-center max-w-698px mx-auto mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="d-flex align-items-center column-gap-4 row-gap-3 flex-wrap justify-content-center">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms2-btn-orange-rounded lms7-hero-btn builder-editable"
                            builder-identity="1"><?php echo get_phrase('Browse Course') ?></a>
                        <a href="#top-course-slider" class="btn lms1-btn-outline-orange lms7-hero-btn builder-editable" builder-identity="2"><?php echo get_phrase('Let’s talk') ?></a>
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
