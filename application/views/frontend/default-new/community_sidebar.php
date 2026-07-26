<?php
    $user_id = $this->session->userdata('user_id');

    $user = $this->db
    ->get_where('users', ['id' => $user_id])
    ->row_array();
?>

<div class="course-all-category">

    <div>

        <div class="community-user-card">

            <div class="community-profile">

                <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($user_id); ?>" alt="User Image">

                <h5>
                    <?php
                        echo ! empty($user['first_name'])
                            ? $user['first_name'] . ' ' . $user['last_name']
                            : get_phrase('User');
                    ?>
                </h5>

                <p>
                    <?php
                        if ($this->session->userdata('admin_login')) {
                            echo get_phrase('Administrator');
                        } elseif ($this->session->userdata('instructor_login')) {
                            echo get_phrase('Instructor');
                        } else {
                            echo get_phrase('Student');
                        }
                    ?>
                </p>

            </div>

        </div>

        <ul class="community-menu">

            <li class="<?php echo(isset($page_name) && $page_name == 'community_index') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('home/posts'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <?php echo get_phrase('Posts'); ?>
                </a>
            </li>

            <li class="<?php echo(isset($page_name) && $page_name == 'community_my_posts') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('home/my_posts'); ?>">
                    <i class="fas fa-user-edit"></i>
                    <?php echo get_phrase('My Posts'); ?>
                </a>
            </li>

            <li class="<?php echo(isset($page_name) && $page_name == 'community_saved_posts') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('home/saved_posts'); ?>">
                    <i class="fas fa-bookmark"></i>
                    <span><?php echo get_phrase('Saved Posts'); ?></span>
                </a>
            </li>

            <li class="<?php echo(isset($page_name) && $page_name == 'privacy_policy') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('home/privacy_policy'); ?>">
                    <i class="fas fa-lock"></i>
                    <span><?php echo get_phrase('Privacy Policy'); ?></span>
                </a>
            </li>

        </ul>

    </div>

</div>
