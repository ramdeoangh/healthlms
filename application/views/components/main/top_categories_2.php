<!---------- Top Categories Start ------------->
<section class="courses h-2-courses pb-2 pt-2  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center mt-4"><?php echo site_phrase('top_categories'); ?></h1>
                <p class="text-center mt-4 mb-4"><?php echo site_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="h-2-top-full">
            <div class="row justify-content-center">
                <?php $top_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach ($top_categories as $top_category): ?>
                    <?php $category_details = $this->crud_model->get_category_details_by_id($top_category['sub_category_id'])->row_array(); ?>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 mb-3">
                        <div class="h-2-top-body" onclick="redirectTo('<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>')">
                            <div class="h-2-top">
                                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" style="color: #<?php echo rand(100000, 999999); ?>">
                                    <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                                </a>
                            </div>
                            <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>"><?php echo $category_details['name']; ?></a>
                            <p><?php echo $top_category['course_number'] . ' ' . site_phrase('Courses'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
<!---------- Top Categories end ------------->