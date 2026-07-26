<!---------- Top Categories Start ------------->
<section class="top-categories h-3-top-categories ">
    <div class="container wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mt-4"><?php echo get_phrase('Top categories') ?></h2>
            </div>
        </div>
        <div class="category-product" >
            <div class="row justify-content-center">
                <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach($top_10_categories as $top_10_category): ?>
                    <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="category-product-body" onclick="redirectTo('<?php echo site_url('home/courses?category='.$category_details['slug']); ?>')">
                            <a href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>">
                                <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                            </a>
                            <h5><?php echo $category_details['name']; ?></h5>
                            <p><?php echo $top_10_category['course_number'].' '.site_phrase('Courses'); ?></p>
                            <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!---------- Top Categories end ------------->