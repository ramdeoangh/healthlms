<!---------- Banner Section Start ---------------->
<section class="h-1-banner bannar-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 order-2 order-lg-1">
                <div class="h-1-banner-text EbannerLeft position-relative">
                <?php
                    $banner_title = site_phrase(get_frontend_settings('banner_title'));
                    $banner_title_arr = explode(' ', $banner_title);
                ?>
                <h1 class=" animate__animated animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                    <?php
                    foreach($banner_title_arr as $key => $value){
                        if ($key == 1) { 
                            echo $value . '<br>';
                        } elseif ($key == count($banner_title_arr) - 1) { 
                            echo '<span class="d-inline-block">'.$value.'</span>';
                        } else {
                            echo $value . ' ';
                        }
                    }
                    ?>
                </h1>
                    <div class="EbannerTop  animate__animated  animate__fadeInUp opacityOnUp drop-area" data-wow-duration="1000" data-wow-delay="500">
                       <p class="builder-editable" builder-identity="12"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                       <div class="search-option mb-0">
                            <form action="<?php echo site_url('home/search'); ?>" method="get">
                                <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                                <button class="submit-cls" type="submit">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.58439 17.5017C13.9566 17.5017 17.5011 13.9573 17.5011 9.585C17.5011 5.21275 13.9566 1.66833 9.58439 1.66833C5.21214 1.66833 1.66772 5.21275 1.66772 9.585C1.66772 13.9573 5.21214 17.5017 9.58439 17.5017Z" stroke="#1E293B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.892 18.7769C18.1361 19.021 18.5318 19.021 18.7759 18.7769C19.02 18.5328 19.02 18.1371 18.7759 17.893L17.892 18.7769ZM16.2759 15.393L15.834 14.9511L14.9501 15.835L15.392 16.2769L16.2759 15.393ZM18.7759 17.893L16.2759 15.393L15.392 16.2769L17.892 18.7769L18.7759 17.893Z" fill="#1E293B"/>
                                    </svg>
                                    </button>
                            </form>
                        </div>
                    </div>

                   <div class="eCircle_parent">
                       <div class="eCircle  animate__animated  animate__fadeInRightBig" data-wow-duration="1000" data-wow-delay="500">
                            <span class="circleOne"><img class="builder-editable" builder-identity="10" src="<?php echo base_url("assets/frontend/default-new/image/circle1.png"); ?>" alt=""></span>
                            <span class="cirlceTwo"><img class="builder-editable" builder-identity="11" src="<?php echo base_url("assets/frontend/default-new/image/circle2.png"); ?>" alt=""></span>
                        </div>
                   </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-12 order-md-2 order-1  order-lg-1 pt-0 pt-md-5 ">
                 <div class="EbannerRight">
                    <div class="Ebanner  animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                       <img class="builder-editable" builder-identity="13" loading="lazy" width="100%" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>">
                    </div>
                 </div>
            </div>
        </div> 
        <div class="bannar-card  Ebaner-card wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="400">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 arrow-side">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                                <img class="builder-editable" builder-identity="1" src="<?php echo base_url('assets/frontend/default-new/image/h1.svg')?>">
                            </div>
                            <div class="col-lg-10 drop-area">
                                <h6 class="builder-editable" builder-identity="2"><?php echo site_phrase('expert_instruction'); ?></h6>
                                <p class="builder-editable" builder-identity="3"><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 arrow-side">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                               <img class="builder-editable" builder-identity="4" loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h2.svg')?>">
                            </div>
                           
                            <div class="col-lg-10 drop-area">
                                <h6><?php
                                    $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                                    $number_of_courses = $status_wise_courses['active']->num_rows();
                                    echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h6>
                                <p class="builder-editable" builder-identity="6"><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 arrow-side">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                            <img class="builder-editable" builder-identity="7" loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h3.svg')?>">
                            </div>
                            <div class="col-lg-10 drop-area">
                                <h6 class="builder-editable" builder-identity="8"><?php echo site_phrase('Lifetime access'); ?></h6>
                                <p class="builder-editable" builder-identity="9"><?php echo site_phrase('learn_on_your_schedule'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</section>
<!---------- Banner Section End ---------------->