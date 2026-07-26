<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
<?php if (count($motivational_speechs) > 0): ?>
<!---------  Motivetional Speech Start ---------------->
<section class="expert-instructor top-categories pb-100 pt-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="500">
                <h1 class="text-center f-36 mt-0 pt-0 builder-editable" builder-identity="1"><?php echo get_phrase('Think more clearly'); ?></h1>
                <p class="text-center mt-4 mb-30 builder-editable" builder-identity="2"><?php echo get_phrase('Gather your thoughts, and make your decisions clearly') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <ul class="speech-items">
            <?php $counter = 0; ?>
            <?php foreach ($motivational_speechs as $key => $motivational_speech): ?>
            <?php $counter++; ?>

            <li class="e_border">
                <div class="Espeech-item">
                    <div class="row  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="700">

                        <div class="col-md-1 col-2">
                            <div class="speech-item-content Nspeech">
                                <p class="no"><?php echo $counter; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12  order-2 order-md-1">
                            <div class="speech-item-content Nspeech2">
                                <div class="inner">
                                    <h4 class="title">
                                        <?php echo $motivational_speech['title']; ?>
                                    </h4>
                                    <p class="info">
                                        <?php echo nl2br($motivational_speech['description']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-10 order-1 order-md-1">
                            <div class="speech-item-img">
                                <img loading="lazy" src="<?php echo site_url('uploads/system/motivations/' . $motivational_speech['image']) ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<!---------  Motivetional Speech end ---------------->
<?php endif; ?>
