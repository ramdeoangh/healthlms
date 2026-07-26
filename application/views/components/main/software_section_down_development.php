   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>

   <!-- Programming Ebook Area Start -->
   <section class="programming-ebook-section mb-110">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="programming-ebook-area d-flex align-items-center justify-content-between">
                       <div class="programming-ebook-banner">
                           <img class="builder-editable w-100" builder-identity="1" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/programming-ebook-banner.webp" alt="banner">

                       </div>
                       <div class="programming-ebook-details">
                           <h2 class="title"><span class="builder-editable" builder-identity="2"><?php echo get_phrase('Download Our Free Programming Ebook From ') ?></span><span
                                   class="highlight builder-editable" builder-identity="3"><?php echo get_phrase('Academy') ?></span></h2>
                           <p class="subtitle-10 fs-15px lh-24px mb-30 builder-editable" builder-identity="4">
                               <?php echo get_phrase('The industry standard dummy text ever since the  unknown printer took a galley of type and scrambled') ?></p>
                           <a href="<?php echo site_url('home/courses'); ?>" class="btn-black-arrow1">
                               <span class="builder-editable" builder-identity="5"><?php echo get_phrase('Download Now') ?></span>
                               <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="banner">
                           </a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Programming Ebook Area End -->
