<style>
    .eImage span {
        width: auto !important;
    }

    .course-item-one .content .title {
        display: -webkit-box !important;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>

<!-- Start Upcoming Courses -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if ($upcoming_courses->num_rows() > 0): ?>
    <section class="pb-100 eUpcomingCourse ">
        <div class="container">
            <div class="row mb-4 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="300">
                <div class="col-lg-12">
                    <div class="title-one text-center">
                        <h4 class="title"><?php echo get_phrase('Explore our upcoming courses'); ?></h4>
                        <p><?php echo get_phrase('Discover a world of learning opportunities through our upcoming courses') ?></p>
                    </div>
                </div>

            </div>
            <div class="row wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="500">
                <div class="col-lg-12">
                    <!-- Items -->
                    <div class="row g-3">
                        <?php
                        foreach ($upcoming_courses->result_array() as $upcoming_course):
                            $instructor_details = $this->user_model->get_all_user($upcoming_course['creator'])->row_array();
                            $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($upcoming_course['id']);
                            $lessons = $this->crud_model->get_lessons('course', $upcoming_course['id']);
                        ?>
                            <?php
                            $image_url = $upcoming_course['upcoming_image_thumbnail']
                                ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail']
                                : 'uploads/thumbnails/course_thumbnails/placeholder.png';
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6    " data-wow-duration="500" data-wow-delay="300">
                                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" id="top_course_<?php echo $upcoming_course['id']; ?>" class="course-item-one" style="background: url('<?php echo $image_url; ?>') no-repeat center center; background-size: cover;">
                                    <div class="ePosition">
                                        <div class="eImage d-flex">
                                            <span class="px-3"><?php
                                                                echo $this->db->where('id', $upcoming_course['sub_category_id'])->get('category')->row('name');
                                                                ?></span>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']); ?>" alt="" />
                                        <h4 class="title pb-0"><?php echo $upcoming_course['title']; ?></h4>
                                        <p class="info ellipsis-line-2 fw-400">
                                            <?php if ($upcoming_course['publish_date']) echo get_phrase('Release On') . ' : ' . date('j', strtotime($upcoming_course['publish_date'])) . ' ' . get_phrase(date('F', strtotime($upcoming_course['publish_date']))) . ' ' . date('Y', strtotime($upcoming_course['publish_date'])); ?>
                                        </p>

                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- End Upcoming Courses -->