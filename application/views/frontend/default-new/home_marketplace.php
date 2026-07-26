<?php include 'home_marketplace_assets.php'?>

<style>
.menubar {
    z-index: 99 !important;
    background-color: revert;
}

.search-input {
    background-color: transparent;
}

</style>
<!-- Online Course Marketplace Hero Area Start -->
<section class="lms-hero-section4">
    <div class="container">
        <div class="row gy-30px position-relative">
            <div class="col-lg-6 col-xl-7">
                <div class="lms-hero-content4">
                    <h4 class="hero4-category mb-1"><?php echo get_phrase('The Leader in') . ' ' . get_settings('system_name'); ?></h4>
                    <?php
                        $banner_title     = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>

                    <h1 class="title-11 fs-64px mb-20px">
                        <?php
                            foreach ($banner_title_arr as $key => $value) {
                                if (0 == $key) {
                                    echo '<span class="hero4-title-light">' . $value . '</span>';
                                } else {
                                    echo $value . ' ';
                                }
                            }
                        ?>
                    </h1>
                    <p class="subtitle-9 fs-16px fw-medium text-secondary-3 mb-40px"><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="d-flex align-items-center flex-wrap gap-12px">
                        <a href="<?php echo site_url('home/courses'); ?>" class="btn lms1-btn-blue">
                            <span><?php echo get_phrase('Buy The Course') ?></span>
                            <span class="fi-rr-arrow-right"></span>
                        </a>
                        <a href="#top-course-slider" class="btn lms1-btn-outline-blue"><?php echo get_phrase('Learn More') ?></a>
                    </div>
                    <div class="hero4-circle-btn-wrap">
                        <a href="#" class="hero4-circle-btn">
                            <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero4-cicle-btn.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 align-self-end">
                <div class="lms-hero4-banner ms-auto">
                    <img class="banner" src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/hero4-banner.webp" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Online Course Marketplace Hero Area End -->

<!-- Category Area 3 Start -->
<?php if (get_frontend_settings('top_category_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row gy-30px gx-30px">

            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
            <?php foreach ($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>" class="category-type3-card">
                    <span class="category-type3-icon">
                        <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                    </span>
                    <h6 class="category-type3-title"><?php echo $category_details['name']; ?></h6>
                    <p class="category-type3-subtitle"><?php echo $top_10_category['course_number'] . ' ' . site_phrase('Courses'); ?></p>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Category Area 3 End -->
<?php endif; ?>

<!--Courses Card Design 5 Start -->
<?php if (get_frontend_settings('top_course_section') == 1): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4 fs-34px lh-44px fw-semibold mb-50px"><?php echo get_phrase('Top Courses') ?></h1>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php $top_courses = $this->crud_model->get_top_courses()->result_array();
                foreach ($top_courses as $key => $top_course):
                    if ($key == 8) {
                        break;
                    }

                    $instructor_details          = $this->user_model->get_all_user($top_course['creator'])->row_array();
                    $course_duration             = $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']);
                    $number_of_enrolled_students = $this->crud_model->enrol_history($top_course['id'], true)->num_rows();
                    $lessons                     = $this->crud_model->get_lessons('course', $top_course['id']);
                    $total_rating                = $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                    $number_of_ratings           = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                ?>
	            <div class="col-md-6 col-lg-4 single-popup-course epopCourse position-relative">
	                <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>"
	                    class="lms5-course-card">
	                    <div>
	                        <figure class="lms5-cCard-banner">
	                            <img class="banner" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>" alt="">
	                        </figure>
	                        <div class="lms5-cCard-body">
	                            <h4 class="lms5-cCard-title"><?php echo $top_course['title']; ?></h4>
	                            <div class="course-meta-info-wrap mb-12px">
	                                <div class="meta-info5-wrap">
	                                    <span class="svg-block">
	                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M14 10.5C14 10.9688 13.7812 11.3438 13.5 11.625V14.1562C13.7812 14.3438 14 14.6562 14 15C14 15.5625 13.5312 16 13 16H3C1.3125 16 0 14.6875 0 13V3C0 1.34375 1.3125 0 3 0H6V6C6 6.4375 6.46875 6.65625 6.78125 6.40625L8.5 5L10.1875 6.375C10.5 6.625 11 6.40625 11 6V0H12.5C13.3125 0 14 0.6875 14 1.5V10.5ZM12 14V12H3C2.4375 12 2 12.4688 2 13C2 13.5625 2.4375 14 3 14H12Z"
	                                                fill="#080808" fill-opacity="0.25" />
	                                        </svg>
	                                    </span>
	                                    <p class="course-meta-info1"><?php echo get_phrase('Lessons : '); ?><?php echo $lessons->num_rows(); ?></p>
	                                </div>
	                                <div class="meta-info5-wrap">
	                                    <span class="svg-block">
	                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                            <path
	                                                d="M7 8C4.78125 8 3 6.21875 3 4C3 1.8125 4.78125 0 7 0C9.1875 0 11 1.8125 11 4C11 6.21875 9.1875 8 7 8ZM8.5625 9.5C11.5625 9.5 14 11.9375 14 14.9375C14 15.5312 13.5 16 12.9062 16H1.0625C0.46875 16 0 15.5312 0 14.9375C0 11.9375 2.40625 9.5 5.40625 9.5H8.5625Z"
	                                                fill="#080808" fill-opacity="0.25" />
	                                        </svg>
	                                    </span>
	                                    <p class="course-meta-info1"><?php echo get_phrase('Students : '); ?><?php echo $number_of_enrolled_students; ?></p>
	                                </div>
	                            </div>
	                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
	                                <div class="d-flex align-items-center flex-wrap gap-1">
	                                    <h6 class="cCard-course-by"><?php echo get_phrase('By') ?></h6>
	                                    <h5 class="cCard-user-name2"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></h5>
	                                </div>
	                                <div class="d-flex align-items-center gap-1 flex-wrap">
	                                    <?php if ($top_course['is_free_course']): ?>
	                                    <h4 class="cCard-new-price"><?php echo get_phrase('Free'); ?></h4>
	                                    <?php elseif (! $top_course['discount_flag']): ?>
                                    <h4 class="cCard-new-price"><?php echo currency($top_course['price']); ?></h4>
                                    <?php else: ?>
                                    <h4 class="cCard-old-price"><?php echo currency($top_course['price']); ?></h4>
                                    <h4 class="cCard-new-price"><?php echo currency($top_course['discounted_price']); ?></h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <span class="svg-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M14.9313 11.934C14.8248 12.0371 14.7449 12.1645 14.6984 12.3053C14.652 12.4461 14.6404 12.5961 14.6646 12.7423L15.4063 16.8423C15.4368 17.0125 15.4177 17.1879 15.3512 17.3475C15.2847 17.5071 15.1736 17.6442 15.0313 17.7423C14.8916 17.8443 14.7259 17.9046 14.5534 17.9164C14.3809 17.9282 14.2085 17.891 14.0563 17.809L10.3646 15.884C10.2359 15.8162 10.0933 15.7791 9.94792 15.7757H9.72292C9.64409 15.7872 9.56792 15.8126 9.49792 15.8507L5.80626 17.784C5.62292 17.8757 5.41709 17.909 5.21459 17.8757C4.97749 17.8306 4.76733 17.6948 4.62882 17.4971C4.49031 17.2995 4.43438 17.0556 4.47292 16.8173L5.21459 12.7173C5.23887 12.5698 5.22732 12.4186 5.18091 12.2764C5.1345 12.1343 5.05459 12.0054 4.94792 11.9007L1.93959 8.98398C1.81625 8.86478 1.72954 8.71282 1.68968 8.54598C1.64982 8.37915 1.65846 8.2044 1.71459 8.04232C1.82709 7.71232 2.11209 7.47148 2.45626 7.41732L6.59792 6.81732C6.91292 6.78399 7.18959 6.59232 7.33126 6.30899L9.15626 2.56732C9.19876 2.48398 9.25459 2.40732 9.32292 2.34232L9.39792 2.28398C9.43652 2.24122 9.4815 2.20468 9.53126 2.17565L9.62292 2.14232L9.76459 2.08398H10.1146C10.4288 2.11732 10.7046 2.30398 10.8479 2.58398L12.6979 6.30899C12.8313 6.58149 13.0896 6.77065 13.3896 6.81732L17.5313 7.41732C17.8813 7.46732 18.1729 7.70898 18.2896 8.04232C18.3979 8.37648 18.3038 8.74315 18.0479 8.98398L14.9313 11.934Z"
                                                fill="#F8BC24" />
                                        </svg>
                                    </span>
                                    <h5 class="cCard4-review">(                                                                <?php echo $average_ceil_rating; ?> <?php echo get_phrase('Reviews') ?>)</h5>
                                </div>
                                <span class="btn lms1-btn-dark-rounded"><?php echo get_phrase('Buy Now') ?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <div id="top_course_feature_<?php echo $top_course['id']; ?>" class="course-popover-content">
                    <?php if ($top_course['last_modified'] == ""): ?>
                    <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['date_added']); ?></p>
                    <?php else: ?>
                    <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['last_modified']); ?></p>
                    <?php endif; ?>
                    <div class="course-title">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>"><?php echo $top_course['title']; ?></a>
                    </div>
                    <div class="course-meta">
                        <?php if ($top_course['course_type'] == 'general'): ?>
                        <span class=""><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.97999 15.1666C4.03332 15.1666 0.813324 11.9533 0.813324 7.99998C0.813324 4.04665 4.03332 0.833313 7.97999 0.833313C11.9267 0.833313 15.1467 4.04665 15.1467 7.99998C15.1467 11.9533 11.9333 15.1666 7.97999 15.1666ZM7.97999 1.83331C4.57999 1.83331 1.81332 4.59998 1.81332 7.99998C1.81332 11.4 4.57999 14.1666 7.97999 14.1666C11.38 14.1666 14.1467 11.4 14.1467 7.99998C14.1467 4.59998 11.38 1.83331 7.97999 1.83331Z"
                                    fill="#AAAFB6" />
                                <path
                                    d="M7.03999 11.3267C6.74666 11.3267 6.46666 11.2533 6.21999 11.1133C5.64666 10.78 5.32666 10.1267 5.32666 9.27333V7.04C5.32666 6.18666 5.63999 5.53333 6.21333 5.2C6.78666 4.86666 7.51333 4.92 8.25333 5.34666L10.1867 6.46C10.9267 6.88666 11.3333 7.48666 11.3333 8.15333C11.3333 8.81333 10.9267 9.42 10.1867 9.84666L8.25333 10.96C7.83999 11.2067 7.41999 11.3267 7.03999 11.3267ZM7.03999 5.98C6.91999 5.98 6.80666 6.00666 6.71999 6.06C6.46666 6.20666 6.32666 6.56 6.32666 7.04V9.27333C6.32666 9.74666 6.46666 10.1067 6.71999 10.2467C6.96666 10.3933 7.34666 10.3333 7.75999 10.1L9.69333 8.98666C10.1067 8.74666 10.34 8.44666 10.34 8.16C10.34 7.87333 10.1 7.57333 9.69333 7.33333L7.75999 6.22C7.49333 6.06 7.24666 5.98 7.03999 5.98Z"
                                    fill="#AAAFB6" />
                            </svg>

                            <?php echo $this->crud_model->get_lessons('course', $top_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                        </span>
                        <?php if ($course_duration): ?>
                        <span class="">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.99998 15.1666C4.04665 15.1666 0.833313 11.9533 0.833313 7.99998C0.833313 4.04665 4.04665 0.833313 7.99998 0.833313C11.9533 0.833313 15.1666 4.04665 15.1666 7.99998C15.1666 11.9533 11.9533 15.1666 7.99998 15.1666ZM7.99998 1.83331C4.59998 1.83331 1.83331 4.59998 1.83331 7.99998C1.83331 11.4 4.59998 14.1666 7.99998 14.1666C11.4 14.1666 14.1666 11.4 14.1666 7.99998C14.1666 4.59998 11.4 1.83331 7.99998 1.83331Z"
                                    fill="#AAAFB6" />
                                <path
                                    d="M10.4733 10.62C10.3867 10.62 10.3 10.6 10.22 10.5467L8.15334 9.31332C7.64001 9.00665 7.26001 8.33332 7.26001 7.73999V5.00665C7.26001 4.73332 7.48668 4.50665 7.76001 4.50665C8.03334 4.50665 8.26001 4.73332 8.26001 5.00665V7.73999C8.26001 7.97999 8.46001 8.33332 8.66668 8.45332L10.7333 9.68665C10.9733 9.82665 11.0467 10.1333 10.9067 10.3733C10.8067 10.5333 10.64 10.62 10.4733 10.62Z"
                                    fill="#AAAFB6" />
                            </svg>

                            <?php echo $course_duration; ?>
                        </span>
                        <?php endif; ?>
                        <?php elseif ($top_course['course_type'] == 'h5p'): ?>
                        <span class="badge bg-light"><?php echo site_phrase('h5p_course'); ?></span>
                        <?php elseif ($top_course['course_type'] == 'scorm'): ?>
                        <span class="badge bg-light"><?php echo site_phrase('scorm_course'); ?></span>
                        <?php endif; ?>
                        <span class="">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.00001 15.1666C4.04668 15.1666 0.833344 11.9533 0.833344 7.99998C0.833344 4.04665 4.04668 0.833313 8.00001 0.833313C11.9533 0.833313 15.1667 4.04665 15.1667 7.99998C15.1667 11.9533 11.9533 15.1666 8.00001 15.1666ZM8.00001 1.83331C4.60001 1.83331 1.83334 4.59998 1.83334 7.99998C1.83334 11.4 4.60001 14.1666 8.00001 14.1666C11.4 14.1666 14.1667 11.4 14.1667 7.99998C14.1667 4.59998 11.4 1.83331 8.00001 1.83331Z"
                                    fill="#AAAFB6" />
                                <path
                                    d="M5.99341 10.4133C4.66007 10.4133 3.58008 9.33333 3.58008 8C3.58008 6.66667 4.66007 5.58667 5.99341 5.58667C6.58008 5.58667 7.14008 5.80002 7.58675 6.18669C7.79342 6.36669 7.81342 6.68668 7.63342 6.89335C7.45342 7.10002 7.13342 7.11998 6.92676 6.93998C6.66676 6.71332 6.34008 6.58667 5.99341 6.58667C5.21341 6.58667 4.58008 7.22 4.58008 8C4.58008 8.78 5.21341 9.41333 5.99341 9.41333C6.33341 9.41333 6.66676 9.28668 6.92676 9.06002C7.13342 8.88002 7.44676 8.89998 7.63342 9.10665C7.81342 9.31332 7.79342 9.63331 7.58675 9.81331C7.14008 10.2 6.57341 10.4133 5.99341 10.4133Z"
                                    fill="#AAAFB6" />
                                <path
                                    d="M10.6601 10.4133C9.32673 10.4133 8.24673 9.33333 8.24673 8C8.24673 6.66667 9.32673 5.58667 10.6601 5.58667C11.2467 5.58667 11.8067 5.80002 12.2534 6.18669C12.4601 6.36669 12.4801 6.68668 12.3001 6.89335C12.1201 7.10002 11.8001 7.11998 11.5934 6.93998C11.3334 6.71332 11.0067 6.58667 10.6601 6.58667C9.88006 6.58667 9.24673 7.22 9.24673 8C9.24673 8.78 9.88006 9.41333 10.6601 9.41333C11.0001 9.41333 11.3334 9.28668 11.5934 9.06002C11.8001 8.88002 12.1134 8.89998 12.3001 9.10665C12.4801 9.31332 12.4601 9.63331 12.2534 9.81331C11.8067 10.2 11.2401 10.4133 10.6601 10.4133Z"
                                    fill="#AAAFB6" />
                            </svg>

                            <?php echo ucfirst($top_course['language']); ?></span>
                    </div>

                    <h6 class="text-white text-14px outCome"><?php echo get_phrase('Outcomes') ?>:</h6>
                    <ul class="will-learn">
                        <?php
                            $outcomes = json_decode($top_course['outcomes']);
                            $count    = 0;
                            foreach ($outcomes as $outcome):
                                $count++;
                            ?>
	                        <li class="outcome-item<?php echo($count > 3) ? 'hidden' : ''; ?>">
	                            <?php echo $outcome; ?>
	                        </li>
	                        <?php endforeach; ?>
                    </ul>

                    <button class="view-more-btn"
                        style="display:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <?php echo(count($outcomes) > 3) ? 'inline-block' : 'none'; ?>">
                        <?php echo site_phrase('View More') ?>
                    </button>

                    <div class="popover-btns">
                        <?php $cart_items = $this->session->userdata('cart_items'); ?>
                        <?php if (is_purchased($top_course['id'])): ?>
                        <a href="<?php echo site_url('home/lesson/' . slugify($top_course['title']) . '/' . $top_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i
                                class="far fa-play-circle me-2"></i><?php echo get_phrase('Start Now'); ?></a>
                        <?php if ($top_course['is_free_course'] != 1): ?>
                        <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip"
                            onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $top_course['id'] . '?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php if ($top_course['is_free_course'] == 1): ?>
                        <a class="purchase-btn green_purchase ms-auto"
                            href="<?php echo site_url('home/get_enrolled_to_free_course/' . $top_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                        <?php else: ?>

                        <!-- Cart button -->
                        <a id="added_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (! in_array($top_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'] . '/top_course'); ?>');">
                            <i class="fas fa-minus me-2"></i>                                                              <?php echo get_phrase('Remove from cart'); ?>
                        </a>
                        <a id="add_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto<?php if (in_array($top_course['id'], $cart_items)) {
        echo 'd-hidden';
}
?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'] . '/top_course'); ?>'); ">
                            <i class="fas fa-plus me-2"></i>                                                             <?php echo get_phrase('Add to cart'); ?>
                        </a>
                        <!-- Cart button ended-->
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <script>
                    $(document).ready(function() {
                        $('#top_course_<?php echo $top_course['id']; ?>').webuiPopover({
                            url: '#top_course_feature_<?php echo $top_course['id']; ?>',
                            trigger: 'hover',
                            animation: 'pop',
                            cache: false,
                            multi: true,
                            direction: 'rtl',
                            placement: 'horizontal',
                        });
                    });
                    </script>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--Courses Card Design 5 End -->


<?php if (get_frontend_settings('faq_section') == 1): ?>
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if (count($website_faqs) > 0): ?>
<!---------- Questions Section Start  -------------->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">

        <!-- Section title -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="title-4 fs-34px lh-44px fw-semibold text-center mb-50px"><?php echo get_phrase('Frequently Asked Questions') ?></h1>
            </div>
        </div>
        <div class="accordion custom-accordion-two faq-5" id="accordionFaq">

            <?php foreach ($website_faqs as $key => $faq): ?>
            <?php if ($key > 4) {
                    break;
                }
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                    <button
                        class="accordion-button                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php if ($key > 0) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo 'collapsed';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>"
                        type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                        <?php echo $faq['question']; ?>
                    </button>
                </h2>
                <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse<?php if ($key == 0) {
        echo 'show';
}
?>" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                    <div class="accordion-body">
                        <p><?php echo nl2br($faq['answer']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!---------- Questions Section End  -------------->
<?php endif; ?>
<?php endif; ?>


<!-- Review Area 2 Start -->
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
                        <h2 class="mb-12px title-typo2 fs-48px lms1-text-dark ls-0 fw-bold"><?php echo get_phrase('What Our Customers Say') ?></h2>
                        <p class=".subtitle-typo1 fs-16px lms1-text-secondary">
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

<!-- Review Area 2 End -->



<!-- Subscribe Area Start -->
<section>
    <div class="container">
        <div class="subscribe-area-wrap1 mb-100px">
            <div class="row">
                <div class="col-lg-5">
                    <div class="subscribe-area-banner1">
                        <img src="<?php echo base_url(); ?>assets/frontend/default-new/image/img/subscribe-banner1.webp" alt="banner">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="subscribe-area-1">
                        <h3 class="title-4 title-subscription-4 fs-28px lh-36px fw-bold text-center text-white mb-20px">
                            <?php echo get_phrase('Subscribe to our newsletter to get updates to our latest collections') ?></h3>
                        <form class="ajaxForm resetable mb-12px" action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>" method="post" id="newsletter-form">
                            <div class="subscribe-form-inner d-flex align-items-center justify-content-center">
                                <input type="email" name="email" class="form-control sub1-form-control" id="subscribe_email" placeholder="<?php echo get_phrase('Email address'); ?>">
                                <button type="submit" class="btn btn-white1 btn-white1-sm"><?php echo get_phrase('Subscribe') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe Area End -->


<!-- Blog Card 1 Area Start -->
<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-4 fs-34px lh-44px fw-semibold text-center mb-50px"><?php echo get_phrase('Our Latest Blog') ?></h2>
            </div>
        </div>
        <div class="row gy-30px gx-30px">
            <?php foreach ($latest_blogs->result_array() as $latest_blog):
                    $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>

	            <div class="col-md-6 col-lg-4">
	                <div class="lms1-blog-card">
	                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="lms1-bCard-banner">
	                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                    if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                endif; ?>
	                        <img class="banner" src="<?php echo $blog_thumbnail; ?>" alt="">
	                    </a>
	                    <div class="d-flex align-items-center gap-2 mb-2">
	                        <div class="d-flex align-items-center gap-2">
	                            <div class="image-circle-32px">
	                                <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" alt="">
	                            </div>
	                            <h6 class="bCard1-author-name"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></h6>
	                        </div>
	                        <p class="bCard1-post-date"><?php echo get_past_time($latest_blog['added_date']); ?></p>
	                    </div>
	                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>"
	                        class="lms1-bCard-title mb-2"><?php echo $latest_blog['title']; ?></a>
	                    <p class="lms1-bCard-short-des mb-20px"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
	                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="btn lms1-btn-secondary">
	                        <span><?php echo get_phrase('Read More') ?></span>
	                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
	                            <path d="M6.875 3.75L13.125 10L6.875 16.25" stroke="#212121" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
	                        </svg>
	                    </a>
	                </div>
	            </div>
	            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<!-- Blog Card 1 Area End -->

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
