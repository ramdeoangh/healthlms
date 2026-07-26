<?php
$language_dir = 'ltr';
$language_dirs = get_settings('language_dirs');
if ($language_dirs) {
    $current_language = $this->session->userdata('language');
    $language_dirs_arr = json_decode($language_dirs, true);
    if (array_key_exists($current_language, $language_dirs_arr)) {
        $language_dir = $language_dirs_arr[$current_language];
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo getIsoCode('english'); ?>" dir="<?php echo $language_dir; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_phrase('Preview Built Page'); ?> | <?php echo get_settings('system_title'); ?></title>

    <link rel="shortcut icon" href="<?php echo base_url(get_frontend_settings('favicon  ')) ?>" />

    <?php include APPPATH . 'views/frontend/default-new/includes_top.php'; ?>

    <style type="text/css">
        <?php echo get_frontend_settings('custom_css'); ?>
    </style>
</head>

<body class="<?php echo $this->session->userdata('theme_mode'); ?>">

    <?php
    //user wishlist items
    $my_wishlist_items = array();
    if ($user_id = $this->session->userdata('user_id')) {
        $wishlist = $this->user_model->get_all_user($user_id)->row('wishlist');
        if ($wishlist != '') {
            $my_wishlist_items = json_decode($wishlist, true);
        }
    }

    ?>
    <?php foreach (json_decode($home['html_file_names'] ?? '[]', true) as $key => $builder_file_name): ?>
        <div builder-block-identifier="<?php echo time() . rand(1000, 9999) . $key ?>" builder-block-file-name="<?php echo $builder_file_name ?>">
            <?php include APPPATH . 'views/components/builder/' . $home['id'] . '-' . $builder_file_name . '.php'; ?>
        </div>
    <?php endforeach; ?>



    <?php
    include APPPATH . 'views/frontend/default-new/includes_bottom.php';
    include APPPATH . 'views/frontend/default-new/modal.php';
    include APPPATH . 'views/frontend/default-new/common_scripts.php';
    include APPPATH . 'views/frontend/default-new/init.php';
    ?>

    <!-- Only for frontend view/preview not builder -->
    <script>
        $('document').ready(function() {
            new WOW().init();
        });
    </script>

    <?php echo get_frontend_settings('embed_code'); ?>

</body>

</html>