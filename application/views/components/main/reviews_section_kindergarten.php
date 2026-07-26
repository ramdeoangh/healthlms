<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>

<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="mb-100px ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="max-w-692px mx-auto">
                    <h2 class="title-10 fs-40px text-center lms1-text-dark mb-12px builder-editable" builder-identity="1"><?php echo get_phrase('What Our Customers Say') ?></h2>
                    <p class="subtitle-typo1 fs-16px lms1-text-secondary text-center builder-editable" builder-identity="2"><?php echo get_phrase('Having enjoyed a breathlessly successful 2015, there can be no DJ dynamic set of teaching tools built to be
                        deployed.') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="lms1-review-wrap">
        <div class="swiper lms1-reviewSlider">
            <div class="swiper-wrapper">

                <?php
                    $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                    foreach ($reviews as $review):
                        $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                    ?>
                <div class="swiper-slide">
                    <div class="lms1-review-slide">
                        <div class="d-flex align-items-center gap-12px mb-4">
                            <div class="image-circle-52px">
                                <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="user">
                            </div>
                            <div>
                                <h4 class="lms1-reviewer-name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h4>
                            </div>
                        </div>
                        <p class="lms1-review-comment mb-3"><?php echo $review->review; ?></p>
                        <ul class="d-flex align-items-center gap-1">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $review->rating): ?>
                            <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt=""></li>
                            <?php else: ?>
                            <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt=""></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<?php endif?>


<script>
// Review Slider 1
if ($('.lms1-reviewSlider').length > 0) {
    var reviewSlider1 = new Swiper(".lms1-reviewSlider", {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        keyboard: true,
        breakpoints: {
            576: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: "auto",
            },
        },
    });
}
</script>
