<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>


<?php if (get_frontend_settings('review_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-32px max-w-565px mx-auto">
                    <h3 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('What Our ') ?></span> <span
                            class="lms1-text-purple-gradient builder-editable" builder-identity="2"><?php echo get_phrase('Customers Say') ?></span></h3>
                    <p class="subtits16 fs-16px lms1-text-secondary text-center builder-editable" builder-identity="3">
                        <?php echo get_phrase('Lorem Ipsum has been the industry standard dummy text ever since the unknown printer took a galley of type and scrambled') ?>
                    </p>
                </div>
            </div>
            <div clxts="col-12">
                <div class="lms2-reviewSlider-main">
                    <div class="lms3-reviewSlider-content mb-12px">

                        <!-- No 1 -->
                        <?php
                            $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                            foreach ($reviews as $review):
                                $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                            ?>
                        <div class="lms3-review-content-slide">
                            <div class="lms3-review-stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $review->rating): ?>
                                <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt="">
                                <?php else: ?>
                                <img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt="">
                                <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <p class="lms3-review-comment mb-4"><?php echo $review->review; ?></p>
                            <div>
                                <h4 class="lms3-reviewer-name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>


                    </div>
                    <div class="reviewSlider3-author-wrap">
                        <div class="lms3-reviewSlider-author">
                            <!-- No 1 -->
                            <?php
                                $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                                foreach ($reviews as $review):
                                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                ?>
                            <div class="lms3-review-profile-slide">
                                <div class="lms3-review-profile">
                                    <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif?>

<script>
$(document).ready(function() {
    // Review 3
    if ($('.lms3-reviewSlider-content').length > 0) {
        $(".lms3-reviewSlider-content").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.lms3-reviewSlider-author',
            autoplay: false,
            loop: true,
            fade: false,
            margin: 20,
        });
        $(".lms3-reviewSlider-author").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.lms3-reviewSlider-content',
            dots: false,
            arrows: false,
            variableWidth: true,
            autoplay: false,
            loop: true,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true,
            autoplaySpeed: 3000,
            speed: 700,
        });
    }

});
</script>
