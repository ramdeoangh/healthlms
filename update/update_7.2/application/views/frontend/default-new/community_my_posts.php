<?php
    $user_id = $this->session->userdata('user_id');

    $user = $this->db->where('id', $user_id)->get('users')->row_array();

?>

<?php include "breadcrumb.php"; ?>

<section class="courses-list-view">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                <?php include 'community_sidebar.php'; ?>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8">

                <div class="community-content">


                    <?php if (! empty($posts)): ?>

                    <?php foreach ($posts as $post): ?>

                    <div class="post-card">

                        <div class="post-header">

                            <div class="d-flex align-items-center">

                                <img src="<?php echo $this->user_model->get_user_image_url($post['user_id']); ?>" class="post-user-img">

                                <div>
                                    <strong>
                                        <?php echo $post['first_name'] . ' ' . $post['last_name']; ?>
                                    </strong>
                                    <br>

                                    <small>
                                        <?php echo date('F j, g:i A', strtotime($post['created_at'])); ?>
                                    </small>
                                </div>

                            </div>

                            <?php
                                $isSaved = false;

                                if ($this->session->userdata('user_id')) {

                                    $isSaved = $this->db
                                        ->where('post_id', $post['id'])
                                        ->where('user_id', $this->session->userdata('user_id'))
                                        ->get('community_saved_posts')
                                        ->num_rows() > 0;
                                }
                            ?>

                            <div class="dropdown">
                                <button class="btn post-option-btn" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item savePostBtn" data-post-id="<?php echo $post['id']; ?>">

                                            <?php echo $isSaved ? get_phrase('Remove Bookmark') : get_phrase('Bookmark'); ?>

                                        </a>
                                    </li>

                                    <?php if (
                                            $this->session->userdata('user_id') &&
                                            $post['user_id'] == $this->session->userdata('user_id')
                                    ): ?>

                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('home/posts/delete/' . $post['id'] . '/my_posts'); ?>')">

                                            <?php echo get_phrase('Delete'); ?>

                                        </a>
                                    </li>

                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>

                        <div class="post-body">

                            <?php if (! empty($post['description'])): ?>

                            <p>
                                <?php echo nl2br(html_escape($post['description'])); ?>
                            </p>

                            <?php endif; ?>

                            <?php if (! empty($post['file'])): ?>

                            <?php if ($post['file_type'] == 'image'): ?>

                            <img src="<?php echo base_url($post['file']); ?>" class="post-image">

                            <?php elseif ($post['file_type'] == 'video'): ?>

                            <video controls class="w-100">

                                <source src="<?php echo base_url($post['file']); ?>" type="video/mp4">

                            </video>

                            <?php endif; ?>

                            <?php endif; ?>
                        </div>

                        <div class="d-flex align-items-center gap-4 px-4 py-2">
                            <small><span class="likeCount<?php echo $post['id']; ?>"><?php echo $post['total_likes']; ?></span> <?php echo get_phrase('likes'); ?></small>
                            <small><span class="commentCount<?php echo $post['id']; ?>"><?php echo $post['total_comments']; ?></span> <?php echo get_phrase('comments'); ?></small>
                        </div>

                        <?php
                            $isLiked = false;

                            if ($this->session->userdata('user_id')) {

                                $isLiked = $this->db
                                    ->where('post_id', $post['id'])
                                    ->where('user_id', $this->session->userdata('user_id'))
                                    ->get('community_post_likes')
                                    ->num_rows() > 0;
                            }
                        ?>

                        <div class="post-footer">

                            <a href="javascript:void(0)" class="toggleLikeBtn <?php echo $isLiked ? 'liked-post' : ''; ?>" data-post-id="<?php echo $post['id']; ?>">

                                <i class="far fa-thumbs-up"></i>
                                <?php echo get_phrase('Like'); ?>
                            </a>

                            <a href="javascript:void(0)" class="toggleCommentSection" data-post-id="<?php echo $post['id']; ?>">

                                <i class="far fa-comment"></i>
                                <?php echo get_phrase('Comment'); ?>
                            </a>

                            <a href="javascript:void(0)" class="sharePostBtn" data-url="<?php echo site_url('home/shared_post/' . $post['id']); ?>">

                                <i class="fas fa-share"></i>
                                <?php echo get_phrase('Share'); ?>
                            </a>

                        </div>

                        <?php include "community_comments.php"; ?>


                    </div>

                    <?php endforeach; ?>

                    <?php else: ?>

                    <div class="not-found w-100 text-center d-flex align-items-center flex-column pt-4">
                        <img loading="lazy" width="80px" src="<?php echo base_url('assets/global/image/not-found.svg'); ?>">
                        <h5><?php echo get_phrase('Posts Not Found'); ?></h5>
                        <p><?php echo get_phrase('Sorry, try using more similar words in your search.') ?></p>
                    </div>

                    <?php endif; ?>


                </div>


            </div>
        </div>
    </div>
</section>

<?php include "community_scripts.php"; ?>
