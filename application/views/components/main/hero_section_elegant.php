<?php
    if (! isset($home_elegant_assets)) {
        $home_elegant_assets = APPPATH . 'views/frontend/default-new/home_elegant_assets.php';
        include $home_elegant_assets;
    }
?>


<style>
.lms-hero-section2 {
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-bg.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.menubar {
    background-color: transparent;
    z-index: 999;
}

</style>

<!-- Corporate Training Hero Area Start -->
<section class="lms-hero-section2 mb-100px">
    <div class="container">
        <div class="row align-items-center gy-30px mb-80px">
            <div class="col-lg-6">
                <div class="lms-hero-content2">

                    <h1 class="title-9 fs-52px mb-12px"><?php echo site_phrase(get_frontend_settings('banner_title')); ?></h1>
                    <p class="subtitle-9 fs-16px mb-32px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-purple mb-32px builder-editable" builder-identity="1"><?php echo get_phrase('Browse Courses'); ?></a>

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

                    <div class="d-flex align-items-center gap-12px flex-wrap">

                        <ul class="d-flex align-items-center">
                            <?php foreach ($latest_5_ratings as $rating): ?>
                            <?php
                                $ratingUser = $this->user_model->get_all_user($rating['user_id'])->row_array();
                            ?>
                            <li class="user-list-item2">
                                <img class="user" src="<?php echo $this->user_model->get_user_image_url($rating['user_id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo $ratingUser['first_name'] . ' ' . $ratingUser['last_name']; ?>" alt="">
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div>
                            <div class="mb-2px d-flex align-items-center gap-1">
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
                            <p class="subtitle-9 fs-12px"><?php echo get_phrase('Based on') . ' ' . $total_number_of_ratings . ' ' . get_phrase('reviews'); ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center justify-content-lg-end gap-32px flex-column flex-sm-row align-items-center align-items-sm-start">
                    <div>
                        <div class="lms-hero2-banner mb-32px">

                            <img class="banner builder-editable" builder-identity="2" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-banner1.png" alt="">

                        </div>
                        <div class="hero2-iconbox1-rounded">
                            <div class="rounded-iconBox">
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.3828 16V22.0667C20.3828 22.3981 20.1142 22.6667 19.7828 22.6667H4.98281C4.65144 22.6667 4.38281 22.3981 4.38281 22.0667V9.93337C4.38281 9.602 4.65144 9.33337 4.98281 9.33337H19.7828C20.1142 9.33337 20.3828 9.602 20.3828 9.93337V16ZM20.3828 16L27.3987 10.1535C27.7895 9.8278 28.3828 10.1057 28.3828 10.6144V21.3857C28.3828 21.8944 27.7895 22.1723 27.3987 21.8466L20.3828 16Z"
                                        stroke="#09501E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h6 class="hero2-iconbox-category builder-editable" builder-identity="3"><?php echo get_phrase('VIDEO') ?></h6>
                                <h5 class="hero2-iconbox-title builder-editable" builder-identity="4"><?php echo get_phrase('LESSONS') ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="hero2-banner-area2">
                        <div class="hero2-iconbox1-rounded mb-4">
                            <div class="rounded-iconBox" style="background: #99CAFB;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                    <path d="M3.04932 26.6667V23C3.04932 19.134 6.18332 16 10.0493 16H12.3826" stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M21.5706 16.2903C22.364 15.4192 23.7347 15.4192 24.528 16.2903L24.6941 16.4726C25.095 16.9129 25.6713 17.1516 26.2661 17.1238L26.5125 17.1123C27.6894 17.0573 28.6587 18.0265 28.6036 19.2035L28.5921 19.4498C28.5643 20.0447 28.803 20.6209 29.2433 21.0219L29.4256 21.1879C30.2968 21.9813 30.2968 23.352 29.4256 24.1453L29.2433 24.3114C28.803 24.7123 28.5643 25.2886 28.5921 25.8834L28.6036 26.1298C28.6587 27.3067 27.6894 28.276 26.5125 28.221L26.2661 28.2094C25.6713 28.1816 25.095 28.4203 24.6941 28.8606L24.528 29.0429C23.7347 29.9141 22.364 29.9141 21.5706 29.0429L21.4046 28.8606C21.0036 28.4203 20.4273 28.1816 19.8325 28.2094L19.5862 28.221C18.4092 28.276 17.44 27.3067 17.495 26.1298L17.5065 25.8834C17.5343 25.2886 17.2956 24.7123 16.8553 24.3114L16.673 24.1453C15.8019 23.352 15.8019 21.9813 16.673 21.1879L16.8553 21.0219C17.2956 20.6209 17.5343 20.0447 17.5065 19.4498L17.495 19.2035C17.44 18.0265 18.4092 17.0573 19.5862 17.1123L19.8325 17.1238C20.4273 17.1516 21.0036 16.9129 21.4046 16.4726L21.5706 16.2903Z"
                                        stroke="#003162" stroke-width="2" />
                                    <path d="M20.8672 22.6666L22.3217 24.1212L25.2308 21.2121" stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M12.3827 16C15.3282 16 17.716 13.6122 17.716 10.6667C17.716 7.72119 15.3282 5.33337 12.3827 5.33337C9.43713 5.33337 7.04932 7.72119 7.04932 10.6667C7.04932 13.6122 9.43713 16 12.3827 16Z"
                                        stroke="#003162" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h6 class="hero2-iconbox-category builder-editable" builder-identity="5"><?php echo get_phrase('Best') ?></h6>
                                <h5 class="hero2-iconbox-title builder-editable" builder-identity="6"><?php echo get_phrase('Mentors') ?></h5>
                            </div>
                        </div>
                        <div class="lms-hero2-banner">
                            <img class="banner builder-editable" builder-identity="7" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-banner2.png" alt="">
                        </div>
                        <!-- Shape -->
                        <div class="hero2-banner-shape1">
                            <img class="shape builder-editable" builder-identity="8" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-shape1.png" alt="">
                        </div>
                        <div class="hero2-banner-shape2">
                            <img class="shape builder-editable" builder-identity="9" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/corpo-hero-shape2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-100px">
            <div class="col-12">
                <!-- Swiper -->
                <div class="swiper brandSlider brandSlider1-height">
                    <div class="swiper-wrapper gap-4">
                        <div class="swiper-slide">
                            <div class="brand-slide1">
                                <img class="logo builder-editable" builder-identity="10" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand1.png" alt="">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-slide1">
                                <img class="logo builder-editable" builder-identity="11" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand2.png" alt="">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-slide1">
                                <img class="logo builder-editable" builder-identity="12" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand3.png" alt="">

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-slide1">
                                <img class="logo builder-editable" builder-identity="13" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/brand4.png" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Corporate Training Hero Area End -->
