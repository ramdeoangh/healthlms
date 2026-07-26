<?php
if (!isset($all_students)) {
    $all_students = $this->db->get_where('users', ['role_id !=' => 1]);
}
if (!isset($all_instructor)) {
    $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]);
}
?>
<!-- Start Our identity -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center">
            <div class="col-lg-7 col-md-10">
                <div class="bar-right">
                    <div class="title-one maw-538 pb-20">
                        <p class="subtitle text-uppercase"><?php echo get_phrase('Our identity') ?></p>
                        <h4 class="title"><?php echo get_phrase('We Always Prioritize Quality And Uniqueness') ?></h4>
                        <div class="bar"></div>
                    </div>
                    <p class="fz_15_m_24 maw-538"><?php echo get_phrase('Our identity is a reflection of who we are as individuals or as an organization, while our profile provides a concise summary of our background, skills, and accomplishments.') ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-info">
                    <div class="item" style="--icon-color: #ff58aa">
                        <h4 class="title"><?php echo nice_number($all_students->num_rows()); ?><span>+</span></h4>
                        <p class="info"><?php echo get_phrase('Happy Student') ?></p>
                    </div>
                    <div class="item" style="--icon-color: #c874f4">
                        <h4 class="title"><?php echo nice_number($all_instructor->num_rows()); ?><span>+</span></h4>
                        <p class="info"><?php echo get_phrase('Quality Educators') ?></p>
                    </div>

                    <?php
                    $premium_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => null])->num_rows();
                    $free_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => 1])->num_rows();
                    ?>
                    <div class="item" style="--icon-color: #feaf75">
                        <h4 class="title"><?php echo nice_number($premium_course); ?><span>+</span></h4>
                        <p class="info"><?php echo get_phrase('Premium Courses') ?></p>
                    </div>
                    <div class="item" style="--icon-color: #58c3ff">
                        <h4 class="title"><?php echo nice_number($free_course); ?><span>+</span></h4>
                        <p class="info"><?php echo get_phrase('Cost-free course') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-50"></div>
        <div class="about-img"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/identity-us-4.jpeg" alt="" /></div>
    </div>
</section>
<!-- End Our identity -->