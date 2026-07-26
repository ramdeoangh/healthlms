
<?php include "breadcrumb.php"; ?>

<section class="wish-list-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "profile_menus.php"; ?>
            </div>
            
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="courses wishlist-course mt-5">
                    <div class="courses-card">
                        <div class="row">
                        <?php foreach($following_instructors as $instructor): ?>
                            <?php 
                            $this->db->where('id', $instructor->instructor_id);
                            $instructor_info = $this->db->get('users')->row_array(); 

                            $is_following = $this->user_model->is_following($instructor->instructor_id, $this->session->userdata('user_id')); 
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="checkPropagation courses-card-body">
                                    <div class="courses-card-image eimage">
                                        <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($instructor_info['id']);?>" alt="image">
                                    </div>
                                    <div class="courses-text">
                                        <a href="<?php echo site_url('home/instructor_page/'.$instructor_info['id']) ?>"><h5 class="mb-2"><?php echo $instructor_info['first_name'] . ' ' . $instructor_info['last_name']; ?></h5></a>
                                        <p class="ellipsis-line-2 mx-0 pb-0 mb-0"><?php echo $instructor_info['title']; ?></p>
                                    </div>
                                    <p class="p-2 mb-0">
                                        <a id="follow-btn-<?php echo $instructor->instructor_id; ?>" class="w-100" href="javascript:;" onclick="toggleFollow(<?php echo $instructor->instructor_id; ?>, this)">
                                            <span class="w-100 btn <?php echo ($is_following) ? 'btn-fill' : 'btn-primary'; ?> py-2 btn-sm"><?php echo ($is_following) ? get_phrase('Unfollow') : get_phrase('Follow'); ?></span>
                                        </a>
                                    </p>
                              </div>

                                    
                            </div>
                        <?php endforeach; ?>
                        
			                </div>
			        </div>
			   </div>
		   </div>
        </div>
     </div>
</div>


<script>
function toggleFollow(instructor_id, element) {
    var url = "<?php echo site_url('home/toggle_following'); ?>";
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json', // Automatically parse the JSON response
        data: {
            instructor_id: instructor_id,
            user_id: <?php echo $this->session->userdata('user_id'); ?>
        },
        success: function(response) {
            var btn = $(element).find('span');
            if (response.status === 'followed') {
                btn.text('<?php echo get_phrase('Unfollow'); ?>');
                btn.removeClass('btn-primary');
                btn.addClass('btn-fill');
            } else if (response.status === 'unfollowed') {
                btn.text('<?php echo get_phrase('Follow'); ?>');
                btn.removeClass('btn-fill');
                btn.addClass('btn-primary');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + error);
        }
    });
}
</script>