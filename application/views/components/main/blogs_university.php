   <?php
       if (! isset($home_university2_assets)) {
           $home_university2_assets = APPPATH . 'views/frontend/default-new/home_university2_assets.php';
           include $home_university2_assets;

       }
   ?>

   <?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
   <!------------- Blog Section Start ------------>
   <?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
   <?php if ($latest_blogs->num_rows() > 0): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="d-flex align-items-center column-gap-4 row-gap-3 justify-content-between flex-column flex-lg-row mb-32px">
                       <h2 class="title-1 mb-26px fs-32px lh-36px fw-bold text-center text-lg-start builder-editable" builder-identity="1"><?php echo get_phrase('Popular Post') ?></h2>
                       <a href="<?php echo site_url('blogs') ?>" class="lms1-link-secondary fw-semibold gap-1">
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
           <div class="row gy-30px gx-30px justify-content-center">


               <?php foreach ($latest_blogs->result_array() as $latest_blog):
                       $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                   $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>

               <div class="col-md-10 col-lg-6">
                   <div class="lms4-blog-card">
                       <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms4-bCard-banner">
                           <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                       if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                           $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                   endif; ?>
                           <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">
                       </a>
                       <div class="lms4-bCard-body">
                           <div class="d-flex align-items-center flex-wrap column-gap-3 row-gap-2 mb-10px">
                               <a href="#" class="lms4-bCard-category"><?php echo get_phrase('Innovate') ?></a>
                               <span class="bCard4-category-date-line"></span>
                               <p class="lms4-bCard-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>
                           </div>
                           <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
                               class="lms4-bCard-title mb-4"><?php echo $latest_blog['title']; ?></a>
                           <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms1-link-secondary">
                               <span><?php echo get_phrase('Read More') ?></span>
                               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                   <path
                                       d="M15.9595 9.99927L10.0005 15.9592L9.53174 15.4905L13.8286 11.1868L14.6812 10.3333H3.8335V9.66626H14.6812L13.8286 8.81372L9.53174 4.50806L9.99951 4.04028L15.9595 9.99927Z"
                                       fill="#616161" stroke="#616161"></path>
                               </svg>
                           </a>
                       </div>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </section>
   <?php endif; ?>
   <?php endif; ?>
