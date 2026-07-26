<style>
    .shadow-sm {
	box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.1) !important;
}
.user-reward-badges.badges-lg img {
	width: 128px;
	height: 128px;
}
.text-dark-blue {
	color: #171347;
}
.font-16 {
	font-size: 16px;
	font-weight: 600;
}
.font-14 {
	font-size: 0.875rem;
	font-weight: normal;
	line-height: 1.4;
}
.pb-lg-40, .py-lg-40 {
	padding-bottom: 40px !important;
}
.badges-item {
    border-radius: 10px;
}
</style>



<?php include "breadcrumb.php"; ?>

<!-------- Wish List body section start ------>
<section class="wish-list-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "profile_menus.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="my-course-1-full-body">
                    <h1><?php echo get_phrase('Badges'); ?></h1>
                   
                       <div class=" user-reward-badges badges-lg row align-items-center mt-10 ">

                             <?php if (!empty($earned_badge)): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                    <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                        <img src="<?php echo base_url('uploads/badges/' . $earned_badge['image']); ?>" class="rounded-circle" alt="<?php echo $earned_badge['title']; ?>">
                                        <span class="font-16 mt-2  text-dark-blue mt-15">
                                            <?php echo $earned_badge['title']; ?>
                                        </span>
                                        <span class="font-14 text-gray mt-2 text-center">
                                            <?php echo $earned_badge['description']; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                             <?php if (!empty($sale_badge)): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                    <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                        <img src="<?php echo base_url('uploads/badges/' . $sale_badge['image']); ?>" class="rounded-circle" alt="<?php echo $sale_badge['title']; ?>">
                                        <span class="font-16 mt-2  text-dark-blue mt-15">
                                            <?php echo $sale_badge['title']; ?>
                                        </span>
                                        <span class="font-14 text-gray mt-2 text-center">
                                            <?php echo $sale_badge['description']; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($rating_badge)): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                    <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                        <img src="<?php echo base_url('uploads/badges/' . $rating_badge['image']); ?>" class="rounded-circle" alt="<?php echo $rating_badge['title']; ?>">
                                        <span class="font-16 mt-2 text-dark-blue mt-15">
                                            <?php echo $rating_badge['title']; ?>
                                        </span>
                                        <span class="font-14 text-gray mt-2 text-center">
                                            <?php echo $rating_badge['description']; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($article_badge)): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                    <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                        <img src="<?php echo base_url('uploads/badges/' . $article_badge['image']); ?>" class="rounded-circle" alt="<?php echo $article_badge['title']; ?>">
                                        <span class="font-16 mt-2 text-dark-blue mt-15">
                                            <?php echo $article_badge['title']; ?>
                                        </span>
                                        <span class="font-14 text-gray mt-2 text-center">
                                            <?php echo $article_badge['description']; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                             $is_instructor = $this->session->userdata('is_instructor');
                              if ($is_instructor != 1):
                                    if (!empty($course_completed_badge)): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12  mb-2">
                                            <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                                <img src="<?php echo base_url('uploads/badges/' . $course_completed_badge['image']); ?>" class="rounded-circle" alt="<?php echo $course_completed_badge['title']; ?>">
                                                <span class="font-16 mt-2 text-dark-blue mt-15">
                                                    <?php echo $course_completed_badge['title']; ?>
                                                </span>
                                                <span class="font-14 text-gray mt-2 text-center">
                                                    <?php echo $course_completed_badge['description']; ?>
                                                </span>
                                            </div>
                                        </div>
                             <?php endif; 
                                endif; ?>
                            <?php if (addon_status('certificate')) : ?>
                            <?php
                             $is_instructor = $this->session->userdata('is_instructor');
                              if ($is_instructor != 1):
                                    if (!empty($course_certificate_badge)): ?>
                                        <div class="col-lg-4 col-md-6  col-sm-6 col-12  mb-2">
                                            <div class="rounded-lg badges-item py-20 py-lg-40 shadow-sm px-10 pt-4 d-flex flex-column align-items-center">
                                                <img src="<?php echo base_url('uploads/badges/' . $course_certificate_badge['image']); ?>" class="rounded-circle" alt="<?php echo $course_certificate_badge['title']; ?>">
                                                <span class="font-16 mt-2 text-dark-blue mt-15">
                                                    <?php echo $course_certificate_badge['title']; ?>
                                                </span>
                                                <span class="font-14 text-gray mt-2 text-center">
                                                    <?php echo $course_certificate_badge['description']; ?>
                                                </span>
                                            </div>
                                        </div>
                             <?php endif; 
                                endif; ?>
                            <?php endif; ?>
                     </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-------- wish list bosy section end ------->
 