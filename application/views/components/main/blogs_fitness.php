<?php
if (!isset($home_fitness_assets)) {
    $home_fitness_assets = APPPATH . 'views/frontend/default-new/home_fitness_assets.php';
    include $home_fitness_assets;
}
?>

<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
    <?php if ($latest_blogs->num_rows() > 0): ?>
        <section class="dark-body">
            <div class="container">
                <div class="row mb-50px">
                    <div class="col-12">
                        <h1 class="title-6 ls-1-7px fs-34px text-center"><?php echo get_phrase('Visit our latest'); ?> <span class="text-yellow-2"><?php echo get_phrase('Blogs'); ?></span></h1>
                    </div>
                </div>
                <div class="row mb-100px g-28px">
                    <?php foreach ($latest_blogs->result_array() as $latest_blog):
                        $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                        $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="h-100 max-mdm-450px-auto">
                                <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="d-block lms-2-blog-banner">
                                    <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                    if (!file_exists($blog_thumbnail) || !is_file($blog_thumbnail)):
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif; ?>
                                    <img src="<?php echo $blog_thumbnail; ?>" alt="banner">
                                </a>
                                <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="d-block lms-2-card fit-blog-card pb-auto">
                                    <h4 class="title-4 fs-18px lh-26px text-white mb-14px"><?php echo $blog_category['title']; ?></h4>
                                    <p class="subtitle-3 fs-13px lh-24px text-white pb-18px mb-12px lms1-border-bottom ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 100); ?></p>
                                    <div class="d-flex gap-6px">
                                        <span class="fas fa-clock text-yellow-2 fs-13px lh-18px"></span>
                                        <p class="subtitle-4 fs-12px lh-normal text-white ms-2"><?php echo get_past_time($latest_blog['added_date']); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <!-- Blog Section End -->
    <?php endif; ?>