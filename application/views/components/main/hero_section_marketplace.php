<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
        include $home_language_assets;
    }
?>

<style>
.menubar {
    z-index: 99 !important;
    background-color: revert;
}

.search-input {
    background-color: transparent;
}

</style>

<!-- Online Course Marketplace Hero Area End -->
<section class="lms-hero-section4">
    <div class="container">
        <div class="row gy-30px position-relative">
            <div class="col-lg-6 col-xl-7">
                <div class="lms-hero-content4">
                    <h4 class="hero4-category mb-1"><?php echo get_phrase('The Leader in') . ' ' . get_settings('system_name'); ?></h4>
                    <?php
                        $banner_title     = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>

                    <h1 class="title-11 fs-64px mb-20px">
                        <?php
                            foreach ($banner_title_arr as $key => $value) {
                                if (0 == $key) {
                                    echo '<span class="hero4-title-light">' . $value . '</span>';
                                } else {
                                    echo $value . ' ';
                                }
                            }
                        ?>
                    </h1>
                    <p class="subtitle-9 fs-16px fw-medium text-secondary-3 mb-40px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="d-flex align-items-center flex-wrap gap-12px">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-blue">
                            <span class="builder-editable" builder-identity="1"><?php echo get_phrase('Buy The Course') ?></span>
                            <span class="fi-rr-arrow-right"></span>
                        </a>
                        <a href="#top-course-slider" class="btn lms1-btn-outline-blue builder-editable" builder-identity="2"><?php echo get_phrase('Learn More') ?></a>
                    </div>
                    <div class="hero4-circle-btn-wrap">
                        <a href="#" class="hero4-circle-btn">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero4-cicle-btn.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 align-self-end">
                <div class="lms-hero4-banner ms-auto">
                    <img class="banner builder-editable" builder-identity="3" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero4-banner.webp" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Online Course Marketplace Hero Area End -->
