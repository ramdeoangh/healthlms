<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}
?>

<!-- Testimonials Area Start -->
    <section class="dark-body">
        <div class="container">
            <div class="row mb-50px">
                <div class="col-12">
                    <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('What the people Thinks About'); ?> <span class="text-yellow-2"><?php echo get_phrase('US'); ?></span></h1>
                </div>
            </div>
            <div class="row mb-100px">
                <div class="col-12">
                    <div class="lms-multi-slider-wrap">
                        <div class="multi-slider-content-wrap">
                            <div class="multi-slider-content-wrap-inner">
                                <div class="swiper multi-slider-1 multi-slider-content">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $reviews = $this->db->where('ratable_type', NULL)->where('ratable_id', NULL)->get('rating')->result();
                                        foreach ($reviews as $review):
                                            $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                        ?>
                                            <div class="swiper-slide">
                                                <h3 class="title-6 ls-1-7px fs-34px mb-2"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h3>
                                                <h5 class="subtitle-3 fs-20px lh-26px ls-1px text-yellow-2 mb-20px"><?php echo $review->rating; ?> <?php echo get_phrase('Star Rating'); ?></h5>
                                                <p class="subtitle-3 fs-15px lh-25px text-white mb-40px"><?php echo $review->review; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="swiper-pagination multi-slider-pagination"></div>
                                        <div class="multi-slider-arrows d-flex align-items-center">
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper multi-slider-2 multi-slider-img-wrap">
                            <div class="swiper-wrapper">
                                <?php
                                $reviews = $this->db->where('ratable_type', NULL)->where('ratable_id', NULL)->get('rating')->result();
                                foreach ($reviews as $review):
                                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                ?>
                                    <div class="swiper-slide multi-slider-img">
                                        <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->