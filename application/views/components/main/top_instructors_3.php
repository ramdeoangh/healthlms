<!---------  Expert Instructor Start ---------------->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
    <section class="h-3-expert-instructor h-3-courses wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="h-3-expert-instructor-heading">
                        <h1 class="efont"><?php echo get_phrase('Top Instructors') ?></h1>
                        <p class="mb-5"><?php echo get_phrase('They efficiently serve large number of students on our platform') ?></p>
                    </div>
                </div>
            </div>
            <div class="instructor-slider owl-carousel owl-theme">
                <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links  = json_decode($top_instructor['social_links'], true); ?>
                    <div class="h-3-expart-1">
                        <img loading="lazy" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>')" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>">
                        <div class="h-3-expart-1-text">
                            <h4 onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>')"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                            <p class="ms-auto me-auto ellipsis-line-3" style="max-width: 200px;text-align: center;" onclick="redirectTo('<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>')" class="ellipsis-line-2"><?php echo $top_instructor['title']; ?></p>
                            <div class="icon-div-2">
                                <?php if ($social_links['facebook']): ?>
                                    <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($social_links['twitter']): ?>
                                    <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($social_links['linkedin']): ?>
                                    <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!---------  Expert Instructor end ---------------->