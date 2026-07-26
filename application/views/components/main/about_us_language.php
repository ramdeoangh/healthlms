<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>
<!-- About Us Area Start -->
<section>
    <div class="container">
        <div class="row g-20px mb-100px align-items-center">
            <div class="col-xl-5 col-lg-6 order-2 order-lg-1">
                <div>
                    <p class="text-bordered-1 mb-12px builder-editable" builder-identity="1"><?php echo get_phrase('ABOUT US') ?></p>
                    <h1 class="title-1 fs-32px lh-38px fw-bold mb-20px builder-editable" builder-identity="2"><?php echo get_phrase('Know About Academy LMS Learning Platform') ?></h1>
                    <p class="subtitle-16 fs-16px lh-24px mb-26px builder-editable" builder-identity="3"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                    <div class="about-text-items mb-26px">
                        <div class="mb-20px">
                            <h3 class="title-1 fs-20px lh-28px fw-semibold mb-12px builder-editable" builder-identity="4"><?php echo get_phrase('Flexible Classes') ?></h3>
                            <p class="subtitle-16 fs-16px lh-24px mb-26px builder-editable" builder-identity="5">
                                <?php echo get_phrase('Awesome site. on the top advertising a business online includes assembling Having services.') ?></p>
                        </div>

                    </div>
                    <a href="<?php echo site_url('home/about_us') ?>" class="btn btn-primary-2"><?php echo get_phrase('Learn More') ?></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 order-1 order-lg-2">
                <div class="about-area-banner1">
                    <img class="banner builder-editable" builder-identity="6" src="<?php echo base_url(); ?>assets/frontend/default-new/image/about-us-r-2.png" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area End -->
