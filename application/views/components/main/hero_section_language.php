<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>

<!-- Hero Area Start -->
<section class="lms-hero-section5">
    <div class="container">
        <div class="row mb-80px align-items-center gy-30px">
            <div class="col-lg-6 order-lg-2">
                <div class="lms-hero5-banner ms-auto me-auto me-lg-0">
                    <img class="banner builder-editable" builder-identity="1" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero5-bannar.png" alt="location">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lms-hero-content5">
                    <h1 class="title-12 fs-68px mb-20px"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-10 fs-16px mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>

                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <div class="subscribe-input-wrap d-flex align-items-center flex-wrap flex-sm-nowrap gap-12px">
                            <input class="form-control subscribe-form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                            <button class="btn lms1-btn-orange-rounded text-nowrap" type="submit"><?php echo get_phrase('Get Started') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Brand Wrap -->
        <div class="row mb-100px">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between gap-30px flex-wrap">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <ul class="d-flex align-items-center">
                            <?php
                                $this->db->where_in('role_id', 2);
                                $query       = $this->db->get('users');
                                $users       = $query->result_array();
                                $total_count = count($users);
                            ?>
                            <?php foreach ($users as $user): ?>
                            <li class="user-list-item4">
                                <img class="user" src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="">
                            </li>
                            <?php endforeach?>
                        </ul>
                        <p class="subtitle-10 fs-16px text-dark-5 fw-normal"><?php echo get_phrase('Students') ?></p>
                    </div>
                    <ul class="brand-list-group2">
                        <li class="brand-list2-item">
                            <img class="builder-editable" builder-identity="2" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand12.png" alt="">
                        </li>
                        <li class="brand-list2-item">
                            <img class="builder-editable" builder-identity="3" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand13.png" alt="">
                        </li>
                        <li class="brand-list2-item">
                            <img class="builder-editable" builder-identity="4" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand14.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->
