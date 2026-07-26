<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-play-protected-content title_icon"></i> <?php echo get_phrase('seo_settings'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
 
<div class="row">
	<div class="col-lg-12">
        <div class="card">
			<div class="card-body">
                <div class="course-playing-sidebar">
                    <h4 class="title"><?php echo get_phrase('Seo Content'); ?></h4>
                    <div class="accordion custom-accordion" id="accordionContent">
                        <?php foreach($seo_meta_tags as $seo_meta_tag): ?>
                            <?php 
                            // Check if the current tag is an addon and if the corresponding addon is enabled
                            if ($seo_meta_tag['is_addon'] == 1) {
                                if (
                                    ($seo_meta_tag['route'] == 'course_bundles' && addon_status('course_bundle')) ||
                                    ($seo_meta_tag['route'] == 'bootcamps' && addon_status('bootcamp')) ||
                                    ($seo_meta_tag['route'] == 'ebook' && addon_status('ebook'))
                                ) {
                                    // Proceed to render this section
                                } else {
                                    // Skip rendering this section
                                    continue;
                                }
                            }
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-<?php echo slugify($seo_meta_tag['route']); ?>">
                                    <button class="accordion-button <?php if($active_tab != slugify($seo_meta_tag['route'])) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo slugify($seo_meta_tag['route']); ?>" aria-expanded="false" aria-controls="collapse-<?php echo slugify($seo_meta_tag['route']); ?>">
                                        <?php echo ucfirst($seo_meta_tag['route']); ?>
                                    </button>
                                </h2>
                                <div id="collapse-<?php echo slugify($seo_meta_tag['route']); ?>" class="accordion-collapse collapse <?php if($active_tab == slugify($seo_meta_tag['route'])) echo 'show'; ?>" aria-labelledby="heading-<?php echo slugify($seo_meta_tag['route']); ?>" data-bs-parent="#accordionContent">
                                    <div class="accordion-body">
                                        <div class="w-100">
                                            <form class="required-form" action="<?php echo site_url('admin/seo_settings/update/'.$seo_meta_tag['route']); ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="meta_title"><?php echo get_phrase('Meta Title'); ?></label>
                                                    <input class="form-control" id="meta_title" name="meta_title" type="text" value="<?php echo $seo_meta_tag['meta_title']; ?>" placeholder="Meta Title" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_keywords"><?php echo get_phrase('Meta Keywords'); ?></label>
                                                    <input type="text" name="meta_keywords" value="<?php echo $seo_meta_tag['meta_keywords']; ?>" class="form-control bootstrap-tag-input" id="meta_keywords" data-role="tagsinput" style="width: 100%;" value="" />
                                                    <small class="form-label ol-form-label text-muted"><?php echo get_phrase('Writing your keyword and hit the enter'); ?></small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_description"><?php echo get_phrase('Meta Description'); ?></label>
                                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" rows="3"><?php echo $seo_meta_tag['meta_description']; ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_robot"><?php echo get_phrase('Meta Robot'); ?></label>
                                                    <input class="form-control" id="meta_robot" name="meta_robot" type="text" value="<?php echo $seo_meta_tag['meta_robot']; ?>" placeholder="Meta Robot" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="canonical_url"><?php echo get_phrase('Canonical Url'); ?></label>
                                                    <input type="text" class="form-control" id="canonical_url" name="canonical_url" placeholder="https://example.com/courses" value="<?php echo $seo_meta_tag['canonical_url']; ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="custom_url"><?php echo get_phrase('Custom Url'); ?></label>
                                                    <input type="text" class="form-control" id="custom_url" name="custom_url" placeholder="https://example.com/dresses/courses" value="<?php echo $seo_meta_tag['custom_url']; ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="og_title"><?php echo get_phrase('Og Title'); ?></label>
                                                    <input type="text" class="form-control" id="og_title" name="og_title" value="<?php echo $seo_meta_tag['og_title']; ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="og_description"><?php echo get_phrase('Og Description'); ?></label>
                                                    <textarea class="form-control" id="og_description" name="og_description"><?php echo $seo_meta_tag['og_description']; ?></textarea>
                                                </div>

                                                <?php $og_image = 'uploads/seo-og-images/'.$seo_meta_tag['og_image']; ?>
                                                <?php
                                                    if(file_exists($og_image) && is_file($og_image)):
                                                        $og_image = base_url($og_image);
                                                    else:
                                                        $og_image = base_url('uploads/seo-og-images/placeholder.png');
                                                    endif;
                                                ?>

                                                <div class="form-group">
                                                    <label for="og_image"><?php echo get_phrase('Og Image'); ?></label>
                                                    <div class="og_image mb-2">
                                                        <img width="150px" src="<?php echo $og_image; ?>" alt="....">
                                                    </div>
                                                    <input type="file" class="form-control" id="og_image" name="og_image" />
                                                    <input type="hidden" name="old_og_image" value="<?php echo $seo_meta_tag['og_image']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="json_ld"><?php echo get_phrase('Json Id'); ?></label>
                                                    <textarea class="form-control" id="json_ld" name="json_ld" rows="5"><?php echo $seo_meta_tag['json_ld']; ?></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary"><?php echo get_phrase('Update'); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>