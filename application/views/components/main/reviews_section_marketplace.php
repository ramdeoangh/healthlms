   <?php
       if (! isset($home_marketplace_assets)) {
           $home_marketplace_assets = APPPATH . 'views/frontend/default-new/home_marketplace_assets.php';
           include $home_marketplace_assets;

       }
   ?>

   <?php if (get_frontend_settings('review_section') == 1): ?>

   <section class="mb-100px">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="lms2-review-slider-main">
                       <div class="lms2-reviewSlider-banner">
                           <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/lms2-reviewer-img.png" alt="">
                       </div>
                       <div class="lms2-reviewTitle-content">
                           <h2 class="mb-12px title-typo2 fs-48px lms1-text-dark ls-0 fw-bold builder-editable" builder-identity="1"><?php echo get_phrase('What Our Customers Say') ?></h2>
                           <p class=".subtitle-typo1 fs-16px lms1-text-secondary builder-editable" builder-identity="2">
                               <?php echo get_phrase('Lorem Ipsum has been the industry standard dummy text ever since the unknown printer took a galley.') ?></p>
                           <div class="swiper lms2-reviewSlider">
                               <div class="swiper-wrapper">

                                   <?php
                                       $reviews = $this->db->where('ratable_type', null)->where('ratable_id', null)->get('rating')->result();
                                       foreach ($reviews as $review):
                                           $user_data = $this->db->get_where('users', ['id' => $review->user_id])->row_array();
                                       ?>
                                   <div class="swiper-slide">
                                       <div class="lms2-review-slide">
                                           <ul class="d-flex align-items-center gap-1 mb-18px">
                                               <?php for ($i = 1; $i <= 5; $i++): ?>
                                               <?php if ($i <= $review->rating): ?>
                                               <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-yellow-13.svg" alt=""></li>
                                               <?php else: ?>
                                               <li><img src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/star-gray-13.svg" alt=""></li>
                                               <?php endif; ?>
                                               <?php endfor; ?>
                                           </ul>
                                           <p class="lms1-review-comment mb-18px"><?php echo $review->review; ?></p>
                                           <div class="d-flex align-items-center gap-12px">
                                               <div class="image-circle-52px">
                                                   <img src="<?php echo $this->user_model->get_user_image_url($user_data['id']); ?>" alt="user">
                                               </div>
                                               <div>
                                                   <h4 class="lms1-reviewer-name"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></h4>
                                                   <p class="lms1-reviewer-rol"><?php echo date('h:i A', $review->date_added); ?></p>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <?php endforeach; ?>

                               </div>
                               <div class="lms2-reviewSlider-arrow">
                                   <div class="swiper-button-prev">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                           <path
                                               d="M12.1578 16.0917C12.2359 16.0142 12.2979 15.922 12.3402 15.8205C12.3825 15.7189 12.4043 15.61 12.4043 15.5C12.4043 15.39 12.3825 15.2811 12.3402 15.1795C12.2979 15.078 12.2359 14.9858 12.1578 14.9083L8.34113 11.0917C8.26302 11.0142 8.20103 10.922 8.15872 10.8205C8.11641 10.7189 8.09463 10.61 8.09463 10.5C8.09463 10.39 8.11641 10.2811 8.15872 10.1795C8.20103 10.078 8.26302 9.98581 8.34113 9.90834L12.1578 6.09168C12.2359 6.01421 12.2979 5.92204 12.3402 5.82049C12.3825 5.71894 12.4043 5.61002 12.4043 5.50001C12.4043 5.39 12.3825 5.28108 12.3402 5.17953C12.2979 5.07798 12.2359 4.98581 12.1578 4.90834C12.0017 4.75313 11.7905 4.66602 11.5703 4.66602C11.3501 4.66602 11.1389 4.75313 10.9828 4.90834L7.1578 8.73334C6.68963 9.20209 6.42666 9.83751 6.42666 10.5C6.42666 11.1625 6.68963 11.7979 7.1578 12.2667L10.9828 16.0917C11.1389 16.2469 11.3501 16.334 11.5703 16.334C11.7905 16.334 12.0017 16.2469 12.1578 16.0917Z"
                                               fill="#7B60FF" />
                                       </svg>
                                   </div>
                                   <div class="swiper-button-next">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                           <path
                                               d="M7.8422 16.0917C7.7641 16.0142 7.7021 15.922 7.65979 15.8205C7.61749 15.7189 7.5957 15.61 7.5957 15.5C7.5957 15.39 7.61749 15.2811 7.65979 15.1795C7.7021 15.078 7.7641 14.9858 7.8422 14.9083L11.6589 11.0917C11.737 11.0142 11.799 10.922 11.8413 10.8205C11.8836 10.7189 11.9054 10.61 11.9054 10.5C11.9054 10.39 11.8836 10.2811 11.8413 10.1795C11.799 10.078 11.737 9.98581 11.6589 9.90834L7.8422 6.09168C7.76409 6.01421 7.7021 5.92204 7.65979 5.82049C7.61748 5.71894 7.5957 5.61002 7.5957 5.50001C7.5957 5.39 7.61748 5.28108 7.65979 5.17953C7.7021 5.07798 7.76409 4.98581 7.8422 4.90834C7.99834 4.75313 8.20955 4.66602 8.4297 4.66602C8.64986 4.66602 8.86107 4.75313 9.0172 4.90834L12.8422 8.73334C13.3104 9.20209 13.5733 9.83751 13.5733 10.5C13.5733 11.1625 13.3104 11.7979 12.8422 12.2667L9.0172 16.0917C8.86107 16.2469 8.64986 16.334 8.4297 16.334C8.20955 16.334 7.99834 16.2469 7.8422 16.0917Z"
                                               fill="#7B60FF" />
                                       </svg>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <?php endif; ?>

   <script>
// Review Slider 2
if ($('.lms2-reviewSlider').length > 0) {
    var reviewSlider2 = new Swiper(".lms2-reviewSlider", {
        loop: true,
        spaceBetween: 40,
        slidesPerView: 1,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        loop: true,
        speed: 500,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },
    });

}
   </script>
