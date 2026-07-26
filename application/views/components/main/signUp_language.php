<?php
    if (! isset($home_language_assets)) {
        $home_language_assets = APPPATH . 'views/frontend/default-new/home_language_assets.php';
        include $home_language_assets;
    }
?>

<?php
    $total_students       = $this->db->where('role_id', 2)->get('users');
    $total_active_courses = $this->db->where('status', 'active')->get('course');
?>
<!-- Form and Why choose Area Start -->
<section>
    <div class="container">
        <div class="row g-20px mb-100px align-items-center">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
                <div class="me-lg-3 signup-form-wrap">
                    <!-- Card -->
                    <div class="lms-1-card">
                        <div class="lms-1-card-body p-26px">
                            <h3 class="title-1 fs-32px lh-38px fw-bold mb-3 builder-editable" builder-identity="1"><?php echo get_phrase('Sign Up for Resources') ?></h3>
                            <p class="subtitle-16 fs-16px lh-24px builder-editable" builder-identity="2">
                                <?php echo get_phrase('Explore, learn, and grow with us. enjoy a seamless and enriching educational journey. lets begin!') ?></p>
                            <form action="<?php echo site_url('login/register') ?>" method="post" enctype="multipart/form-data" id="signup-form">
                                <div>
                                    <div class="mb-4">
                                        <label for="first_name" class="form-label form-label-2"><?php echo get_phrase('Name') ?></label>
                                        <input type="text" class="form-control form-control-2" id="first_name" name="first_name" placeholder="<?php echo get_phrase('Enter your name') ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="last_name" class="form-label form-label-2"><?php echo get_phrase('Last Name') ?></label>
                                        <input type="text" class="form-control form-control-2" id="last_name" name="last_name" placeholder="<?php echo get_phrase('Enter your last name') ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label form-label-2"><?php echo get_phrase('Email') ?></label>
                                        <input type="email" id="email" name="email" class="form-control form-control-2" placeholder="<?php echo get_phrase('Enter your email') ?>">
                                    </div>
                                    <div class="mb-26px">
                                        <label for="password" class="form-label form-label-2"><?php echo get_phrase('Password') ?></label>
                                        <input type="password" id="password" name="password" class="form-control form-control-2" placeholder="<?php echo get_phrase('Enter password') ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary-3 py-3 w-100"><?php echo get_phrase('Get it now') ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <p class="text-bordered-1 mb-12px builder-editable" builder-identity="3"><?php echo get_phrase('WHY CHOOSE US') ?></p>
                    <h1 class="title-1 fs-32px lh-38px fw-bold mb-20px builder-editable" builder-identity="4"><?php echo get_phrase('Resources Learning English for Beginner') ?></h1>
                    <p class="subtitle-16 fs-16px lh-24px mb-30px builder-editable" builder-identity="5"><?php echo get_phrase('Far far away, behind the word mountains, far from the away countries Vokalia and Consonantia, there live the blind texts. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.') ?></p>
                    <div class="d-flex gap-20px flex-wrap flex-sm-nowrap">
                        <div class="bgcolor-card-1" style="--bgcolor:linear-gradient(160deg, #ffeff8 10.78%, #f6f0f4 91.29%);">
                            <h2 class="title-1 fs-44px lh-60px fw-semibold mb-1"><?php echo $total_students->num_rows(); ?>+</h2>
                            <p class="title-1 fs-16px lh-24px fw-normal builder-editable" builder-identity="6"><?php echo get_phrase('User already register and signing up for using it') ?></p>
                        </div>
                        <div class="bgcolor-card-1" style="--bgcolor:linear-gradient(164deg, #e8f7fc 0%, #f1f9fc 100%);">
                            <h2 class="title-1 fs-44px lh-60px fw-semibold mb-1"><?php echo $total_active_courses->num_rows(); ?>+</h2>
                            <p class="title-1 fs-16px lh-24px fw-normal builder-editable" builder-identity="7"><?php echo get_phrase('Total courses.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form and Why choose Area End -->

<script>
function onSignupSubmit(token) {
    document.getElementById("signup-form").submit();
}
</script>
