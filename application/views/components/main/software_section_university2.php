   <?php
       if (! isset($home_university2_assets)) {
           $home_university2_assets = APPPATH . 'views/frontend/default-new/home_university2_assets.php';
           include $home_university2_assets;
       }
   ?>
   <!-- Program Area Start -->
   <section>
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="section-title-2 mb-50px">
                       <h1 class="title-5 fs-32px lh-42px fw-bold mb-20px text-center builder-editable" builder-identity="1"><?php echo get_phrase('Our Program') ?></h1>
                       <p class="subtitle-10 fs-15px lh-24px text-center builder-editable" builder-identity="2">
                           <?php echo get_phrase('Awesome site. on the top advertising a business online includes assembling Having the most keep.') ?>
                       </p>
                   </div>
               </div>
           </div>
           <div class="row g-28px mb-100px">
               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="imagebg-btn-card max-sm-350px">
                       <img class="builder-editable w-100" builder-identity="3" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/program-banner1.webp" alt="banner">
                       <a href="<?php echo site_url('home/courses'); ?>" class="card-position-btn1 btn btn-whitelight builder-editable" builder-identity="4"><?php echo get_phrase('Vue-Js') ?></a>
                   </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="imagebg-btn-card max-sm-350px">
                       <img class="builder-editable w-100" builder-identity="5" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/program-banner2.webp" alt="banner">
                       <a href="<?php echo site_url('home/courses'); ?>" class="card-position-btn1 btn btn-whitelight builder-editable" builder-identity="6"><?php echo get_phrase('React-Js') ?></a>
                   </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6">
                   <div class="imagebg-btn-card max-sm-350px">
                       <img class="builder-editable w-100" builder-identity="7" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/program-banner3.webp" alt="banner">
                       <a href="<?php echo site_url('home/courses'); ?>" class="card-position-btn1 btn btn-whitelight builder-editable" builder-identity="8"><?php echo get_phrase('Node-Js') ?></a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Program Area End -->
