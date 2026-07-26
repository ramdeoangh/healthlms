<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="h-2-courses h-3-courses wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="mt-5  efont builder-editable" builder-identity="1"><?php echo get_phrase('Latest from our blog'); ?></h1>
                <p class="mt-2 builder-editable" builder-identity="2"><?php echo site_phrase('Visit our valuable articles to get more information.') ?></p>
            </div>
            <div class="col-lg-6">
                <div class="h-3-banner-button text-center">
                    <a href="<?php echo site_url('blog'); ?>" class="btn btn-primary"><?php echo get_phrase('See All') ?></a>
                </div>
            </div>
        </div>
        <div class="h-3-blog-card-full-body latest-blog">
            <div class="row justify-content-center">
                <?php foreach ($latest_blogs->result_array() as $latest_blog):
                        $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                    $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="h-3-blog-card-body">
                        <div class="scall-img">
                            <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                        if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                                            $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif; ?>
                            <img loading="lazy" src="<?php echo $blog_thumbnail; ?>" alt="" style="min-height: 200px;">
                        </div>
                        <div class="h-3-blog-overlay">
                            <div class="h-3-blog-overlay-2">
                                <div class="h-3-blog-text">
                                    <h6><?php echo $blog_category['title']; ?></h6>
                                    <h4><?php echo $latest_blog['title']; ?></h4>
                                    <p class="ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!------------- Blog Section end ------------>
