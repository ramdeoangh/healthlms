<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}

if (!isset($latest_courses)) {
    $latest_courses = $this->crud_model->get_latest_10_course();
}
?>

<!-- GYM Courses Area Start -->
<section class="dark-body">
    <div class="container">
        <div class="row mb-50px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Special GYM - '); ?> <span class="text-yellow-2"><?php echo get_phrase('Courses'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-50px">
            <div class="col-12">
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <button type="button" data-filter="all" class="btn btn-outline-warning-1 outline-warning-rounded">All</button>

                    <?php if (get_frontend_settings('top_course_section') == 1): ?>
                        <button type="button" data-filter=".popular" class="btn btn-outline-warning-1 outline-warning-rounded">Popular</button>
                    <?php endif; ?>

                    <?php if (get_frontend_settings('latest_course_section') == 1): ?>
                        <button type="button" data-filter=".latest" class="btn btn-outline-warning-1 outline-warning-rounded">Latest</button>
                    <?php endif; ?>

                    <?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
                        <button type="button" data-filter=".upcoming" class="btn btn-outline-warning-1 outline-warning-rounded">Upcoming</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="mixitup row g-4 mb-50px">
            <!-- popular and trending are multiple filter class -->
            <?php if (get_frontend_settings('top_course_section') == 1): ?>
                <?php
                $top_courses = $this->crud_model->get_top_courses()->result_array();
                foreach ($top_courses as $top_course) :
                    $number_of_enrolled_students = $this->crud_model->enrol_history($top_course['id'], true)->num_rows();
                    $lessons = $this->crud_model->get_lessons('course', $top_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                ?>
                    <div class="col-lg-4 col-md-6 mix popular">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
                            <div class="d-grid align-content-evenly gap-3 h-100">
                                <div class="lms-2-card-image position-relative mb-18px mb-auto">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="banner">
                                    <div class="rating-overlay-1 d-flex align-items-center gap-1">
                                        <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                                    </div>
                                </div>
                                <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $top_course['title']; ?></h1>
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
                                        <?php if ($top_course['is_free_course']): ?>
                                            <?php echo get_phrase('Free'); ?>
                                        <?php elseif ($top_course['discount_flag']): ?>
                                            <?php echo currency($top_course['discounted_price']); ?>
                                            <span class="mt-1 text-14px text-secondary"><del><?php echo currency($top_course['price']); ?></del></span>
                                        <?php else: ?>
                                            <?php echo currency($top_course['price']); ?>
                                        <?php endif; ?>
                                    </h2>
                                    <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                        <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                                <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                            </mask>
                                            <g mask="url(#mask0_2_4171)">
                                                <path d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z" fill="white" />
                                            </g>
                                            <path d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_frontend_settings('latest_course_section') == 1): ?>
                <?php foreach ($latest_courses as $latest_course): ?>
                    <?php
                    $number_of_enrolled_students = $this->crud_model->enrol_history($latest_course['id'], true)->num_rows();
                    $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                    ?>
                    <div class="col-lg-4 col-md-6 mix latest">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
                            <div class="d-grid align-content-evenly gap-3 h-100">
                                <div class="lms-2-card-image position-relative mb-18px mb-auto">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>" alt="banner">
                                    <div class="rating-overlay-1 d-flex align-items-center gap-1">
                                        <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                                    </div>
                                </div>
                                <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $latest_course['title']; ?></h1>
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
                                        <?php if ($latest_course['is_free_course']): ?>
                                            <?php echo get_phrase('Free'); ?>
                                        <?php elseif ($latest_course['discount_flag']): ?>
                                            <?php echo currency($latest_course['discounted_price']); ?>
                                            <span class="mt-1 text-14px text-secondary"><del><?php echo currency($latest_course['price']); ?></del></span>
                                        <?php else: ?>
                                            <?php echo currency($latest_course['price']); ?>
                                        <?php endif; ?>
                                    </h2>
                                    <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                        <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                                <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                            </mask>
                                            <g mask="url(#mask0_2_4171)">
                                                <path d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z" fill="white" />
                                            </g>
                                            <path d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_frontend_settings('upcoming_course_section') == 1): ?>
                <?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(10)->get_where('course', ['status' => 'upcoming'])->result_array(); ?>
                <?php foreach ($upcoming_courses as $upcoming_course): ?>
                    <?php
                    $number_of_enrolled_students = $this->crud_model->enrol_history($upcoming_course['id'], true)->num_rows();
                    $lessons = $this->crud_model->get_lessons('course', $upcoming_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $upcoming_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $upcoming_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                    ?>
                    <div class="col-lg-4 col-md-6 mix upcoming">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="lms-2-card p-20px d-block h-100">
                            <div class="d-grid align-content-evenly gap-3 h-100">
                                <div class="lms-2-card-image position-relative mb-18px mb-auto">
                                    <img src="<?php echo $this->crud_model->get_course_thumbnail_url($upcoming_course['id']); ?>" alt="banner">
                                    <div class="rating-overlay-1 d-flex align-items-center gap-1">
                                        <p class="subtitle-7 fw-semibold"><?php echo $average_ceil_rating; ?></p>
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-yellow-17.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center row-gap-2 column-gap-4 flex-wrap mb-6px">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/user-yellow-16.svg" alt="icon">
                                        <p class="subtitle-3 fs-15px lh-30px text-white"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                                    </div>
                                </div>
                                <h1 class="title-6 fs-4 fw-medium lh-35px mb-20px"><?php echo $upcoming_course['title']; ?></h1>
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <h2 class="title-6 fs-4 fw-medium lh-35px text-yellow-2">
                                        <?php if ($upcoming_course['is_free_course']): ?>
                                            <?php echo get_phrase('Free'); ?>
                                        <?php elseif ($upcoming_course['discount_flag']): ?>
                                            <?php echo currency($upcoming_course['discounted_price']); ?>
                                            <span class="mt-1 text-14px text-secondary"><del><?php echo currency($upcoming_course['price']); ?></del></span>
                                        <?php else: ?>
                                            <?php echo currency($upcoming_course['price']); ?>
                                        <?php endif; ?>
                                    </h2>
                                    <div class="d-flex align-items-center gap-2 lms-link-icontext1">
                                        <p class="subtitle-7 fs-15px lh-25px"><?php echo get_phrase('Learn More'); ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <mask id="mask0_2_4171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="6" y="0" width="10" height="17">
                                                <path d="M15.9494 0.183594H6.29736V16.1836H15.9494V0.183594Z" fill="white" />
                                            </mask>
                                            <g mask="url(#mask0_2_4171)">
                                                <path d="M8.2238 12.2663C7.87699 12.6036 7.87699 13.1524 8.2238 13.4897C8.38839 13.6498 8.61175 13.7413 8.84688 13.7413C9.082 13.7413 9.30537 13.6498 9.46995 13.4897L14.3253 8.76758C14.6662 8.43028 14.6662 7.88718 14.3253 7.54988L9.46995 2.82772C9.30537 2.66764 9.082 2.57617 8.84688 2.57617C8.61175 2.57617 8.38839 2.66764 8.21792 2.82772C7.87112 3.1593 7.86524 3.69668 8.20617 4.03398L8.21792 4.04542L12.4384 8.15587L8.21792 12.2606L8.2238 12.2663Z" fill="white" />
                                            </g>
                                            <path d="M1.29736 7.18359C0.745078 7.18359 0.297363 7.63131 0.297363 8.18359C0.297363 8.73588 0.745079 9.18359 1.29736 9.18359L1.29736 7.18359ZM1.29736 9.18359L13.2974 9.18359L13.2974 7.18359L1.29736 7.18359L1.29736 9.18359Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row mb-120px">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a href="<?php echo site_url('home/courses'); ?>" class="btn btn-warning-1"><?php echo get_phrase('View All Courses'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- GYM Courses Area End -->