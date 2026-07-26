   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>

   <?php $latest_blogs = $this->crud_model->get_latest_blogs(4); ?>
   <?php if ($latest_blogs->num_rows() > 0): ?>
   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="dev-section-title">
                       <h1 class="title mb-20"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('Get News with ') ?></span> <span class="highlight builder-editable"
                               builder-identity="2"><?php echo get_phrase('Academy') ?></span></h1>
                       <p class="subtitle-typo1 fs-16px lms1-text-secondary text-center builder-editable" builder-identity="3">
                           <?php echo get_phrase('The industry standard dummy text ever since the unknown printer took a galley of type and scrambled') ?></p>
                   </div>
               </div>
           </div>
           <div class="row gy-30px gx-30px">

               <?php foreach ($latest_blogs->result_array() as $latest_blog):
                       $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                   $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
               <div class="col-md-6 col-lg-4">
                   <div class="lms3-blog-card">

                       <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms3-bCard-banner">
                           <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                       if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                           $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                   endif; ?>
                           <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">

                       </a>
                       <div class="lms3-bCard-body">
                           <div class="d-flex align-items-start gap-1 flex-wrap mb-12px">
                               <p class="bCard3-author"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></p>
                               <p class="bCard3-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>
                           </div>
                           <div class="d-flex align-items-start column-gap-3 row-gap-2 justify-content-between mb-12px">
                               <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
                                   class="lms3-bCard-title"><?php echo $latest_blog['title']; ?></a>
                               <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms3-bCard-arrow">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                       <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                   </svg>
                               </a>
                           </div>
                           <p class="lms3-bCard-short-des"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>

                       </div>
                   </div>
               </div>
               <?php endforeach; ?>

           </div>
       </div>
   </section>
   <?php endif; ?>
