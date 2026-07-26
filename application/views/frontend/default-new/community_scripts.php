<script>
const isLoggedIn = <?php echo $this->session->userdata('user_id') ? 'true' : 'false'; ?>;


$(document).ready(function() {

    $('#postFile').on('change', function() {

        let file = this.files[0];

        if (file) {

            $('#fileName').text(file.name);

            $('#selectedFile').removeClass('d-none');
        }
    });

    $('#removeFile').on('click', function() {

        $('#postFile').val('');

        $('#fileName').text('');

        $('#selectedFile').addClass('d-none');
    });

});

$(document).on('click', '.toggleLikeBtn', function(e) {

    e.preventDefault();

    if (!isLoggedIn) {

        toastr.error('Please login first');
        return false;
    }

    let button = $(this);
    let postId = button.data('post-id');

    $.ajax({

        url: "<?php echo site_url('home/toggle_like'); ?>/" + postId,

        type: "POST",

        success: function(response) {

            response = JSON.parse(response);

            $('.likeCount' + postId)
                .text(response.total_likes);

            if (response.status == 'liked') {

                button.addClass('liked-post');

            } else {

                button.removeClass('liked-post');
            }
        }
    });
});

$(document).on('click', '.toggleCommentSection', function(e) {

    e.preventDefault();

    if (!isLoggedIn) {
        toastr.error('Please login first');
        return false;
    }

    let postId = $(this).data('post-id');

    $('#commentSection' + postId).toggleClass('d-none');
});


$(document).on('click', '.replyBtn', function() {

    let commentId = $(this).data('comment-id');

    $('#replyForm' + commentId).toggleClass('d-none');
});


$(document).on('submit', '.commentForm', function(e) {

    e.preventDefault();

    let form = $(this);
    let postId = form.data('post-id');

    $.ajax({

        url: "<?php echo site_url('home/add_comment'); ?>/" + postId,

        type: "POST",

        data: {
            comment: form.find('[name="comment"]').val()
        },

        success: function(response) {

            response = JSON.parse(response);

            if (response.status == 'success') {

                window.location.reload();

            } else {

                error(response.message);
            }
        }

    });

});


$(document).on('submit', '.replyForm', function(e) {

    e.preventDefault();

    let form = $(this);
    let postId = form.data('post-id');

    $.ajax({

        url: "<?php echo site_url('home/add_comment'); ?>/" + postId,

        type: "POST",

        data: {
            parent_id: form.data('parent-id'),
            comment: form.find('[name="comment"]').val()
        },

        success: function(response) {

            response = JSON.parse(response);

            if (response.status == 'success') {

                window.location.reload();

            } else {

                error(response.message);
            }
        }
    });

});


$(document).on('click', '.toggleRepliesBtn', function() {

    let commentId = $(this).data('comment-id');

    let container = $('#repliesContainer' + commentId);

    if (container.hasClass('d-none')) {

        container.removeClass('d-none');

        $(this).text('Hide replies');

    } else {

        container.addClass('d-none');

        let totalReplies = container.find('.reply-item').length;

        $(this).text('Show ' + totalReplies + ' replies');
    }
});

$(document).on('click', '.sharePostBtn', function() {

    let url = $(this).data('url');

    navigator.clipboard.writeText(url).then(function() {
        toastr.success('Post link copied successfully');
    }).catch(function() {
        toastr.error('Failed to copy link');
    });
});

</script>


<script>
$(document).on('click', '.savePostBtn', function(e) {

    e.preventDefault();

    if (!isLoggedIn) {
        toastr.error('Please login first');
        return false;
    }

    let button = $(this);
    let postId = button.data('post-id');

    $.ajax({

        url: "<?php echo site_url('home/toggle_save'); ?>/" + postId,

        type: "POST",

        success: function(response) {

            response = JSON.parse(response);

            if (response.status == 'saved') {

                button.text('Remove Bookmark');

                toastr.success(response.message);

            } else if (response.status == 'unsaved') {

                button.text('Bookmark');

                toastr.success(response.message);

            } else {

                toastr.error(response.message);
            }
        }
    });
});
</script>
