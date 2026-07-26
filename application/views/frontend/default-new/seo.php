<?php 
        $seo = get_seo_data();

        // Default Meta Data
        $meta_title = ucwords($page_title);
        $meta_description = '';
        $meta_keywords = '';
        $meta_robot = 'index, follow';
        $meta_author = get_settings('author') ?? 'Creativeitem';
        $canonical_url = '';
        $og_title = $meta_title;
        $og_description = $meta_description;
        $og_image = base_url('uploads/seo-og-images/placeholder.png'); // Default placeholder image
        $json_ld = '{}';

        if (!empty($seo)) {
            // Populate SEO data if available
            $meta_title = $seo['meta_title'] ?? $meta_title;
            $meta_description = $seo['meta_description'] ?? '';
            $meta_keywords = $seo['meta_keywords'] ?? '';
            $meta_robot = $seo['meta_robot'] ?? 'index, follow';
            $meta_author = $seo['meta_author'] ?? 'Creativeitem';
            $canonical_url = $seo['canonical_url'] ?? '';
            $og_title = $seo['og_title'] ?? $meta_title;
            $og_description = $seo['og_description'] ?? $meta_description;
            $json_ld = $seo['json_ld'] ?? '{}';

            // Handle OG Image
            $og_image_path = 'uploads/seo-og-images/' . $seo['og_image'];
            if (!empty($seo['og_image']) && file_exists($og_image_path) && is_file($og_image_path)) {
                $og_image = base_url($og_image_path);
            }
        } else {
            // Fallback to specific routes
            $CI =& get_instance();
            $route_third_segment = $CI->uri->segment(3);
            $route_second_segment = $CI->uri->segment(2);
            $route_first_segment = $CI->uri->segment(1);

            if ($route_second_segment == 'course' && isset($course_id)) {
                $data = $CI->crud_model->get_course_by_id($course_id)->row_array();
                $meta_title = $data['title'] ?? 'Title';
                $meta_description = $data['meta_description'] ?? '';
                $meta_keywords = $data['meta_keywords'] ?? '';
                $og_title = $meta_title;
                $og_description = $meta_description;
                $og_image = $CI->crud_model->get_course_thumbnail_url($course_id);

            } elseif ($route_second_segment == 'ebook_details' && isset($ebook_id)) {
                $data = $CI->ebook_model->get_ebook_by_id($ebook_id)->row_array();
                $meta_title = $data['meta_title'] ?? $data['title'];
                $meta_description = $data['meta_description'] ?? $data['description'];
                $meta_keywords = $data['meta_keywords'] ?? '';
                $og_title = $data['og_title'] ?? '';
                $og_description = $data['og_description'] ?? '';

                $ebook_thumbnail = 'uploads/ebook/thumbnails/' . $data['thumbnail'];
                $og_image = (!empty($data['thumbnail']) && file_exists($ebook_thumbnail)) 
                            ? base_url($ebook_thumbnail) 
                            : base_url('uploads/ebook/thumbnails/placeholder.png');

                $json_ld = $data['json_ld'] ?? '{}';

            } elseif ($route_second_segment == 'details' && isset($blog_id)) {
                $data = $CI->crud_model->get_all_blogs($blog_id)->row_array();
                $meta_title = $data['title'] ?? 'Title';
                $meta_description = $data['description'] ?? '';
                $meta_keywords = $data['keywords'] ?? '';
                $og_title = $meta_title;
                $og_description = $meta_description;

                $blog_banner = 'uploads/blog/banner/' . $data['banner'];
                $og_image = (!empty($data['banner']) && file_exists($blog_banner)) 
                            ? base_url($blog_banner) 
                            : base_url('uploads/blog/banner/placeholder.png');

            } elseif ($route_first_segment == 'bundle_details' && isset($bundle_details)) {
                $data = $bundle_details;
                
                $meta_title = $data['title'] ?? 'Title';
                $meta_description = $data['bundle_details'] ?? '';
                $og_title = $meta_title;
                $og_description = $meta_description;

                $bundle_banner = 'uploads/course_bundle/banner/' . $data['banner'];
                $og_image = (!empty($data['banner']) && file_exists($bundle_banner)) 
                            ? base_url($bundle_banner) 
                            : base_url('uploads/course_bundle/banner/thumbnail.png');
            } elseif ($route_second_segment == 'bootcamp' && $route_third_segment == 'details' && isset($bootcamp_details)) {
                $data = $bootcamp_details;
                
                $meta_title = $data['meta_title'] ?? $data['title'];
                $meta_description = $data['meta_description'] ?? $data['description'];
                $meta_keywords = $data['meta_keywords'] ?? '';
                $og_title = $data['og_title'] ?? '';
                $og_description = $data['og_description'] ?? '';

                $bootcamp_thumbnail = 'uploads/bootcamp/bootcamp_thumbnail/' . $data['bootcamp_thumbnail'];
                $og_image = (!empty($data['bootcamp_thumbnail']) && file_exists($bootcamp_thumbnail)) 
                            ? base_url($bootcamp_thumbnail) 
                            : base_url('uploads/bootcamp/bootcamp_thumbnail/placeholder.png');

                $json_ld = $data['json_ld'] ?? '{}';
                
            } elseif ($route_second_segment == 'team_training' && $route_third_segment == 'package_details' && isset($package)) {
                $data = $package;
                
                $meta_title = $data['title'] ?? 'Title';
                $meta_description = $data['meta_description'] ?? '';
                $meta_keywords = $data['meta_keywords'] ?? '';
                $og_title = $meta_title;
                $og_description = $meta_description;

                $package_thumbnail = 'uploads/team_training/thumbnail/' . $data['thumbnail'];
                $og_image = (!empty($data['thumbnail']) && file_exists($package_thumbnail)) 
                            ? base_url($package_thumbnail) 
                            : base_url('uploads/seo-og-images/placeholder.png');
            } else {

                $meta_title = $page_title;
                $meta_description = get_settings('website_description');
                $meta_keywords = get_settings('website_keywords');
                $og_title = $page_title;
                $og_description = $meta_description;
                $og_image = base_url("uploads/system/".get_current_banner('banner_image'));
            }
        }
    ?>

    <!-- Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="<?php echo $meta_robot; ?>">
    <meta name="author" content="<?php echo htmlspecialchars($meta_author, ENT_QUOTES, 'UTF-8'); ?>">
    <title><?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8') . ' | ' . get_settings('system_name'); ?></title>

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($og_title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($og_description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo current_url(); ?>">

    <!-- JSON-LD (Schema Markup) -->
    <script type="application/ld+json">
        <?php echo $json_ld; ?>
    </script>
