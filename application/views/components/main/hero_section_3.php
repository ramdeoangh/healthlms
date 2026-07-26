<!---------- Banner Section Start ---------------->
<section class="h-1-banner mt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="h-3-banner-text">
                    <?php
                        $banner_title = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <h1 class="animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                        <?php
                        foreach($banner_title_arr as $key => $value){
                            if($key == 1){
                                echo ' <span>'.$value.'</span> ';
                            }else{
                                echo $value.' ';
                            }
                        }
                        ?>
                    </h1>
                    <p class="animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                </div>
                <div class="search-option animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                        <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                    </form>
                </div>
                <div class="students-rating animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                    <div class="row">
                        <div class="col-auto">
                            <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                            <h1><?php echo nice_number($all_students->num_rows()); ?>+</h1>
                            <p><?php echo get_phrase('Happy Students') ?></p>
                        </div>
                        <div class="col-auto ps-4">
                            <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
                            <h1><?php echo nice_number($all_instructor->num_rows()); ?>+</h1>
                            <p><?php echo get_phrase('Experienced Instructors') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 bannar-hide animate__animated  animate__fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                <div class="h-3-banner-image pt-5">
                    <img loading="lazy" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!---------- Banner Section End ---------------->