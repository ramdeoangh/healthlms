<!-- Start Categories -->
<section class="scategories-4 pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
  <div class="container">
    <!-- Title -->
    <div class="title-one text-center pb-60">
      <p class="subtitle text-uppercase"><?php echo get_phrase('Categories') ?></p>
      <h4 class="title"><?php echo get_phrase('Popular Categories') ?></h4>
      <div class="bar"></div>
    </div>
    <!-- Items -->
    <div class="row justify-content-center">
      <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
      <?php foreach($top_10_categories as $top_10_category): ?>
        <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a class="category-item" href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>">
            <div class="icon text-center" style="color: #<?php echo rand(100000, 999999); ?>">
              <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
            </div>
            <h3 class="info">
              <?php echo $category_details['name']; ?>
              <p class="m-0 text-muted text-14px"><?php echo $top_10_category['course_number'].' '.site_phrase('Courses'); ?></p>
            </h3>

          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Categories -->