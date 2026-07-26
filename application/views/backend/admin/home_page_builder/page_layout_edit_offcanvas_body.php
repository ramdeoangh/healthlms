<?php $files = array_diff(scandir(APPPATH . 'views/components/main'), array('.', '..')); ?>


<div class="row g-2">
    <?php foreach ($files as $file_name): ?>
        <?php $fileNameWithoutExtension = str_replace('.php', '', $file_name); ?>
        <div class="col-md-12 position-relative">
            <div class="builder-blocks">
                <?php include APPPATH . 'views/components/main/' . $file_name; ?>
            </div>
            <button onclick="add_block_html_content_by_select_from_offcanvas('<?php echo $fileNameWithoutExtension ?>')" class="builder-block-placeholder" type="button"><i class="fas fa-plus"></i></button>
        </div>
    <?php endforeach; ?>
</div>