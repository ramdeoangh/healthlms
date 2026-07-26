   <?php
       if (! isset($home_marketplace_assets)) {
           $home_marketplace_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
           include $home_marketplace_assets;

       }
   ?>

   <!-- Subscribe Area Start -->
   <section>
       <div class="container">
           <div class="subscribe-area-wrap1 mb-100px">
               <div class="row">
                   <div class="col-lg-5">
                       <div class="subscribe-area-banner1">
                           <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/subscribe-banner1.webp" alt="banner">
                       </div>
                   </div>
                   <div class="col-lg-7">
                       <div class="subscribe-area-1">
                           <h3 class="title-4 fs-28px lh-36px fw-bold text-center text-white mb-14px builder-editable" builder-identity="1">
                               <?php echo get_phrase('Subscribe to our newsletter to get updates to our latest collections') ?>
                           </h3>
                           <form class="ajaxForm resetable mb-12px" action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>" method="post" id="newsletter-form">
                               <div class="subscribe-form-inner d-flex align-items-center justify-content-center">
                                   <input type="email" name="email" class="form-control sub1-form-control" id="subscribe_email" placeholder="<?php echo get_phrase('Email address'); ?>">
                                   <button type="submit" class="btn btn-white1 btn-white1-sm"><?php echo get_phrase('Subscribe') ?></button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Subscribe Area End -->
