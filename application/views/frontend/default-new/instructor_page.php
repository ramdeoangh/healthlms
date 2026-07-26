<?php
$instructor_details = $this->user_model->get_all_user($instructor_id)->row_array();
$social_links  = json_decode($instructor_details['social_links'], true);
$course_ids = $this->crud_model->get_instructor_wise_courses($instructor_id, 'simple_array');

$this->db->select('user_id');
$this->db->distinct();
$this->db->where_in('course_id', $course_ids);
$total_students = $this->db->get('enrol')->num_rows();
?>

<?php include "breadcrumb.php"; ?>

<!--------- Instructor section start ---------->
<section class="instructor-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- About  section start -->
                <div class="instructor-about">
                    <div class="instructor-about-heading">
                        <div class="row mb-3">
                            <div class="col-lg-8 col-md-8 mb-2">
                                <div class="pro-heading">
                                    <div class="pro-img">
                                        <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_details['id']);?>" style="height: 110px; width: auto; border-radius: 10px;">
                                    </div>
                                    <div class="name">
                                        <a href="javascript:;"><h4><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></h4></a>
                                        <p ><?php echo $instructor_details['title']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4  ">
                                <div class="rating mt-0">
                                    <h4 class="text-end"><?php echo get_phrase('Ratings'); ?></h4>
                                    <?php
                                    $total_rating = $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'], 'course', true)->row('rating');
									$number_of_ratings = $this->crud_model->get_instructor_wise_course_ratings($instructor_details['id'], 'course')->num_rows();
									if ($number_of_ratings > 0) {
										$average_ceil_rating = ceil($total_rating / $number_of_ratings);
									} else {
										$average_ceil_rating = 0;
									}
									
									?>
                                    <div class="rating-point justify-content-md-end">
                                        <p><?php echo $average_ceil_rating; ?></p>
                                        <i class="fa-solid fa-star"></i>
                                        <p>(<?php echo $number_of_ratings.' '.get_phrase('Reviews'); ?>)</p>
                                    </div>
									<!-- Badges -->
									 <style>
										.instructor-1 .eBadges img {
												width: 40px;
												height: 40px;
												object-fit: cover;
											}
									 </style>
									 <ul class="eBadges d-flex justify-content-end gap-2 mt-3">
										<?php if (!empty($earned_badge)): ?>
											<li>
												<img data-bs-toggle="tooltip" data-bs-title="<?php echo $earned_badge['title']?>"  src="<?php echo base_url('uploads/badges/' . $earned_badge['image']); ?>" alt="">
											</li>
										<?php endif; ?>		
										<?php if (!empty($sale_badge)): ?>
											<li>
												<img data-bs-toggle="tooltip" data-bs-title="<?php echo $sale_badge['title']?>"  src="<?php echo base_url('uploads/badges/' . $sale_badge['image']); ?>" alt="">
											</li>
										<?php endif; ?>		
										<?php if (!empty($rating_badge)): ?>
											<li>
												<img data-bs-toggle="tooltip" data-bs-title="<?php echo $rating_badge['title']?>"  src="<?php echo base_url('uploads/badges/' . $rating_badge['image']); ?>" alt="">
											</li>
										<?php endif; ?>		
										<?php if (!empty($article_badge)): ?>
											<li>
												<img data-bs-toggle="tooltip" data-bs-title="<?php echo $article_badge['title']?>"  src="<?php echo base_url('uploads/badges/' . $article_badge['image']); ?>" alt="">
											</li>
										<?php endif; ?>		
									 </ul>
									<!-- Badges -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-text">
                        <h3><?php echo get_phrase('About') ?></h3>
                        <?php echo $instructor_details['biography']; ?>
                    </div>

                    <?php $skills = explode(',', $instructor_details['skills']); ?>
                    <?php if($instructor_details['skills'] && is_array($skills) && count($skills) > 0): ?>
	                    <div class="about-text teachers">
	                        <h3><?php echo get_phrase('Professional Skills'); ?></h3>
	                        <ul>
			                    <?php foreach($skills as $skill): ?>
			                      <li><a href="#"><?php echo $skill; ?></a>
			                    <?php endforeach; ?>
	                        </ul>  
	                    </div>
	                <?php endif; ?>

                    <div class="skill">
                        <h3><?php echo get_phrase('Statistics') ?></h3>
                        <div class="skill-point">
                            <div class="skill-point-1">
                                <h1><?php echo $total_students; ?></h1>
                                <h4><?php echo get_phrase('Total Students') ?></h4>
                            </div>
                            <div class="skill-point-1">
                                <h1><?php echo sizeof($course_ids); ?></h1>
                                <h4><?php echo get_phrase('Courses'); ?></h4>
                            </div>
                            <div class="skill-point-1">
                                <h1><?php echo $number_of_ratings; ?></h1>
                                <h4><?php echo get_phrase('Reviews'); ?></h4>
                            </div>
                        </div>
                    </div>




                    <div class="about-text mt-5 mb-0">
            			<h3 class="mb-4 pb-3"><?php echo get_phrase('Courses') ?> (<?php echo sizeof($course_ids); ?>)</h3>
            		</div>
                    <div class="Ecourse  grid-view-body courses pb-0"  style="background-color: var(--bg-white-2);">
                    	<div class="row">
	                		<?php foreach($course_ids as $key => $course_id):
	                			if($key == 119) break;

	                			$course = $this->crud_model->get_course_by_id($course_id)->row_array();
	                			$lessons = $this->crud_model->get_lessons('course', $course['id']);
			                    $instructor_details = $this->user_model->get_all_user($course['creator'])->row_array();
			                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']);
			                    $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
			                    $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
			                    if ($number_of_ratings > 0) {
			                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
			                    } else {
			                        $average_ceil_rating = 0;
			                    }
	                			?>
	                			<div class="col-md-6 col-sm-6">
	                				<div class="courses-card  epopCourse position-relative">
				                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>" class="checkPropagation epopCourse courses-card-body">
				                            <div class="courses-card-image">
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
				                                    <div class="review-icon-star">
				                                        <i class="fa-solid fa-star <?php if($number_of_ratings > 0) echo 'filled'; ?>"></i>
														<p class="mr-5px"><?php echo $average_ceil_rating; ?></p>
				                                        <p>(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews') ?>)</p>
				                                    </div>
				                                    <div class="review-btn">
				                                       <span class="compare-img echecks  checkPropagation"data-bs-toggle="tooltip" data-bs-title="<?php echo site_phrase('Compare')?>" onclick="redirectTo('<?php echo base_url('home/compare?course-1='.slugify($course['title']).'&course-id-1='.$course['id']); ?>');">
													   <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M13.6134 8.14665C13.3401 8.14665 13.1134 7.91998 13.1134 7.64665V5.43335C13.1134 4.60668 12.4401 3.93335 11.6134 3.93335H2.38672C2.11339 3.93335 1.88672 3.70668 1.88672 3.43335C1.88672 3.16002 2.11339 2.93335 2.38672 2.93335H11.6134C12.9934 2.93335 14.1134 4.05335 14.1134 5.43335V7.64665C14.1134 7.92665 13.8867 8.14665 13.6134 8.14665Z" fill="#0D0C23"></path>
															<path d="M4.49339 6.04665C4.36672 6.04665 4.24006 5.99996 4.14006 5.89996L2.03339 3.79332C1.94005 3.69998 1.88672 3.5733 1.88672 3.43996C1.88672 3.30663 1.94005 3.17998 2.03339 3.08665L4.14006 0.979961C4.33339 0.786628 4.65339 0.786628 4.84672 0.979961C5.04005 1.17329 5.04005 1.49333 4.84672 1.68667L3.0934 3.43996L4.84672 5.1933C5.04005 5.38663 5.04005 5.70663 4.84672 5.89996C4.74672 5.9933 4.62005 6.04665 4.49339 6.04665Z" fill="#0D0C23"></path>
															<path d="M13.6134 13.06H4.38672C3.00672 13.06 1.88672 11.94 1.88672 10.56V8.34668C1.88672 8.07335 2.11339 7.84668 2.38672 7.84668C2.66005 7.84668 2.88672 8.07335 2.88672 8.34668V10.56C2.88672 11.3867 3.56005 12.06 4.38672 12.06H13.6134C13.8867 12.06 14.1134 12.2867 14.1134 12.56C14.1134 12.8334 13.8867 13.06 13.6134 13.06Z" fill="#0D0C23"></path>
															<path d="M11.5068 15.1666C11.3801 15.1666 11.2535 15.12 11.1535 15.02C10.9601 14.8267 10.9601 14.5066 11.1535 14.3133L12.9068 12.56L11.1535 10.8067C10.9601 10.6133 10.9601 10.2933 11.1535 10.1C11.3468 9.90665 11.6668 9.90665 11.8601 10.1L13.9668 12.2066C14.0601 12.3 14.1135 12.4267 14.1135 12.56C14.1135 12.6933 14.0601 12.82 13.9668 12.9133L11.8601 15.02C11.7668 15.12 11.6401 15.1666 11.5068 15.1666Z" fill="#0D0C23"></path>
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
				                </div>
	                		<?php endforeach; ?>
                		</div>
                	</div>
                </div>
                
                <!-- About section End -->
            </div>
            <div class="col-lg-4">
                <div class="instructor-right">
                    <div class="instructon-contact">

                    	<?php if(!empty($instructor_details['phone'])): ?>
	                        <div class="instructon-icon">
	                            <i class="fa-solid fa-phone"></i>
	                            <div class="instructon-number">
	                                <h4><?php echo get_phrase('Phone Number'); ?>:</h4>
	                                <p><?php echo $instructor_details['phone']; ?></p>
	                            </div>
	                        </div>
	                    <?php endif; ?>

                        <?php if(!empty($instructor_details['email'])): ?>
	                        <div class="instructon-icon">
	                            <i class="fa-solid fa-envelope"></i>
	                            <div class="instructon-number">
	                                <h4><?php echo get_phrase('Email'); ?>:</h4>
	                                <p><?php echo $instructor_details['email']; ?></p>
	                            </div>
	                        </div>
	                    <?php endif; ?>

                        <?php if(!empty($instructor_details['address'])): ?>
	                        <div class="instructon-icon">
	                            <i class="fa-solid fa-location-dot"></i>
	                            <div class="instructon-number">
	                                <h4><?php echo get_phrase('Address'); ?>:</h4>
	                                <p><?php echo $instructor_details['address']; ?></p>
	                            </div>
	                        </div>
	                    <?php endif; ?>

	                    <div class="row mt-4 justify-content-center">
	                    	<div class="col-auto px-1">
			                    <?php if($social_links['facebook']): ?>
		                            <a class="text-center social-btn" href="<?php echo $social_links['facebook']; ?>" target="_blank">
									<svg width="19" height="19" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_3727)">
										<path d="M18.902 8.99994C18.902 4.02941 14.6706 0 9.45099 0C4.23135 0 0 4.02941 0 8.99994C0 13.492 3.45607 17.2154 7.97427 17.8905V11.6015H5.57461V8.99994H7.97427V7.01714C7.97427 4.76153 9.38528 3.5156 11.5441 3.5156C12.5778 3.5156 13.6596 3.69138 13.6596 3.69138V5.90621H12.4679C11.2939 5.90621 10.9277 6.60001 10.9277 7.31245V8.99994H13.5489L13.1299 11.6015H10.9277V17.8905C15.4459 17.2154 18.902 13.492 18.902 8.99994Z" fill="#316FF6"></path>
										</g>
										<defs>
										<clipPath id="clip0_30_3727">
										<rect width="18.902" height="17.9999" fill="white"></rect>
										</clipPath>
										</defs>
                                   </svg>
									<?php echo site_phrase('facebook'); ?></a>
		                        <?php endif; ?>
		                    </div>
	                    	<div class="col-auto px-1">
		                        <?php if($social_links['twitter']): ?>
		                            <a class="text-center social-btn" href="<?php echo $social_links['twitter']; ?>" target="_blank">
									<svg width="19" height="19" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_30_3730)">
                                <path d="M11.2841 7.5801L18.2156 0H16.5731L10.5545 6.5817L5.74746 0H0.203125L7.47229 9.95269L0.203125 17.9016H1.84575L8.20153 10.9511L13.2781 17.9016H18.8224L11.2837 7.5801H11.2841ZM9.03434 10.0404L8.29782 9.04931L2.43761 1.16331H4.96059L9.68985 7.52757L10.4264 8.51863L16.5738 16.7912H14.0509L9.03434 10.0408V10.0404Z" fill="#0D0C23"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0_30_3730">
                                <rect width="19.0285" height="17.9016" fill="white"></rect>
                                </clipPath>
                                </defs>
                                </svg>
										<?php echo site_phrase('twitter'); ?></a>
		                        <?php endif; ?>
		                    </div>
	                    	<div class="col-auto px-1">
		                        <?php if($social_links['linkedin']): ?>
		                            <a class="text-center social-btn" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
										<svg width="19" height="19" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_3738)">
											<path d="M17.5028 0H1.3955C0.623913 0 0 0.580074 0 1.29726V16.6991C0 17.4163 0.623913 17.9999 1.3955 17.9999H17.5028C18.2744 17.9999 18.902 17.4163 18.902 16.7026V1.29726C18.902 0.580074 18.2744 0 17.5028 0ZM5.60783 15.3386H2.80207V6.74644H5.60783V15.3386ZM4.20495 5.57574C3.30416 5.57574 2.57687 4.88317 2.57687 4.02888C2.57687 3.17459 3.30416 2.48201 4.20495 2.48201C5.10206 2.48201 5.82934 3.17459 5.82934 4.02888C5.82934 4.87965 5.10206 5.57574 4.20495 5.57574ZM16.1073 15.3386H13.3052V11.162C13.3052 10.1671 13.2868 8.88392 11.847 8.88392C10.3887 8.88392 10.1672 9.97025 10.1672 11.0917V15.3386H7.36882V6.74644H10.0564V7.92065H10.0934C10.4662 7.24565 11.3818 6.53199 12.7441 6.53199C15.5831 6.53199 16.1073 8.31088 16.1073 10.6241V15.3386Z" fill="#0189D0"></path>
											</g>
											<defs>
											<clipPath id="clip0_30_3738">
											<rect width="18.902" height="17.9999" rx="2" fill="white"></rect>
											</clipPath>
											</defs>
                                       </svg>
										<?php echo site_phrase('linkedin'); ?></a>
		                        <?php endif; ?>
		                    </div>
		                </div>

                    </div>
                    <div class="instructor-msg mb-2">
                        <button class="btn btn-primary" type="button" onclick="redirectTo('<?php echo site_url('home/my_messages?instructor_id='.$instructor_details['id']); ?>')"> <i class="fa-solid fa-envelope"></i> <?php echo get_phrase('Message') ?></button>
						
                    </div>
					<?php 
                        $is_following = $this->user_model->is_following($instructor_id, $this->session->userdata('user_id')); 
                        $user_id = $this->session->userdata('user_id');
                        $user_role = $this->session->userdata('role');
                        ?>
						<?php if ($user_role != 1 && $user_id != $instructor_id): ?>
						<a id="follow-btn-<?php echo $instructor_id; ?>" class="w-100 einsBtn" href="javascript:;" onclick="toggleFollow(<?php echo $instructor_id; ?>, this)">
							<span  class="w-100 follow-btn  btn <?php echo ($is_following) ? 'btn-fill' : 'btn-primary'; ?> py-2 btn-sm"><?php echo ($is_following) ? get_phrase('Unfollow') : get_phrase('Follow'); ?></span>
						</a>
						<?php endif; ?>
                           
					
                </div>
            </div>
        </div>
    </div>
</section>
<!--------- Instructor section end ---------->

<script>
	  $(document).on('click', '.follow-btn', function() {
    let isFollowing = $(this).hasClass('btn-fill');

    // Toggle background color class
    $(this).toggleClass('btn-primary btn-fill');

    // Toggle the text between "Follow" and "Unfollow"
    if (isFollowing) {
        $(this).text("<?php echo get_phrase('Follow'); ?>");
    } else {
        $(this).text("<?php echo get_phrase('Unfollow'); ?>");
    }
});
function toggleFollow(instructor_id, element) {
    var url = "<?php echo site_url('home/toggle_following'); ?>";
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json', // Automatically parse the JSON response
        data: {
            instructor_id: instructor_id,
            user_id: <?php echo $this->session->userdata('user_id'); ?>
        },
        success: function(response) {
            var btn = $(element).find('span');
            if (response.status === 'followed') {
                btn.text('<?php echo get_phrase('Unfollow'); ?>');
                btn.removeClass('btn-primary');
                btn.addClass('btn-fill');
            } else if (response.status === 'unfollowed') {
                btn.text('<?php echo get_phrase('Follow'); ?>');
                btn.removeClass('btn-fill');
                btn.addClass('btn-primary');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + error);
        }
    });
}
</script>