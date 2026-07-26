<?php $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array(); ?>
<?php include "breadcrumb.php"; ?>

<!-------- Wish List body section start ------>
<section class="wish-list-body grid-view-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "profile_menus.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="courses wishlist-course mt-5">
                    <div class="courses-card">
                        <div class="row">
                        	<?php foreach(json_decode($wishlist, true) as $course_id):
                        		$row = $this->crud_model->get_course_by_id($course_id);
                        		if($row->num_rows() == 0) continue;
                        		$course = $row->row_array();
	                            $lessons = $this->crud_model->get_lessons('course', $course['id']);
			                    $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
			                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']);
			                    $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
			                    $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
			                    if ($number_of_ratings > 0) {
			                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
			                    } else {
			                        $average_ceil_rating = 0;
			                    }
			                    ?>
			                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
			                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>" class=" epopCourse courses-card-body position-relative">
			                            <div class="courses-card-image ">
			                                <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($course['id']); ?>">
			                                <div class="courses-icon <?php if(in_array($course['id'], $my_wishlist_items)) echo 'red-heart'; ?>" id="coursesWishlistIcon<?php echo $course['id']; ?>">
			                                    <i class="fa-solid fa-heart checkPropagation" onclick="actionTo('<?php echo site_url('home/toggleWishlistItems/'.$course['id']); ?>')"></i>
			                                </div>
			                                <div class="courses-card-image-text">
			                                    <h3><?php echo get_phrase($course['level']); ?></h3>
			                                </div> 
			                            </div>
			                            <div class="courses-text">
			                                <h5 class="mb-2"><?php echo $course['title']; ?></h5>
			                                <div class="review-icon">
			                                    <div class="review-icon-star align-items-center">
			                                        <p><i class="fa-solid fa-star <?php if($number_of_ratings > 0) echo 'filled'; ?>"></i></p>
													<p class="mr-5px"> <?php echo $average_ceil_rating; ?></p>
			                                        <p>(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews') ?>)</p>
			                                    </div>
			                                    <div class="review-btn d-flex align-items-center">
			                                       <span data-bs-toggle="tooltip" data-bs-title="<?php echo site_phrase('Compare')?>" class="compare-img echecks checkPropagation" onclick="redirectTo('<?php echo base_url('home/compare?course-1='.slugify($course['title']).'&course-id-1='.$course['id']); ?>');">
												   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M13.6134 8.14665C13.3401 8.14665 13.1134 7.91998 13.1134 7.64665V5.43335C13.1134 4.60668 12.4401 3.93335 11.6134 3.93335H2.38672C2.11339 3.93335 1.88672 3.70668 1.88672 3.43335C1.88672 3.16002 2.11339 2.93335 2.38672 2.93335H11.6134C12.9934 2.93335 14.1134 4.05335 14.1134 5.43335V7.64665C14.1134 7.92665 13.8867 8.14665 13.6134 8.14665Z" fill="#0D0C23"/>
														<path d="M4.49339 6.04665C4.36672 6.04665 4.24006 5.99996 4.14006 5.89996L2.03339 3.79332C1.94005 3.69998 1.88672 3.5733 1.88672 3.43996C1.88672 3.30663 1.94005 3.17998 2.03339 3.08665L4.14006 0.979961C4.33339 0.786628 4.65339 0.786628 4.84672 0.979961C5.04005 1.17329 5.04005 1.49333 4.84672 1.68667L3.0934 3.43996L4.84672 5.1933C5.04005 5.38663 5.04005 5.70663 4.84672 5.89996C4.74672 5.9933 4.62005 6.04665 4.49339 6.04665Z" fill="#0D0C23"/>
														<path d="M13.6134 13.06H4.38672C3.00672 13.06 1.88672 11.94 1.88672 10.56V8.34668C1.88672 8.07335 2.11339 7.84668 2.38672 7.84668C2.66005 7.84668 2.88672 8.07335 2.88672 8.34668V10.56C2.88672 11.3867 3.56005 12.06 4.38672 12.06H13.6134C13.8867 12.06 14.1134 12.2867 14.1134 12.56C14.1134 12.8334 13.8867 13.06 13.6134 13.06Z" fill="#0D0C23"/>
														<path d="M11.5068 15.1666C11.3801 15.1666 11.2535 15.12 11.1535 15.02C10.9601 14.8267 10.9601 14.5066 11.1535 14.3133L12.9068 12.56L11.1535 10.8067C10.9601 10.6133 10.9601 10.2933 11.1535 10.1C11.3468 9.90665 11.6668 9.90665 11.8601 10.1L13.9668 12.2066C14.0601 12.3 14.1135 12.4267 14.1135 12.56C14.1135 12.6933 14.0601 12.82 13.9668 12.9133L11.8601 15.02C11.7668 15.12 11.6401 15.1666 11.5068 15.1666Z" fill="#0D0C23"/>
														</svg>
			                                        </span>
			                                    </div>
			                                </div>
											<div class="duration-time">
												<?php if($course_duration): ?>
												<p class="m-0"> 
													<i class="fa-regular fa-clock p-0 text-15px"></i> <?php echo $course_duration; ?></p>
												<?php endif; ?>
											</div>
			                                <div class="courses-price-border">
			                                    <div class="courses-price">
			                                        <div class="courses-price-left">
			                                            <?php if($course['is_free_course']): ?>
			                                                <h5><?php echo get_phrase('Free'); ?></h5>
			                                            <?php elseif($course['discount_flag']): ?>
			                                                <h5><?php echo currency($course['discounted_price']); ?></h5>
			                                                <p class="mt-1"><del><?php echo currency($course['price']); ?></del></p>
			                                            <?php else: ?>
			                                                <h5><?php echo currency($course['price']); ?></h5>
			                                            <?php endif; ?>
			                                        </div>
			                                        <div class="courses-price-right ">
													   <?php if(is_purchased($course['id'])): ?>
													    	<span class="enrollBtn checkPropagation" onclick="redirectTo('<?php echo site_url('home/lesson/'.slugify($course['title']).'/'.$course['id']) ?>');"><i class="far fa-play-circle text-white"></i> <?php echo get_phrase('Start Now'); ?></span>
														<?php else: ?>
													        <span class="enrollBtn"><?php echo site_phrase('Enroll Now')?></span>
												    	<?php endif; ?>
			                                        </div>
			                                    </div>
			                                </div>
			                             </div>
			                        </a>
			                    </div>
	                        <?php endforeach; ?>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-------- wish list bosy section end ------->
