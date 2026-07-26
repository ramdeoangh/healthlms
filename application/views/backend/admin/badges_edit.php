<form class="required-form" action="<?php echo site_url('admin/badges/update'); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="badge_id" value="<?php echo $badges['id']; ?>">

    <div class="form-group">
        <label for="title"><?php echo get_phrase('Title'); ?></label>
        <input type="text" name = "title" id = "title" class="form-control" value='<?php echo $badges['title']?>'>
    </div>
   
    <div class="form-group">
        <label class=" control-label"><?php echo get_phrase('Condition')?></label>
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><?php echo  get_phrase('From') ?></span>
                </span>
                    <input type="number" name="condition_from" class="form-control" value="<?php echo $badges['condition_from']?>">
                    <span class="input-group-append">
                    <span class="input-group-text"><?php echo get_phrase('To')?></span>
                    </span>
                    <input type="number" name="condition_to" class="form-control " value="<?php echo $badges['condition_to']?>">
                    <div class="input-group-append">
                        <div class="input-group-text"><?php echo get_phrase('Courses') ?></div>
                    </div>
                </div>
        </div>

    <div class="form-group">
        <label for="description"><?php echo get_phrase('Description') ?></label>
        <textarea name="description" id="description" class="form-control" rows="5" required><?php echo $badges['description']?></textarea>
    </div>
    <div class="form-group">
        <label for="image"><?php echo get_phrase('Image'); ?></label>
        <input type="file" name = "image" id = "image" class="form-control" value="<?php echo $badges['image']?>" >
    </div>  
    <div class="row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update'); ?></button>
        </div>
    </div>
</form>