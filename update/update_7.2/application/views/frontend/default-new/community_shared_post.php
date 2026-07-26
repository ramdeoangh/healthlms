 <style>
        .shared-post-wrapper {
            padding: 40px 0;
        }

        .shared-post-card {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .05);
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .author-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .author-info h6 {
            margin-bottom: 3px;
            font-weight: 600;
        }

        .post-media {
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .post-media img,
        .post-media video {
            width: 100%;
            max-height: 650px;
            object-fit: cover;
            display: block;
        }

        .post-description {
            font-size: 15px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .05);
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .popular-post-item {
            display: flex;
            gap: 12px;
            text-decoration: none;
            color: #212529;
            margin-bottom: 18px;
        }

        .popular-post-item:last-child {
            margin-bottom: 0;
        }

        .popular-post-item:hover {
            color: #0d6efd;
        }

        .popular-thumb {
            width: 120px;
            min-width: 120px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .popular-thumb img,
        .popular-thumb video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .popular-content h6 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 5px;
            line-height: 1.5;
        }

        .popular-content small {
            color: #6c757d;
        }
    </style>
<section class="courses-list-view">
    <div class="container shared-post-wrapper">

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="shared-post-card">

                    <div class="author-info">

                                <img src="<?php echo $this->user_model->get_user_image_url($post['user_id']); ?>" class="post-user-img">


                        <div>
                            <h6>
                                <?php echo $post['first_name'] . ' ' . $post['last_name']; ?>
                            </h6>

                            <small class="text-muted">
                            
                                   <?php echo date('F j, g:i A', strtotime($post['created_at'])); ?>
                            </small>
                        </div>

                    </div>

                    <?php if (!empty($post['file'])): ?>

                        <div class="post-media">

                            <?php if ($post['file_type'] == 'image'): ?>

                                <img src="<?php echo base_url($post['file']); ?>" alt="">

                            <?php elseif ($post['file_type'] == 'video'): ?>

                                <video controls>
                                    <source src="<?php echo base_url($post['file']); ?>" type="video/mp4">
                                </video>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                    <?php if (!empty($post['description'])): ?>

                        <div class="post-description">
                            <?php echo nl2br(html_escape($post['description'])); ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="sidebar-card">

                    <h4 class="sidebar-title">
                        <?php echo get_phrase('Popular Posts'); ?>
                    </h4>

                    <?php if (!empty($popular_posts)): ?>

                        <?php foreach ($popular_posts as $item): ?>

                            <a href="<?php echo site_url('home/shared_post/' . $item['id']); ?>" class="popular-post-item">

                                <div class="popular-thumb">

                                    <?php if (!empty($item['file'])): ?>

                                        <?php if ($item['file_type'] == 'image'): ?>

                                            <img src="<?php echo base_url($item['file']); ?>" alt="">

                                        <?php elseif ($item['file_type'] == 'video'): ?>

                                            <video muted>
                                                <source src="<?php echo base_url($item['file']); ?>" type="video/mp4">
                                            </video>

                                        <?php endif; ?>

                                    <?php endif; ?>

                                </div>

                                <div class="popular-content">

                                    <h6>
                                        <?php
                                            $description = strip_tags($item['description']);
                                            echo strlen($description) > 20
                                                ? substr($description, 0, 20) . '...'
                                                : $description;
                                            ?>
                                    </h6>

                                    <small>                                   
                                           <?php echo date('F j, g:i A', strtotime($item['created_at'])); ?>
                                    </small>

                                </div>

                            </a>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="text-center py-3">
                            <?php echo get_phrase('No popular posts found'); ?>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>
</section>