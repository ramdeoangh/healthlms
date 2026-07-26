<!------------- Blog Section Start ------------>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<!-- Start Blog -->
<section class="pb-110 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <!-- Title -->
        <div class="title-one text-center pb-50">
            <p class="subtitle text-uppercase builder-editable" builder-identity="1"><?php echo get_phrase('Blog'); ?></p>
            <h4 class="title builder-editable" builder-identity="2"><?php echo get_phrase('Our Latest Blog') ?></h4>
            <div class="bar"></div>
        </div>
        <!-- Items -->
        <div class="row g-3">
            <?php foreach ($latest_blogs->result_array() as $latest_blog):
              $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
          $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
            <div class="col-lg-4 col-sm-6">
                <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="blog-item">
                    <div class="img">
                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                          if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                              $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                      endif; ?>
                        <img loading="lazy" src="<?php echo $blog_thumbnail; ?>" alt="" />
                    </div>
                    <div class="content">
                        <h3 class="title"><?php echo $latest_blog['title']; ?></h3>
                        <p class="info ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
                        <p class="link"><?php echo get_phrase('Read More'); ?> <i class="fa-solid fa-long-arrow-right"></i></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Blog -->
<?php endif; ?>
