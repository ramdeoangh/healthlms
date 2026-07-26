<?php
$logged_user_id = $this->session->userdata('user_id');
$notifications = $this->db->order_by('status ASC, id desc')->limit(50)->where('to_user', $logged_user_id)->get('notifications');
$number_of_unread_notification = $this->db->order_by('status ASC, id desc')->limit(50)->where('status', 0)->where('to_user', $logged_user_id)->get('notifications')->num_rows();
?>
<style>
    .me-3px{
        margin-left: 3px !important;
    }
</style>
<a class="menu_wisth_tgl mt-1">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.0623 6.31219C12.7518 6.31219 12.4998 6.06019 12.4998 5.74969C12.4998 3.44738 10.7068 1.47919 8.41745 1.26882C6.12273 1.0576 3.99339 2.66354 3.57489 4.92535C3.52482 5.19479 3.49951 5.4721 3.49951 5.74969C3.49951 6.06019 3.24751 6.31219 2.93701 6.31219C2.62651 6.31219 2.37451 6.06019 2.37451 5.74969C2.37451 5.40347 2.40601 5.05725 2.46845 4.7206C2.99157 1.89319 5.64826 -0.116621 8.52067 0.148317C11.383 0.411567 13.6248 2.87194 13.6248 5.74969C13.6248 6.06047 13.3731 6.31219 13.0623 6.31219Z" fill="#0D0C23"/>
<path d="M13.062 13.0622C12.7515 13.0622 12.4995 12.8102 12.4995 12.4997C12.4995 12.1892 12.7515 11.9372 13.062 11.9372C13.6155 11.9372 13.9575 11.5583 14.0928 11.2037C14.2275 10.851 14.2247 10.3425 13.8121 9.9735C13.5806 9.7665 13.5604 9.41072 13.7679 9.17925C13.9747 8.94778 14.3307 8.92781 14.5619 9.13509C15.2527 9.75272 15.481 10.7225 15.1435 11.605C14.8055 12.4901 13.9884 13.0622 13.062 13.0622Z" fill="#0D0C23"/>
<path d="M13.062 7.60147C12.7515 7.60147 12.4995 7.34947 12.4995 7.03897V5.75C12.4995 5.4395 12.7515 5.1875 13.062 5.1875C13.3725 5.1875 13.6245 5.4395 13.6245 5.75V7.03897C13.6245 7.34947 13.3728 7.60147 13.062 7.60147Z" fill="#0D0C23"/>
<path d="M14.1867 10.1169C14.0531 10.1169 13.9193 10.0697 13.8121 9.97378C12.9779 9.22763 12.4995 8.15803 12.4995 7.03894C12.4995 6.72844 12.7515 6.47644 13.062 6.47644C13.3725 6.47644 13.6245 6.72844 13.6245 7.03894C13.6245 7.83825 13.9662 8.60241 14.5619 9.13538C14.7934 9.34238 14.8136 9.69816 14.6061 9.92963C14.4953 10.0537 14.3414 10.1169 14.1867 10.1169Z" fill="#0D0C23"/>
<path d="M2.93701 7.60147C2.62651 7.60147 2.37451 7.34947 2.37451 7.03897V5.75C2.37451 5.4395 2.62651 5.1875 2.93701 5.1875C3.24751 5.1875 3.49951 5.4395 3.49951 5.75V7.03897C3.49951 7.34947 3.24779 7.60147 2.93701 7.60147Z" fill="#0D0C23"/>
<path d="M1.81219 10.1169C1.6575 10.1169 1.50366 10.0536 1.39284 9.92932C1.18556 9.69785 1.20553 9.34207 1.437 9.13507C2.03269 8.6021 2.3744 7.83823 2.3744 7.03863C2.3744 6.72814 2.62641 6.47614 2.9369 6.47614C3.2474 6.47614 3.4994 6.72814 3.4994 7.03863C3.4994 8.15773 3.021 9.22732 2.18681 9.97348C2.07966 10.0697 1.94578 10.1169 1.81219 10.1169Z" fill="#0D0C23"/>
<path d="M7.99951 15.8747C6.16998 15.8747 4.62451 14.3292 4.62451 12.4997C4.62451 12.1892 4.87651 11.9372 5.18701 11.9372C5.49751 11.9372 5.74951 12.1892 5.74951 12.4997C5.74951 13.7192 6.77973 14.7497 7.99951 14.7497C9.21929 14.7497 10.2495 13.7192 10.2495 12.4997C10.2495 12.1892 10.5015 11.9372 10.812 11.9372C11.1225 11.9372 11.3745 12.1892 11.3745 12.4997C11.3745 14.3292 9.82904 15.8747 7.99951 15.8747Z" fill="#0D0C23"/>
<path d="M2.93711 13.0622C2.01067 13.0622 1.1942 12.4915 0.85698 11.6084C0.518917 10.7236 0.74673 9.75272 1.4372 9.13538C1.66895 8.92838 2.02445 8.94807 2.23145 9.17982C2.43845 9.41157 2.41848 9.76678 2.18701 9.97407C1.7747 10.3428 1.77245 10.853 1.90773 11.2073C2.04245 11.5603 2.38389 11.9378 2.93711 11.9378C3.24761 11.9378 3.49961 12.1898 3.49961 12.5003C3.49961 12.8108 3.24789 13.0622 2.93711 13.0622Z" fill="#0D0C23"/>
<path d="M13.062 13.0622H2.93701C2.62651 13.0622 2.37451 12.8102 2.37451 12.4997C2.37451 12.1892 2.62651 11.9372 2.93701 11.9372H13.062C13.3725 11.9372 13.6245 12.1892 13.6245 12.4997C13.6245 12.8102 13.3728 13.0622 13.062 13.0622Z" fill="#0D0C23"/>
</svg>

 
    <?php if($number_of_unread_notification > 0): ?>
        <p class="menu_number">
          <?php echo $number_of_unread_notification; ?>
        </p>
    <?php endif; ?>
</a>
<div class="menu_pro_wish" style="width: 275px;">
    <div class="w-100 d-flex">
      <a href="#" onclick="actionTo('<?php echo site_url('home/get_my_notification/remove_all'); ?>');" class="text-secondary ms-auto mt-3 me-3">
        <small><?php echo get_phrase('Remove all'); ?></small>
      </a>
    </div>
    <div class="overflow-control" id="notifications">
        <?php foreach($notifications->result_array() as $notification): ?>
            <div class="notify-item cursor-pointer d-flex py-2 px-3 <?php if($notification['status'] == 0) echo 'unread' ?>" style="width: 275px;">
                <?php if($notification['type'] == 'signup'): ?>
                    <div class="notify-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                <?php else: ?>
                    <div class="notify-icon">
                        <i class="far fa-bell"></i>
                    </div>
                <?php endif; ?>
                <div class="ps-2">
                  <p class="notify-details text-13px">
                      <?php echo $notification['title']; ?>
                      <small class="text-muted float-end"><?php echo get_past_time($notification['created_at']); ?></small>
                  </p>
                  <div class="text-muted mb-0 user-msg text-13px">
                      <?php echo ($notification['description']); ?>
                  </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if($notifications->num_rows() == 0): ?>
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <img loading="lazy" width="100px" src="<?php echo site_url('assets/global/image/empty-notification.png'); ?>">
                    <h5 class="my-1 text-15px"><?php echo get_phrase('No notification'); ?></h5>
                    <p class="px-4 mx-3 my-1 text-13px text-muted"><small><?php echo get_phrase('Stay tuned!'); ?> <?php echo get_phrase('Notifications about your activity will show up here.'); ?></small></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="menu_pro_btn">
      <a href="#" onclick="actionTo('<?php echo site_url('home/get_my_notification/mark_all_as_read'); ?>');" class="btn btn-primary text-white"><?php echo get_phrase('Mark all as read'); ?></a>
    </div>
</div>