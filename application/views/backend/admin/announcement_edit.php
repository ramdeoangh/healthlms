<?php
    $announcement = $this->db
    ->get_where('announcements', ['id' => $announcement_id])
    ->row_array();

    $selected_courses = $this->db
    ->select('course_id')
    ->where('announcement_id', $announcement_id)
    ->get('announcement_courses')
    ->result_array();

    $selected_course_ids = array_column($selected_courses, 'course_id');
?>

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('announcement_edit'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('announcement_edit_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/announcements/edit/' . $announcement_id); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="multiple_course_id">
                                <?php echo get_phrase('courses'); ?>
                                <span class="required">*</span>
                            </label>

                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="course_ids[]" id="multiple_course_id"
                                required>

                                <?php
                                    $courses = $this->db
                                        ->group_start()->where('status', 'active')->or_where('status', 'private')->group_end()
                                        ->get('course')
                                        ->result_array();

                                    foreach ($courses as $course):
                                ?>
                                <option value="<?php echo $course['id']; ?>" <?php echo in_array($course['id'], $selected_course_ids) ? 'selected' : ''; ?>>
                                    <?php echo $course['title']; ?>
                                </option>
                                <?php endforeach; ?>

                            </select>

                            <span class="badge badge-light">
                                <?php echo get_phrase('select_one_or_multiple_courses'); ?>
                            </span>
                        </div>


                        <div class="form-group">
                            <label for="title"><?php echo get_phrase('title'); ?><span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $announcement['title']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="summernote-basic"><?php echo get_phrase('description'); ?></label>
                            <textarea name="description" id="summernote-basic"><?php echo $announcement['description']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="attachment"><?php echo get_phrase('attachment'); ?></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="attachment" name="attachment" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                    <label class="custom-file-label" for="attachment"><?php echo get_phrase('choose_file'); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="is_pinned" name="is_pinned" value="1" <?php echo $announcement['is_pinned'] == 1 ? 'checked' : ''; ?>>

                            <label for="is_pinned">
                                <?php echo get_phrase('pin_announcement'); ?>
                            </label>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("update"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
