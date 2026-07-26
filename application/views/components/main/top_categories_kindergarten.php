<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>

<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px">
                    <h2 class="title-3 fs-40px lh-52px fw-medium text-center text-lg-start builder-editable" builder-identity="1"><?php echo get_phrase('Explore Categories') ?></h2>
                    <a href="<?php echo site_url('home/courses') ?>" class="lms2-link-secondary fw-semibold gap-1">
                        <span><?php echo get_phrase('View All') ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
                                fill="#616161" stroke="#616161" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 justify-content-center">

            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>

            <div class="col">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="lms-category-type1">
                    <figure class="category-type1-banner">
                        <img class="banner" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                        <span class="category-type1-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path
                                    d="M16.6663 4.16707V12.5004C16.6663 12.9604 16.2938 13.3337 15.8329 13.3337C15.3721 13.3337 14.9996 12.9604 14.9996 12.5004V6.17879L5.58878 15.5896C5.42628 15.7521 5.21292 15.8337 4.99958 15.8337C4.78625 15.8337 4.57289 15.7521 4.41039 15.5896C4.08456 15.2638 4.08456 14.737 4.41039 14.4112L13.8212 5.00041H7.49958C7.03875 5.00041 6.66625 4.62707 6.66625 4.16707C6.66625 3.70707 7.03875 3.33374 7.49958 3.33374H15.8329C15.9413 3.33374 16.0497 3.35616 16.1513 3.39783C16.3555 3.48199 16.518 3.64451 16.6022 3.84867C16.6447 3.95034 16.6663 4.05874 16.6663 4.16707Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </figure>
                    <h6 class="category-type1-title"><?php echo $category_details['name']; ?></h6>
                </a>
            </div>
            <?php endforeach?>
        </div>
    </div>
</section>
<?php endif?>
