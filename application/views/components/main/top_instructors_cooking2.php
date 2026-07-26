<?php
    if (! isset($home_cooking2_assets)) {
        $home_cooking2_assets = APPPATH . 'views/frontend/default-new/home_cooking2_assets.php';
        include $home_cooking2_assets;
    }
?>

<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
                <div class="mb-32px">
                    <h2 class="title-10 fs-40px lms1-text-dark mb-12px"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('Let’s Meet ') ?></span> <span
                            class="lms2-text-purple-gradient builder-editable" builder-identity="2"><?php echo get_phrase('The Experts') ?></span>
                    </h2>
                    <p class="subtitle-typo1 fs-16px lms1-text-secondary builder-editable" builder-identity="3">
                        <?php echo get_phrase('They efficiently serve large number of students on our platform') ?></p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">

            <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                $social_links   = json_decode($top_instructor['social_links'], true); ?>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="lms3-instructor-wrap">
                    <img class="lms3-instructor-image cursor-pointer" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt=""
                        onclick="window.location.href='<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>'">

                    <div class="lms3-instructor-content">
                        <h4 class="lms3-instructor-name cursor-pointer"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                        <p class="lms3-instructor-rol"><?php echo $top_instructor['title']; ?></p>
                        <ul class="lms3-instructor-socials">
                            <?php if ($social_links['facebook']): ?>
                            <li>
                                <a href="<?php echo $social_links['facebook']; ?>" target="_blank" class="lms3-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1543)">
                                            <path
                                                d="M16.0991 8C16.0991 3.58172 12.5174 0 8.09912 0C3.68084 0 0.0991211 3.58172 0.0991211 8C0.0991211 11.993 3.02459 15.3027 6.84912 15.9028V10.3125H4.81787V8H6.84912V6.2375C6.84912 4.2325 8.0435 3.125 9.87084 3.125C10.7458 3.125 11.6616 3.28125 11.6616 3.28125V5.25H10.6529C9.65912 5.25 9.34912 5.86672 9.34912 6.5V8H11.5679L11.2132 10.3125H9.34912V15.9028C13.1737 15.3027 16.0991 11.993 16.0991 8Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1543">
                                                <rect width="16" height="16" fill="white" transform="translate(0.0991211)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>
                            <?php if ($social_links['twitter']): ?>
                            <li>
                                <a href="<?php echo $social_links['twitter']; ?>" target="_blank" class="lms3-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1545)">
                                            <path
                                                d="M9.58842 6.77491L15.4167 0H14.0356L8.97489 5.88256L4.93292 0H0.270996L6.38324 8.89547L0.270996 16H1.65219L6.99642 9.78782L11.265 16H15.927L9.58808 6.77491H9.58842ZM7.69668 8.97384L7.07739 8.08805L2.14985 1.03974H4.27129L8.24786 6.72795L8.86716 7.61374L14.0362 15.0075H11.9148L7.69668 8.97418V8.97384Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1545">
                                                <rect width="16" height="16" fill="white" transform="translate(0.0991211)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>

                            <?php if ($social_links['linkedin']): ?>
                            <li>
                                <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" class="lms3-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1551)">
                                            <path
                                                d="M15.6573 0H1.33957C0.653714 0 0.0991211 0.515625 0.0991211 1.15313V14.8438C0.0991211 15.4813 0.653714 16 1.33957 16H15.6573C16.3431 16 16.901 15.4813 16.901 14.8469V1.15313C16.901 0.515625 16.3431 0 15.6573 0ZM5.0839 13.6344H2.58987V5.99687H5.0839V13.6344ZM3.83688 4.95625C3.03617 4.95625 2.38969 4.34062 2.38969 3.58125C2.38969 2.82188 3.03617 2.20625 3.83688 2.20625C4.63431 2.20625 5.28079 2.82188 5.28079 3.58125C5.28079 4.3375 4.63431 4.95625 3.83688 4.95625ZM14.4168 13.6344H11.9261V9.92188C11.9261 9.0375 11.9097 7.89687 10.6298 7.89687C9.33359 7.89687 9.13669 8.8625 9.13669 9.85938V13.6344H6.64923V5.99687H9.03824V7.04063H9.07106C9.4025 6.44063 10.2163 5.80625 11.4273 5.80625C13.9508 5.80625 14.4168 7.3875 14.4168 9.44375V13.6344Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1551">
                                                <rect width="16.8019" height="16" fill="white" transform="translate(0.0991211)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php endif; ?>
