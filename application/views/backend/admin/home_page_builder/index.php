<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_phrase('Page Builder'); ?> | <?php echo get_settings('system_title'); ?></title>

    <link rel="shortcut icon" href="<?php echo base_url(get_frontend_settings('favicon')) ?>" />

    <?php include 'css.php'; ?>
    <script src="<?php echo base_url('assets/global/jquery-ui-1.13.2/jquery-ui.min.js') ?>"></script>

</head>

<body>

    <!-- Builder bar -->
    <div id="editor_top_bar" class="editor_top_bar">
        <div class="container py-2">
            <div class="row">
                <div class="col-auto">
                    <div class="editor_title mt-1"><?php echo get_phrase('Page Builder') ?></div>
                </div>
                <div class="col-auto ms-auto me-auto text-center">
                    <a class="btn btn-dark mx-1 save-button" href="<?php echo site_url('admin/preview_home_page/' . $page['id']) ?>" target="_blank">
                        <i class="fas fa-eye"> </i><?php echo get_phrase('Preview') ?>
                    </a>

                    <button class="btn btn-dark mx-1 save-button" onclick="save_layout()">
                        <i class="fas fa-cloud-upload-alt"> </i><?php echo get_phrase('Save') ?>
                    </button>

                    <button class="btn btn-dark mx-1 save-button" onclick="show_offcanvas('<?php echo site_url('view/load/backend.admin.home_page_builder.page_elements') ?>', '<?php echo get_phrase('Elements') ?>')">
                        <i class="fas fa-plus"> </i><?php echo get_phrase('Add New Element') ?>
                    </button>
                </div>
                <div class="col-auto">
                    <a class="btn btn-dark float-end mx-1" href="<?php echo site_url('admin/home_page_builder'); ?>">
                        <i class="fas fa-chevron-left"> </i><?php echo get_phrase('Back') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="main">
        <?php foreach (json_decode($page['html_file_names'] ?? '[]', true) as $key => $builder_file_name): ?>
            <div builder-block-identifier="<?php echo time() . rand(1000, 9999) . $key ?>" builder-block-file-name="<?php echo $builder_file_name ?>">
                <?php include APPPATH . 'views/components/builder/' . $page['id'] . '-' . $builder_file_name . '.php'; ?>
            </div>
        <?php endforeach; ?>
    </div>




    <?php include 'page_layout_edit_offcanvas.php'; ?>
    <?php include 'js.php'; ?>
</body>

</html>