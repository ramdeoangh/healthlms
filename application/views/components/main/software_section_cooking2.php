<?php
    if (! isset($home_cooking2_assets)) {
        $home_cooking2_assets = APPPATH . 'views/frontend/default-new/home_cooking2_assets.php';
        include $home_cooking2_assets;
    }
?>

<!-- Most Desirable Kitchens Area Start -->
<section>
    <div class="container">
        <div class="row mb-50">
            <div class="col-md-12">
                <div class="desirable-kitchen-area d-flex align-items-center justify-content-between">
                    <div class="desirable-kitchen-details">
                        <h3 class="title mb-30 builder-editable" builder-identity="1"><?php echo get_phrase('The world most desirable kitchens') ?></h3>
                        <p class="subtitle-typo1 fs-16px lms1-text-secondary mb-30 builder-editable" builder-identity="2"><?php echo get_phrase('Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while enjoying your
                            classes.') ?></p>
                        <p class="subtitle-typo1 fs-16px lms1-text-secondary mb-30 builder-editable" builder-identity="3">
                            <?php echo get_phrase('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent') ?></p>
                        <ul class="desirable-kitchen-prefer d-flex align-items-center flex-wrap">
                            <li>
                                <img class="builder-editable" builder-identity="4" src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/expert-green.svg" alt="">

                                <p class="prefer builder-editable" builder-identity="5"><?php echo get_phrase('Expert Instruction') ?></p>
                            </li>
                            <li>
                                <img class="builder-editable" builder-identity="6" src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/lifetime-coin-green.svg" alt="">

                                <p class="prefer builder-editable" builder-identity="7"><?php echo get_phrase('Lifetime Access') ?></p>
                            </li>
                            <li>
                                <img class="builder-editable" builder-identity="8" src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/self-development-green.svg" alt="">

                                <p class="prefer builder-editable" builder-identity="9"><?php echo get_phrase('Self Development') ?></p>
                            </li>
                            <li>
                                <img class="builder-editable" builder-identity="10" src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/online-learning-green.svg" alt="">

                                <p class="prefer builder-editable" builder-identity="11"><?php echo get_phrase('Online Learning') ?></p>
                            </li>
                        </ul>
                        <a href="<?php echo site_url('home/courses') ?>" class="rectangle-btn1"><?php echo get_phrase('Learn More') ?></a>
                    </div>
                    <div class="desirable-kitchen-banner">
                        <img class="w-100" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/desirable-kitchen-banner.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Most Desirable Kitchens Area End -->
