   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>

   <!-- Software Development Area Start -->
   <section>
       <div class="container">
           <div class="row row-20 align-items-center mb-100">
               <div class="col-lg-6">
                   <div class="software-development-banner">
                       <img class="builder-editable w-100" builder-identity="1" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/soft-dev-banner.webp" alt="banner">
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="software-development-details">
                       <h2 class="title"><span class="builder-editable" builder-identity="2"><?php echo get_phrase('Leading the Way in Software ') ?></span><span class="highlight builder-editable"
                               builder-identity="3"><?php echo get_phrase('Development') ?></span></h2>
                       <p class="subtitle-10 fs-15px lh-24px mb-20 builder-editable" builder-identity="4"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated they live in
                        Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                       <ul class="dashed-list-items mb-20">
                           <li class="builder-editable" builder-identity="5"><span>- </span><?php echo get_phrase('Education award achived') ?></li>
                           <li class="builder-editable" builder-identity="6"><span>- </span><?php echo get_phrase('Available online courses') ?></li>
                       </ul>
                       <a href="<?php echo site_url('home/courses'); ?>" class="btn-black-arrow1">
                           <span><?php echo get_phrase('Learn More') ?></span>
                           <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="">
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Software Development Area End -->
