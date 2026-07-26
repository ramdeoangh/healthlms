<!---------- Top Categories Start ------------->
<section class="top-categories pb-100 pt-0">
    <div class="container">
        <div class="row wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="500" data-wow-delay="400">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center f-36"><?php echo site_phrase('top_categories'); ?></h1>
                <p class="text-center mt-4"><?php echo site_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide')?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="category-product mt-2 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
            <div class="row justify-content-center">
                <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach($top_10_categories as $top_10_category): ?>
                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 wow  animate__animated animate__fadeIn" data-wow-duration="1000" data-wow-delay="600">
                        <a href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>" class="category-product-body position-relative eCategory d-flex">
                        <?php
                            // Generate random colors
                            $textColor = '#' . rand(100000, 999999);
                            // $bgColor = '#' . rand(100000, 999999);
                            ?>
                             <?php if($category_details['sub_category_thumbnail']):?>
                                <div class="cate-image">
                                   <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' .$category_details['sub_category_thumbnail']); ?>" alt="">
                                 </div>
                               <?php else:?>
                                <div class="cate-icon"  style="color: <?php echo $textColor; ?>;">
                                    <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                                </div>
                             <?php endif;?>
                          
                            <!-- <span class="category-hide-icon"><i class="fa-solid fa-angle-right"></i></span> -->
                            <div class="eText">
                                 <h5 class="pt-0"> <?php echo $category_details['name']; ?></h5>
                                 <p class="hide-cat-text"><?php echo $top_10_category['course_number'].' '.site_phrase('courses'); ?></p>
                            </div>
                         </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!---------- Top Categories end ------------->