   <?php
       if (! isset($home_marketplace_assets)) {
           $home_marketplace_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
           include $home_marketplace_assets;

       }
   ?>
   <?php if (get_frontend_settings('faq_section') == 1): ?>
   <?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
   <?php if (count($website_faqs) > 0): ?>
   <!---------- Questions Section Start  -------------->
   <section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
       <div class="container">

           <!-- Section title -->
           <div class="row">
               <div class="col-md-12">
                   <h1 class="title-4 fs-34px lh-44px fw-semibold text-center mb-50px builder-editable" builder-identity="1"><?php echo get_phrase('Frequently Asked Questions') ?></h1>
               </div>
           </div>
           <div class="accordion custom-accordion-two faq-5" id="accordionFaq">

               <?php foreach ($website_faqs as $key => $faq): ?>
               <?php if ($key > 4) {
                       break;
                   }
               ?>
               <div class="accordion-item">
                   <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                       <button
                           class="accordion-button                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <?php if ($key > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           echo 'collapsed';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ?>"
                           type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                           <?php echo $faq['question']; ?>
                       </button>
                   </h2>
                   <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse<?php if ($key == 0) {
        echo 'show';
}
?>" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                       <div class="accordion-body">
                           <p><?php echo nl2br($faq['answer']); ?></p>
                       </div>
                   </div>
               </div>
               <?php endforeach; ?>

           </div>
       </div>
   </section>
   <!---------- Questions Section End  -------------->
   <?php endif; ?>
   <?php endif; ?>
