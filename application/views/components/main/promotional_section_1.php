<!------------- Become Students Section start --------->
<section class="student py-5 pt-0">
    <div class="container">
        <div class="row eStudent">
            <div class="col-lg-6  <?php if (get_settings('allow_instructor') != 1) echo 'w-100'; ?> wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="650">
                <div class="student-body-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="student-body-text">
                                <!-- <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/2.png') ?>"> -->
                                <h1><?php echo site_phrase('join_now_to_start_learning'); ?></h1>
                                <p><?php echo site_phrase('Learn from our quality instructors!') ?> </p>
                                <?php if (get_settings('public_signup') == 'enable'): ?>
                                    <a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 ">
                            <!-- <img loading="lazy" class="man" src="<?php echo base_url('assets/frontend/default-new/image/instractorN.png') ?>"> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php if (get_settings('allow_instructor') == 1) : ?>
                <div class="col-lg-6  wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="700">
                    <div class="student-body-2">
                        <div class="row">
                            <div class="col-lg-8  col-md-8 col-sm-12">
                                <div class="student-body-text">
                                    <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/2.png') ?>">
                                    <h1><?php echo site_phrase('become_a_new_instructor'); ?></h1>
                                    <p><?php echo site_phrase('Teach_thousands_of_students_and_earn_money!') ?> </p>
                                    <?php if (get_settings('public_signup') == 'enable'): ?>
                                        <?php if ($this->session->userdata('user_id')): ?>
                                            <a href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url('sign_up?instructor=yes'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img loading="lazy" class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-2.png') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!------------- Become Students Section End --------->