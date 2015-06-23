<?php
	//[jellythemes_works] display latest works width filter menu
		add_shortcode( 'jellythemes_works', 'jellythemes_works_list' );
		function jellythemes_works_list($atts, $content=null) {
		    extract( shortcode_atts( array(
		        'limit' => 8,
		        ), $atts ) );

		    $return  = '
		        <div id="portfolio" class="container">
	                <div class="section portfoliocontent">
	                    <section id="options" class="clear">
	                        <div id="filters" class="option-set clearfix foliomenu hideme dontHide" data-option-key="filter">
	                          <a href="#filter" data-option-value="*" class="p-selected folio-btn"><div class="portfolio-btn">'. __('All', 'jellythemes') .'</div></a>';

		    $types = get_terms('type', array('hide_empty'=>0));

		    if ( $types && ! is_wp_error( $types ) ) :
		        foreach ( $types as $type ) {
		            $return .= '<a href="#filter" data-option-value=".'. $type->slug  . '" class="folio-btn"><div class="portfolio-btn">' . $type->name . '</div></a>';
		        }
		    endif;
		    $return .= '</div>
		            </section>
		            <div class="clear"></div>
	                    <div id="project-show"></div>
	                    <section class="project-window">
	                        <div class="project-content"></div><!-- AJAX Dinamic Content -->
	                    </section>
	                    <section id="i-portfolio" class="clear">
	                    	<div class="inici"></div>
	';
		                $projects = new WP_Query(array('meta_key' => '_jellythemes_project_exclude', 'meta_value' => '0', 'post_type'=>'works', 'posts_per_page' => esc_attr($limit)));
		                while ($projects->have_posts()) : $projects->the_post();
		                    $term_list = wp_get_post_terms(get_the_ID(), 'type', array("fields" => "names"));
		                    $return .= '<div class="ch-grid ' . implode(' ', get_post_class('element')) . '" id="' . get_permalink() .'">' .  wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'project_thumb', false, array('class' => 'ch-item')).'
				                            <div>
				                            	<span><span class="p-category"></span>' . get_the_title() . '<span class="cat2">' . $term_list[0] . '</span></span>
				                            </div>
				                        </div>';
		                endwhile;
		    $return .=   '<div class="final"></div>
	                    </section>
	                </div>
	            </div>
	            <div class="clear"></div>';


		    return $return;

		}

	// Titles shortcode
	function jellythemes_title( $atts, $content = null ) {
	   return '<header class="title one">' . $content . '</header>';
	}
	add_shortcode( 'jellythemes_title', 'jellythemes_title' );
	function jellythemes_secondary_title( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'pretitle' => ''
		), $atts ) );
	   	return '<header class="title-one">' . $pretitle . '</header><div class="title-two">' . $content . '</div>';
	}
	add_shortcode( 'jellythemes_secondary_title', 'jellythemes_secondary_title' );
	function jellythemes_separator() {
	   return '<div class="spacer"></div>';
	}
	add_shortcode( 'jellythemes_separator', 'jellythemes_separator' );

	//[jellythemes_featured] displays featureds works carousel
	function jellythemes_featured($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => 5,
	        'portfolio_link' => '#'
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<section class="featured-slider">
		            	<div id="ca-container" class="ca-container">
		                    <div class="nav-featured">
		                        <div class="prev-featured"></div>
		                        <a href="' . esc_attr($portfolio_link) . '"><div class="btn-featured">go portfolio</div></a>
		                        <div class="next-featured"></div>
		                    </div>
		                    <div class="main-carousel hideme dontHide">
		                        <div class="ca-wrapper">';
		$projects = new WP_Query(array('meta_key' => '_jellythemes_project_featured', 'meta_value' => '1', 'post_type'=>'works', 'posts_per_page' => esc_attr($limit)));
        while ($projects->have_posts()) : $projects->the_post();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'project_featured');
            $images = rwmb_meta( '_jellythemes_project_images', 'type=plupload_image', get_the_ID() );
            foreach($images as $img) :
            	$large = wp_get_attachment_image_src( $img['ID'], 'full');
            	break;
            endforeach;
            $return .= '<div class="ca-item ca-item-5">
                        <div class="f-single">';
            $video = get_post_meta( $post->ID, '_jellythemes_project_video', true );
            if (empty($video)) :
            	$return .=      '<a href="' . $large[0] . '">';
        	else :
        		$return .=      '<a href="' . $video . '" class="mfp-iframe">';
        	endif;
            $return .=      '<div class="f-image">
                                    <img src="' .  $image[0] .'" />
                                    <div class="image-hover-overlay"></div>
                                    <span class="f-category"></span>
                                    <div class="portfolio-meta">
                                        <div>' . get_post_meta( $post->ID, '_jellythemes_work_featured_title', true ). '</div>
                                        <div class="clear"></div>
                                        <div>' . get_post_meta( $post->ID, '_jellythemes_work_featured_type', true ). '</div>
                                    </div>
                                </div>
                                <div class="f-info">' . get_the_title() . '</div>
                            </a>
                        </div>
                    </div>';
        endwhile;
        $post=$back; //restore post object
        $return .= '</div></div></div></section>';
	    return $return;
	}
	add_shortcode( 'jellythemes_featured', 'jellythemes_featured' );

	function jellythemes_content( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'class' => 'title two'
		), $atts ) );
	   return '<div class="' . esc_attr($class) . '">' . $content . '</div>';
	}
	add_shortcode( 'jellythemes_content', 'jellythemes_content' );

	function jellythemes_images_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'images' => array()
		), $atts ) );
		$return = '';
		$images_ids = explode(',',$images);
		$return = '<div class="show hideme dontHide">
                        <div class="caroussel">
                            <div class="caroussel-list">';
        foreach ($images_ids as $id) {
        	$return .=  '<div class="car-img">' . wp_get_attachment_image($id, 'project_thumb')  .  '</div>';
        }
        $return .= '</div>
                </div>
                <div class="car-prev"></div>
                <div class="car-next"></div>
            </div>
            <div class="controller">
            	<ul>
                </ul>
            </div>';
        return $return;
	}
	add_shortcode( 'jellythemes_images_carousel', 'jellythemes_images_carousel' );

	//[jellythemes_team] displays featureds works carousel
	function jellythemes_team($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => 5
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<section class="team-box">
	                <div class="s-container clearfix team-grid">
	                    <div class="t-list">';
		$membmers = new WP_Query(array('post_type'=>'team_members', 'posts_per_page' => esc_attr($limit)));
        while ($membmers->have_posts()) : $membmers->the_post();
            $image = get_post_meta( $post->ID, '_jellythemes_member_photo', true );
            $return .= '<div class="t-element hideme dontHide">
	                        	<div class="t-photo">
	                                <div class="image-hover-overlay"></div>
	                                <a class="f-category" href="#"></a>
	                                <a href="mailto:' . get_post_meta( $post->ID, '_jellythemes_member_email', true ). '"><div class="portfolio-meta">
	                                    <div>' . get_post_meta( $post->ID, '_jellythemes_member_email', true ). '</div>
	                                </div></a>' .
	                                wp_get_attachment_image($image, 'member_photo') .'
	                            </div>
	                            <div class="t-data">
	                            	<div class="t-name">' . get_post_meta( $post->ID, '_jellythemes_member_name', true ). '</div>
	                                <div class="t-info">' . get_post_meta( $post->ID, '_jellythemes_member_position', true ). '</div>
	                                <div class="t-spacer"></div>
	                                <div class="t-social">
	                                	<div class="in-social">';
	                                        $return .= !get_post_meta( $post->ID, '_jellythemes_member_facebook', true ) ? '' : '<a href="' . get_post_meta( $post->ID, '_jellythemes_member_facebook', true ). '"><div class="ts facebook"></div></a>';
	                                        $return .= !get_post_meta( $post->ID, '_jellythemes_member_twitter', true ) ? '' : '<a href="' . get_post_meta( $post->ID, '_jellythemes_member_twitter', true ). '"><div class="ts twitter"></div></a>';
	                                        $return .= !get_post_meta( $post->ID, '_jellythemes_member_tumblr', true ) ? '' : '<a href="' . get_post_meta( $post->ID, '_jellythemes_member_tumblr', true ). '"><div class="ts tumblr"></div></a>';
	            $return .=  		'</div>
	                                </div>
	                            </div>
	                        </div>';
        endwhile;
        $post=$back; //restore post object
        $return .= '</div>
	                </div></section>';
	    return $return;
	}
	add_shortcode( 'jellythemes_team', 'jellythemes_team' );

	//[jellythemes_services] displays services
	function jellythemes_services_list($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => 5
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<div class="s-container services-container">
                	<section class="services">';
		$services = new WP_Query(array('post_type'=>'services', 'posts_per_page' => esc_attr($limit)));
        while ($services->have_posts()) : $services->the_post();
            $image = get_post_meta( $post->ID, '_jellythemes_service_icon', true );
            $img = wp_get_attachment_image_src($image, 'service_icon');
            $items = get_post_meta( $post->ID, '_jellythemes_service_item', true );
            $return .= '<div class="sl-element hideme dontHide">
                            <div class="sl-ico sl-config" style="background-image:url(' . $img[0] .');"></div>
                            <div class="sl-title">' . get_the_title() . '</div>
                            <div class="tooltip s-roll">
                                <div class="details">
                                    <ul class="feature-list">';
                foreach ($items as $item) {
                	$return .= '<li><span class="list-dot"></span>' . $item .'</li>';
                }
        	$return .=          	'</ul>
                            	</div>
                        	</div>
                        	<span class="arrow-down s-roll"></span>
                    	</div>';
        endwhile;
        $post=$back; //restore post object
        $return .= '</section></div>';
	    return $return;
	}

	add_shortcode( 'jellythemes_services', 'jellythemes_services_list' );

	//Counters shortcode
	function jellythemes_counter( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'image' => '',
	        'counter' => '100',
	        'fact' => 'Projects completed'
		), $atts ) );
		$img = wp_get_attachment_image_src($image, 'member_photo');
		$return = '
		<div class="f-element hideme dontHide">
            <div class="f-ico s-three" style="background-image:url(' . $img[0] .');"></div>
            <div class="milestone-counter" data-perc="' . esc_attr($counter) . '">
           		<span class="milestone-count highlight">0</span> <!-- Initial Value = 0 -->
                <div class="milestone-details">' . esc_attr($fact) . '</div>
            </div>
        </div>';

        return $return;
	}
	add_shortcode( 'jellythemes_counter', 'jellythemes_counter' );

	// Skills bar shortcode
	function jellythemes_skills( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'counter' => '100',
	        'skill' => 'Web development'
		), $atts ) );
		$return = '<div class="skill-content">
	                    <div class="progress-bar skill-2">
	                      <div class="skill-in" title="' . esc_attr($counter) . '"><div class="info-skills">' . esc_attr($skill) . ' <span>- ' . esc_attr($counter) . '%</span></div></div>
	                    </div>
	                </div>';

        return $return;
	}
	add_shortcode( 'jellythemes_skills', 'jellythemes_skills' );


	//[jellythemes_services] displays services
	function jellythemes_testimonials_list($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => 5
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<div class="show">
                        <div class="caroussel-2">
                            <div class="caroussel-list-2">';
		$testimonials = new WP_Query(array('post_type'=>'testimonials', 'posts_per_page' => esc_attr($limit)));
        while ($testimonials->have_posts()) : $testimonials->the_post();
            $image = get_post_meta( $post->ID, '_jellythemes_author_avatar', true );
            $img = wp_get_attachment_image_src($image, 'service_icon');
            if (($testimonials->current_post%2==0 && $testimonials->current_post>=2) || $testimonials->current_post==0) {
            	$return .= '<div class="car-quote">
                                	<div class="testimonials">';
            }
            $return .= '<div class="avatar">' . wp_get_attachment_image($image, 'testimonial_avatar') .'</div>
                                        <div class="comment">' . strip_tags(get_post_meta( $post->ID, '_jellythemes_testimonial', true )). '<br><br><span>' . get_post_meta( $post->ID, '_jellythemes_author_name', true ). ', </span>' . get_post_meta( $post->ID, '_jellythemes_author_position', true ). '</div>';
            if ($testimonials->current_post%2!=0) {
            	$return .= '</div>
                                </div>';
            } else {
            	$return .= '<div class="clear q-spacer"></div>';
            }

        endwhile;
        $post=$back; //restore post object
        $return .=          	'</div>
		                        </div>
		                        <div class="car-prev-2"></div>
		                        <div class="car-next-2"></div>
		                    </div>
		                    <div class="controller-2">
		                    	<ul>
		                        </ul>
		                    </div>';
	    return $return;
	}

	add_shortcode( 'jellythemes_testimonials', 'jellythemes_testimonials_list' );

	// Carousel logos shortcode
	function jellythemes_logos_carousel( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'images' => array()
		), $atts ) );
		$return = '';
		$images_ids = explode(',',$images);
		$return = '<div class="clear"></div>
            <section class="list_carousel responsive hideme dontHide">
                <ul id="logos">';
        foreach ($images_ids as $id) {
        	$return .=  '<li>' . wp_get_attachment_image($id, 'full')  .  '</li>';
        }
        $return .= '</ul>
                <div class="clearfix"></div>
            </section>';
        return $return;
	}
	add_shortcode( 'jellythemes_logos_carousel', 'jellythemes_logos_carousel' );

	//Image separator shortcode
	function jellythemes_image_separator( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'image' => ''
		), $atts ) );
		$return = 	'<section class="img-spacer">
		            	<div class="img-item hideme dontHide">' . wp_get_attachment_image($image, 'full') . '</div>
		            </section>';

        return $return;
	}
	add_shortcode( 'jellythemes_image_separator', 'jellythemes_image_separator' );

	//contact info shortcode
	function jellythemes_contact_info( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'img' => 'adress-ico.png',
	        'value' => '1234 Street Name, City Name',
	        'label' => 'Address'
		), $atts ) );
	   return '<div class="f-data adress"><img src="' . get_template_directory_uri()  . '/img/' . esc_attr( $img ) . '"> ' . esc_attr( $label ) . ': <span>' . esc_attr( $value ) . '</span></div>';
	}
	add_shortcode( 'jellythemes_contact_info', 'jellythemes_contact_info' );

	if (function_exists('vc_remove_element')) {
		//Remove visual composer elements
		vc_remove_element('vc_accordion_tab');
		vc_remove_element('vc_accordion');
		vc_remove_element('vc_button');
		vc_remove_element('vc_carousel');
		vc_remove_element('vc_column_text');
		vc_remove_element('vc_cta_button');
		vc_remove_element('vc_facebook');
		vc_remove_element('vc_flickr');
		vc_remove_element('vc_gallery');
		vc_remove_element('vc_gmaps');
		vc_remove_element('vc_googleplus');
		vc_remove_element('vc_images_carousel');
		vc_remove_element('vc_item');
		vc_remove_element('vc_items');
		vc_remove_element('vc_message');
		vc_remove_element('vc_pie');
		vc_remove_element('vc_pinterest');
		vc_remove_element('vc_posts_grid');
		vc_remove_element('vc_posts_slider');
		vc_remove_element('vc_progress_bar');
		vc_remove_element('vc_raw_html');
		vc_remove_element('vc_separator');
		vc_remove_element('vc_single_image');
		vc_remove_element('vc_tab');
		vc_remove_element('vc_tabs');
		vc_remove_element('vc_teaser_grid');
		vc_remove_element('vc_text_separator');
		vc_remove_element('vc_toggle');
		vc_remove_element('vc_tweetmeme');
		vc_remove_element('vc_twitter');
		vc_remove_element('vc_video');
		vc_remove_element('vc_raw_js');
		vc_remove_element('vc_tour');
		vc_remove_element("vc_widget_sidebar");
		vc_remove_element("vc_wp_search");
		vc_remove_element("vc_wp_meta");
		vc_remove_element("vc_wp_recentcomments");
		vc_remove_element("vc_wp_calendar");
		vc_remove_element("vc_wp_pages");
		vc_remove_element("vc_wp_tagcloud");
		vc_remove_element("vc_wp_custommenu");
		vc_remove_element("vc_wp_text");
		vc_remove_element("vc_wp_posts");
		vc_remove_element("vc_wp_links");
		vc_remove_element("vc_wp_categories");
		vc_remove_element("vc_wp_archives");
		vc_remove_element("vc_wp_rss");
		vc_remove_element("vc_gallery");
		vc_remove_element("vc_teaser_grid");
		vc_remove_element("vc_button");
		vc_remove_element("vc_cta_button");

		vc_map( array(
		   "name" => __("Section title", 'jellythemes'),
		   "base" => "jellythemes_title",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "content",
		         "value" => __("Your title", 'jellythemes'),
		         "description" => __("Enter your title.", 'jellythemes')
		      )
		   )
		));


		vc_map( array(
		   "name" => __("Title (with pre-title)", 'jellythemes'),
		   "base" => "jellythemes_secondary_title",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "content",
		         "value" => __("Your title", 'jellythemes'),
		         "description" => __("Enter your title.", 'jellythemes')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "pretitle",
		         "value" => __("Your pre-title", 'jellythemes'),
		         "description" => __("Enter your pre-title.", 'jellythemes')
		      )
		   )
		));


		vc_map( array(
		   "name" => __("Content separator", 'jellythemes'),
		   "base" => "jellythemes_separator",
		   "class" => "",
		   'show_settings_on_create' => false,
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array()
		));

		vc_map( array(
		   "name" => __("Section content", 'jellythemes'),
		   "base" => "jellythemes_content",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
		         "type" => "textarea_html",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "content",
		         "value" => __("Your content", 'jellythemes'),
		         "description" => __("<p>Enter text.</p>", 'jellythemes')
		      ),
		      array(
			      "type" => "dropdown",
			      "heading" => __('Type of content', 'jellythemes'),
			      "param_name" => "class",
			      "value" => array(
			                        __("Normal", 'jellythemes') => 'title two',
			                        __("Half-content", 'jellythemes') => 'half-content dontHide',
			                      ),
			      "description" => __("Type of content", "jellythemes"),
			    )
		   )
		));


		vc_map( array(
		   "name" => __("Featured works", 'jellythemes'),
		   "base" => "jellythemes_featured",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Portfolio button link", 'jellythemes'),
		         "param_name" => "portfolio_link",
		         "value" => __("#", 'jellythemes'),
		         "description" => __("Link to your portfolio section", 'jellythemes')
		      ),
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of projects to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
			                      ),
			      "description" => __("Select the number of projects you want to show in the carousel", "jellythemes"),
			    )
		   )
		));


		vc_map( array(
		    "name" => __("Image Carousel", "jellythemes"),
		    "base" => "jellythemes_images_carousel",
		    "icon" => "icon-wpb-images-carousel",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Animated carousel with images', 'jellythemes'),
		    "params" => array(
			        array(
			            "type" => "attach_images",
			            "heading" => __("Images", "jellythemes"),
			            "param_name" => "images",
			            "value" => "",
			            "description" => __("Select images from media library.", "jellythemes")
			        )
			    )
		) );



		vc_map( array(
		   "name" => __("Team members", 'jellythemes'),
		   "base" => "jellythemes_team",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of members to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
			                      ),
			      "description" => __("Select the number of members you want to show", "jellythemes"),
			    )
		   )
		));



		vc_map( array(
		   "name" => __("Services", 'jellythemes'),
		   "base" => "jellythemes_services",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of services to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
			                      ),
			      "description" => __("Select the number of services you want to show", "jellythemes"),
			    )
		   )
		));


		vc_map( array(
		    "name" => __("Counter", "jellythemes"),
		    "base" => "jellythemes_counter",
		    "icon" => "jelly-icon",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Facts counter', 'jellythemes'),
		    "params" => array(
			        array(
			            "type" => "attach_image",
			            "heading" => __("Icon", "jellythemes"),
			            "param_name" => "image",
			            "value" => "",
			            "description" => __("Select icon from media library. 73x71px", "jellythemes")
			        ),
			        array(
				         "type" => "textfield",
				         "holder" => "div",
				         "class" => "",
				         "heading" => __("Counter number", 'jellythemes'),
				         "param_name" => "counter",
				         "value" => __("100", 'jellythemes'),
				         "description" => __("Total number for the counter", 'jellythemes')
				    ),
				    array(
				         "type" => "textfield",
				         "holder" => "div",
				         "class" => "",
				         "heading" => __("Fact", 'jellythemes'),
				         "param_name" => "fact",
				         "value" => __("Projects completed", 'jellythemes'),
				         "description" => __("Fact", 'jellythemes')
				    )
			    )
		) );



		vc_map( array(
		    "name" => __("Skill", "jellythemes"),
		    "base" => "jellythemes_skills",
		    "icon" => "jelly-icon",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Skill bar', 'jellythemes'),
		    "params" => array(
			        array(
				         "type" => "textfield",
				         "holder" => "div",
				         "class" => "",
				         "heading" => __("Counter number", 'jellythemes'),
				         "param_name" => "counter",
				         "value" => __("100", 'jellythemes'),
				         "description" => __("Total number for the counter", 'jellythemes')
				    ),
				    array(
				         "type" => "textfield",
				         "holder" => "div",
				         "class" => "",
				         "heading" => __("Skill", 'jellythemes'),
				         "param_name" => "skill",
				         "value" => __("Web design", 'jellythemes'),
				         "description" => __("Skill", 'jellythemes')
				    )
			    )
		) );

		vc_map( array(
		   "name" => __("Testimonials", 'jellythemes'),
		   "description" => __("Testimonials carousel", 'jellythemes'),
		   "base" => "jellythemes_testimonials",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of services to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
									__('6', 'jellythemes') => '6',
			                      ),
			      "description" => __("Select the number of services you want to show", "jellythemes"),
			    )
		   )
		));

		vc_map( array(
		   "name" => __("Portfolio", 'jellythemes'),
		   "description" => __("Portfolio with filter", 'jellythemes'),
		   "base" => "jellythemes_works",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of works to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
									__('6', 'jellythemes') => '6',
			                      ),
			      "description" => __("Select the number of works you want to show", "jellythemes"),
			    )
		   )
		));


		vc_map( array(
		    "name" => __("Logos Carousel", "jellythemes"),
		    "base" => "jellythemes_logos_carousel",
		    "icon" => "icon-wpb-images-carousel",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Animated carousel with clients logos', 'jellythemes'),
		    "params" => array(
			        array(
			            "type" => "attach_images",
			            "heading" => __("Logos", "jellythemes"),
			            "param_name" => "images",
			            "value" => "",
			            "description" => __("Select images from media library.", "jellythemes")
			        )
			    )
		) );


		vc_map( array(
		    "name" => __("Image separator", "jellythemes"),
		    "base" => "jellythemes_image_separator",
		    "icon" => "jelly-icon",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Image separator between sections', 'jellythemes'),
		    "params" => array(
			        array(
			            "type" => "attach_image",
			            "heading" => __("Icon", "jellythemes"),
			            "param_name" => "image",
			            "value" => "",
			            "description" => __("Select image from media library. Recommended 900px width", "jellythemes")
			        )
			    )
		) );



		vc_map( array(
		   "name" => __("Contact info", 'jellythemes'),
		   "base" => "jellythemes_contact_info",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "description" => __('Contact info row item (address, schedule, phone, etc.', 'jellythemes'),
		   'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.js'),
		   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/shortcodes.css'),
		   "params" => array(
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Label", 'jellythemes'),
		         "param_name" => "label",
		         "value" => __("Address", 'jellythemes'),
		         "description" => __("Label", 'jellythemes')
		      ),
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Value", 'jellythemes'),
		         "param_name" => "value",
		         "value" => __("1234 Stree Name, City Name", 'jellythemes'),
		         "description" => __("Value", 'jellythemes')
		      ),
		      array(
			      "type" => "dropdown",
			      "heading" => __('Info type', 'jellythemes'),
			      "param_name" => "img",
			      "value" => array(
			                        __("Address", 'jellythemes') => 'adress-ico.png',
			                        __("Phone", 'jellythemes') => 'phone-ico.png',
			                        __('Email', 'jellythemes') => 'mail-ico.png',
			                        __('Schedule', 'jellythemes') => 'hours-ico.png',
									),
			      "description" => __("Select type of info", "jellythemes"),
			    )
		   )
		));

	}
	function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
      if ($tag=='vc_row' || $tag=='vc_row_inner') {
        //$class_string = str_replace('vc_row-fluid', 'jt_row-fluid', $class_string);
        //$class_string = str_replace('vc_row', 'row', $class_string);
      }
      if ($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'vc_span$1', $class_string);
        //$class_string = str_replace('wpb_column', 'jt_col', $class_string);

      }
      //$class_string = str_replace('wpb_row', 'jt_row', $class_string);
      return $class_string;
    }
    // Filter to Replace default css class for vc_row shortcode and vc_column
    add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);
?>