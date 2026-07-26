<!-- Footer Area 2 Start -->
<footer class="lms2-footer-section">
    <div class="container">
        <div class="row g-5 ft2-padding ft2-border-bottom">
            <div class="col-sm-12 col-xl-8">
                <div class="row g-5">

                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="ft2-logo-area">
                            <a href="<?php echo base_url('home'); ?>" class="lms2-footer-logo mb-3">
                                <img width="180px" height="40px" loading="lazy" src="<?php echo base_url('uploads/system/' . get_frontend_settings('light_logo')); ?>">
                            </a>
                            <p><?php echo get_settings('website_description'); ?></p>
                            <h4 class="ft2-title mt-4 mb-4"><?php echo get_phrase('Contact_us'); ?></h4>
                            <ul>
                                <li>
                                    <a class="ft2-nav-link" href="<?php echo site_url('home/contact_us'); ?>">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" x="0" y="0"
                                            viewBox="0 0 548.244 548.244" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path fill-rule="evenodd"
                                                    d="M392.19 156.054 211.268 281.667 22.032 218.58C8.823 214.168-.076 201.775 0 187.852c.077-13.923 9.078-26.24 22.338-30.498L506.15 1.549c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666L390.89 525.906c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z"
                                                    clip-rule="evenodd" fill="#9aa1b7" opacity="1" data-original="#9aa1b7" class=""></path>
                                            </g>
                                        </svg>
                                        <?php echo site_phrase('Send message'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="ft2-nav-wrap">
                            <h4 class="ft2-title mb-30px"><?php echo get_phrase('top_categories'); ?></h4>
                            <ul class="ft2-nav-group">
                                <?php if (! isset($top_10_categories)) {
                                        $top_10_categories = $this->crud_model->get_top_categories(6, 'sub_category_id');
                                    }
                                ?>
                                <?php foreach ($top_10_categories as $key => $top_10_category):
                                        if ($key == 6) {
                                            break;
                                        }

                                    ?>
	                                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
	                                <li><a class="ft2-nav-link" href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>"><?php echo $category_details['name']; ?></a></li>
	                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="ft2-nav-wrap">
                            <h4 class="ft2-title mb-30px"><?php echo get_phrase('useful_links'); ?></h4>
                            <ul class="ft2-nav-group">
                                <?php if (get_settings('allow_instructor') == 1): ?>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('home/become_an_instructor'); ?>"><?php echo site_phrase('Become an instructor'); ?></a></li>
                                <?php endif; ?>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('blog'); ?>"><?php echo site_phrase('blog'); ?></a></li>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('home/posts'); ?>"><?php echo site_phrase('community'); ?></a></li>                                
                                <?php if (get_settings('public_signup') == 'enable'): ?>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('sign_up'); ?></a></li>
                                <?php endif; ?>
                                <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'footer'); ?>
                                <?php foreach ($custom_page_menus->result_array() as $custom_page_menu): ?>
                                <li> <a class="ft2-nav-link" href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>"><?php echo $custom_page_menu['button_title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-xl-4">
                <div class="ft2-subscribe-wrap w-100">
                    <h4 class="ft2-title mb-20px"><?php echo get_phrase('SUBSCRIBE'); ?></h4>
                    <form class="ajaxForm resetable mb-12px" action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>" method="post" id="newsletter-form">
                        <div class="position-relative">
                            <input type="email" name="email" class="form-control ft2-newsLetter-input" id="subscribe_email" placeholder="<?php echo get_phrase('Email address'); ?>">

                            <?php if (get_frontend_settings('recaptcha_status_v3')): ?>
                            <button data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey_v3'); ?>" data-callback='onSubmit' data-action='submit'
                                class="ft2-newsLetter-btn g-recaptcha border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M18.0885 10.5904L12.2559 16.4229C12.0934 16.5854 11.8801 16.6671 11.6667 16.6671C11.4534 16.6671 11.2401 16.5854 11.0776 16.4229C10.7517 16.0971 10.7517 15.5704 11.0776 15.2445L15.4884 10.8337H2.50008C2.03925 10.8337 1.66675 10.4604 1.66675 10.0004C1.66675 9.5404 2.03925 9.16706 2.50008 9.16706H15.4884L11.0776 4.75626C10.7517 4.43042 10.7517 3.9037 11.0776 3.57787C11.4034 3.25204 11.9301 3.25204 12.2559 3.57787L18.0885 9.41039C18.166 9.48789 18.2268 9.5795 18.2693 9.682C18.3535 9.88533 18.3535 10.1155 18.2693 10.3188C18.2268 10.4213 18.166 10.5129 18.0885 10.5904Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <?php else: ?>
                            <button type="submit" class="ft2-newsLetter-btn border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M18.0885 10.5904L12.2559 16.4229C12.0934 16.5854 11.8801 16.6671 11.6667 16.6671C11.4534 16.6671 11.2401 16.5854 11.0776 16.4229C10.7517 16.0971 10.7517 15.5704 11.0776 15.2445L15.4884 10.8337H2.50008C2.03925 10.8337 1.66675 10.4604 1.66675 10.0004C1.66675 9.5404 2.03925 9.16706 2.50008 9.16706H15.4884L11.0776 4.75626C10.7517 4.43042 10.7517 3.9037 11.0776 3.57787C11.4034 3.25204 11.9301 3.25204 12.2559 3.57787L18.0885 9.41039C18.166 9.48789 18.2268 9.5795 18.2693 9.682C18.3535 9.88533 18.3535 10.1155 18.2693 10.3188C18.2268 10.4213 18.166 10.5129 18.0885 10.5904Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <?php endif; ?>

                        </div>
                    </form>
                    <p class="ft2-short-des mb-4"><?php echo get_phrase('Subscribe to our newsletter to receive the latest news and promotions.'); ?></p>
                    <?php
                        $facebook = get_frontend_settings('facebook');
                        $twitter  = get_frontend_settings('twitter');
                        $linkedin = get_frontend_settings('linkedin');
                    ?>
                    <ul class="ft2-social-group">
                        <?php if ($facebook != ''): ?>
                        <li>
                            <a href="<?php echo $facebook; ?>" class="ft2-socila-link" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <g clip-path="url(#clip0_285_1344)">
                                        <path
                                            d="M12.1693 11.2513H14.2526L15.0859 7.91797H12.1693V6.2513C12.1693 5.39297 12.1693 4.58464 13.8359 4.58464H15.0859V1.78464C14.8143 1.7488 13.7884 1.66797 12.7051 1.66797C10.4426 1.66797 8.83594 3.0488 8.83594 5.58464V7.91797H6.33594V11.2513H8.83594V18.3346H12.1693V11.2513Z"
                                            fill="#CED6EF" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_285_1344">
                                            <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if ($twitter != ''): ?>
                        <li>
                            <a href="<?php echo $twitter; ?>" class="ft2-socila-link" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path
                                        d="M15.7718 1.58691H18.5831L12.4413 8.60647L19.6666 18.1586H14.0093L9.57825 12.3653L4.50821 18.1586H1.69528L8.26444 10.6503L1.33325 1.58691H7.13418L11.1394 6.88219L15.7718 1.58691ZM14.7852 16.4759H16.3429L6.28774 3.18119H4.61614L14.7852 16.4759Z"
                                        fill="#CED6EF" />
                                </svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if ($linkedin != ''): ?>
                        <li>
                            <a href="<?php echo $linkedin; ?>" class="ft2-socila-link" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <g clip-path="url(#clip0_285_1350)">
                                        <path
                                            d="M6.28255 4.1675C6.28233 4.60953 6.10652 5.03336 5.79381 5.34577C5.48109 5.65817 5.05708 5.83355 4.61505 5.83333C4.17302 5.83311 3.74919 5.65731 3.43678 5.34459C3.12438 5.03187 2.949 4.60786 2.94922 4.16583C2.94944 3.72381 3.12525 3.29997 3.43796 2.98757C3.75068 2.67516 4.17469 2.49978 4.61672 2.5C5.05875 2.50022 5.48258 2.67603 5.79499 2.98874C6.10739 3.30146 6.28277 3.72547 6.28255 4.1675ZM6.33255 7.0675H2.99922V17.5008H6.33255V7.0675ZM11.5992 7.0675H8.28255V17.5008H11.5659V12.0258C11.5659 8.97583 15.5409 8.6925 15.5409 12.0258V17.5008H18.8326V10.8925C18.8326 5.75083 12.9492 5.9425 11.5659 8.4675L11.5992 7.0675Z"
                                            fill="#CED6EF" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_285_1350">
                                            <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="ft2-bottom-content">
                    <p class="ft2-copyright-info">
                        <?php echo get_phrase('copyright'); ?> ©<?php echo date('Y'); ?>
                        <?php if (get_settings('footer_text') != ''): ?><a href="<?php echo get_settings('footer_link'); ?>"><?php echo get_settings('footer_text'); ?> </a><?php endif; ?>
                        <?php echo get_phrase('all_rights_reserved'); ?>.
                    </p>
                    <ul class="ft2-copyright-nav-group">
                        <li class="ft2-copyright-nav-item"><a class="ft2-copyright-nav-link" href="<?php echo site_url('home/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a></li>
                        <li class="ft2-copyright-nav-item"><a class="ft2-copyright-nav-link" href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
                        <li class="ft2-copyright-nav-item"><a class="ft2-copyright-nav-link"
                                href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo site_phrase('terms_and_condition'); ?></a></li>
                        <li class="ft2-copyright-nav-item"><a class="ft2-copyright-nav-link" href="<?php echo site_url('home/faq'); ?>"><?php echo site_phrase('FAQ'); ?></a></li>
                        <li class="ft2-copyright-nav-item"><a class="ft2-copyright-nav-link" href="<?php echo site_url('home/refund_policy'); ?>"><?php echo site_phrase('refund_policy'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area 2 End -->
