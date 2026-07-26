   <?php
       if (! isset($home_marketplace_assets)) {
           $home_marketplace_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
           include $home_marketplace_assets;

       }
   ?>

   <?php
       $total_students    = $this->db->where('role_id', 2)->get('users');
       $total_instructors = $this->db->where('is_instructor', 1)->get('users');
       $free_courses      = $this->db->where('is_free_course', 1)->get('course');
       $premium_courses   = $this->db->where('is_free_course', 0)->get('course');
   ?>
   <!-- Counter Area Start -->
   <section class="counter-section-2">
       <div class="container">
           <div class="row mb-100px">
               <div class="col-md-12">
                   <div class="counter-area-wrap2">
                       <div class="counter-single-item2">
                           <h1 class="title-4 fs-82px lh-107px fw-semibold text-white text-center mb-5px"><span class="counter"><?php echo $total_students->num_rows(); ?></span>+</h1>
                           <p class="subtitle-3 fs-18px lh-25px fw-normal text-white text-center"><?php echo get_phrase('Certified Students') ?></p>
                       </div>
                       <div class="counter-single-item2">
                           <h1 class="title-4 fs-82px lh-107px fw-semibold text-white text-center mb-5px"><span class="counter"><?php echo $total_instructors->num_rows(); ?></span></h1>
                           <p class="subtitle-3 fs-18px lh-25px fw-normal text-white text-center"><?php echo get_phrase('Quality Educators') ?></p>
                       </div>
                       <div class="counter-single-item2">
                           <h1 class="title-4 fs-82px lh-107px fw-semibold text-white text-center mb-5px"><?php echo $premium_courses->num_rows(); ?></span></h1>
                           <p class="subtitle-3 fs-18px lh-25px fw-normal text-white text-center"><?php echo get_phrase('Premium Courses') ?></p>
                       </div>
                       <div class="counter-single-item2">
                           <h1 class="title-4 fs-82px lh-107px fw-semibold text-white text-center mb-5px"><span class="counter"><?php echo $free_courses->num_rows(); ?></span></h1>
                           <p class="subtitle-3 fs-18px lh-25px fw-normal text-white text-center"><?php echo get_phrase('Cost-free Courses') ?></p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Counter Area End -->
