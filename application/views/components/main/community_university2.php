   <?php
       if (! isset($home_university2_assets)) {
           $home_university2_assets = APPPATH . 'views/frontend/default-new/home_university2_assets.php';
           include $home_university2_assets;

       }
   ?>


   <!-- Creating A Community Area Start -->
   <section>
       <div class="container">
           <div class="row g-28px align-items-center mb-100px">
               <div class="col-xl-5 col-lg-6">
                   <div class="community-banner-2">
                       <img class="builder-editable w-100" builder-identity="10" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-banner-2.webp" alt="">
                   </div>
               </div>
               <div class="col-xl-7 col-lg-6">
                   <div class="ms-xl-3">
                       <h2 class="title-5 fs-32px lh-42px fw-bold mb-30px builder-editable" builder-identity="1"><?php echo get_phrase('Creating A Community Of Life Long Learners') ?></h2>
                       <p class="subtitle-10 fs-15px lh-25px mb-30px builder-editable" builder-identity="2"><?php echo get_phrase('Training programs can bring you a super exciting experience of learning through online! You never face any negative experience
                           while enjoying your classes.') ?></p>
                       <p class="subtitle-10 fs-15px lh-25px mb-30px builder-editable" builder-identity="3"><?php echo get_phrase('Lorem ipsum dolor sit amet, consectetur adipiscing elit negative experience while enjoying your classes. Nunc vulputate ad litora
                           torquent Training programs can bring you a super exciting experience of learning.') ?></p>
                       <div class="row gx-30px gy-30px mb-20px">
                           <div class="col-auto">
                               <div class="d-flex align-items-center gap-12px">
                                   <div class="community-service-banner2">
                                       <img class="builder-editable" builder-identity="4" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item5.svg" alt="">
                                   </div>
                                   <h4 class="title-5 fs-16px lh-22px fw-medium builder-editable" builder-identity="5"><?php echo get_phrase('Flexible Classes') ?></h4>
                               </div>
                           </div>
                           <div class="col-auto">
                               <div class="d-flex align-items-center gap-12px">
                                   <div class="community-service-banner2">
                                       <img class="builder-editable" builder-identity="6" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item6.svg" alt="">
                                   </div>
                                   <h4 class="title-5 fs-16px lh-22px fw-medium builder-editable" builder-identity="7"><?php echo get_phrase('Experienced Teacher service') ?></h4>
                               </div>
                           </div>
                           <div class="col-auto">
                               <div class="d-flex align-items-center gap-12px">
                                   <div class="community-service-banner2">
                                       <img class="builder-editable" builder-identity="8" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/community-item7.svg" alt="">
                                   </div>
                                   <h4 class="title-5 fs-16px lh-22px fw-medium builder-editable" builder-identity="9"><?php echo get_phrase('Learn From Anywhere') ?></h4>
                               </div>
                           </div>
                       </div>
                       <a href="<?php echo site_url('home/courses'); ?>" class="btn btn-danger-1"><?php echo get_phrase('Learn More') ?></a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Creating A Community Area End -->
