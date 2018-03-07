<?php
    /*
    Plugin Name: Piston Kafalar Kit
    Plugin URI: http://www.atabilisim.pro
    Description: This a plugin that contains snippets used by piston kafalar website by Ata Bilisim Agency
    Author: Marshall Fungai
    Version: 3.2.0
    Author URI: http://digitalartists.biz
    Domain: piston_plugins
    */
    

    define('PLUGIN_PATH', plugin_dir_path(__FILE__) );

    // require_once(PLUGIN_PATH . 'incl/enqueue.php');
    require_once(PLUGIN_PATH . 'incl/car_list_widget.php');


    //Enqueue Files
    function piston_plugin_js_scripts() {

        wp_enqueue_style('bootstrap_css_4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
        wp_enqueue_script('piston_plugin_fetch_js', plugin_dir_url(__FILE__).'js/fetch.js', array('jquery') ,'1.0.56', true);
        
    }
    
    add_action('wp_enqueue_scripts', 'piston_plugin_js_scripts');

   