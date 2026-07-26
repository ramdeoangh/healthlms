<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('Home page builder'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
            <li class="nav-item">
                <a href="#home-page-builder" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active py-2">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block"><?php echo site_phrase('Home page builder'); ?></span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#pre-built-home-settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 py-2">
                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block"><?php echo get_phrase('Pre-Built Home settings'); ?></span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="home-page-builder">
                <div class="row justify-content-center">
                    <div class="col-8 p-4">
                        <style>
                            .add-home-page {
                                display: block;
                                background-color: #f8fbff;
                                padding: 35px 70px;
                                border-radius: 10px;
                                color: #1b84ff;
                                text-align: center;
                                border: 1px solid #1b84ff;
                                border-style: dashed;
                                width: 100%;
                            }

                            .add-home-page:hover {
                                box-shadow: 0px 5px 20px #1b84ff29;
                            }
                        </style>
                        <a onclick="showAjaxModal('<?php echo site_url('modal/popup/home_page_add'); ?>', '<?php echo get_phrase('Build a new Home page'); ?>')" href="#" class="add-home-page text-center mb-4">
                            <p class="sub-title mb-1"><i class="mdi mdi-plus text-20"></i></p>
                            <h3 class="title text-15 fw-500"><?php echo get_phrase('Build a new Home page'); ?></h3>
                        </a>
                    </div>

                    <?php foreach ($this->db->order_by('id', 'desc')->get('home_pages')->result_array() as $home_page): ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body text-center position-relative">
                                    <span class="badge <?php echo $home_page['is_permanent'] ? 'badge-warning' : 'badge-success' ?> text-18" style="position: absolute; top: 10px; transform: translateX(-50%); left: 50%;">
                                        <?php echo $home_page['title']; ?>
                                         (<?php echo $home_page['is_permanent'] ? 'Pre-Built' : 'Custom-Built'; ?>)
                                    </span>

                                    <?php if ($home_page['thumbnail'] == ''): ?>
                                        <img class="radius-5px" height="250px" src="<?php echo base_url('uploads/seo-og-images/placeholder.png') ?>">
                                    <?php else: ?>
                                        <img class="radius-5px" height="250px" src="<?php echo base_url($home_page['thumbnail']) ?>">
                                    <?php endif; ?>

                                    <div class="w-100 d-flex flex-row justify-content-evenly align-items-center mt-3">

                                        <?php if ($home_page['is_permanent'] != 1): ?>
                                            <a class="btn btn-outline-primary text-center <?php if ($home_page['status'] == 1) echo 'bg-primary text-white'; ?>" href="<?php echo site_url('admin/home_page_builder/status/' . $home_page['id']) ?>">
                                                <?php if ($home_page['status'] == 1): ?>
                                                    <?php echo get_phrase('Activated') ?>
                                                <?php else: ?>
                                                    <?php echo get_phrase('Active') ?>
                                                <?php endif; ?>
                                            </a>
                                            <a class="btn btn-outline-info text-center" href="<?php echo site_url('admin/home_page/builder/' . $home_page['id']) ?>"><?php echo get_phrase('Open Builder') ?></a>
                                            <a class="btn btn-outline-info text-center" onclick="showAjaxModal('<?php echo site_url('modal/popup/home_page_edit/' . $home_page['id']) ?>', '<?php echo get_phrase('Edit Home page'); ?>')" href="#"><?php echo get_phrase('Edit') ?></a>
                                            <a class="btn btn-outline-danger text-center" href="#" onclick="confirm_modal('<?php echo site_url('admin/home_page_builder/delete/' . $home_page['id']) ?>')"><?php echo get_phrase('Delete') ?></a>
                                        <?php else: ?>
                                            <a class="btn btn-outline-primary w-75 text-center <?php if ($home_page['status'] == 1) echo 'bg-primary text-white'; ?>" href="<?php echo site_url('admin/home_page_builder/status/' . $home_page['id']) ?>">
                                                <?php if ($home_page['status'] == 1): ?>
                                                    <?php echo get_phrase('Activated') ?>
                                                <?php else: ?>
                                                    <?php echo get_phrase('Active') ?>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane" id="pre-built-home-settings">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3"><?php echo get_phrase('Motivational Speech'); ?></h4>
                                <form action="<?php echo site_url('admin/frontend_settings/motivational_speech'); ?>" method="post" enctype="multipart/form-data">
                                    <div id="motivational_speech_area">
                                        <?php $motivational_speeches = count(json_decode(get_frontend_settings('motivational_speech'), true)) > 0 ? json_decode(get_frontend_settings('motivational_speech'), true) : [['title' => '', 'description' => '', 'image' => '']]; ?>
                                        <?php foreach ($motivational_speeches as $key => $motivational_speech): ?>
                                            <div class="d-flex mt-2">
                                                <div class="flex-grow-1 pr-3 mb-3">
                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Title'); ?></label>
                                                        <input type="text" class="form-control" name="titles[]" placeholder="<?php echo get_phrase('Title'); ?>" value="<?php echo $motivational_speech['title']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Description'); ?></label>
                                                        <textarea name="descriptions[]" class="form-control" placeholder="<?php echo get_phrase('Description'); ?>"><?php echo $motivational_speech['description']; ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Image'); ?></label>
                                                        <div class="custom-file">
                                                            <input name="previous_images[]" type="hidden" value="<?php echo $motivational_speech['image']; ?>">
                                                            <input type="file" class="custom-file-input" name="images[]" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                            <label class="custom-file-label" for="addon_zip"><?php echo get_phrase('Upload image'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($key == 0): ?>
                                                    <div class="" style="padding-top: 32px;">
                                                        <button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendMotivational_speech()"> <i class="fa fa-plus"></i> </button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="" style="padding-top: 32px;">
                                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeMotivational_speech(this)"> <i class="fa fa-minus"></i> </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>

                                        <div id="blank_motivational_speech_field">
                                            <div class="d-flex pt-2 border-top">
                                                <div class="flex-grow-1 pr-3">
                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Title'); ?></label>
                                                        <input type="text" class="form-control" name="titles[]" placeholder="<?php echo get_phrase('faq_question'); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Description'); ?></label>
                                                        <textarea name="descriptions[]" class="form-control mt-2" placeholder="<?php echo get_phrase('Description'); ?>"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label><?php echo get_phrase('Image'); ?></label>
                                                        <div class="custom-file">
                                                            <input name="previous_images[]" type="hidden" value="">
                                                            <input type="file" class="custom-file-input" name="images[]" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                            <label class="custom-file-label" for="addon_zip"><?php echo get_phrase('Upload image'); ?></label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="" style="padding-top: 32px;">
                                                    <button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeFaq(this)"> <i class="fa fa-minus"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pt-0 mt-0">
                                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('Save changes'); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4"><?php echo get_phrase('Home page section'); ?> <small>(<?php echo get_phrase('Enable'); ?>/<?php echo get_phrase('Disable'); ?>)</small></h4>
                                <form>
                                    <div class="form-group row">
                                        <label class="col-8" for="upcoming_course_section"><?php echo get_phrase('upcoming_course_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/upcoming_course_section') ?>')" id="upcoming_course_section" data-switch="success" <?php if (get_frontend_settings('upcoming_course_section')) echo 'checked'; ?>>
                                            <label for="upcoming_course_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="top_course_section"><?php echo get_phrase('top_course_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/top_course_section') ?>')" id="top_course_section" data-switch="success" <?php if (get_frontend_settings('top_course_section')) echo 'checked'; ?>>
                                            <label for="top_course_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="latest_course_section"><?php echo get_phrase('latest_course_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/latest_course_section') ?>')" id="latest_course_section" data-switch="success" <?php if (get_frontend_settings('latest_course_section')) echo 'checked'; ?>>
                                            <label for="latest_course_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="top_category_section"><?php echo get_phrase('top_category_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/top_category_section') ?>')" id="top_category_section" data-switch="success" <?php if (get_frontend_settings('top_category_section')) echo 'checked'; ?>>
                                            <label for="top_category_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="top_instructor_section"><?php echo get_phrase('top_instructor_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/top_instructor_section') ?>')" id="top_instructor_section" data-switch="success" <?php if (get_frontend_settings('top_instructor_section')) echo 'checked'; ?>>
                                            <label for="top_instructor_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="faq_section"><?php echo get_phrase('faq_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/faq_section') ?>')" id="faq_section" data-switch="success" <?php if (get_frontend_settings('faq_section')) echo 'checked'; ?>>
                                            <label for="faq_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="motivational_speech_section"><?php echo get_phrase('motivational_speech_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/motivational_speech_section') ?>')" id="motivational_speech_section" data-switch="success" <?php if (get_frontend_settings('motivational_speech_section')) echo 'checked'; ?>>
                                            <label for="motivational_speech_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="blog_visibility_on_the_home_page"><?php echo get_phrase('blog_visibility_on_the_home_page'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/blog_visibility_on_the_home_page') ?>')" id="blog_visibility_on_the_home_page" data-switch="success" <?php if (get_frontend_settings('blog_visibility_on_the_home_page')) echo 'checked'; ?>>
                                            <label for="blog_visibility_on_the_home_page" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="promotional_section"><?php echo get_phrase('promotional_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/promotional_section') ?>')" id="promotional_section" data-switch="success" <?php if (get_frontend_settings('promotional_section')) echo 'checked'; ?>>
                                            <label for="promotional_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-8" for="review_section"><?php echo get_phrase('review_section'); ?></label>
                                        <div class="col-4">
                                            <input type="checkbox" onchange="actionTo('<?php echo site_url('admin/frontend_settings/home_page_settings/review_section') ?>')" id="review_section" data-switch="success" <?php if (get_frontend_settings('review_section')) echo 'checked'; ?>>
                                            <label for="review_section" data-on-label="On" data-off-label="Off"></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        <?php if (isset($_GET['tab'])): ?>
            $('a[href="#<?php echo $_GET['tab'] ?>"]').trigger('click');
        <?php endif; ?>
    });
</script>