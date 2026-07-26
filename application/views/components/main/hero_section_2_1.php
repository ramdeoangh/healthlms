<section class="world-class mb-0 ">
    <div class="container">
        <div class="world-class-content">
            <div class="row wow animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                <div class="col-lg-3">
                    <h1>
                        <?php
                        $we_provides = explode(' ', get_phrase('We Provides you World Class Performance'));
                        foreach($we_provides as $key => $value){
                            if($key == 0){
                                echo '<span>'.$value.'</span>';
                            }else{
                                echo ' '.$value;
                            }
                        }
                        ?>
                        <span>.</span>
                    </h1>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-1">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/1.png" alt="">
                        </div>
                        <?php
                            $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                            $number_of_courses = $status_wise_courses['active']->num_rows();
                        ?>
                        <h4><?php echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h4>
                        <h6><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></h6>
                    </div>  
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-2">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/2.png" alt="">
                        </div>
                        <h4><?php echo site_phrase('expert_instruction'); ?></h4>
                        <h6><?php echo site_phrase('find_the_right_course_for_you'); ?></h6>
                    </div>                        
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-3">
                            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/'); ?>image/3.png" alt="">
                        </div>
                        <h4><?php echo site_phrase('Smart solution'); ?></h4>
                        <h6><?php echo site_phrase('learn_on_your_schedule'); ?></h6>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</section>