<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>

<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if (count($top_instructor_ids) > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-32px max-w-565px mx-auto">
                    <h3 class="title-1 fs-32px lh-36px fw-bold text-center mb-30"><span class="builder-editable" builder-identity="1"><?php echo get_phrase('Let’s Meet ') ?></span> <span
                            class="lms1-text-purple-gradient builder-editable" builder-identity="2"><?php echo get_phrase('The Experts') ?></span></h3>
                    <p class="subtits16 fs-16px lms1-text-secondary text-center builder-editable" builder-identity=3>
                        <?php echo get_phrase('Our popular instructor is a charismatic and knowledgeable individual who captivates students with engaging lessons, making learning a delightful and enriching experience.') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-30px gx-30px">
            <?php foreach ($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links   = json_decode($top_instructor['social_links'], true);

                ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 lms1-instructor-col">
                <div class="lms1-instructor-wrap">
                    <div class="lms1-instructor-image">
                        <img class="cursor-pointer" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>" alt=""
                            onclick="window.location.href='<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>'">
                    </div>
                    <div class="lms1-instructor-content">
                        <h4 class="lms1-instructor-name"><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?></h4>
                        <p class="lms1-instructor-rol"><?php echo $top_instructor['title']; ?></p>
                        <ul class="lms1-instructor-socials">
                            <?php if (! empty($social_links['facebook'])): ?>
                            <li>
                                <a href="<?php echo $social_links['facebook']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1440)">
                                            <path
                                                d="M16.5991 8C16.5991 3.58172 13.0174 0 8.59912 0C4.18084 0 0.599121 3.58172 0.599121 8C0.599121 11.993 3.52459 15.3027 7.34912 15.9028V10.3125H5.31787V8H7.34912V6.2375C7.34912 4.2325 8.5435 3.125 10.3708 3.125C11.2458 3.125 12.1616 3.28125 12.1616 3.28125V5.25H11.1529C10.1591 5.25 9.84912 5.86672 9.84912 6.5V8H12.0679L11.7132 10.3125H9.84912V15.9028C13.6737 15.3027 16.5991 11.993 16.5991 8Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1440">
                                                <rect width="16" height="16" fill="white" transform="translate(0.599121)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif?>

                            <?php if (! empty($social_links['twitter'])): ?>
                            <li>
                                <a href="<?php echo $social_links['twitter']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                        <g clip-path="url(#clip0_285_1442)">
                                            <path
                                                d="M10.0884 6.77491L15.9167 0H14.5356L9.47489 5.88256L5.43292 0H0.770996L6.88324 8.89547L0.770996 16H2.15219L7.49642 9.78782L11.765 16H16.427L10.0881 6.77491H10.0884ZM8.19668 8.97384L7.57739 8.08805L2.64985 1.03974H4.77129L8.74786 6.72795L9.36716 7.61374L14.5362 15.0075H12.4148L8.19668 8.97418V8.97384Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1442">
                                                <rect width="16" height="16" fill="white" transform="translate(0.599121)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>


                            <?php if (! empty($social_links['linkedin'])): ?>
                            <li>
                                <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" class="lms1-instructor-social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                        <g clip-path="url(#clip0_285_1448)">
                                            <path
                                                d="M16.1573 0H1.83957C1.15371 0 0.599121 0.515625 0.599121 1.15313V14.8438C0.599121 15.4813 1.15371 16 1.83957 16H16.1573C16.8431 16 17.401 15.4813 17.401 14.8469V1.15313C17.401 0.515625 16.8431 0 16.1573 0ZM5.5839 13.6344H3.08987V5.99687H5.5839V13.6344ZM4.33688 4.95625C3.53617 4.95625 2.88969 4.34062 2.88969 3.58125C2.88969 2.82188 3.53617 2.20625 4.33688 2.20625C5.13431 2.20625 5.78079 2.82188 5.78079 3.58125C5.78079 4.3375 5.13431 4.95625 4.33688 4.95625ZM14.9168 13.6344H12.4261V9.92188C12.4261 9.0375 12.4097 7.89687 11.1298 7.89687C9.83359 7.89687 9.63669 8.8625 9.63669 9.85938V13.6344H7.14923V5.99687H9.53824V7.04063H9.57106C9.9025 6.44063 10.7163 5.80625 11.9273 5.80625C14.4508 5.80625 14.9168 7.3875 14.9168 9.44375V13.6344Z"
                                                fill="#585858" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_285_1448">
                                                <rect width="16.8019" height="16" fill="white" transform="translate(0.599121)" />
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
            <?php endforeach; ?>


        </div>
    </div>
</section>
<?php endif; ?>
