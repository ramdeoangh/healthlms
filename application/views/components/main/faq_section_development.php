   <?php
       if (! isset($home_development_assets)) {
           $home_development_assets = APPPATH . 'views/frontend/default-new/home_development_assets.php';
           include $home_development_assets;

       }
   ?>


   <?php if (get_frontend_settings('faq_section') == 1): ?>
   <?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
   <?php if (count($website_faqs) > 0): ?>
   <!-- QNA Area Start -->
   <section>
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="dev-section-title">
                       <h1 class="title"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('Frequently Asked ') ?></span> <span class="highlight builder-editable"
                               builder-identity="2"><?php echo get_phrase('Questions') ?></span></h1>
                   </div>
               </div>
           </div>
           <div class="two-accordion-wrap">
               <div class="row mb-100px">
                   <div class="accordion qna-three-accordion" id="accordionExample2">

                       <?php foreach ($website_faqs as $key => $faq): ?>
                       <?php if ($key > 4) {
                               break;
                           }
                       ?>
                       <div class="accordion-item">
                           <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true"
                                   aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                                   <?php echo $faq['question']; ?>
                               </button>
                           </h2>
                           <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                               <div class="accordion-body">
                                   <p><?php echo nl2br($faq['answer']); ?></p>
                               </div>
                           </div>
                       </div>
                       <?php endforeach; ?>
                       <?php if (count($website_faqs) > 5): ?>
                       <a href="<?php echo site_url('home/faq') ?>" class="btn-black-arrow1 mt-5">
                           <span><?php echo get_phrase('See More') ?></span>
                           <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-white-20.svg" alt="">
                       </a>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- QNA Course Area End -->
   <?php endif; ?>
   <?php endif; ?>
