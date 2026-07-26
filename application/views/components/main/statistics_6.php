<?php
if (!isset($all_students)) {
    $all_students = $this->db->get_where('users', ['role_id !=' => 1]);
}
if (!isset($all_instructor)) {
    $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]);
}
?>
<!-- Start Counter -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <div class="counter-6">
      <div class="item">
        <h4 class="title"><?php echo nice_number($all_students->num_rows()); ?><span>+</span></h4>
        <p class="info"><?php echo get_phrase('Happy Student') ?></p>
      </div>
      <div class="item">
        <h4 class="title"><?php echo nice_number($all_instructor->num_rows()); ?><span>+</span></h4>
        <p class="info"><?php echo get_phrase('Quality Educators') ?></p>
      </div>

      <?php
        $premium_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => null])->num_rows();
        $free_course = $this->db->get_where('course', ['status' => 'active', 'is_free_course' => 1])->num_rows();
      ?>
      <div class="item">
        <h4 class="title"><?php echo nice_number($premium_course); ?><span>+</span></h4>
        <p class="info"><?php echo get_phrase('Premium Courses') ?></p>
      </div>
      <div class="item">
        <h4 class="title"><?php echo nice_number($free_course); ?><span>+</span></h4>
        <p class="info"><?php echo get_phrase('Cost-free course') ?></p>
      </div>
    </div>
  </div>
</section>
<!-- End Counter -->