<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
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
                <div class="section-title-1 mb-50px">
                    <h1 class="title-3 mb-26px fs-40px lh-52px fw-medium text-center builder-editable" builder-identity="1"><?php echo get_phrase('Frequently Asked Questions') ?></h1>
                    <p class="subtitle-typo1 fs-16px lms1-text-secondary lh-24px text-center builder-editable" builder-identity="2">
                        <?php echo get_phrase('Awesome site. on the top advertising a business online includes assembling Having the most keep.') ?></p>
                </div>
            </div>
        </div>
        <div class="two-accordion-wrap">
            <div class="row mb-100px">
                <div class="accordion qnaaccordion-three" id="accordionExample2">

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
                    <a href="<?php echo site_url('home/faq') ?>" class="btn btn-primary mt-5"><?php echo get_phrase('See More'); ?></a>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- QNA Course Area End -->
<?php endif; ?>
<?php endif; ?>
