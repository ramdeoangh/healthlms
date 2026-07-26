<!-- Start Blog -->
<?php $latest_blogs = $this->crud_model->get_latest_blogs(4); ?>
<?php if ($latest_blogs->num_rows() > 0): ?>
<section class="pb-50 wow animate__animated  animate__fadeInUp " data-wow-duration="1000" data-wow-delay="500">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Title -->
                <div class="title-two text-center pb-50">
                    <h4 class="title builder-editable" builder-identity="1"><?php echo get_phrase('Follow The Latest News') ?></h4>
                    <p class="info builder-editable" builder-identity="2"><?php echo site_phrase('Visit our valuable articles to get more information.') ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($latest_blogs->result_array() as $latest_blog):
              $user_details  = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
          $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
            <div class="col-md-6">
                <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="blog-item-6">
                    <div class="img">
                        <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                          if (! file_exists($blog_thumbnail) || ! is_file($blog_thumbnail)):
                              $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                      endif; ?>
                        <img loading="lazy" src="<?php echo $blog_thumbnail; ?>" alt="" />
                    </div>
                    <div class="content">
                        <div class="date">
                            <div class="icon"><img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/icon/calendar-6.svg" alt="" /></div>
                            <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
                        </div>
                        <h4 class="title"><?php echo $latest_blog['title']; ?></h4>
                        <p class="info ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
                        <p class="link"><i class="fa-solid fa-long-arrow-right"></i></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- End Blog -->
