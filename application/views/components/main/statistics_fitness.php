<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}
?>

<!-- Why Choose Area Start -->
<?php
$total_students = $this->db->where('role_id', 2)->get('users');
$total_instructors = $this->db->where('is_instructor', 1)->get('users');
$free_courses = $this->db->where('is_free_course', 1)->get('course');
$premium_courses = $this->db->where('is_free_course', 0)->get('course');
?>
<section class="dark-body">
    <div class="container">
        <div class="row mb-80px">
            <div class="col-12">
                <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Why Choose '); ?> <span class="text-yellow-2"><?php echo get_settings('system_name'); ?></span></h1>
            </div>
        </div>
        <div class="row mb-120px row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-30px">
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $total_students->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Happy Students'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Quality Instructors'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $premium_courses->num_rows(); ?></span></h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Premium Courses'); ?></p>
            </div>
            <div class="col fitness-single-counter">
                <h1 class="title-6 fs-82px text-center mb-1"><span class="counter"><?php echo $free_courses->num_rows(); ?></span>+</h1>
                <p class="subtitle-3 fs-20px lh-28px text-yellow-2 fw-medium text-center"><?php echo get_phrase('Cost-free Courses'); ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Area End -->