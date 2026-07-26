<!-- Start Review Section -->
<section class="expert-instructor top-categories pb-100 pt-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
                <h1 class="text-center f-36 mt-0 pt-0 builder-editable" builder-identity="1"><?php echo get_phrase('What the people Thinks About Us'); ?></h1>
                <p class="text-center mt-4 mb-30 builder-editable" builder-identity="2">
                    <?php echo get_phrase('It highlights feedback and testimonials from users, reflecting their experiences and satisfaction.') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="course-group-slider  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
            <?php
                $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                foreach ($reviews as $review):
                    $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                ?>
            <div class="elegant-testimonial-slide">
                <div class="ele-testimonial-profile-area d-flex">
                    <div class="profile">
                        <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="">
                    </div>
                    <div class="ele-testimonial-profile-name">
                        <h6 class="name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h6>
                        <p class="time"><?php echo date('h:i A', $review->date_added); ?></p>
                        <ul class="rating d-flex align-items-center">
                            <?php
                                        for ($i = 1; $i <= 5; $i++):
                                            if ($i <= $review->rating):
                                        ?>
                            <li><i class="fas fa-star"></i></li>
                            <?php else: ?>
                            <li class="thin"><i class="far fa-star"></i></li>
                            <?php
                                    endif;
                                    endfor;
                                ?>
                        </ul>
                    </div>
                </div>
                <p class="review fw-400"><?php echo $review->review; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Review Section -->
