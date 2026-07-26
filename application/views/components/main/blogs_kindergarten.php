<?php
    if (! isset($home_kindergarten_assets)) {
        $home_kindergarten_assets = APPPATH . 'views/frontend/default-new/home_kindergarten_assets.php';
        include $home_kindergarten_assets;
    }
?>

<?php if (get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="mb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-3 mb-26px fs-40px lh-52px fw-medium text-center mb-32px builder-editable" builder-identity="1"><?php echo get_phrase('Blogs') ?></h2>
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
