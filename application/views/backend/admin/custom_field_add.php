<style>
.form-select:focus {
	box-shadow: none;
}
</style>

<form class="ajaxFormSubmission" action="<?php echo site_url('admin/custom_field_add/' . $param2); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="custom_type" ><?php echo get_phrase('select_type'); ?></label>
        <select name="custom_type" id="custom_type" class="form-control ol-form-control ol-select2">
            <option value=""><?php echo get_phrase('select_type'); ?></option>
            <option value="image"><?php echo get_phrase('Image'); ?></option>
            <option value="text"><?php echo get_phrase('Text'); ?></option>
            <option value="video"><?php echo get_phrase('Video'); ?></option>
            <option value="faq"><?php echo get_phrase('FAQ'); ?></option>
            <option value="gallery"><?php echo get_phrase('Gallery'); ?></option>
        </select>
    </div>
      <?php
        $custom_titles = [];

        $custom_fields = $this->db
            ->where('course_id', $param2)
            ->get('custom_fields')
            ->result_array();

        foreach ($custom_fields as $row) {
            $custom_titles[$row['custom_type']] = $row['custom_title'];
        }
    ?>

        <!---- IMAGE FIELDS - -->
        <div class="col-sm-12 custom-field-group d-none" id="image_fields">
            <div class="mb-3">
                <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
                <input type="text" class="form-control <?php echo isset($custom_titles['image']) ? 'alert alert-info' : ''; ?>" value="<?php echo isset($custom_titles['image']) ? $custom_titles['image'] : ''; ?>" <?php echo isset($custom_titles['image']) ? 'readonly' : ''; ?> name="image_custom_title" >
            </div>
            <div id="image_field_container">
                <div class="image-field-repeat rounded border p-2 mb-3">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label ol-form-label"><?php echo get_phrase('Title'); ?></label>
                            <div class="d-flex gap-2 mb-2">
                                <button type="button" class="btn btn-success btn-sm">+</button>
                                <button type="button" class="btn btn-danger btn-sm remove-image-field">−</button>
                            </div>
                        </div>
                        <input type="text" name="image_title[]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ol-form-label"><?php echo get_phrase('Description'); ?></label>
                        <textarea name="image_description[]" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label ol-form-label"><?php echo get_phrase('Image'); ?></label>
                        <input type="file" name="image_file[]" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- -- TEXT FIELDS ---->
        <div class="col-sm-12 custom-field-group d-none" id="text_fields">
            <div class="mb-3">
                <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
                <input type="text" class="form-control <?php echo isset($custom_titles['text']) ? 'alert alert-info' : ''; ?>" value="<?php echo isset($custom_titles['text']) ? $custom_titles['text'] : ''; ?>" <?php echo isset($custom_titles['text']) ? 'readonly' : ''; ?> name="text_custom_title" >

            </div>
            <div id="text_field_container">
                <div class="text-field-repeat rounded border p-2 mb-3">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label ol-form-label"><?php echo get_phrase('Text Content'); ?></label>
                        </div>
                        <textarea id="summernote" name="text_content[]" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- VIDEO FIELDS --}} -->
        <div class="col-sm-12 custom-field-group d-none" id="video_fields">
            <div class="mb-3">
                <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
                <input type="text" name="video_custom_title" class="form-control <?php echo isset($custom_titles['video']) ? 'alert alert-info' : ''; ?>" value="<?php echo isset($custom_titles['video']) ? $custom_titles['video'] : ''; ?>" <?php echo isset($custom_titles['video']) ? 'readonly' : ''; ?> >
            </div>
            <div id="video_field_container">
                <div class="video-field-repeat rounded border p-2 mb-3">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label ol-form-label"><?php echo get_phrase('Video URL'); ?></label>
                        </div>
                        <input type="text" name="video_url[]" class="form-control" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>
        </div>

        <!---- FAQ FIELDS ---->
        <div class="col-sm-12 custom-field-group d-none" id="faq_fields">
            <div class="mb-3">
                <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
                <input type="text" name="faq_custom_title" class="form-control <?php echo isset($custom_titles['faq']) ? 'alert alert-info' : ''; ?>" value="<?php echo isset($custom_titles['faq']) ? $custom_titles['faq'] : ''; ?>" <?php echo isset($custom_titles['faq']) ? 'readonly' : ''; ?> >
            </div>
            <div id="faq_field_container">
                <div class="faq-field-repeat rounded border p-2 mb-3">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label ol-form-label"><?php echo get_phrase('FAQ Question'); ?></label>
                            <div class="d-flex gap-2 mb-2">
                                <button type="button" class="btn btn-success btn-sm fs-14px add-faq-field">+</button>
                                <button type="button" class="btn btn-danger btn-sm remove-faq-field">−</button>
                            </div>
                        </div>
                        <input type="text" name="faq_question[]" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label ol-form-label"><?php echo get_phrase('FAQ Answer'); ?></label>
                        <textarea name="faq_answer[]" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!---- Gallery   FIELDS ---->
        <div class="col-sm-12 custom-field-group d-none" id="gallery_fields">
            <div class="mb-3">
                <label class="form-label ol-form-label"><?php echo get_phrase('Section Title'); ?></label>
                <input type="text" name="gallery_custom_title" class="form-control <?php echo isset($custom_titles['gallery']) ? 'alert alert-info' : ''; ?>" value="<?php echo isset($custom_titles['gallery']) ? $custom_titles['gallery'] : ''; ?>" <?php echo isset($custom_titles['gallery']) ? 'readonly' : ''; ?> >
            </div>
            <div id="gallery_field_container">
                <div class="gallery-field-repeat rounded border p-2 mb-3">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label ol-form-label"><?php echo get_phrase('Gallery Image'); ?></label>
                        </div>
                        <input type="file" name="gallery_images[]" multiple class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!---- SUBMIT BUTTON ---->
        <div class="col-sm-12 text-end mt-3 d-none" id="submit_button_wrapper">
            <button type="submit" class="btn btn-primary"><?php echo get_phrase('Submit'); ?></button>
        </div>





</form>
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

        <script>
    $(document).ready(function () {
        $('#custom_type').on('change', function () {
            let selectedType = $(this).val();

            // সব custom field hide
            $('.custom-field-group').addClass('d-none');

            // submit button hide
            $('#submit_button_wrapper').addClass('d-none');

            if (selectedType) {
                // selected field show
                $('#' + selectedType + '_fields').removeClass('d-none');

                // submit button show
                $('#submit_button_wrapper').removeClass('d-none');
            }
        });
    });
</script>

<script>
$(document).on('click', '.btn-success', function () {
    let wrapper = $(this).closest('.custom-field-group').find('[id$="_field_container"]');
    let firstItem = wrapper.children().first();
    let clone = firstItem.clone();

    // input reset
    clone.find('input, textarea').val('');
    clone.find('input[type="file"]').val('');

    wrapper.append(clone);
});

$(document).on('click', '.remove-image-field', function () {
    let container = $('#image_field_container');

    if (container.children().length > 1) {
        $(this).closest('.image-field-repeat').remove();
    }
});

// Slider
$(document).on('click', '.add-slider-field', function () {
    let container = $('#slider_field_container');
    let clone = container.children().first().clone();

    clone.find('input, textarea').val('');
    clone.find('input[type="file"]').val('');

    container.append(clone);
});

$(document).on('click', '.remove-slider-field', function () {
    let container = $('#slider_field_container');

    if (container.children().length > 1) {
        $(this).closest('.slider-field-repeat').remove();
    }
});


//FAQ
$(document).on('click', '.add-faq-field', function () {
    let container = $('#faq_field_container');
    let clone = container.children().first().clone();

    clone.find('input, textarea').val('');
    container.append(clone);
});

$(document).on('click', '.remove-faq-field', function () {
    let container = $('#faq_field_container');

    if (container.children().length > 1) {
        $(this).closest('.faq-field-repeat').remove();
    }
});


//Gallery
$(document).on('click', '.add-gallery-field', function () {
    let container = $('#gallery_field_container');
    let clone = container.children().first().clone();

    clone.find('input[type="file"]').val('');
    container.append(clone);
});

$(document).on('click', '.remove-gallery-field', function () {
    let container = $('#gallery_field_container');

    if (container.children().length > 1) {
        $(this).closest('.gallery-field-repeat').remove();
    }
});

</script>


