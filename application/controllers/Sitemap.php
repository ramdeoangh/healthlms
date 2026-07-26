<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for creating URLs
        date_default_timezone_set(get_settings('timezone'));

        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        //Check custom session data
        $this->user_model->check_session_data();
    }

    public function index()
    {
        $sitemap = get_settings('sitemap_xml');
        $routes = json_decode($sitemap, true);

        // Construct URLs for each blog
        $static_route_url_array = array();
        foreach ($routes as $url) {
            $static_route_url_array[] = base_url(htmlspecialchars($url));
        }

        // Fetching data for blogs, blog categories, courses, and categories
        $blogs = $this->crud_model->get_all_blogs()->result_array();
        $blog_categories = $this->crud_model->get_blog_categories()->result_array();
        $courses = $this->crud_model->get_courses()->result_array();
        $categories = $this->crud_model->get_categories()->result_array();

        // Construct URLs for each blog
        $blog_url_array = array();
        foreach ($blogs as $blog) {
            $slug = slugify($blog['title']);
            $blog_id = $blog['blog_id'];
            $url = base_url("blog/details/$slug/$blog_id");
            $blog_url_array[] = $url;
        }

        // Construct URLs for each blog category
        $blog_category_url_array = array();
        foreach ($blog_categories as $blog_category) {
            $slug = $blog_category['slug'];
            $url = base_url("blogs?category=$slug");
            $blog_category_url_array[] = $url;
        }

        // Construct URLs for each category
        $category_url_array = array();
        foreach ($categories as $category) {
            $slug = $category['slug'];
            $url = base_url("home/courses?category=$slug");
            $category_url_array[] = $url;

            // Retrieve subcategories for the current category using its ID
            $sub_categories = $this->crud_model->get_sub_categories($category['id']);

            foreach ($sub_categories as $sub_category) {
                $sub_slug = $sub_category['slug'];
                $sub_url = base_url("home/courses?category=$sub_slug");
                $category_url_array[] = $sub_url;
            }
        }

        // Construct URLs for each course
        $course_url_array = array();
        foreach ($courses as $course) {
            $slug = slugify($course['title']);
            $course_id = $course['id'];
            $url = base_url("home/course/$slug/$course_id");
            $course_url_array[] = $url;
        }

        $ebook_url_array = array();

        if (addon_status('ebook')) {

            $ebooks = $this->db->get('ebook', array('is_active', 1))->result_array();

            foreach ($ebooks as $ebook) {
                $slug = slugify($ebook['title']);
                $ebook_id = $ebook['ebook_id'];
                $url = base_url("ebook/ebook_details/$slug/$ebook_id");
                $ebook_url_array[] = $url;
            }
        }

        $course_bundle_url_array = array();

        if (addon_status('course_bundle')) {
            $course_bundles = $this->db->get('course_bundle', array('status', 1))->result_array();

            foreach ($course_bundles as $bundle) {
                $slug = slugify($bundle['title']);
                $bundle_id = $bundle['id'];
                $url = base_url("bundle_details/$bundle_id/$slug");
                $course_bundle_url_array[] = $url;
            }
        }

        $bootcamp_url_array = array();
        if (addon_status('bootcamp')) {
            $bootcamps = $this->db->get('bootcamp')->result_array();

            foreach ($bootcamps as $bootcamp) {
                $bootcamp_id = $bootcamp['id'];
                $url = base_url("addons/bootcamp/details/$bootcamp_id");
                $bootcamp_url_array[] = $url;
            }
        }

        // Combine all the URLs
        $all_urls = array_merge(
            $static_route_url_array,
            $blog_url_array,
            $blog_category_url_array,
            $category_url_array,
            $course_url_array,
            $ebook_url_array,
            $course_bundle_url_array,
            $bootcamp_url_array
        );

        // Generate the sitemap XML content
        header("Content-Type: application/xml");

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');

        foreach ($all_urls as $url) {
            $urlNode = $xml->addChild('url');
            $urlNode->addChild('loc', $url);
            $urlNode->addChild('changefreq', 'monthly');
            $urlNode->addChild('priority', '0.8');
        }

        // Output the generated XML
        echo $xml->asXML();
    }
}
