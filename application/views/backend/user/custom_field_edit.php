<?php

$field = $this->db->get_where('custom_fields', ['id' => $param2])->row_array();

$custom_type = $field['custom_type'] ?? '';
$items = json_decode($field['custom_field'], true)['data'] ?? [];

$filtered_items = [];
foreach ($items as $it) {
    if ($it['id'] == $param3) {
        $filtered_items[] = $it;
        break;
    }
}
?>

<div class="alert alert-info" role="alert">
        <?php echo get_phrase('custom_field_type : '); ?> <strong class="capitalize"> <?php echo $custom_type; ?></strong>
</div>

<?php foreach($filtered_items as $item): ?>
<form method="post" enctype="multipart/form-data"
      action="<?php echo site_url('user/custom_field_item_update/'.$field['id'].'/'.$item['id']); ?>">

    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">

    <?php if($custom_type == 'image'): ?>
        <div class="mb-3">
            <label><?php echo get_phrase('title'); ?></label>
            <input type="text" name="image_title[]"
                   value="<?php echo htmlspecialchars($item['title']); ?>"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label><?php echo get_phrase('description'); ?></label>
            <textarea name="image_description[]"
                      class="form-control"><?php echo htmlspecialchars($item['description']); ?></textarea>
        </div>
        <div class="mb-3">
            <?php if(!empty($item['file'])): ?>
                <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>"
                     width="200" style="height:120px;object-fit:cover;">
            <?php endif; ?>
            <br>
            <label class="mt-2"><?php echo get_phrase('image'); ?></label>
            <input type="file" name="image_file[]" class="form-control">
        </div>

    <?php elseif($custom_type == 'text'): ?>
        <div class="mb-3">
            <label><?php echo get_phrase('text_content'); ?></label>
            <textarea id="summernote" name="text_content[]"
                      class="form-control"><?php echo htmlspecialchars($item['description']); ?></textarea>
        </div>

    <?php elseif($custom_type == 'video'): ?>
        <div class="mb-3">
            <label><?php echo get_phrase('video_url'); ?></label>
            <input type="text" name="video_url[]"
                   value="<?php echo htmlspecialchars($item['file']); ?>"
                   class="form-control">
        </div>

    <?php elseif($custom_type == 'faq'): ?>
        <div class="mb-3">
            <label><?php echo get_phrase('faq_question'); ?></label>
            <input type="text" name="faq_question[]"
                   value="<?php echo htmlspecialchars($item['title']); ?>"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label><?php echo get_phrase('faq_answer'); ?></label>
            <textarea name="faq_answer[]"
                      class="form-control"><?php echo htmlspecialchars($item['description']); ?></textarea>
        </div>

    <?php elseif($custom_type == 'gallery'): ?>
        <div class="mb-3">
            <?php if(!empty($item['file'])): ?>
                <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>"
                     width="200" style="height:120px;object-fit:cover;">
            <?php endif; ?>
            <br>
            <label class="mt-2"><?php echo get_phrase('gallery_images'); ?></label>
            <input type="file" name="image_file[]" multiple class="form-control">
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary"><?php echo get_phrase('update'); ?></button>
    
</form>
<hr>
<?php endforeach; ?>


<script type="text/javascript">
    "use strict";

    $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']]
        ]
    });
</script>