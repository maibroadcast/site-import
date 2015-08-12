<?php
    /**
    * Plugin Name: Site Import
    * Plugin URI: http://zefirstudio.pl/wp-site-import/
    * Description: Import posts/items directly from other websites.
    * Version: 1.0.0
    * Author: Zefir Studio
    * Author URI: http://www.zefirstudio.pl/
    * License: GPL2
    */

    defined('ABSPATH') or die('No script kiddies please!');

    add_action('admin_init', 'si_init');
    add_action('admin_menu', 'si_menu');

    function si_init() {
        wp_register_style('si_styles', plugins_url('css/styles.css', __FILE__));
        wp_register_script('si_scripts', plugins_url('js/scripts.js', __FILE__));
        wp_enqueue_style('si_styles');
        wp_enqueue_script('si_scripts');
    }

    function si_menu() {
        add_menu_page('Site Import', 'Site Import', 'activate_plugins', 'site_import', 'si_options');
    }

    function si_options(){
        if(!current_user_can('manage_options'))wp_die(__('You do not have sufficient permissions to access this page.'));
        include 'admin/admin.php';
    }

?>