<?php foreach (json_decode($home['html_file_names'] ?? '[]', true) as $key => $builder_file_name): ?>
<div builder-block-identifier="<?php echo time() . rand(1000, 9999) . $key ?>" builder-block-file-name="<?php echo $builder_file_name ?>">
    <?php include APPPATH . 'views/components/builder/' . $home['id'] . '-' . $builder_file_name . '.php'; ?>
</div>
<?php endforeach; ?>
