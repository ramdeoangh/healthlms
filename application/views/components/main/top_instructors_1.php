<!---------  Expert Instructor Start ---------------->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if(count($top_instructor_ids) > 0): ?>
<section class="expert-instructor eExpert-instruction top-categories pt-0 pb-100 wow  animate__animated animate__fadeInUp opacityOnUp" data-wow-duration="1000" data-wow-delay="400">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center f-36 mt-0 pt-0"><?php echo get_phrase('Our Expert Instructor ') ?></h1>
                <p class="text-center mt-4 mb-30"><?php echo get_phrase('They efficiently serve large number of students on our platform') ?></p>
            </div>
            <div class="col-lg-3 "></div>
        </div>
        <div class="instructor-card eInstuctor">
            <div class="row justify-content-center">
            <?php foreach($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links  = json_decode($top_instructor['social_links'], true);

                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 eLink" data-wow-duration="1000" data-wow-delay="600">
                        <a class="text-muted w-100 d-block" href="<?php echo site_url('home/instructor_page/'.$top_instructor['id']); ?>">
                            <div class="instructor-card-body nInstructor">
                                <div class="instructor-card-img mb-0">
                                    <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>">
                                </div>
                                <div class="instructor-card-text">
                                    <h3 class="text-center"><?php echo $top_instructor['first_name'].' '.$top_instructor['last_name']; ?></h3>
                                    <p class="ellipsis-line-2"><?php echo $top_instructor['title']; ?></p>
                                </div>
                            </div>
                        </a>
                        <div class="icon ">
                            <div class="icon-div-2">
                                <?php if(!empty($social_links['facebook'])): ?>
                                    <a href="<?php echo $social_links['facebook']; ?>" target="_blank">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_17_3531)">
                                                <path d="M17.4611 8C17.4611 3.58172 13.6998 0 9.06012 0C4.4204 0 0.65918 3.58172 0.65918 8C0.65918 11.993 3.73127 15.3027 7.74747 15.9028V10.3125H5.61442V8H7.74747V6.2375C7.74747 4.2325 9.00171 3.125 10.9206 3.125C11.8395 3.125 12.8012 3.28125 12.8012 3.28125V5.25H11.7419C10.6983 5.25 10.3728 5.86672 10.3728 6.5V8H12.7027L12.3302 10.3125H10.3728V15.9028C14.389 15.3027 17.4611 11.993 17.4611 8Z" fill="#fff"/>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($social_links['twitter'])): ?>
                                    <a href="<?php echo $social_links['twitter']; ?>" target="_blank">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_17_3533)">
                                                <path d="M10.5475 6.77491L16.7427 0H15.2746L9.89534 5.88256L5.59894 0H0.643555L7.14055 8.89547L0.643555 16H2.11169L7.79233 9.78782L12.3296 16H17.285L10.5471 6.77491H10.5475ZM8.53668 8.97384L7.8784 8.08805L2.64068 1.03974H4.89566L9.12255 6.72795L9.78084 7.61374L15.2753 15.0075H13.0203L8.53668 8.97418V8.97384Z" fill="white"/>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if(!empty($social_links['linkedin'])): ?>
                                    <a href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_17_3536)">
                                                <path d="M16.0982 0H1.78049C1.09463 0 0.540039 0.515625 0.540039 1.15313V14.8438C0.540039 15.4813 1.09463 16 1.78049 16H16.0982C16.784 16 17.3419 15.4813 17.3419 14.8469V1.15313C17.3419 0.515625 16.784 0 16.0982 0ZM5.52481 13.6344H3.03079V5.99687H5.52481V13.6344ZM4.2778 4.95625C3.47709 4.95625 2.83061 4.34062 2.83061 3.58125C2.83061 2.82188 3.47709 2.20625 4.2778 2.20625C5.07523 2.20625 5.72171 2.82188 5.72171 3.58125C5.72171 4.3375 5.07523 4.95625 4.2778 4.95625ZM14.8577 13.6344H12.367V9.92188C12.367 9.0375 12.3506 7.89687 11.0707 7.89687C9.77451 7.89687 9.57761 8.8625 9.57761 9.85938V13.6344H7.09015V5.99687H9.47916V7.04063H9.51198C9.84342 6.44063 10.6573 5.80625 11.8682 5.80625C14.3917 5.80625 14.8577 7.3875 14.8577 9.44375V13.6344Z" fill="white"/>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>