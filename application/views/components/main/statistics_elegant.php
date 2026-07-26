<?php
if (!isset($home_elegant_assets)) {
    $home_elegant_assets = APPPATH . 'views/frontend/default-new/home_elegant_assets.php';
    include $home_elegant_assets;
}
?>

<!-- Why Choose Area Start -->
<?php
$total_students = $this->db->where('role_id', 2)->get('users');
$total_instructors = $this->db->where('is_instructor', 1)->get('users');
$free_courses = $this->db->where('is_free_course', 1)->get('course');
$premium_courses = $this->db->where('is_free_course', 0)->get('course');
?>
<section class="why-choose-section1 mb-80">
    <div class="container">
        <!-- Section title -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="home1-section-title">
                    <h1 class="title mb-20"><?php echo get_phrase('Why Choose Us'); ?></h1>
                    <p class="info"><?php echo get_phrase('We provide a platform where you can learn something new and interesting from us to improve your skills'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="why-choose-area1">
                <div class="why-choose-wrap1">
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $total_students->num_rows(); ?></span>+</h1>
                        <p class="info"><?php echo get_phrase('Happy Students'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Quality Educators'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $premium_courses->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Premium Courses'); ?></p>
                    </div>
                    <div class="why-choose1-single">
                        <h1 class="total"><span class="counter"><?php echo $free_courses->num_rows(); ?></span></h1>
                        <p class="info"><?php echo get_phrase('Cost-free Courses'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Area End -->