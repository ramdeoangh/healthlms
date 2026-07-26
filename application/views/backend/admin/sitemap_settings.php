<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-play-protected-content title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo base_url('sitemap.xml'); ?>" target="_blank" class="btn btn-outline-primary btn-rounded alignToTitle"><?php echo get_phrase('view_sitemap_xml'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="course-playing-sidebar">
                        <h4 class="title"><?php echo get_phrase('Static routes'); ?></h4>

                        <?php
                        if (!empty($sitemap['value'])) {
                            // Decode the JSON data
                            $routes = json_decode($sitemap['value'], true); // Use 'true' to get an associative array

                            if (is_array($routes)) {
                                $key = 0;

                                foreach ($routes as $url) {
                                    echo '<div class="mb-2"><a href="' . base_url(htmlspecialchars($url)) . '" target="_blank">' . (++$key) . '. ' . base_url(htmlspecialchars($url)) . '</a></div>';
                                }
                            } else {
                                echo '<div class="mb-2">Invalid JSON data.</div>';
                            }
                        } else {
                            echo '<div class="mb-2">No data available in sitemap.</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="course-playing-sidebar">
                        <h4 class="title"><?php echo get_phrase('Dynamic routes'); ?></h4>
                        <br>
                        <?php 
                        $key = 0;

                        foreach ($courses as $url) {
                            echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                        }

                        foreach ($categories as $url) {
                            echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                        }

                        foreach ($blogs as $url) {
                            echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                        }

                        foreach ($blog_categories as $url) {
                            echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                        }
                        ?>
                        <?php if (addon_status('ebook')) :

                            $ebooks = $this->db->get('ebook', array('is_active', 1))->result_array();
                            // Construct URLs for each course
                            $ebook_url_array = array();

                            foreach ($ebooks as $ebook) {
                                $slug = slugify($ebook['title']);
                                $ebook_id = $ebook['ebook_id'];
                                $url = base_url("ebook/ebook_details/$slug/$ebook_id");
                                $ebook_url_array[] = $url;
                            }

                            foreach ($ebook_url_array as $url) {
                                echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                            }
                        endif; ?>
                        <?php if (addon_status('course_bundle')) : 
                            $course_bundles = $this->db->get('course_bundle', array('status', 1))->result_array();
                            // Construct URLs for each course
                            $course_bundle_url_array = array();

                            foreach ($course_bundles as $bundle) {
                                $slug = slugify($bundle['title']);
                                $bundle_id = $bundle['id'];
                                $url = base_url("bundle_details/$bundle_id/$slug");
                                $course_bundle_url_array[] = $url;
                            }

                            foreach ($course_bundle_url_array as $url) {
                                echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                            }
                        endif; ?>
                        <?php if (addon_status('bootcamp')) :
                            $bootcamps = $this->db->get('bootcamp')->result_array();
                            // Construct URLs for each course
                            $bootcamp_url_array = array();

                            foreach ($bootcamps as $bootcamp) {
                                $bootcamp_id = $bootcamp['id'];
                                $url = base_url("addons/bootcamp/details/$bootcamp_id");
                                $bootcamp_url_array[] = $url;
                            }

                            foreach ($bootcamp_url_array as $url) {
                                echo '<div class="mb-2"><a href="' . htmlspecialchars($url) . '" target="_blank">' . (++$key) . '. ' . htmlspecialchars($url) . '</a></div>';
                            }
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>