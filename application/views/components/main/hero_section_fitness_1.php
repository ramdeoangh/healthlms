<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}
?>
<!-- Brand Slider Area Start -->
<section class="lms6-brand-section mb-100px" id="top-course-slider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="swiper brandSlider brandSlider1-height">
                    <div class="swiper-wrapper">
                        <?php $latest_courses = $this->crud_model->get_latest_10_course();
                        foreach ($latest_courses as $latest_course) : ?>
                            <div class="swiper-slide">
                                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="brand-slide1 d-flex align-items-center h-100px">
                                    <img class="logo rounded-3 me-4" loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>">
                                    <div>
                                        <h5 class="title-10 fs-16px mb-1 text-white"><?php echo $latest_course['title']; ?></h5>
                                        <p class="subtitle-10 fs-14px text-white"><?php echo $latest_course['short_description']; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand Slider Area End -->