<?php
if (!isset($home_elegant_assets)) {
    $home_elegant_assets = APPPATH . 'views/frontend/default-new/home_elegant_assets.php';
    include $home_elegant_assets;
}
?>

<!-- Start latest Course -->
    <section>
        <div class="container mb-80">
            <!-- Section title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="home1-section-title">
                        <h1 class="title mb-20"><?php echo get_phrase('Top Courses'); ?></h1>
                        <p class="info"><?php echo get_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide'); ?></p>
                    </div>
                </div>
            </div>
            <!-- Courses -->
            <div class="row row-20 mb-30">
                <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                foreach ($top_courses as $key => $top_course) :
                    if ($key == 8) break;
                    $instructor_details = $this->user_model->get_all_user($top_course['creator'])->row_array();
                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']);
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
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" class="course-card1-link">
                            <div class="course-card1-inner">
                                <div class="banner">
                                    <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="" />
                                </div>
                                <div class="course-card1-details">
                                    <div class="rating-reviews d-flex align-items-center flex-wrap">
                                        <div class="rating d-flex align-items-center">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                    <img src="<?php echo base_url('assets/frontend/default-new/image/icons/star-yellow-14.svg'); ?>" alt="">
                                                <?php else : ?>
                                                    <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/star-gray-17.svg" alt="">
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <p class="reviews mt-1">(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews'); ?>)</p>
                                    </div>
                                    <div class="title-info">
                                        <h4 class="title"><?php echo $top_course['title']; ?></h4>
                                        <p class="info ellipsis-line-2"><?php echo $top_course['short_description']; ?></p>
                                    </div>

                                    <div class="course-card1-leasons-students d-flex align-items-center flex-wrap">
                                        <div class="leasons-students d-flex align-items-center">
                                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/book-open-16.svg" alt="">
                                            <p class="total"><?php echo $lessons->num_rows(); ?> <?php echo get_phrase('Lessons'); ?></p>
                                        </div>
                                        <div class="leasons-students d-flex align-items-center">
                                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/users-16.svg" alt="">
                                            <p class="total"><?php echo $number_of_enrolled_students; ?> <?php echo get_phrase('Enrolled'); ?></p>
                                        </div>
                                    </div>

                                    <div
                                        class="course-card1-author-price d-flex align-items-center justify-content-between">
                                        <div class="author d-flex align-items-center">
                                            <div class="profile">
                                                <img src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="">
                                            </div>
                                            <p class="name"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></p>
                                        </div>
                                        <div class="prices">
                                            <?php if ($top_course['is_free_course']): ?>
                                                <p class="new-price"><?php echo get_phrase('Free'); ?></p>
                                            <?php elseif (!$top_course['discount_flag']): ?>
                                                <p class="new-price"><?php echo currency($top_course['price']); ?></p>
                                            <?php else: ?>
                                                <p class="old-price"><?php echo currency($top_course['price']); ?></p>
                                                <p class="new-price"><?php echo currency($top_course['discounted_price']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-purple my-5"><?php echo get_phrase('view_all_courses'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest Course -->