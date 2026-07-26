<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>
<?php
    $total_instructors    = $this->db->where('is_instructor', 1)->get('users');
    $total_active_courses = $this->db->where('status', 'active')->get('course');
    $free_courses         = $this->db->where('is_free_course', 1)->get('course');
?>

<!-- Counnter Area Start -->
<section>
    <div class="container">
        <div class="counter-area-wrap1 mb-100px">
            <div class="row g-28px row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                <div class="col">
                    <div class="d-flex align-items-center gap-3">
                        <div class="image-box-md">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/kg-counter-img1.png" alt="">
                        </div>
                        <div>
                            <h2 class="kg-counter-title mb-2px"><span class="counter"><?php echo $total_active_courses->num_rows(); ?></span>+</h2>
                            <p class="title-3 fs-17px lh-23px builder-editable" builder-identity="1"><?php echo get_phrase('Total Courses') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center gap-3">
                        <div class="image-box-md">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/kg-counter-img2.png" alt="">
                        </div>
                        <div>
                            <h2 class="kg-counter-title mb-2px"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h2>
                            <p class="title-3 fs-17px lh-23px builder-editable" builder-identity="2"><?php echo get_phrase('Expert Mentors') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center gap-3">
                        <div class="image-box-md">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/kg-counter-img3.png" alt="">
                        </div>
                        <div>
                            <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                            <h2 class="kg-counter-title mb-2px"><span class="counter"><?php echo nice_number($all_students->num_rows()); ?></span>+</h2>
                            <p class="title-3 fs-17px lh-23px builder-editable" builder-identity="3"><?php echo get_phrase('Students Globally') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center gap-3">
                        <div class="image-box-md">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/kg-counter-img4.png" alt="">
                        </div>
                        <div>
                            <h2 class="kg-counter-title mb-2px"><span class="counter"><?php echo $free_courses->num_rows(); ?></span>+</h2>
                            <p class="title-3 fs-17px lh-23px builder-editable" builder-identity="4"><?php echo get_phrase('Cost-free course') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counnter Area End -->
