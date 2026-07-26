<!-- Start FAQs -->
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="pb-50">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="title-two">
                        <h4 class="title builder-editable" builder-identity="1"><?php echo get_phrase('Frequently Asked Questions') ?></h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="title-two">
                        <p class="info builder-editable" builder-identity="2"><?php echo get_phrase('Have something to know?') ?>
                            <?php echo get_phrase('Check here if you have any questions about us.') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faqs -->
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion custom-accordion-two faq-6" id="accordionFaq">
                    <?php foreach ($website_faqs as $key => $faq): ?>
                    <?php if ($key > 4) {
                            break;
                        }
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                            <button class="accordion-button                                                                                                           <?php if ($key > 0) {
                                                                                                                   echo 'collapsed';
                                                                                                           }
                                                                                                           ?>" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
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
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End FAQs -->
