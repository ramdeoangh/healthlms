<!---------- Banner Section Start ---------------->
<section class="h-1-banner h-2-banner mt-5   ">
    <div class="container">
        <div class="h-2-banner-text">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <?php
                    $banner_title = site_phrase(get_frontend_settings('banner_title'));
                    $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <h1 class="animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                        <?php
                        foreach ($banner_title_arr as $key => $value) {
                            if ($key == count($banner_title_arr) - 1) {
                                echo '<span>' . $value . '</span>';
                            } else {
                                echo $value . ' ';
                            }
                        }
                        ?>
                    </h1>
                    <p class="animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="h-2-search-bar animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                        <form action="<?php echo site_url('home/search'); ?>" method="get">
                            <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="banner-image animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-1">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-1 image-bottom">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-3 image-bottom">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-3">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>