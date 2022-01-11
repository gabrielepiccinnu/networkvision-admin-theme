<?php

/*
* Plugin Name: Network Vision Admin Theme
* Plugin URI: http://www.networkvision.it/
* Description: A clean, simplified WordPress Admin theme
* Author: Gabriele Piccinnu
* Version: 1.0
* Author URI: http://gabrielepiccinnu.it/
* Git URI: https://github.com/gabrielepiccinnu/networkvision-admin-theme
* GitHub Plugin URI: https://github.com/gabrielepiccinnu/networkvision-admin-theme
* GitHub Branch: main
* 
*/

// exit if accessed directly
if (!defined('ABSPATH'))
  exit;


function networkvision_files()
{
  wp_enqueue_style('networkvision-admin-theme', plugins_url('css/networkvision.css', __FILE__), array(), '1.1.8');
  wp_enqueue_script('networkvision', plugins_url("js/networkvision.js", __FILE__), array('jquery'), '1.1.8');
}
add_action('admin_enqueue_scripts', 'networkvision_files');
add_action('login_enqueue_scripts', 'networkvision_files');

function networkvision_add_editor_styles()
{
  add_editor_style(plugins_url('css/editor-style.css', __FILE__));
}
add_action('after_setup_theme', 'networkvision_add_editor_styles');

add_filter('admin_footer_text', 'networkvision_admin_footer_text_output');
function networkvision_admin_footer_text_output($text)
{
  $text = 'Network Vision.it | <a href="https://www.networkvision.it/">www.networkvision.it</a> | <a href="mailto:info@networkvision.it">info@networkvision.it</a>';
  return $text;
}

add_action('admin_menu', 'register_networkvision_link');

function register_networkvision_link()
{
  add_menu_page('custom menu link', '<span class="networkvision-logo"></span>', 'read', 'credits', 'wpsites_custom_menu_link', '#', 0);
}

function wpsites_custom_menu_link()
{
  wp_redirect('https://www.networkvision.it', 301);
  exit;
}
