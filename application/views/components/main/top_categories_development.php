   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>

   <?php if (get_frontend_settings('top_category_section') == 1): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex dev-section-title-category align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px dev-categories-section-title">
                       <h2 class="title text-lg-start"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('Explore ') ?></span><span class="highlight builder-editable"
                               builder-identity="2"><?php echo get_phrase('Categories') ?></span></h2>

                       <a href="<?php echo site_url('home/courses') ?>" class="lms1-link-secondary fw-semibold gap-1">
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
                   <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="lms-category-type2">
                       <figure class="category-type2-banner">
                           <img class="banner" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['sub_category_thumbnail']); ?>" alt="">
                       </figure>
                       <h6 class="category-type2-title"><?php echo $category_details['name']; ?></h6>
                   </a>
               </div>
               <?php endforeach; ?>

           </div>
       </div>
   </section>
   <?php endif?>
