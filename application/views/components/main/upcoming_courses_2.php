<style>
    .ellipsis-line-1 {
        display: -webkit-box!important; 
        -webkit-line-clamp: 1; 
        -webkit-box-orient: vertical; 
        overflow: hidden; 
        text-overflow: ellipsis; 
        white-space: normal
    }
    .course-item-one .content .title:has(~ .info) {
        padding-bottom: 5px;
    }
</style>

<!-- Start Upcoming Courses -->
<?php if (!isset($upcoming_courses)): ?>
    <?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php endif; ?>

<?php if ($upcoming_courses->num_rows() > 0): ?>
    <section class="pt-100 pb-50  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="title-one pb-20">
                        <p class="subtitle text-uppercase"><?php echo get_phrase('Upcoming'); ?></p>
                        <h4 class="title"><?php echo get_phrase('Upcoming courses'); ?></h4>
                        <div class="bar"></div>
                    </div>
                    <p class="fz_15_m_24"><?php echo get_phrase('Discover a world of learning opportunities through our upcoming courses, where industry experts and thought leaders will guide you in acquiring new expertise, expanding your horizons, and reaching your full potential.') ?></p>
                </div>
                <div class="col-lg-8">
                    <!-- Items -->
                    <div class="row g-3">
                        <?php
                        foreach ($upcoming_courses->result_array() as $upcoming_course):
                            $image_url = $upcoming_course['upcoming_image_thumbnail']
                                ? 'uploads/thumbnails/upcoming_thumbnails/' . $upcoming_course['upcoming_image_thumbnail']
                                : 'uploads/thumbnails/course_thumbnails/placeholder.png';
                        ?>
                            <div class="col-lg-4">
                                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" class="course-item-one">
                                    <div class="img-rating">
                                        <div class="img"><img loading="lazy" src="<?php echo $image_url; ?>" alt="" /></div>
                                        <!-- <p class="date">Sep<span>12</span></p> -->
                                    </div>
                                    <div class="content">
                                        <h4 class="title ellipsis-line-1"><?php echo $upcoming_course['title']; ?></h4>
                                        <p class="info"><?php
                                                        if ($upcoming_course['publish_date']) {
                                                            echo get_phrase('Release On') . ' : ' . date('j F Y', strtotime($upcoming_course['publish_date']));
                                                        }
                                                        ?></p>
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