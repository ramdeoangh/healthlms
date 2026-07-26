
<form class="required-form" action="<?php echo site_url('admin/badges/' . $type); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('Title'); ?><span class="required">*</span></label>
        <input type="text" name = "title" id = "title" class="form-control" required>
    </div>
  
    <div class="form-group">
        <label class=" control-label"><?php echo get_phrase('Condition')?><span class="required">*</span></label>
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><?php echo  get_phrase('From') ?></span>
                </span>
                    <input type="number" name="condition_from" class="form-control" required>
                    <span class="input-group-append">
                    <span class="input-group-text"><?php echo get_phrase('To')?></span>
                    </span>
                    <input type="number" name="condition_to" class="form-control " required>
                    <div class="input-group-append">
                        <div class="input-group-text"><?php echo get_phrase('Courses') ?></div>
                    </div>
                </div>
        </div>

    <div class="form-group">
        <label for="description"><?php echo get_phrase('Description') ?><span class="required">*</span></label>
        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="image"><?php echo get_phrase('Image'); ?><span class="required">*</span></label>
        <input type="file" name = "image" id = "image" class="form-control" required>
    </div>       
    <div class="row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary btn-block" ><?php echo get_phrase('create'); ?></button>
        </div>
    </div>
</form>
