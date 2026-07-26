<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>

<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row gy-30px gx-30px">

            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="category-type3-card">
                    <span class="category-type3-icon">
                        <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                    </span>
                    <h6 class="category-type3-title"><?php echo $category_details['name']; ?></h6>
                    <p class="category-type3-subtitle"><?php echo $top_10_category['course_number'] . ' ' . site_phrase('Courses'); ?></p>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Category Area 3 End -->
<?php endif; ?>
