<?php 
// Fetch the specific custom field for editing
$field = $this->db->get_where('custom_fields', ['id' => $param2])->row_array();
?>
<form action="<?php echo site_url('user/custom_field_section_update/'.$field['id']); ?>" method="post">
    <div class="mb-3">
        <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
        <input type="text" class="form-control" name="custom_title" value="<?php echo htmlspecialchars($field['custom_title']); ?>">
    </div> 
    <button type="submit" class="btn btn-primary">
        <?php echo get_phrase('Update'); ?>
    </button>
</form>
