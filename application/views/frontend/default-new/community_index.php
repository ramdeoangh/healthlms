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
                    <h2><?php echo get_phrase('Community Posts') ?></h2>
                    <p><?php echo get_phrase('Connect, share, and learn together') ?></p>

                    <div class="community-toolbar mt-3">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <form method="GET" action="<?php echo site_url('home/posts'); ?>">
                                    <input type="text" name="search" class="form-control" value="<?php echo isset($search) ? html_escape($search) : ''; ?>"
                                        placeholder="<?php echo get_phrase('Search posts...'); ?>">
                                </form>
                            </div>

                            <div class="col-md-4 text-end">
                                <button type="button" class="create-post-btn" id="showPostForm">
                                    <i class="fas fa-plus px-2"></i>
                                    <?php echo get_phrase('Create Post'); ?>

                                </button>
                                <button type="button" class="cancel-post-btn d-none" id="hidePostForm">
                                    <i class="fas fa-times px-2"></i><?php echo get_phrase('Cancel'); ?>
                                </button>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo site_url('home/posts/add'); ?>" method="post" id="postFormCard" class="d-none" enctype="multipart/form-data">
                        <div class="create-post-card">
                            <div class="create-post-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="<?php echo $this->user_model->get_user_image_url($user['id']) ?? ''; ?>" class="post-user-img">
                                    <div><strong><?php echo $user['first_name'] ?? ''; ?></strong></div>
                                </div>
                                <textarea name="description" class="form-control post-textarea" placeholder="Share your thoughts with the community..."></textarea>
                            </div>

                            <div class="create-post-footer">
                                <div>
                                    <label class="upload-btn"><i class="far fa-image"></i><?php echo get_phrase('Photo/Video'); ?><input type="file" name="file" id="postFile" hidden
                                            accept="image/*,video/*"></label>
                                    <div id="selectedFile" class="selected-file d-none">
                                        <span id="fileName"></span>
                                        <button type="button" id="removeFile"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <button type="submit" class="btn-submit-post">
                                    <?php echo get_phrase("Post"); ?>
                                </button>

                            </div>
                        </div>
                    </form>



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
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('home/posts/delete/' . $post['id'] . '/posts'); ?>')">

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

<script>
$(document).ready(function() {

    $('#showPostForm').on('click', function() {

        if (!isLoggedIn) {
            toastr.error('Please login first');
            return;
        }

        $('#postFormCard').removeClass('d-none');

        $(this).addClass('d-none');

        $('#hidePostForm').removeClass('d-none');
    });

    $('#hidePostForm').on('click', function() {

        $('#postFormCard').addClass('d-none');

        $(this).addClass('d-none');

        $('#showPostForm').removeClass('d-none');
    });

});
</script>
