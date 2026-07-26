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

<?php include APPPATH . 'views/frontend/default-new/includes_top.php'; ?>

<style type="text/css">
    <?php echo get_frontend_settings('custom_css'); ?>
</style>













<!-- Builder start -->
<link rel="stylesheet" href="<?php echo base_url('assets/global/jquery-ui-1.13.2/jquery-ui.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/global/uicons-regular-rounded/css/uicons-regular-rounded.css') ?>">
<style>
    .offcanvas {
        /* transition: none !important; */
        width: 350px !important;
        z-index: 9999999 !important;
    }

    .builder-blocks {
        zoom: 20%;
        border: 8px solid #c4cdde;
        margin: 2px;
        border-radius: 12px;
        cursor: pointer;
        min-height: 500px;
        padding: 20px;
    }

    .builder-blocks:hover {
        border: 8px solid #97a8e4;
    }

    .builder-blocks>* {
        margin: 0px !important;
        border-radius: 12px;
    }

    .builder-block-placeholder i {
        color: transparent;
    }

    .builder-block-placeholder {
        top: 0;
        height: calc(100% - 7px);
        position: absolute;
        width: calc(100% - 12px);
        background-color: transparent;
        z-index: 99999;
        margin: 3.5px 3.5px;
        border-radius: 3px;
    }

    .builder-block-placeholder:hover {
        background-color: #0000004f;
    }

    .builder-block-placeholder:hover i {
        color: #fff;
    }




    [builder-block-identifier] {
        position: relative;
        border: 2px solid #00000000;
        margin-bottom: 5px;
    }


    [builder-block-identifier]:hover,
    [builder-block-identifier].selected-block {
        border: 2px dashed #737373;
        cursor: move;
    }

    [builder-block-identifier] .content_editor_buttons {
        position: absolute;
        display: none;
        left: 50%;
        transform: translateX(-50%);
        z-index: 999999;
        margin-top: 5px;
    }

    [builder-block-identifier]:hover .content_editor_buttons {
        display: block;
    }

    /* overlay button */
    .builder-editable,
    .builder-editable-wraper {
        position: relative !important;
        cursor: pointer;
        display: inherit;
        width: fit-content;
    }

    .builder-editable:hover::after,
    .builder-editable:focus::after,
    .builder-editable-wraper:hover::after,
    .builder-editable-wraper:focus::after {
        font-family: uicons-regular-rounded !important;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        z-index: 23;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        color: #fff;
    }

    .builder-editable:hover::after,
    .builder-editable:focus::after,
    .builder-editable-wraper:hover::after,
    .builder-editable-wraper:focus::after {
        content: "\f617";
        background-color: #b9b9b97d;
        color: #000;
        border: 2px dotted #a6a6a6;
        width: calc(100% + 8px);
        margin-left: -5px;
        font-size: 18px;
    }

    /* overlay button */
</style>

<style>
    .parent {
        position: relative;
        /* Add any other styles you want for the parent div */
    }

    .parent:hover {
        outline: 2px dashed black;
        display: block;
    }

    .child {
        position: absolute;
        display: none;
        float: right;
        text-align: center;
        top: 0;
        left: 0;
        width: 100%;
        cursor: move;
        margin-top: 5px;
    }

    .parent:hover>.child {
        display: block;
    }

    .block_delete {
        border-radius: 5px 0px 0px 5px !important;
    }

    .block_add {
        border-radius: 0px 5px 5px 0px !important;
    }


    .editor_top_bar {
        background-color: #121729;
    }

    .editor_title {
        color: #faf4ff;
        font-size: 14px;
    }

    .builder_image img {
        display: block;
    }

    .placeholder_block {
        text-align: center;
        outline: 2px dashed #c1b4d8;
        padding: 50px;
        margin-top: 50px;
        border-radius: 10px;
    }

    .placeholder_block>div {
        margin-top: 10px;
        font-size: 16px;
        margin-bottom: 20px;
        color: #12172a;
    }

    .toast {
        font-size: 13px;
    }


    /* Drag and Drop element css started */
    .ui-sortable-placeholder,
    .drop-placeholder {
        display: inline-block;
        border: 3px dashed #c1b4d8;
        visibility: visible !important;
        background: transparent;
        height: 40px;
        width: 120px;
        margin-bottom: 10px;
        border-radius: 8px !important;
    }

    .ui-droppable-active,
    .ui-droppable-hover {
        position: relative;
    }

    .ui-droppable-active::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        border-radius: inherit !important;
        border: 3px dashed #FF9800;
    }

    .ui-droppable-hover::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        border-radius: inherit !important;
        border: 3px dashed #00ff88;
    }

    .cursor-move {
        cursor: move !important;
    }

    .dropped-item:hover .remove-dropped-item {
        display: block;
    }

    .remove-dropped-item {
        display: none;
        position: absolute;
        top: -12px;
        right: -16px;
        background: #ff1010;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1000;
        font-size: 10px;
    }

    .remove-dropped-item:hover {
        background: #c10909;
        color: white;
    }

    button,
    a {
        transition: none !important;
    }

    .mt-8px {
        margin-top: 8px !important;
    }

    .text-30px {
        font-size: 30px !important;
    }

    .btn {
        font-size: 13px !important;
        border: 0px !important;
    }

    .btn:hover {
        transform: unset !important;
    }

    i.fas,
    i.fa,
    i.fab {
        line-height: 1 !important;
        padding: 0px 3px !important;
    }

    .content_editor_buttons .btn {
        padding: 6px 12px !important;
    }

    /* .drop-area :not(.dropped-item) {
        position: relative !important;
    } */

    /* Drag and Drop element css started */
</style>
<!-- Builder ended -->