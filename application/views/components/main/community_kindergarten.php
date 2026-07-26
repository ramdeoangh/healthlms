<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>
<!-- Creating A Community Area Start -->
<section>
    <div class="container">
        <div class="row g-28px align-items-center mb-100px">
            <div class="col-lg-6">
                <div class="community-banner1">
                    <img class="builder-editable w-100" builder-identity="1" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-banner.webp" alt="banner">
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h2 class="title-3 fs-32px lh-42px fw-medium mb-30px builder-editable" builder-identity="2"><?php echo get_phrase('Creating A Community Of Life Long Learners') ?></h2>
                    <p class="subtitle-typo1 lh-25px mb-30px fs-16px lms1-text-secondary builder-editable" builder-identity="3"><?php echo get_phrase('Training programs can bring you a super exciting experience of learning through online! You never face any negative experience while
                        enjoying your classes.') ?></p>
                    <p class="subtitle-typo1 lh-25px mb-30px fs-16px lms1-text-secondary builder-editable" builder-identity="4">
                        <?php echo get_phrase('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate ad litora torquent') ?></p>
                    <div class="row gx-30px gy-20px mb-40px">
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center gap-12px">
                                <div class="community-service-banner">
                                    <img class="builder-editable" builder-identity="5" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item1.webp" alt="">
                                </div>
                                <h4 class="community-service-name builder-editable" builder-identity="6"><?php echo get_phrase('Transportation') ?></h4>
                            </div>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center gap-12px">
                                <div class="community-service-banner">
                                    <img class="builder-editable" builder-identity="7" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item2.webp" alt="">
                                </div>
                                <h4 class="community-service-name builder-editable" builder-identity="8"><?php echo get_phrase('Outdoor Games') ?></h4>
                            </div>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center gap-12px">
                                <div class="community-service-banner">
                                    <img class="builder-editable" builder-identity="9" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item3.webp" alt="">
                                </div>
                                <h4 class="community-service-name builder-editable" builder-identity="10"><?php echo get_phrase('Nutritious Food') ?></h4>
                            </div>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="d-flex align-items-center gap-12px">
                                <div class="community-service-banner">
                                    <img class="builder-editable" builder-identity="11" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item4.webp" alt="">
                                </div>
                                <h4 class="community-service-name builder-editable" builder-identity="12"><?php echo get_phrase('Best Care') ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Creating A Community Area End -->
