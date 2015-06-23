<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_jellythemes_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
        'id'         => 'section_attributes',
        'title'      =>  __('Section attributes', 'jellythemes'),
        'pages'      => array( 'page-sections', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
        	array(
                'name' =>  __('Color scheme', 'jellythemes'),
                'id' => $prefix . 'section_color',
                'type' => 'select',
                'options' => array(
                    'dark' => 'Dark',
                    'light' => 'Light'
                   	)
            ),
            array(
                'name' => __( 'Attach parallax section', 'jellythemes' ),
                'id' => $prefix . 'section_parallax',
                'type' => 'post',
                'post_type' => 'parallax-sections',
                'field_type' => 'select',
                'std' =>  __('Select parallax section', 'jellythemes'),
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => '-1',
                    )
                )
        ),
    );
	$meta_boxes[] = array(
		        'id'         => 'parallax_attributes',
		        'title'      =>  __('Parallax attributes', 'jellythemes'),
		        'pages'      => array( 'parallax-sections', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Parallax background image', 'jellythemes'),
		                'id'   => $prefix . 'parallax_bg',
		                'type' => 'image_advanced',
		        	),
		        	array(
		                'name' => __('Parallax first image', 'jellythemes'),
		                'id'   => $prefix . 'parallax_first_img',
		                'type' => 'image_advanced',
		        	),
		        	array(
		                'name' => __('Parallax second image', 'jellythemes'),
		                'id'   => $prefix . 'parallax_second_img',
		                'type' => 'image_advanced',
		        	),
		        	array(
		                'name' =>  __('Parallax title #1','jellythemes' ),
		                'id'   => $prefix . 'parallax_title_1',
		                'type' => 'text',
		            ),
		            array(
		                'name' =>  __('Parallax title #2', 'jellythemes'),
		                'id'   => $prefix . 'parallax_title_2',
		                'type' => 'text',
		            ),
		            array(
		                'name' =>  __('Parallax Video ID (youtube)', 'jellythemes'),
		                'id'   => $prefix . 'parallax_video',
		                'type' => 'text',
		                'desc' => __('Enter the video ID, for example: for URL http://youtube.com/?v=tDvBwPzJ7dY the ID is: tDvBwPzJ7dY', 'jellythemes')
		            ),
		            array(
		                'name' =>  __('Parallax Height', 'jellythemes'),
		                'id'   => $prefix . 'parallax_height',
		                'type' => 'number',
		                'desc' => __('Parallax height in pixels, only numbers.', 'jellythemes')
		            )
		        ),
		    );
	$meta_boxes[] = array(
		        'id'         => 'slide_attributes',
		        'title'      =>  __('Slider options', 'jellythemes'),
		        'pages'      => array( 'page', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Slider images', 'jellythemes'),
		                'id'   => $prefix . 'slider_images',
		                'type' => 'image_advanced',
		                'desc' => __('First image is used to video background alternative and pattern background', 'jellythemes')
		        	),
		        	array(
		                'name' => __('Slider title', 'jellythemes'),
		                'id'   => $prefix . 'slider_title',
		                'type' => 'text',
		        	),
		        	array(
		                'name' => __('Slider text (multiple)', 'jellythemes'),
		                'id'   => $prefix . 'slider_text',
		                'type' => 'text',
		                'clone' => true
		        	),
		        	array(
		                'name' => __('Slider button text', 'jellythemes'),
		                'id'   => $prefix . 'slider_button_text',
		                'type' => 'text',
		        	),
		        	array(
		                'name' => __('Slider button link (URL)', 'jellythemes'),
		                'id'   => $prefix . 'slider_button_link',
		                'type' => 'text',
		        	),
		        	array(
		                'name' =>  __('Slider content', 'jellythemes'),
		                'id'   => $prefix . 'slider_content',
		                'type' => 'text',
		            ),
		        	array(
		                'name' => __('Video background', 'jellythemes'),
		                'id'   => $prefix . 'slider_video',
		                'type' => 'oembed',
		                'desc' => __('Video background for home slider', 'jellythemes')
		        	)
		        ),
		    );
	$meta_boxes[] = array(
		        'id'         => 'team_attributes',
		        'title'      =>  __('Member info', 'jellythemes'),
		        'pages'      => array( 'team_members', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Member photo', 'jellythemes'),
		                'id'   => $prefix . 'member_photo',
		                'type' => 'image_advanced',
		        	),
		        	array(
		                'name' =>  __('Member name', 'jellythemes'),
		                'id'   => $prefix . 'member_name',
		                'type' => 'text',
		                'std' => 'John Doe'
		            ),
		        	array(
		                'name' =>  __('Member position', 'jellythemes'),
		                'id'   => $prefix . 'member_position',
		                'type' => 'text',
		                'std' => 'CEO'
		            ),
		            array(
		                'name' =>  __('Member e-mail','jellythemes'),
		                'id'   => $prefix . 'member_email',
		                'type' => 'text',
		                'std' => 'member@company.com'
		            ),
		            array(
		                'name' =>  __('Member facebook URL','jellythemes'),
		                'id'   => $prefix . 'member_facebook',
		                'type' => 'text',
		                'std' => '#'
		            ),
		            array(
		                'name' =>  __('Member twitter URL','jellythemes'),
		                'id'   => $prefix . 'member_twitter',
		                'type' => 'text',
		                'std' => '#'
		            ),
		            array(
		                'name' =>  __('Member tumblr URL','jellythemes'),
		                'id'   => $prefix . 'member_tumblr',
		                'type' => 'text',
		                'std' => '#'
		            )
		        ),
		    );
	$meta_boxes[] = array(
		        'id'         => 'testimonials_attributes',
		        'title'      =>  __('Testimonial info', 'jellythemes'),
		        'pages'      => array( 'testimonials', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Author avatar', 'jellythemes'),
		                'id'   => $prefix . 'author_avatar',
		                'type' => 'image_advanced',
		        	),
		        	array(
		                'name' =>  __('Author position', 'jellythemes'),
		                'id'   => $prefix . 'author_position',
		                'type' => 'text',
		                'std' => 'CEO'
		            ),
		            array(
		                'name' =>  __('Author name','jellythemes'),
		                'id'   => $prefix . 'author_name',
		                'type' => 'text',
		                'std' => 'John Smith'
		            ),
		            array(
		                'name' =>  __('Testimonial','jellythemes'),
		                'id'   => $prefix . 'testimonial',
		                'type' => 'wysiwyg',
		                'std' => '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."'
		            )
		        ),
		    );
	$meta_boxes[] = array(
		        'id'         => 'services_attributes',
		        'title'      =>  __('Service info', 'jellythemes'),
		        'pages'      => array( 'services', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Service icon', 'jellythemes'),
		                'id'   => $prefix . 'service_icon',
		                'type' => 'image_advanced',
		                'desc' => __('Icon image: Better use a 110x110px transparent PNG','jellythemes')
		        	),
		        	array(
		                'name' =>  __('Characteristics', 'jellythemes'),
		                'id'   => $prefix . 'service_item',
		                'type' => 'text',
		                'clone' => true,
		                'std' => __('Social strategy and planing', 'jellythemes'),
		                'desc' => __('You can add more than one service characteristics','jellythemes')
		            )
		        ),
		    );
	$meta_boxes[] = array(
	        'id'         => 'project_info',
	        'title'      =>  __('Project information', 'jellythemes'),
	        'pages'      => array( 'works', ), // Post type
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields'     => array(
	            array(
	                'name' => __('Project images', 'jellythemes'),
	                'desc' =>  __('Upload multiple images', 'jellythemes'),
	                'id'   => $prefix . 'project_images',
	                'type' => 'plupload_image',
	                'max_file_uploads' => 10
	            ),
	            array(
	                'name' =>  __('Project video', 'jellythemes'),
	                'id'   => $prefix . 'project_video',
	                'type' => 'oembed',
	            ),
	            array(
	                'name' =>  __('Project description', 'jellythemes'),
	                'id'   => $prefix . 'project_description',
	                'type' => 'wysiwyg',
	            ),
	            array(
	                'name' =>  __('Project URL', 'jellythemes'),
	                'id'   => $prefix . 'project_url',
	                'type' => 'url',
	            ),
	            array(
	                'name' =>  __('Project subtitle', 'jellythemes'),
	                'id'   => $prefix . 'project_subtitle',
	                'type' => 'text',
	            ),
	            array(
	                'name' =>  __('Featured project', 'jellythemes'),
	                'desc' =>  __('Show in featured projects block', 'jellythemes'),
	                'id' => $prefix . 'project_featured',
	                'type' => 'checkbox',
	            ),
	            array(
	                'name' =>  __('Project featured title', 'jellythemes'),
	                'id'   => $prefix . 'work_featured_title',
	                'type' => 'text',
	            ),
	            array(
	                'name' =>  __('Project featured type', 'jellythemes'),
	                'id'   => $prefix . 'work_featured_type',
	                'type' => 'text',
	            ),
	            array(
	                'name' =>  __('Exclude portfolio', 'jellythemes'),
	                'desc' =>  __('Exclude from the list of works', 'jellythemes'),
	                'id' => $prefix . 'project_exclude',
	                'type' => 'checkbox',
	            ),

	        ),
	    );

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function dynamo_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'dynamo_register_meta_boxes' );
