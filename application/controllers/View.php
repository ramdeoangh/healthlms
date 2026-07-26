<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set(get_settings('timezone'));

        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        // $this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    function load($path = '')
    {
        $path = str_replace('.', '/', $path);
        $this->load->view($path, $_GET);
    }
}
