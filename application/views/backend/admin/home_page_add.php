<form action="<?php echo site_url('admin/home_page_builder/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('Title'); ?></label>
        <input type="text" class="form-control" name="title" id="title" placeholder="<?php echo get_phrase('enter_a_title'); ?>" required>
    </div>

    <div class="form-group">
        <label for="summernote-basic"><?php echo get_phrase('description'); ?></label>
        <textarea name="description" id="summernote-basic"></textarea>
    </div>

    <div class="form-group">
        <label for="thumbnail"><?php echo get_phrase('Thumbnail'); ?></label>
        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-success"><?php echo get_phrase('Add'); ?></button>
    </div>
</form>

<script>
    $('#summernote-basic').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>