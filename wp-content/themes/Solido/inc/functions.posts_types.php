<?php
/* POSTS TYPES DEFINITION */


add_action('init', 'jellythemes_section');
add_action('init', 'jellythemes_parallax');
add_action('init', 'jellythemes_testimonials');
add_action('init', 'jellythemes_works');
add_action('init', 'jellythemes_services');
add_action('init', 'jellythemes_team_members');

function jellythemes_section()  {
  $labels = array(
    'name' => __('Sections', 'framework'),
    'singular_name' => __('Sections', 'framework'),
    'add_new' => __('Add New Section', 'framework'),
    'add_new_item' => __('Add New Section', 'framework'),
    'edit_item' => __('Edit section', 'framework'),
    'new_item' => __('New section', 'framework'),
    'view_item' => __('View section', 'framework'),
    'search_items' => __('Search sections', 'framework'),
    'not_found' =>  __('No sections found', 'framework'),
    'not_found_in_trash' => __('No sections found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => true,
    'hierarchical' => true,
	'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title','editor', 'page-attributes')
  );
  register_post_type('page-sections',$args);
}

function jellythemes_parallax()  {
  $labels = array(
    'name' => __('Parallax Sections', 'framework'),
    'singular_name' => __('Parallax Sections', 'framework'),
    'add_new' => __('Add New Parallax', 'framework'),
    'add_new_item' => __('Add New Parallax', 'framework'),
    'edit_item' => __('Edit parallax', 'framework'),
    'new_item' => __('New parallax', 'framework'),
    'view_item' => __('View parallax', 'framework'),
    'search_items' => __('Search parallax', 'framework'),
    'not_found' =>  __('No parallax found', 'framework'),
    'not_found_in_trash' => __('No parallax found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('parallax-sections',$args);
}

function jellythemes_testimonials()  {
  $labels = array(
    'name' => __('Testimonials', 'framework'),
    'singular_name' => __('Testimonial', 'framework'),
    'add_new' => __('Add Testimonial', 'framework'),
    'add_new_item' => __('Add Testimonial', 'framework'),
    'edit_item' => __('Edit Testimonial', 'framework'),
    'new_item' => __('New Testimonials', 'framework'),
    'view_item' => __('View Testimonial', 'framework'),
    'search_items' => __('Search Testimonials', 'framework'),
    'not_found' =>  __('No Testimonials found', 'framework'),
    'not_found_in_trash' => __('No Testimonials found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('testimonials',$args);
}

function jellythemes_team_members()  {
  $labels = array(
    'name' => __('Team', 'framework'),
    'singular_name' => __('Team', 'framework'),
    'add_new' => __('Add Member', 'framework'),
    'add_new_item' => __('Add Member', 'framework'),
    'edit_item' => __('Edit Member', 'framework'),
    'new_item' => __('New Member', 'framework'),
    'view_item' => __('View Member', 'framework'),
    'search_items' => __('Search Member', 'framework'),
    'not_found' =>  __('No Members found', 'framework'),
    'not_found_in_trash' => __('No Members found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'show_in_nav_menus' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('team_members',$args);
}

function jellythemes_services()  {
  $labels = array(
    'name' => __('Services', 'framework'),
    'singular_name' => __('Service', 'framework'),
    'add_new' => __('Add Service', 'framework'),
    'add_new_item' => __('Add Service', 'framework'),
    'edit_item' => __('Edit Service', 'framework'),
    'new_item' => __('New Service', 'framework'),
    'view_item' => __('View Service', 'framework'),
    'search_items' => __('Search Service', 'framework'),
    'not_found' =>  __('No Services found', 'framework'),
    'not_found_in_trash' => __('No Services found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'show_in_nav_menus' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('services',$args);
}

function jellythemes_works()  {
  $labels = array(
    'name' => __('Works', 'framework'),
    'singular_name' => __('Work', 'framework'),
    'add_new' => __('Add Work', 'framework'),
    'add_new_item' => __('Add Work', 'framework'),
    'edit_item' => __('Edit Work', 'framework'),
    'new_item' => __('New Work', 'framework'),
    'view_item' => __('View Works', 'framework'),
    'search_items' => __('Search Works', 'framework'),
    'not_found' =>  __('No Works found', 'framework'),
    'not_found_in_trash' => __('No Works found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'work' ),
    'taxonomies' => array('type'),
    'supports' => array('title','thumbnail')
  );
  register_post_type('works',$args);
}

function work_type() {
    register_taxonomy("type",
    array("work"),
    array(
        "hierarchical" => true,
        "label" => __( "Type", 'framework'),
        "singular_label" => __( "Type", 'framework'),
        "rewrite" => array( 'slug' => 'type', 'hierarchical' => true),
        'show_in_nav_menus' => false,
        )
    );
}

add_action( 'init', 'Work_type', 0);

?>
