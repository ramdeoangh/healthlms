<!---------  Expert Instructor Start ---------------->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if(count($top_instructor_ids) > 0): ?>
<section class="courses h-2-courses  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
    <div class="conntainer">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="text-center mt-5"><?php echo get_phrase('Top Instructors') ?></h1>
                <p class="text-center mt-4 mb-4"><?php echo get_phrase('They efficiently serve large number of students on our platform') ?></p>
            </div>
        </div>
        <div class="container">
            <div class="h-2-instructor eInstructor2">
                <div class="row justify-content-center">
                    <?php foreach($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links  = json_decode($top_instructor['social_links'], true); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="h-2-instructor-full">
                                <div class="h-2-instructor-image">
                                    <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt="">
                                    <div class="icon">
                                       <?php if($social_links['facebook']): ?>
                                            <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($social_links['twitter']): ?>
                                            <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($social_links['linkedin']): ?>
                                            <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="h-2-instructor-text">
                                    <a class="text-muted" href="<?php echo site_url('home/instructor_page/'.$top_instructor['id']); ?>">
                                        <h3><?php echo $top_instructor['first_name'].' '.$top_instructor['last_name']; ?></h3>
                                        <p class="ellipsis-line-2 px-3"><?php echo $top_instructor['title']; ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>   
    </div>
</section>
<?php endif; ?>
<!---------  Expert Instructor end ---------------->