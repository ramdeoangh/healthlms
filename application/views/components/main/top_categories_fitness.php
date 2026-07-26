<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}
?>
<!-- Program Area Start -->
    <section class="fitness-program-section dark-body">
        <div class="container">
            <div class="row mb-50px">
                <div class="col-12">
                    <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Select Your Needs'); ?></h1>
                </div>
            </div>
            <div class="row g-28px mb-100px">
                <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach ($top_10_categories as $top_10_category): ?>
                    <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <?php $category_total_courses = $this->db->where('sub_category_id', $top_10_category['sub_category_id'])->get('course'); ?>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="d-block lms-2-card max-sml-350px-auto">
                            <div class="lms-2-card-image mb-14px">
                                <?php if ($category_details['sub_category_thumbnail'] && file_exists('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail'])): ?>
                                    <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>uploads/thumbnails/category_thumbnails/category-thumbnail.png" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="mb-2px d-flex align-items-center justify-content-between gap-1">
                                <div>
                                    <p class="subtitle-7 mb-1 fw-semibold"><?php echo $category_details['name']; ?></p>
                                    <p class="subtitle-3 fw-medium fs-15px text-yellow-2 lh-23px"><?php echo $category_total_courses->num_rows(); ?> <?php echo get_phrase('Courses'); ?></p>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-top-right-yellow-22.svg" alt="icon">
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- Program Area End -->