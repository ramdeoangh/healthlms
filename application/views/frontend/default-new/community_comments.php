<div class="comment-section d-none mt-3" id="commentSection<?php echo $post['id']; ?>">

    <div class="comment-wrapper">

        <h5 class="mb-4">
            <?php echo get_phrase('Comments'); ?>
            (<?php echo $post['total_comments']; ?>)
        </h5>

        <?php if ($this->session->userdata('user_id')): ?>

        <div class="comment-form-area">

            <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" class="comment-user-image">

            <div class="comment-form-content">

                <form class="commentForm" data-post-id="<?php echo $post['id']; ?>">

                    <textarea name="comment" class="form-control" rows="3" placeholder="<?php echo get_phrase('Add a comment...'); ?>"></textarea>

                    <div class="text-end mt-3">

                        <button type="submit" class="post-comment-btn">

                            <i class="far fa-paper-plane px-2"></i>

                            <?php echo get_phrase('Post Comment'); ?>

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <hr>

        <?php endif; ?>

        <div class="comment-list">

            <?php if (! empty($post['comments'])): ?>

            <?php foreach ($post['comments'] as $comment): ?>

            <div class="comment-item">

                <div class="d-flex">

                    <img src="<?php echo $this->user_model->get_user_image_url($comment['user_id']); ?>" class="comment-user-image me-3">

                    <div class="flex-grow-1">

                        <div class="comment-box">

                            <div class="d-flex justify-content-between">

                                <strong>
                                    <?php echo $comment['first_name'] . ' ' . $comment['last_name']; ?>
                                </strong>

                                <small class="text-muted">
                                    <?php echo date('F j, g:i A', strtotime($comment['created_at'])); ?>
                                </small>

                            </div>

                            <div class="mt-1">
                                <?php echo nl2br(html_escape($comment['comment'])); ?>
                            </div>

                        </div>

                        <a href="javascript:void(0)" class="replyBtn" data-comment-id="<?php echo $comment['id']; ?>">

                            <?php echo get_phrase('Reply'); ?>

                        </a>

                        <?php if (! empty($comment['replies'])): ?>

                        <a href="javascript:void(0)" class="toggleRepliesBtn" data-comment-id="<?php echo $comment['id']; ?>">

                            <?php echo get_phrase('Show'); ?>
                            <?php echo count($comment['replies']); ?>
                            <?php echo get_phrase('replies'); ?>

                        </a>

                        <?php endif; ?>

                        <!-- Reply Form -->
                        <div class="replyFormArea d-none mt-2" id="replyForm<?php echo $comment['id']; ?>">

                            <form class="replyForm" data-post-id="<?php echo $post['id']; ?>" data-parent-id="<?php echo $comment['id']; ?>">

                                <textarea name="comment" class="form-control" rows="2" placeholder="<?php echo get_phrase('Write a reply...'); ?>"></textarea>

                                <div class="text-end mt-2 d-flex gap-2 justify-content-end">

                                    <a href="javascript:void(0)" class="replyBtn post-replay-cancel-btn" data-comment-id="<?php echo $comment['id']; ?>">

                                        <?php echo get_phrase('Cancel'); ?>

                                    </a>

                                    <button type="submit" class="post-replay-btn">

                                        <i class="far fa-paper-plane px-2"></i>

                                        <?php echo get_phrase('Reply'); ?>

                                    </button>

                                </div>

                            </form>

                        </div>

                        <!-- Replies -->
                        <div class="repliesContainer d-none" id="repliesContainer<?php echo $comment['id']; ?>">

                            <?php foreach ($comment['replies'] as $reply): ?>

                            <div class="reply-item">

                                <img src="<?php echo $this->user_model->get_user_image_url($reply['user_id']); ?>" class="reply-user-image">

                                <div class="comment-box flex-grow-1">

                                    <div class="d-flex justify-content-between">

                                        <strong>
                                            <?php echo $reply['first_name'] . ' ' . $reply['last_name']; ?>
                                        </strong>

                                        <small class="text-muted">
                                            <?php echo date('F j, g:i A', strtotime($comment['created_at'])); ?>
                                        </small>

                                    </div>

                                    <div class="mt-1">
                                        <?php echo nl2br(html_escape($reply['comment'])); ?>
                                    </div>

                                </div>

                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

                <hr>

            </div>

            <?php endforeach; ?>

            <?php else: ?>

            <div class="text-center py-3">

                <p class="text-muted mb-0">
                    <?php echo get_phrase('No comments yet'); ?>
                </p>

            </div>

            <?php endif; ?>

        </div>

    </div>

</div>
