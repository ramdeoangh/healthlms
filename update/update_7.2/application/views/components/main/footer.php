<?php
    if (! isset($facebook) && ! isset($twitter) && ! isset($linkedin)) {
        $facebook = get_frontend_settings('facebook');
        $twitter  = get_frontend_settings('twitter');
        $linkedin = get_frontend_settings('linkedin');
    }
?>

<style>
.footer img {
    height: 40px;
}

</style>

<?php if (get_frontend_settings('recaptcha_status_v3')): ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<!--------- footer Section Start--------------->
<section class="footer wow  animate__animated animate__fadeIn" data-wow-duration="1000" data-wow-delay="500" data-wow-duration="1000" data-wow-delay="600">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                <img width="180px" height="40px" loading="lazy" src="<?php echo base_url('uploads/system/' . get_frontend_settings('light_logo')); ?>">
                <p><?php echo get_settings('website_description'); ?></p>
                <div class="lattest-news newFooterlatest">
                    <h1><?php echo get_phrase('Subscribe to our Newsletter'); ?></h1>
                    <form class="ajaxForm resetable" action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>" method="post" id="newsletter-form">
                        <input type="email" class="form-control" id="subscribe_email" placeholder="<?php echo get_phrase('Enter your email address'); ?>" name="email">
                        <?php if (get_frontend_settings('recaptcha_status_v3')): ?>
                        <button class="form-arrow g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey_v3'); ?>" data-callback='onSubmit' data-action='submit'><i
                                class="fa-solid fa-arrow-right-long"></i></button>
                        <?php else: ?>
                        <button class="form-arrow" type="submit"><i class="fa-solid fa-arrow-right-long"></i></button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-5">
                <h1><?php echo site_phrase('top_categories'); ?></h1>
                <ul>
                    <?php $top_10_categories = $this->crud_model->get_top_categories(6, 'sub_category_id'); ?>
                    <?php foreach ($top_10_categories as $top_10_category): ?>
                    <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <li><a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>"><?php echo $category_details['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-5">
                <h1><?php echo site_phrase('useful_links'); ?></h1>
                <ul>
                    <?php if (get_settings('allow_instructor') == 1): ?>
                    <li> <a href="<?php echo site_url('home/become_an_instructor'); ?>"><?php echo site_phrase('Become an instructor'); ?></a></li>
                    <?php endif; ?>
                    <li> <a href="<?php echo site_url('blog'); ?>"><?php echo site_phrase('blog'); ?></a></li>
                    <li><a href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
                    <li><a href="<?php echo site_url('home/posts'); ?>"><?php echo site_phrase('community'); ?></a></li>
                    <?php if (get_settings('public_signup') == 'enable'): ?>
                    <li><a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('sign_up'); ?></a></li>
                    <?php endif; ?>
                    <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'footer'); ?>
                    <?php foreach ($custom_page_menus->result_array() as $custom_page_menu): ?>
                    <li><a href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>"><?php echo $custom_page_menu['button_title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-5">
                <h1><?php echo site_phrase('help'); ?></h1>
                <ul>
                    <li><a href="<?php echo site_url('home/contact_us'); ?>"><?php echo site_phrase('contact_us'); ?></a></li>
                    <li><a href="<?php echo site_url('home/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a></li>
                    <li><a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
                    <li><a href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo site_phrase('terms_and_condition'); ?></a></li>
                    <li><a href="<?php echo site_url('home/faq'); ?>"><?php echo site_phrase('FAQ'); ?></a></li>
                    <li><a href="<?php echo site_url('home/refund_policy'); ?>"><?php echo site_phrase('refund_policy'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="eBottomfooter">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <p><?php echo site_phrase(get_settings('footer_text')); ?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="nav gap-3 justify-content-end">
                        <li class="nav-item">
                            <a target="_blank" href="<?php echo $facebook; ?>">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_22_918)">
                                        <path
                                            d="M18.902 8.99994C18.902 4.02941 14.6706 0 9.45099 0C4.23135 0 0 4.02941 0 8.99994C0 13.492 3.45607 17.2154 7.97427 17.8905V11.6015H5.57461V8.99994H7.97427V7.01714C7.97427 4.76153 9.38528 3.5156 11.5441 3.5156C12.5778 3.5156 13.6596 3.69138 13.6596 3.69138V5.90621H12.4679C11.2939 5.90621 10.9277 6.60001 10.9277 7.31245V8.99994H13.5489L13.1299 11.6015H10.9277V17.8905C15.4459 17.2154 18.902 13.492 18.902 8.99994Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_918">
                                            <rect width="18.902" height="17.9999" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="<?php echo $twitter; ?>">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_22_920)">
                                        <path
                                            d="M12.1875 7.62942L19.1189 0.0493164H17.4764L11.4578 6.63101L6.65078 0.0493164H1.10645L8.37561 10.002L1.10645 17.9509H2.74907L9.10485 11.0004L14.1814 17.9509H19.7258L12.1871 7.62942H12.1875ZM9.93766 10.0897L9.20114 9.09863L3.34093 1.21263H5.86391L10.5932 7.57688L11.3297 8.56795L17.4772 16.8405H14.9542L9.93766 10.0901V10.0897Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_920">
                                            <rect width="19.0285" height="17.9016" fill="white" transform="translate(0.902344 0.0493164)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="<?php echo $linkedin; ?>">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_22_923)">
                                        <path
                                            d="M17.5135 0H1.40624C0.634655 0 0.0107422 0.580074 0.0107422 1.29726V16.6991C0.0107422 17.4163 0.634655 17.9999 1.40624 17.9999H17.5135C18.2851 17.9999 18.9127 17.4163 18.9127 16.7026V1.29726C18.9127 0.580074 18.2851 0 17.5135 0ZM5.61858 15.3386H2.81281V6.74644H5.61858V15.3386ZM4.21569 5.57574C3.3149 5.57574 2.58761 4.88317 2.58761 4.02888C2.58761 3.17459 3.3149 2.48201 4.21569 2.48201C5.1128 2.48201 5.84008 3.17459 5.84008 4.02888C5.84008 4.87965 5.1128 5.57574 4.21569 5.57574ZM16.118 15.3386H13.316V11.162C13.316 10.1671 13.2975 8.88392 11.8577 8.88392C10.3994 8.88392 10.1779 9.97025 10.1779 11.0917V15.3386H7.37956V6.74644H10.0672V7.92065H10.1041C10.477 7.24565 11.3925 6.53199 12.7548 6.53199C15.5938 6.53199 16.118 8.31088 16.118 10.6241V15.3386Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_923">
                                            <rect width="18.902" height="17.9999" fill="white" transform="translate(0.0107422)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------- footer Section End--------------->

<!-- PAYMENT MODAL -->
<!-- Modal -->
<?php
    $paypal_info = json_decode(get_settings('paypal'), true);
    $stripe_info = json_decode(get_settings('stripe_keys'), true);
    if ($paypal_info[0]['active'] == 0) {
        $paypal_status = 'disabled';
    } else {
        $paypal_status = '';
    }
    if ($stripe_info[0]['active'] == 0) {
        $stripe_status = 'disabled';
    } else {
        $stripe_status = '';
    }
?>


<script>
function onSubmit(token) {
    document.getElementById("newsletter-form").submit();
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.view-more-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            let parent = this.previousElementSibling;
            parent.querySelectorAll('.outcome-item.hidden').forEach(function(item) {
                item.classList.remove('hidden');
            });
            this.style.display = 'none';
        });
    });
});
</script>
