
<div class="progress-bar" data-percent="<?php echo course_progress($course_id); ?>" data-duration="1000" data-color="#ccc, #198754"><span><?php echo course_progress($course_id); ?>%</span></div>

<?php  if(course_progress($course_id) == 100 ):?>
    <div class="alert alert-success mt-5" id="certificate-alert-success" role="alert">
        <h4 class="alert-heading"><?php echo get_phrase('well_done'); ?>!</h4>
        <hr>
        <p><?php echo get_phrase('congratulations').'!!!'; ?></p>
        <p><?php echo get_phrase('you_are_now_eligible_to_download_the_course_completion_certificate'); ?>.</p>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a class="btn bg-success text-white px-4" target="_blank" href="<?php echo $this->certificate_model->get_certificate_url($this->session->userdata('user_id'), $course_id); ?>"><?= get_phrase('Get Certificate') ?></a>
        </div>
    </div>
<?php else:?>
    <div class="alert alert-info mt-5" id="certificate-alert-warning" role="alert">
        <h4 class="alert-heading"><?php echo get_phrase('Notice'); ?></h4>
        <hr>
        <p> <?php echo get_phrase('you have completed'); ?> <span id="progression"><?php echo course_progress($course_id); ?></span>% <?php echo get_phrase('of_the_course'); ?> </p>
        <p><?php echo get_phrase('you_can_download_the_course_completion_certificate_after_completing_the_course'); ?></p>
    </div>
<?php endif;?>   


<script>
    $(".progress-bar").loading();
</script>
