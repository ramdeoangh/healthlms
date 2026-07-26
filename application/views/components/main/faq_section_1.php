<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<!---------- Questions Section Start  -------------->
<section class="faq eFaq top-categories pb-100 wow pt-0  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="text-center f-36 mt-0 pt-0 builder-editable" builder-identity="1"><?php echo get_phrase('Frequently Asked Questions') ?></h1>
                <p class="text-center mt-4 mb-24 builder-editable" builder-identity="2"><?php echo get_phrase('Have something to know?') ?>
                    <?php echo get_phrase('Check here if you have any questions about us.') ?></p>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12" data-wow-duration="1000" data-wow-delay="700">
                <div class="faq-accrodion mb-0">
                    <div class="accordion" id="accordionFaq">
                        <?php foreach ($website_faqs as $key => $faq): ?>
                        <?php if ($key > 4) {
                                    break;
                                }
                            ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                                <button class="accordion-button                                                                <?php if ($key != 0) {
                                                                        echo 'collapsed';
                                                                }
                                                                ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>"
                                    aria-expanded="<?php echo $key != 0 ? 'false' : 'true'; ?>true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                                    <?php echo $faq['question']; ?>
                                </button>
                            </h2>
                            <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse<?php echo($key === 0) ? ' show' : ''; ?>"
                                aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
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
    </div>
</section>
<!---------- Questions Section End  -------------->
<?php endif; ?>
