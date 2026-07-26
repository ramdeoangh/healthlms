<style>
.ellipsis-line-1 {
    display: -webkit-box !important;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal
}

.upcoming-course-six-content .content .title {
    padding-bottom: 5px;
}

.upcoming-course-six-content .info {
    color: #909090;
    padding-bottom: 20px;
}

</style>
<!-- Start Upcoming Course -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if ($upcoming_courses->num_rows() > 0): ?>
<section class="featured-course pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title builder-editable" builder-identity="1"><?php echo get_phrase('Upcoming Coursess'); ?></h4>
                    <p class="info builder-editable" builder-identity="2"><?php echo get_phrase('Unlock new expertise with industry experts and thought leaders in our upcoming courses.') ?></p>
                </div>
            </div>
        </div>
        <!-- Items -->
        <ul class="upcoming-course-list-six">
            <?php
                foreach ($upcoming_courses->result_array() as $upcoming_course):
                    $instructor_details = $this->user_model->get_all_user($upcoming_course['creator'])->row_array();
                    $course_duration    = $this->crud_model->get_total_duration_of_lesson_by_course_id($upcoming_course['id']);
                    $lessons            = $this->crud_model->get_lessons('course', $upcoming_course['id']);

                    $image_url = $upcoming_course['upcoming_image_thumbnail']
                        ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail']
                        : 'uploads/thumbnails/course_thumbnails/placeholder.png';
                ?>
            <li>
                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="upcoming-course-six">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="upcoming-course-six-content">
                                <div class="img"><img loading="lazy" src="<?php echo $image_url; ?>" alt="" /></div>
                                <div class="content">
                                    <h4 class="title ellipsis-line-1"><?php echo $upcoming_course['title']; ?></h4>
                                    <p class="info"><?php
                                                                if ($upcoming_course['publish_date']) {
                                                                    echo get_phrase('Release On') . ' : ' . date('j F Y', strtotime($upcoming_course['publish_date']));
                                                            }
                                                            ?></p>
                                    <div class="user" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $instructor_details['id']) ?>')">
                                        <div class="img">
                                            <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
                                        </div>
                                        <h4 class="name">
                                            <?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="upcoming-course-six-info">
                                <div class="item">
                                    <p class="subtitle"><?php echo get_phrase('Lesson') ?></p>
                                    <p class="title"><?php echo $lessons->num_rows(); ?></p>
                                </div>
                                <div class="item">
                                    <p class="subtitle"><?php echo get_phrase('Duration') ?></p>
                                    <p class="title"><?php echo $course_duration; ?></p>
                                </div>
                                <div class="item">
                                    <p class="subtitle"><?php echo get_phrase('Price'); ?></p>
                                    <p class="title price d-flex align-items-center">
                                        <?php if ($upcoming_course['is_free_course']): ?>
                                        <?php echo get_phrase('Free'); ?>
                                        <?php elseif ($upcoming_course['discount_flag']): ?>
                                        <?php echo currency($upcoming_course['discounted_price']); ?>
                                        <del class="ms-1 text-12px"><?php echo currency($upcoming_course['price']); ?></del>
                                        <?php else: ?>
                                        <?php echo currency($upcoming_course['price']); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<!-- End Upcoming Course -->
