<!---------- Header Section start  ---------->
<?php 

validate_cart_items();
$cart_items = $this->session->userdata('cart_items'); 
 
?>
<?php $user_id = $this->session->userdata('user_id'); ?>
<?php $user_login = $this->session->userdata('user_login'); ?>
<?php $admin_login = $this->session->userdata('admin_login'); ?>
<?php if($user_id > 0){$user_details = $this->user_model->get_all_user($user_id)->row_array();} ?>
<header>
  <!-- Sub Header Start -->
  <div class="sub-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="icon icon-left">
            <ul class="nav">
              <li class="nav-item px-2">
                <a href="tel:<?php echo get_settings('phone'); ?>">
                  <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.215 8.5625C12.8925 8.5625 12.6375 8.3 12.6375 7.985C12.6375 7.7075 12.36 7.13 11.895 6.6275C11.4375 6.14 10.935 5.855 10.515 5.855C10.1925 5.855 9.9375 5.5925 9.9375 5.2775C9.9375 4.9625 10.2 4.7 10.515 4.7C11.265 4.7 12.0525 5.105 12.7425 5.8325C13.3875 6.515 13.8 7.3625 13.8 7.9775C13.8 8.3 13.5375 8.5625 13.215 8.5625Z" fill="white"/>
                    <path d="M15.9228 8.5625C15.6003 8.5625 15.3453 8.3 15.3453 7.985C15.3453 5.3225 13.1778 3.1625 10.5228 3.1625C10.2003 3.1625 9.94531 2.9 9.94531 2.585C9.94531 2.27 10.2003 2 10.5153 2C13.8153 2 16.5003 4.685 16.5003 7.985C16.5003 8.3 16.2378 8.5625 15.9228 8.5625Z" fill="white"/>
                    <path d="M8.2875 11.7125L6.9 13.1C6.6075 13.3925 6.1425 13.3925 5.8425 13.1075C5.76 13.025 5.6775 12.95 5.595 12.8675C4.8225 12.0875 4.125 11.27 3.5025 10.415C2.8875 9.56 2.3925 8.705 2.0325 7.8575C1.68 7.0025 1.5 6.185 1.5 5.405C1.5 4.895 1.59 4.4075 1.77 3.9575C1.95 3.5 2.235 3.08 2.6325 2.705C3.1125 2.2325 3.6375 2 4.1925 2C4.4025 2 4.6125 2.045 4.8 2.135C4.995 2.225 5.1675 2.36 5.3025 2.555L7.0425 5.0075C7.1775 5.195 7.275 5.3675 7.3425 5.5325C7.41 5.69 7.4475 5.8475 7.4475 5.99C7.4475 6.17 7.395 6.35 7.29 6.5225C7.1925 6.695 7.05 6.875 6.87 7.055L6.3 7.6475C6.2175 7.73 6.18 7.8275 6.18 7.9475C6.18 8.0075 6.1875 8.06 6.2025 8.12C6.225 8.18 6.2475 8.225 6.2625 8.27C6.3975 8.5175 6.63 8.84 6.96 9.23C7.2975 9.62 7.6575 10.0175 8.0475 10.415C8.1225 10.49 8.205 10.565 8.28 10.64C8.58 10.9325 8.5875 11.4125 8.2875 11.7125Z" fill="white"/>
                    <path d="M16.4775 14.2475C16.4775 14.4575 16.44 14.675 16.365 14.885C16.3425 14.945 16.32 15.005 16.29 15.065C16.1625 15.335 15.9975 15.59 15.78 15.83C15.4125 16.235 15.0075 16.5275 14.55 16.715C14.5425 16.715 14.535 16.7225 14.5275 16.7225C14.085 16.9025 13.605 17 13.0875 17C12.3225 17 11.505 16.82 10.6425 16.4525C9.77998 16.085 8.91748 15.59 8.06248 14.9675C7.76998 14.75 5.9025 13.1075 5.625 12.875L8.25 10.625C8.46 10.7825 10.05 12.125 10.2075 12.2075C10.245 12.2225 10.29 12.245 10.3425 12.2675C10.4025 12.29 10.4625 12.2975 10.53 12.2975C10.6575 12.2975 10.755 12.2525 10.8375 12.17L11.4075 11.6075C11.595 11.42 11.775 11.2775 11.9475 11.1875C12.12 11.0825 12.2925 11.03 12.48 11.03C12.6225 11.03 12.7725 11.06 12.9375 11.1275C13.1025 11.195 13.275 11.2925 13.4625 11.42L15.945 13.1825C16.14 13.3175 16.275 13.475 16.3575 13.6625C16.4325 13.85 16.4775 14.0375 16.4775 14.2475Z" fill="white"/>
                    </svg>

                  <?php echo get_settings('phone'); ?></a>
              </li>
              <li class="nav-item px-2">
                <a href="mailto:<?php echo get_settings('system_email'); ?>">
                  <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.75 3.125H5.25C3 3.125 1.5 4.25 1.5 6.875V12.125C1.5 14.75 3 15.875 5.25 15.875H12.75C15 15.875 16.5 14.75 16.5 12.125V6.875C16.5 4.25 15 3.125 12.75 3.125ZM13.1025 7.6925L10.755 9.5675C10.26 9.965 9.63 10.16 9 10.16C8.37 10.16 7.7325 9.965 7.245 9.5675L4.8975 7.6925C4.6575 7.4975 4.62 7.1375 4.8075 6.8975C5.0025 6.6575 5.355 6.6125 5.595 6.8075L7.9425 8.6825C8.5125 9.14 9.48 9.14 10.05 8.6825L12.3975 6.8075C12.6375 6.6125 12.9975 6.65 13.185 6.8975C13.38 7.1375 13.3425 7.4975 13.1025 7.6925Z" fill="white"/>
                    </svg>
                <?php echo get_settings('system_email'); ?></a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="icon right-icon">
            <?php $facebook = get_frontend_settings('facebook'); ?>
            <?php $twitter = get_frontend_settings('twitter'); ?>
            <?php $linkedin = get_frontend_settings('linkedin'); ?>
            <ul class="nav justify-content-end">
              <?php if($facebook): ?>
                <li class="nav-item">
                  <a target="_blank" href="<?php echo $facebook; ?>"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
              <?php endif; ?>
              <?php if($twitter): ?>
                <li class="nav-item enav-item">
                  <a target="_blank" href="<?php echo $twitter; ?>">
                      <svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_30_3730)">
                          <path d="M11.2841 7.5801L18.2156 0H16.5731L10.5545 6.5817L5.74746 0H0.203125L7.47229 9.95269L0.203125 17.9016H1.84575L8.20153 10.9511L13.2781 17.9016H18.8224L11.2837 7.5801H11.2841ZM9.03434 10.0404L8.29782 9.04931L2.43761 1.16331H4.96059L9.68985 7.52757L10.4264 8.51863L16.5738 16.7912H14.0509L9.03434 10.0408V10.0404Z" fill="#fff"></path>
                          </g>
                          <defs>
                          <clipPath id="clip0_30_3730">
                          <rect width="19.0285" height="17.9016" fill="white"></rect>
                          </clipPath>
                          </defs>
                      </svg>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($linkedin): ?>
                <li class="nav-item">
                  <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fa-brands fa-linkedin"></i></a>
                </li>
              <?php endif; ?>

              <a href="#" class="invisible d-none" onclick="actionTo('<?php echo site_url('home/dark_and_light_mode') ?>')"><i class="fas fa-moon"></i></a>

              <li class="nav-item align-items-center d-flex ms-2">
                <form action="#" method="POST" class="language-control select-box">
                  <select onchange="actionTo(`<?php echo site_url('home/switch_language/') ?>${$(this).val()}`)" class="select-control form-select nice-select">
                    <?php
                    $languages = $this->crud_model->get_all_languages();
                    $selected_language = $this->session->userdata('language');
                    foreach ($languages as $language): ?>
                      <?php if (trim($language) != ""): ?>
                        <option value="<?php echo strtolower($language); ?>" <?php if ($selected_language == $language): ?>selected<?php endif; ?>><?php echo ucwords($language);?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---- Sub Header End ------>
  
  <section class="menubar">
    <?php include "header_lg_device.php"; ?>
    <!-- Offcanves Menu  -->
    <?php include "header_sm_device.php"; ?>
  </section>
</header>
<!---------- Header Section End  ---------->