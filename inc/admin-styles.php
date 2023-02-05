<?php 

// Update CSS within in Admin
function yco_admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/yco-admin.css');
    //wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/yco-admin.min.css');
  }
  add_action('admin_enqueue_scripts', 'yco_admin_style');
