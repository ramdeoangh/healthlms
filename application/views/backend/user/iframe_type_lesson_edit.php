<input type="hidden" name="lesson_type" value="other-iframe">

<div class="form-group">
    <label><?php echo get_phrase('Iframe code or source URL'); ?></label>
    <input type="text" id = "iframe_source" name = "iframe_source" class="form-control" placeholder="<?php echo get_phrase('enter_iframe_code_or_source_url'); ?>" value="<?php echo $lesson_details['attachment']; ?>">
    <p><?php echo get_phrase('you_can_provide_the_full_iframe_code_or_just_the_source_URL'); ?></p>
</div>
