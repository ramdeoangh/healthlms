<?php $header_menu_counter = 0; ?>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand logo pt-0" href="<?php echo site_url(); ?>">
      <img loading="lazy" src="<?php echo site_url('uploads/system/'.get_frontend_settings('dark_logo')) ?>" alt="Logo" />
    </a>
    
    <!-- Mobile Offcanves  Icon Show -->
    <ul class="menu-offcanves">
      <li>
        <div class="search-item">
          <span class="m-cross-icon"><i class="fa-solid fa-xmark"></i></span>
          <span class="m-search-icon"> <i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
      </li>
      <li>
        <a href="#" class="btn-bar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-sharp fa-solid fa-bars"></i></a>
      </li>
    </ul>

    <div class="navbar-collapse" id="navbarSupportedContent">
      <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'header'); ?>
        <?php if($custom_page_menus->num_rows() == 1): ?>
          <?php $header_menu_counter += 1; ?>
          <?php $custom_page_menu = $custom_page_menus->row_array(); ?>
              <a class="text-dark fw-600 text-15px ms-3" href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>"><?php echo $custom_page_menu['button_title']; ?></a>
        <?php elseif($custom_page_menus->num_rows() > 1): ?>
          <?php $header_menu_counter += 1; ?>
          <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
            <li class="nav-item">
              <a class="nav-link header-dropdown  bg-white text-dark fw-600 d-flex" href="#" id="navbarDropdown">
                <span class="ms-2"><?php echo get_phrase('Home'); ?></span>
                <i class="fas fa-angle-down ms-2"></i>
              </a>
              <ul class="navbarHover">
                <?php foreach ($custom_page_menus->result_array() as $custom_page_menu) : ?>
                  <li>
                    <a href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>">
                      <?php echo $custom_page_menu['button_title']; ?>   
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          </ul>
        <?php endif; ?>
      <!-- Small Device Hide -->
      <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-nowrap" href="#" id="navbarDropdown1">
            <span><?php echo get_phrase('Courses'); ?><i class="fas fa-angle-down ms-2"></i></span>
          </a>
          <ul class="navbarHover">
            <?php
            $categories = $this->crud_model->get_categories()->result_array();
            foreach ($categories as $key => $category):?>
              <li class="dropdown-submenu">
                <a href="<?php echo site_url('home/courses?category='.slugify($category['slug'])) ?>">
                  <span class="icons"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
                  <span class="text-cat"><?php echo $category['name']; ?></span>
                  <span class="has-sub-category ms-auto"><i class="fa-solid fa-angle-right"></i></span>
                </a>
                <ul class="sub-category-menu">
                  <?php
                  $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                  foreach ($sub_categories as $sub_category): ?>
                    <li><a href="<?php echo site_url('home/courses?category='.slugify($sub_category['slug'])) ?>"><?php echo $sub_category['name']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endforeach; ?>
            <li>
              <a href="<?php echo site_url('home/courses'); ?>">
                <i class="fas fa-list-ul px-2"></i>
                <?php echo get_phrase('All Courses'); ?>    
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Menu  -->
       <?php if(addon_status('course_bundle')): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="<?php echo site_url('course_bundles'); ?>" id="navbarDropdown3">
              <span class=""><?php echo get_phrase('Course Bundle'); ?></span>
            </a>
          </li>
        </ul>
      <?php endif; ?>

      <?php if(addon_status('ebook')): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="#" id="navbarDropdown1">
              <span><?php echo get_phrase('Ebook'); ?></span>
              <i class="fas fa-angle-down ms-2"></i>
            </a>
            <ul class="navbarHover">
              <?php
              $ebook_categories = $this->db->get('ebook_category')->result_array();
              foreach ($ebook_categories as $key => $ebook_category):?>
                <li class="dropdown-submenu">
                  <a href="<?php echo site_url('ebook?category='.$ebook_category['slug'].'&price=all&rating=all') ?>">
                    <span class="text-cat"><?php echo $ebook_category['title']; ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
      <?php endif; ?>

      <!-- New Design -->
      <?php if (addon_status('team_training') || addon_status('tutor_booking') || addon_status('bootcamp') ) : ?>
      <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-nowrap" href="javascript:;" id="navbarDropdown1">
            <span><?php echo get_phrase('More'); ?><i class="fas fa-angle-down ms-2"></i></span>
          </a>
          <ul class="navbarHover">
              <?php if (addon_status('team_training')) : ?>
                <?php $header_menu_counter += 1; ?>
                  <li >
                    <a href="<?php echo site_url('addons/team_training/packages'); ?>" id="navbarDropdown4">
                        <span><?php echo get_phrase('Team training'); ?></span>
                    </a>
                </li>
              <?php endif; ?>
              <?php if(addon_status('tutor_booking')): ?>
                <?php $header_menu_counter += 1; ?>
                <li>
                   <a href="<?php echo site_url('tutors'); ?>" id="navbarDropdown2">
                    <?php echo get_phrase('Find a Tutor'); ?>    
                </a>
              </li>
            <?php endif; ?>
            <?php if (addon_status('bootcamp')) : ?>
              <?php $header_menu_counter += 1; ?>
              <li>
                  <a href="<?php echo site_url('addons/bootcamp/bootcamp_list'); ?>" id="navbarDropdown4">
                      <span><?php echo get_phrase('bootcamps'); ?></span>
                  </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
      <?php endif;?>
     <!-- New Design -->

      


      <?php if($header_menu_counter > 3): ?>
        <form class="search-input-form" action="<?php echo site_url('home/courses'); ?>" method="get">
          <div class="dropdown">
            <button class="btn search-input-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-search search-menu-icon"></i>
              <i class="fas fa-times text-18px close-menu-icon"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end p-0 border-0">
              <li>
                <div class="header-search mt-2 w-100 flex-column" style="box-shadow: 0px 2px 8px -1px #bbb;">
                  <div class="search-container w-100">
                    <input id="headerSearchBarLg" name="query" type="text" class="search-input-floating <?php echo isset($_GET['query']) ? 'focused':''; ?>" placeholder="<?php echo get_phrase('Search'); ?>" value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>">
                    <button type="submit" class="header-search-icon border-0 text-dark text-16px <?php echo isset($_GET['query']) ? '':'d-hidden'; ?>"><i class="fas fa-search"></i></button>
                    <label for="headerSearchBarLg" class="header-search-icon text-dark text-16px <?php echo isset($_GET['query']) ? 'd-hidden':''; ?>"><i class="fas fa-search"></i></label>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </form>
      <?php else: ?>
        <form class="w-100" action="<?php echo site_url('home/courses'); ?>" method="get" style="max-width: 400px;">
          <div class="header-search py-0 px-2 w-100">
            <div class="search-container w-100 me-3">
              <input id="headerSearchBarLg" name="query" type="text" class="search-input <?php echo isset($_GET['query']) ? 'focused':''; ?>" placeholder="<?php echo get_phrase('Search'); ?>" value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>">
              <button type="submit" class="header-search-icon border-0 text-dark text-16px <?php echo isset($_GET['query']) ? '':'d-hidden'; ?>">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.62496C0.9375 4.38746 4.3875 0.937458 8.625 0.937458C12.8625 0.937458 16.3125 4.38746 16.3125 8.62496C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.06246C5.0025 2.06246 2.0625 5.00996 2.0625 8.62496C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.62496C15.1875 5.00996 12.2475 2.06246 8.625 2.06246Z" fill="#0D0C23"/>
              <path d="M16.4991 17.0625C16.3566 17.0625 16.2141 17.01 16.1016 16.8975L13.4991 14.2951C13.2816 14.0776 13.2816 13.7176 13.4991 13.5001C13.7166 13.2826 14.0766 13.2826 14.2941 13.5001L16.8966 16.1025C17.1141 16.32 17.1141 16.68 16.8966 16.8975C16.7841 17.01 16.6416 17.0625 16.4991 17.0625Z" fill="#0D0C23"/>
              </svg>
              </button>
              <label for="headerSearchBarLg" class="header-search-icon text-dark text-16px <?php echo isset($_GET['query']) ? 'd-hidden':''; ?>">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.625 16.3125C4.3875 16.3125 0.9375 12.8625 0.9375 8.62496C0.9375 4.38746 4.3875 0.937458 8.625 0.937458C12.8625 0.937458 16.3125 4.38746 16.3125 8.62496C16.3125 12.8625 12.8625 16.3125 8.625 16.3125ZM8.625 2.06246C5.0025 2.06246 2.0625 5.00996 2.0625 8.62496C2.0625 12.24 5.0025 15.1875 8.625 15.1875C12.2475 15.1875 15.1875 12.24 15.1875 8.62496C15.1875 5.00996 12.2475 2.06246 8.625 2.06246Z" fill="#0D0C23"/>
              <path d="M16.4991 17.0625C16.3566 17.0625 16.2141 17.01 16.1016 16.8975L13.4991 14.2951C13.2816 14.0776 13.2816 13.7176 13.4991 13.5001C13.7166 13.2826 14.0766 13.2826 14.2941 13.5001L16.8966 16.1025C17.1141 16.32 17.1141 16.68 16.8966 16.8975C16.7841 17.01 16.6416 17.0625 16.4991 17.0625Z" fill="#0D0C23"/>
              </svg>

              </label>
            </div>
          </div>
        </form>
      <?php endif; ?>

      <div class="right-menubar ms-auto ">

        <?php if($user_login): ?>
          <li><a class="dropdown-item" href="<?php echo site_url('home/my_courses') ?>"><?php echo site_phrase('My Course') ?></a></li>
        <?php elseif($admin_login): ?>
          <li><a class="dropdown-item" href="<?php echo site_url('admin'); ?>"><?php echo get_phrase('Administration') ?></a></li>           
        <?php endif; ?>

        <!-- Cart List Area -->
        <div class="wisth_tgl_div">
          <div class="wisth_tgl_2div">
            <a class="menu_pro_cart_tgl mt-1">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.3678 17.0625H5.62532C4.33532 17.0625 3.36782 16.7175 2.76782 16.035C2.16782 15.3525 1.93531 14.3625 2.09281 13.08L2.76782 7.455C2.96282 5.7975 3.38282 4.3125 6.30782 4.3125H11.7078C14.6253 4.3125 15.0453 5.7975 15.2478 7.455L15.9228 13.08C16.0728 14.3625 15.8478 15.36 15.2478 16.035C14.6253 16.7175 13.6653 17.0625 12.3678 17.0625ZM6.30031 5.4375C4.14031 5.4375 4.03532 6.29249 3.87782 7.58249L3.20282 13.2075C3.09032 14.16 3.22532 14.8575 3.60782 15.285C3.99032 15.7125 4.66532 15.93 5.62532 15.93H12.3678C13.3278 15.93 14.0028 15.7125 14.3853 15.285C14.7678 14.8575 14.9028 14.16 14.7903 13.2075L14.1153 7.58249C13.9578 6.28499 13.8603 5.4375 11.6928 5.4375H6.30031Z" fill="#0D0C23"/>
              <path d="M12 6.5625C11.6925 6.5625 11.4375 6.3075 11.4375 6V3.375C11.4375 2.565 10.935 2.0625 10.125 2.0625H7.875C7.065 2.0625 6.5625 2.565 6.5625 3.375V6C6.5625 6.3075 6.3075 6.5625 6 6.5625C5.6925 6.5625 5.4375 6.3075 5.4375 6V3.375C5.4375 1.9425 6.4425 0.9375 7.875 0.9375H10.125C11.5575 0.9375 12.5625 1.9425 12.5625 3.375V6C12.5625 6.3075 12.3075 6.5625 12 6.5625Z" fill="#0D0C23"/>
              </svg>
              <p class="menu_number" id="cartItemsCounter"><?php echo count($cart_items); ?></p>
            </a>
            <div class="menu_pro_wish">
              <div class="overflow-control" id="cartItems">

                <?php include "cart_items.php"; ?>

              </div>
              <div class="menu_pro_btn">
                <a href="<?php echo site_url('home/shopping_cart'); ?>" type="submit" class="btn btn-primary text-white"><?php echo get_phrase('Checkout'); ?></a>
              </div>
            </div>
          </div>
        </div>

        <?php if($user_login): ?>
          <!-- Wish List Area -->
          <div class="wisth_tgl_div">
            <div class="wisth_tgl_2div wish">
              <a class="menu_wisth_tgl mt-1">
                <i class="fa-regular fa-heart"></i>
                <?php if(count($my_wishlist_items) > 0): ?>
                  <p class="menu_number" id="wishlistItemsCounter">
                    <?php echo count($my_wishlist_items); ?>
                  </p>
                <?php endif; ?>
              </a>
              <div class="menu_pro_wish">
                <div class="overflow-control" id="wishlistItems">
                  <?php include "wishlist_items.php"; ?>
                </div>
                <div class="menu_pro_btn">
                  <a href="<?php echo site_url('home/my_wishlist'); ?>" class="btn btn-primary text-white"><?php echo get_phrase('Go to wishlist'); ?></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Notification Area -->
          <div class="wisth_tgl_div">
            <div class="wisth_tgl_2div" id="headerNotification">
              <?php include "notifications.php"; ?>
            </div>
          </div>
        <?php endif; ?>


        <?php if(!$user_id): ?>
          <a href="<?php echo site_url('login'); ?>" class="ms-3"> <?php echo get_phrase('Login'); ?></a>
          <?php if(get_settings('public_signup') == 'enable'): ?>  
            <a href="<?php echo site_url('sign_up'); ?>" class="ms-3 text-capitalize ctBtn" style="min-width: 70px"> <?php echo get_phrase('Join Now'); ?></a>
          <?php endif;?>
        <?php endif; ?>

          <?php if($user_login || $admin_login): ?>
            <!-- Profile Area -->
            <div class="menu_pro_tgl_div">
              <div class="menu_pro_tgl-2div ms-15px">
                  <a class="menu_pro_tgl profile-dropdown"><img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($user_id); ?>" alt="User Image" /></a>
              </div>
              <div class="menu_pro_tgl_bg">
                <div class="path-pos">
                   <div class="user-images">
                        <a href="javascript:;"><img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($user_id); ?>" alt="User Image"/></a>
                         <div class="user-info">
                            <h4><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
                            <p><?php echo $user_details['email']; ?></p>
                         </div> 
                   </div>
                  <ul>
                    <?php if($user_login): ?>
                      <?php if($user_details['is_instructor'] == 1): ?>
                        <li class="user-dropdown-menu-item">
                          <a href="<?php echo site_url('user/dashboard'); ?>">
                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.86992 8.1525C6.79492 8.145 6.70492 8.145 6.62242 8.1525C4.83742 8.0925 3.41992 6.63 3.41992 4.83C3.41992 2.9925 4.90492 1.5 6.74992 1.5C8.58742 1.5 10.0799 2.9925 10.0799 4.83C10.0724 6.63 8.65492 8.0925 6.86992 8.1525Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M12.3075 3C13.7625 3 14.9325 4.1775 14.9325 5.625C14.9325 7.0425 13.8075 8.1975 12.405 8.25C12.345 8.2425 12.2775 8.2425 12.21 8.25" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M3.12004 10.92C1.30504 12.135 1.30504 14.115 3.12004 15.3225C5.18254 16.7025 8.56504 16.7025 10.6275 15.3225C12.4425 14.1075 12.4425 12.1275 10.6275 10.92C8.57254 9.5475 5.19004 9.5475 3.12004 10.92Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M13.7549 15C14.2949 14.8875 14.8049 14.67 15.2249 14.3475C16.3949 13.47 16.3949 12.0225 15.2249 11.145C14.8124 10.83 14.3099 10.62 13.7774 10.5" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                              <?php echo site_phrase('Instructor Dashboard'); ?>
                           </a>
                        </li>
                      <?php else: ?>
                        <?php if (get_settings('allow_instructor') == 1) : ?>
                          <li class="user-dropdown-menu-item">
                            <a href="<?php echo site_url('home/become_an_instructor'); ?>">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.86992 8.1525C6.79492 8.145 6.70492 8.145 6.62242 8.1525C4.83742 8.0925 3.41992 6.63 3.41992 4.83C3.41992 2.9925 4.90492 1.5 6.74992 1.5C8.58742 1.5 10.0799 2.9925 10.0799 4.83C10.0724 6.63 8.65492 8.0925 6.86992 8.1525Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M12.3075 3C13.7625 3 14.9325 4.1775 14.9325 5.625C14.9325 7.0425 13.8075 8.1975 12.405 8.25C12.345 8.2425 12.2775 8.2425 12.21 8.25" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M3.12004 10.92C1.30504 12.135 1.30504 14.115 3.12004 15.3225C5.18254 16.7025 8.56504 16.7025 10.6275 15.3225C12.4425 14.1075 12.4425 12.1275 10.6275 10.92C8.57254 9.5475 5.19004 9.5475 3.12004 10.92Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M13.7549 15C14.2949 14.8875 14.8049 14.67 15.2249 14.3475C16.3949 13.47 16.3949 12.0225 15.2249 11.145C14.8124 10.83 14.3099 10.62 13.7774 10.5" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                               <?php echo site_phrase('Become an instructor'); ?>
                            </a>
                         </li>
                        <?php endif; ?>
                      <?php endif; ?>

                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>">
                         <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 9.15002H11.25" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 12.15H9.285" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5 4.5H10.5C12 4.5 12 3.75 12 3C12 1.5 11.25 1.5 10.5 1.5H7.5C6.75 1.5 6 1.5 6 3C6 4.5 6.75 4.5 7.5 4.5Z" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3.01501C14.4975 3.15001 15.75 4.07251 15.75 7.50002V12C15.75 15 15 16.5 11.25 16.5H6.75C3 16.5 2.25 15 2.25 12V7.50002C2.25 4.08001 3.5025 3.15001 6 3.01501" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        <?php echo site_phrase('my_courses'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>">
                         <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9.465 15.6075C9.21 15.6975 8.79 15.6975 8.535 15.6075C6.36 14.865 1.5 11.7675 1.5 6.51745C1.5 4.19995 3.3675 2.32495 5.67 2.32495C7.035 2.32495 8.2425 2.98495 9 4.00495C9.7575 2.98495 10.9725 2.32495 12.33 2.32495C14.6325 2.32495 16.5 4.19995 16.5 6.51745C16.5 11.7675 11.64 14.865 9.465 15.6075Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        <?php echo site_phrase('my_wishlist'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12.75 15.375H5.25C3 15.375 1.5 14.25 1.5 11.625V6.375C1.5 3.75 3 2.625 5.25 2.625H12.75C15 2.625 16.5 3.75 16.5 6.375V11.625C16.5 14.25 15 15.375 12.75 15.375Z" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M12.75 6.75L10.4025 8.625C9.63 9.24 8.3625 9.24 7.59 8.625L5.25 6.75" stroke="#99A1B7" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                         </svg>
                        <?php echo site_phrase('my_messages'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 21C10 21.552 9.55501 22 9.005 22C8.45701 22 8 21.552 8 21C8 20.448 8.43499 20 8.98499 20H9.005C9.55501 20 10 20.448 10 21ZM17.005 20H16.985C16.435 20 16 20.448 16 21C16 21.552 16.457 22 17.005 22C17.555 22 18 21.552 18 21C18 20.448 17.555 20 17.005 20ZM21.459 8.44701L20.444 14.617C20.185 16.046 19.574 17.499 17 17.499H8.73401C7.49801 17.499 6.43403 16.576 6.25903 15.353L4.74902 4.78799C4.64502 4.05399 4.00601 3.5 3.26501 3.5H3C2.724 3.5 2.5 3.276 2.5 3C2.5 2.724 2.724 2.5 3 2.5H3.26599C4.50199 2.5 5.56597 3.423 5.74097 4.646L5.86304 5.5H19C19.744 5.5 20.443 5.82699 20.92 6.39799C21.396 6.969 21.592 7.71601 21.459 8.44701ZM19.615 13.5H13C12.724 13.5 12.5 13.276 12.5 13C12.5 12.724 12.724 12.5 13 12.5H19.7791L20.473 8.276C20.554 7.829 20.436 7.381 20.151 7.039C19.865 6.696 19.445 6.5 18.999 6.5H6.005L7.25 15.212C7.354 15.946 7.99301 16.5 8.73401 16.5H17C18.754 16.5 19.218 15.778 19.459 14.447L19.615 13.5Z" fill="#99A1B7"/>
                            </svg>
                      <?php echo site_phrase('purchase_history'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>">
                         <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.11992 8.1525C9.04492 8.145 8.95492 8.145 8.87242 8.1525C7.08742 8.0925 5.66992 6.63 5.66992 4.83C5.66992 2.9925 7.15492 1.5 8.99992 1.5C10.8374 1.5 12.3299 2.9925 12.3299 4.83C12.3224 6.63 10.9049 8.0925 9.11992 8.1525Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.37004 10.92C3.55504 12.135 3.55504 14.115 5.37004 15.3225C7.43254 16.7025 10.815 16.7025 12.8775 15.3225C14.6925 14.1075 14.6925 12.1275 12.8775 10.92C10.8225 9.5475 7.44004 9.5475 5.37004 10.92Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>

                        <?php echo site_phrase('user_profile'); ?></a></li>
                      <?php if (addon_status('affiliate_course') ) :
                          $CI    = &get_instance();
                          $CI->load->model('addons/affiliate_course_model');
                          $x = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));
                          $is_affiliator = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));

                          if ($x == 0 && get_settings('affiliate_addon_active_status') == 1) : ?>
                              <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/become_an_affiliator'); ?>">
                              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.569 14.761C19.985 14.43 19.294 14.4391 18.721 14.7841L16.467 16.136C16.296 15.206 15.479 14.499 14.5 14.499H9C8.327 14.499 7.717 14.77 7.267 15.204C7.001 14.782 6.535 14.499 6 14.499H4C3.173 14.499 2.5 15.172 2.5 15.999V19.999C2.5 20.826 3.173 21.499 4 21.499H6C6.534 21.499 7.001 21.2159 7.267 20.7939C7.717 21.2289 8.327 21.499 9 21.499H14.597C15.615 21.499 16.613 21.1489 17.409 20.5129L20.812 17.79C21.25 17.44 21.5 16.9171 21.5 16.3571C21.5 15.6881 21.152 15.091 20.569 14.761ZM6.5 20C6.5 20.276 6.276 20.5 6 20.5H4C3.724 20.5 3.5 20.276 3.5 20V16C3.5 15.724 3.724 15.5 4 15.5H6C6.276 15.5 6.5 15.724 6.5 16V17V19V20ZM20.187 17.01L16.784 19.733C16.166 20.228 15.389 20.5 14.597 20.5H9C8.173 20.5 7.5 19.827 7.5 19V17C7.5 16.173 8.173 15.5 9 15.5H14.5C15.051 15.5 15.5 15.949 15.5 16.5C15.5 17.051 15.051 17.5 14.5 17.5H11C10.724 17.5 10.5 17.724 10.5 18C10.5 18.276 10.724 18.5 11 18.5H14.5C15.272 18.5 15.944 18.06 16.277 17.417L19.235 15.642C19.496 15.485 19.811 15.481 20.076 15.631C20.341 15.781 20.5 16.053 20.5 16.358C20.5 16.613 20.386 16.851 20.187 17.01ZM9.95999 7.02698C9.66399 6.65198 9.5 6.17406 9.5 5.68506C9.5 4.55006 10.372 3.626 11.48 3.521V3C11.48 2.724 11.704 2.5 11.98 2.5C12.256 2.5 12.48 2.724 12.48 3V3.51501C13.518 3.59401 14.369 4.39199 14.487 5.44299C14.518 5.71699 14.32 5.96497 14.046 5.99597C13.77 6.02197 13.524 5.82905 13.493 5.55505C13.426 4.95305 12.919 4.49902 12.315 4.49902H11.685C11.032 4.49902 10.5 5.03096 10.5 5.68396C10.5 5.94996 10.588 6.20703 10.748 6.41003C10.911 6.62003 11.141 6.76898 11.398 6.83398L12.846 7.19397C13.821 7.44097 14.5 8.31296 14.5 9.31396C14.5 9.89697 14.272 10.444 13.858 10.858C13.485 11.231 13 11.444 12.48 11.483V12C12.48 12.276 12.256 12.5 11.98 12.5C11.704 12.5 11.48 12.276 11.48 12V11.481C10.46 11.385 9.63 10.595 9.513 9.55603C9.482 9.28203 9.68001 9.03405 9.95401 9.00305C10.231 8.97405 10.476 9.16997 10.507 9.44397C10.574 10.046 11.081 10.5 11.685 10.5H12.315C12.63 10.5 12.927 10.376 13.151 10.151C13.377 9.926 13.5 9.62994 13.5 9.31494C13.5 8.77194 13.131 8.29904 12.603 8.16504L11.155 7.80505C10.681 7.68605 10.257 7.40898 9.95999 7.02698Z" fill="#99A1B7"/>
                                    </svg>
                                <?php echo site_phrase('Become_an_Affiliator'); ?></a></li>
                          <?php else : ?>
                              <?php if ($is_affiliator == 1) : ?>
                                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/affiliate_course_history '); ?>">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 1C4.58878 1 1 4.58878 1 9C1 13.4112 4.58878 17 9 17C13.4112 17 17 13.4112 17 9C17 4.58878 13.4112 1 9 1ZM9 16C5.14018 16 2 12.8598 2 9C2 5.14018 5.14018 2 9 2C12.8598 2 16 5.14018 16 9C16 12.8598 12.8598 16 9 16ZM12.3334 10.345C12.2339 10.3451 12.1348 10.3548 12.0373 10.3739L10.1616 7.12518C10.3562 6.90216 10.4825 6.62782 10.5254 6.33495C10.5682 6.04208 10.5259 5.74305 10.4034 5.47358C10.281 5.20413 10.0834 4.97562 9.83464 4.81538C9.58576 4.65514 9.296 4.56992 9 4.56992C8.704 4.56992 8.41424 4.65514 8.16536 4.81538C7.91656 4.97562 7.71904 5.20413 7.59656 5.47358C7.47408 5.74305 7.43176 6.04208 7.47464 6.33495C7.51752 6.62782 7.64376 6.90216 7.8384 7.12518L5.96275 10.3739C5.67234 10.317 5.3717 10.3449 5.09671 10.4542C4.82172 10.5636 4.58402 10.7498 4.41198 10.9906C4.23994 11.2314 4.14084 11.5166 4.12651 11.8122C4.11218 12.1077 4.18323 12.4012 4.33118 12.6574C4.47912 12.9138 4.6977 13.1221 4.96082 13.2575C5.22394 13.3929 5.52048 13.4498 5.81503 13.4212C6.10958 13.3926 6.38969 13.2799 6.62191 13.0965C6.85413 12.913 7.02865 12.6667 7.12462 12.3867H10.8754C10.9673 12.6546 11.1312 12.8921 11.3492 13.0729C11.5671 13.2538 11.8307 13.371 12.111 13.4119C12.3913 13.4528 12.6774 13.4157 12.9379 13.3046C13.1985 13.1936 13.4234 13.0129 13.5879 12.7824C13.7526 12.5519 13.8505 12.2805 13.871 11.998C13.8914 11.7155 13.8337 11.4329 13.7041 11.181C13.5744 10.9292 13.3779 10.718 13.1362 10.5706C12.8943 10.423 12.6166 10.345 12.3334 10.345ZM6.82813 10.8748L8.70376 7.62608C8.89928 7.66456 9.10048 7.66456 9.296 7.62608L11.1718 10.8748C11.041 11.0247 10.9403 11.1986 10.8754 11.3867H7.12466C7.05978 11.1986 6.95909 11.0247 6.82813 10.8748ZM9 5.57169C9.10712 5.57168 9.21184 5.60345 9.30096 5.66297C9.39008 5.72249 9.45944 5.80709 9.50048 5.90606C9.54152 6.00505 9.55224 6.11397 9.53128 6.21905C9.5104 6.32413 9.4588 6.42065 9.38304 6.49641C9.30728 6.57217 9.2108 6.62375 9.10568 6.64466C9.00064 6.66555 8.89168 6.65482 8.79272 6.61382C8.69376 6.57282 8.60912 6.50338 8.5496 6.4143C8.49008 6.32522 8.45832 6.22048 8.45832 6.11334C8.45848 5.96972 8.5156 5.83202 8.61712 5.73045C8.71872 5.62888 8.8564 5.57185 9 5.57169ZM5.66666 12.4284C5.55952 12.4284 5.45479 12.3966 5.3657 12.3371C5.27662 12.2776 5.2072 12.193 5.1662 12.094C5.1252 11.995 5.11447 11.8861 5.13538 11.781C5.15628 11.6759 5.20788 11.5794 5.28364 11.5037C5.3594 11.4279 5.45592 11.3763 5.561 11.3554C5.66608 11.3346 5.77499 11.3453 5.87398 11.3862C5.97295 11.4273 6.05755 11.4967 6.11707 11.5858C6.17658 11.6749 6.20835 11.7796 6.20834 11.8867C6.20818 12.0304 6.15106 12.1681 6.0495 12.2696C5.94795 12.3711 5.81026 12.4282 5.66666 12.4284ZM12.3334 12.4284C12.2262 12.4284 12.1214 12.3966 12.0324 12.3371C11.9433 12.2776 11.8738 12.193 11.8329 12.094C11.7918 11.995 11.7811 11.8862 11.802 11.781C11.823 11.676 11.8746 11.5794 11.9503 11.5037C12.026 11.4279 12.1226 11.3763 12.2277 11.3554C12.3327 11.3346 12.4417 11.3453 12.5406 11.3862C12.6396 11.4273 12.7242 11.4967 12.7838 11.5858C12.8433 11.6749 12.875 11.7796 12.875 11.8867C12.8748 12.0303 12.8177 12.168 12.7162 12.2696C12.6146 12.3711 12.477 12.4282 12.3334 12.4284Z" fill="#99A1B7"/>
                                     </svg>

                                    <?php echo site_phrase('Affiliation History'); ?></a></li>
                              <?php endif; ?>
                          <?php endif; ?>
                      <?php endif; ?>
                      <?php if (addon_status('customer_support')) : ?>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>">
                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.17826 17.025C2.42326 17.025 0.938258 15.54 0.938258 13.785V9.16502C0.900755 6.97498 1.71075 4.91248 3.22576 3.36748C4.74076 1.82998 6.77325 0.974976 8.96326 0.974976C13.4332 0.974976 17.0633 4.61248 17.0633 9.07502V13.695C17.0633 15.48 15.6083 16.935 13.8233 16.935C12.0683 16.935 10.5833 15.45 10.5833 13.695V11.5875C10.5833 10.5 11.4383 9.64499 12.5258 9.64499C13.6132 9.64499 17.0633 10.5 17.0633 11.5875V13.86C17.0633 14.1675 16.8082 14.4225 16.5008 14.4225C16.1933 14.4225 15.9383 14.1675 15.9383 13.86V11.5875C15.9383 11.0775 12.9308 10.77 12.5258 10.77C12.0157 10.77 11.7083 11.1825 11.7083 11.5875V13.695C11.7083 14.8425 12.6758 15.81 13.8233 15.81C14.9708 15.81 15.9383 14.8425 15.9383 13.695V9.07502C15.9383 5.22747 12.8108 2.09998 8.96326 2.09998C7.08076 2.09998 5.33325 2.82748 4.02825 4.15498C2.72325 5.48248 2.02575 7.25998 2.06326 9.14999V13.785C2.06326 14.9325 3.03076 15.9 4.17826 15.9C5.32576 15.9 6.29326 14.9325 6.29326 13.785V11.6775C6.29326 11.1675 5.88076 10.86 5.47576 10.86C4.96576 10.86 2.06326 11.2725 2.06326 11.6775V13.8675C2.06326 14.175 1.80826 14.43 1.50076 14.43C1.19325 14.43 0.938258 14.175 0.938258 13.8675V11.6775C0.938258 10.59 4.38826 9.73499 5.47576 9.73499C6.56326 9.73499 7.41826 10.59 7.41826 11.6775V13.785C7.41826 15.54 5.93326 17.025 4.17826 17.025Z" fill="#99A1B7"/>
                            </svg>

                            <?php echo site_phrase('support'); ?></a></li>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if($admin_login): ?>
                      <li class="user-dropdown-menu-item">
                        <a href="<?php echo site_url('admin'); ?>">
                         <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 5.99995C10.07 5.99995 8.5 7.56995 8.5 9.49995C8.5 11.4299 10.07 12.9999 12 12.9999C13.93 12.9999 15.5 11.4299 15.5 9.49995C15.5 7.56995 13.93 5.99995 12 5.99995ZM12 11.9999C10.621 11.9999 9.5 10.8779 9.5 9.49995C9.5 8.12195 10.621 6.99995 12 6.99995C13.379 6.99995 14.5 8.12195 14.5 9.49995C14.5 10.8779 13.379 11.9999 12 11.9999ZM12.5 8.37495V9.49995C12.5 9.77595 12.276 9.99995 12 9.99995C11.724 9.99995 11.5 9.77595 11.5 9.49995V8.37495C11.5 8.09895 11.724 7.87495 12 7.87495C12.276 7.87495 12.5 8.09895 12.5 8.37495ZM22 21.4999H21.5V13.4999C21.5 12.3969 20.603 11.4999 19.5 11.4999H18.5V6.60591L19.724 7.41694C19.809 7.47294 19.905 7.49995 20 7.49995C20.162 7.49995 20.32 7.42083 20.417 7.27583C20.569 7.04583 20.506 6.73596 20.276 6.58296L13.109 1.83589C12.435 1.38589 11.565 1.38791 10.891 1.83491L3.72302 6.58296C3.49402 6.73596 3.43003 7.04583 3.58203 7.27583C3.73603 7.50683 4.04702 7.56794 4.27502 7.41694L5.49902 6.60591V11.4999H4.49902C3.39602 11.4999 2.49902 12.3969 2.49902 13.4999V21.4999H1.99902C1.72302 21.4999 1.49902 21.7239 1.49902 21.9999C1.49902 22.2759 1.72302 22.4999 1.99902 22.4999H21.999C22.275 22.4999 22.499 22.2759 22.499 21.9999C22.499 21.7239 22.276 21.4999 22 21.4999ZM10.5 21.4999V17.9999C10.5 17.1729 11.173 16.4999 12 16.4999C12.827 16.4999 13.5 17.1729 13.5 17.9999V21.4999H10.5ZM14.5 21.4999V17.9999C14.5 16.6219 13.379 15.4999 12 15.4999C10.621 15.4999 9.5 16.6219 9.5 17.9999V21.4999H3.5V13.4999C3.5 12.9489 3.948 12.4999 4.5 12.4999H6C6.276 12.4999 6.5 12.2759 6.5 11.9999V5.94404L11.4449 2.66792C11.7809 2.44292 12.2171 2.44289 12.5551 2.66889L17.499 5.94404V11.9999C17.499 12.2759 17.723 12.4999 17.999 12.4999H19.499C20.051 12.4999 20.499 12.9489 20.499 13.4999V21.4999H14.5ZM7.25 15.4999C7.25 15.9139 6.914 16.2499 6.5 16.2499C6.086 16.2499 5.75 15.9139 5.75 15.4999C5.75 15.0859 6.086 14.7499 6.5 14.7499C6.914 14.7499 7.25 15.0859 7.25 15.4999ZM7.25 17.9999C7.25 18.4139 6.914 18.7499 6.5 18.7499C6.086 18.7499 5.75 18.4139 5.75 17.9999C5.75 17.5859 6.086 17.2499 6.5 17.2499C6.914 17.2499 7.25 17.5859 7.25 17.9999ZM18.25 15.4999C18.25 15.9139 17.914 16.2499 17.5 16.2499C17.086 16.2499 16.75 15.9139 16.75 15.4999C16.75 15.0859 17.086 14.7499 17.5 14.7499C17.914 14.7499 18.25 15.0859 18.25 15.4999ZM18.25 17.9999C18.25 18.4139 17.914 18.7499 17.5 18.7499C17.086 18.7499 16.75 18.4139 16.75 17.9999C16.75 17.5859 17.086 17.2499 17.5 17.2499C17.914 17.2499 18.25 17.5859 18.25 17.9999Z" fill="#99A1B7"/>
                              </svg>
                          <?php echo get_phrase('Administration'); ?>
                        </a>
                      </li>
                      <li class="user-dropdown-menu-item">
                        <a href="<?php echo site_url('admin/manage_profile'); ?>">
                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9.11992 8.1525C9.04492 8.145 8.95492 8.145 8.87242 8.1525C7.08742 8.0925 5.66992 6.63 5.66992 4.83C5.66992 2.9925 7.15492 1.5 8.99992 1.5C10.8374 1.5 12.3299 2.9925 12.3299 4.83C12.3224 6.63 10.9049 8.0925 9.11992 8.1525Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                               <path d="M5.37004 10.92C3.55504 12.135 3.55504 14.115 5.37004 15.3225C7.43254 16.7025 10.815 16.7025 12.8775 15.3225C14.6925 14.1075 14.6925 12.1275 12.8775 10.92C10.8225 9.5475 7.44004 9.5475 5.37004 10.92Z" stroke="#99A1B7" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                          <?php echo get_phrase('Manage profile') ?>
                        </a>
                      </li>       
                      <li class="user-dropdown-menu-item">
                        <a href="<?php echo site_url('admin/system_settings'); ?>">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M12 8.5C10.07 8.5 8.5 10.07 8.5 12C8.5 13.93 10.07 15.5 12 15.5C13.93 15.5 15.5 13.93 15.5 12C15.5 10.07 13.93 8.5 12 8.5ZM12 14.5C10.622 14.5 9.5 13.378 9.5 12C9.5 10.622 10.622 9.5 12 9.5C13.378 9.5 14.5 10.622 14.5 12C14.5 13.378 13.379 14.5 12 14.5ZM21.082 14.169C20.311 13.722 19.831 12.891 19.83 12C19.829 11.11 20.306 10.28 21.085 9.828C21.481 9.598 21.616 9.08799 21.387 8.69199L19.715 5.806C19.486 5.41 18.978 5.27299 18.58 5.50299C17.803 5.95099 16.839 5.94999 16.061 5.49799C15.292 5.05299 14.815 4.22401 14.815 3.33701C14.815 2.87601 14.44 2.50101 13.978 2.50101H10.023C9.56102 2.50101 9.18601 2.87601 9.18601 3.33701C9.18601 4.22501 8.70899 5.053 7.93799 5.5C7.16199 5.949 6.197 5.95099 5.422 5.50299C5.023 5.27399 4.51502 5.411 4.28602 5.806L2.612 8.694C2.383 9.09 2.51899 9.59899 2.92099 9.83099C3.69099 10.277 4.17 11.106 4.172 11.996C4.174 12.887 3.697 13.719 2.917 14.171C2.725 14.282 2.587 14.462 2.53 14.677C2.473 14.891 2.50302 15.115 2.61402 15.308L4.28501 18.193C4.51501 18.59 5.024 18.726 5.422 18.497C6.198 18.05 7.162 18.051 7.93 18.497L7.93201 18.498C7.93401 18.499 7.93599 18.501 7.93799 18.502C8.70699 18.948 9.18301 19.776 9.18201 20.664C9.18201 21.125 9.55701 21.5 10.018 21.5H13.977C14.438 21.5 14.813 21.125 14.813 20.665C14.813 19.777 15.291 18.948 16.062 18.501C16.837 18.051 17.802 18.05 18.578 18.498C18.975 18.727 19.484 18.59 19.714 18.195L21.388 15.306C21.618 14.91 21.481 14.401 21.082 14.169ZM18.932 17.551C17.873 17.006 16.597 17.035 15.559 17.636C14.531 18.232 13.874 19.319 13.818 20.5H10.178C10.124 19.319 9.46801 18.233 8.44001 17.636C7.40401 17.035 6.126 17.006 5.068 17.55L3.56 14.948C4.56 14.306 5.17399 13.188 5.17099 11.992C5.16799 10.805 4.556 9.69399 3.56 9.04999L5.068 6.44699C6.127 6.99199 7.40301 6.96299 8.44101 6.36099C9.46901 5.76499 10.125 4.67899 10.181 3.49799H13.818C13.874 4.67899 14.53 5.76501 15.561 6.36301C16.596 6.96301 17.872 6.99199 18.932 6.44699L20.44 9.04901C19.441 9.69001 18.829 10.807 18.831 12C18.832 13.19 19.444 14.303 20.441 14.947L18.932 17.551Z" fill="#99A1B7"/>
                           </svg>
                          <?php echo get_phrase('Settings') ?>
                        </a>
                      </li>  
                    <?php endif; ?>

                    <li class="user-dropdown-menu-item">
                      <a href="<?php echo site_url('login/logout'); ?>">
                       <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12.3874 16.7027L12.2899 16.7027C8.95991 16.7027 7.35491 15.3902 7.07741 12.4502C7.04741 12.1427 7.27241 11.8652 7.58741 11.8352C7.88741 11.8052 8.17241 12.0377 8.20241 12.3452C8.41991 14.7002 9.52991 15.5777 12.2974 15.5777L12.3949 15.5777C15.4474 15.5777 16.5274 14.4977 16.5274 11.4452L16.5274 6.55523C16.5274 3.50273 15.4474 2.42273 12.3949 2.42273L12.2974 2.42273C9.51491 2.42273 8.40491 3.31523 8.20241 5.71523C8.16491 6.02273 7.90241 6.25523 7.58741 6.22523C7.27241 6.20273 7.04741 5.92523 7.06991 5.61773C7.32491 2.63273 8.93741 1.29773 12.2899 1.29773L12.3874 1.29773C16.0699 1.29773 17.6449 2.87273 17.6449 6.55523L17.6449 11.4452C17.6449 15.1277 16.0699 16.7027 12.3874 16.7027Z" fill="#99A1B7"/>
                          <path d="M12.2069 9.5625L3.67188 9.5625C3.36438 9.5625 3.10938 9.3075 3.10938 9C3.10938 8.6925 3.36437 8.4375 3.67187 8.4375L12.2069 8.4375C12.5144 8.4375 12.7694 8.6925 12.7694 9C12.7694 9.3075 12.5144 9.5625 12.2069 9.5625Z" fill="#99A1B7"/>
                          <path d="M5.34607 12.075C5.20357 12.075 5.06107 12.0225 4.94857 11.91L2.43607 9.39751C2.21857 9.18001 2.21857 8.82001 2.43607 8.60251L4.94857 6.09C5.16607 5.8725 5.52607 5.8725 5.74357 6.09C5.96107 6.3075 5.96107 6.6675 5.74357 6.885L3.62857 9.00001L5.74357 11.115C5.96107 11.3325 5.96107 11.6925 5.74357 11.91C5.63857 12.0225 5.48857 12.075 5.34607 12.075Z" fill="#99A1B7"/>
                          </svg>
                        <?php echo get_phrase('Log out'); ?>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?>

      </div>
    </div>

    <!-- Mobile Device Form -->
    <form action="<?php echo site_url('home/courses'); ?>" method="get" class="inline-form">
      <div class="mobile-search test">
        <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>" name="query" class="form-control" type="text" placeholder="<?php echo get_phrase('Search'); ?>" />
      </div>
    </form>

  </div>
</nav>