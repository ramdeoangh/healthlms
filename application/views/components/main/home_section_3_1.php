<div class="container">
    <div class="h-3-bannar-card wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 sidebar-arrow">
                <div class="h3-banner-card-1">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/analysis.png" alt="">
                    <div class="h3-banner-card-1-text">
                        <?php
                            $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                            $number_of_courses = $status_wise_courses['active']->num_rows();
                        ?>
                        <h5>
                            <a href="#">
                                <?php echo $number_of_courses . ' ' . site_phrase('online_courses'); ?>
                            </a>
                        </h5>
                        <p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 sidebar-arrow">
                <div class="h3-banner-card-1">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/ebook.png" alt="">
                    <div class="h3-banner-card-1-text">
                        <h5>
                            <a href="#">
                                <?php echo site_phrase('expert_instruction'); ?>
                            </a>
                        </h5>
                        <p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 sidebar-arrow">
                <div class="h3-banner-card-1">
                    <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/smartphone.png" alt="">
                    <div class="h3-banner-card-1-text">
                        <h5>
                            <a href="#">
                                <?php echo site_phrase('Smart solution'); ?>
                            </a>
                        </h5>
                        <p><?php echo site_phrase('learn_on_your_schedule'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>