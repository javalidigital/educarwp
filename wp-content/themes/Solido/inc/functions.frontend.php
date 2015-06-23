<?php
    // Define content width
    if ( ! isset( $content_width ) ) $content_width = 1180;
	// Load scripts and styles files
    function jellythemes_scripts_and_styles() {
        global $jellythemes;
        if (!is_admin()) {
            wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
            wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
            wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
            wp_enqueue_style( 'solido', get_template_directory_uri() . '/css/solido.css' );
            wp_enqueue_style( 'solido', get_template_directory_uri() . '/css/animate/animate.css' );
            wp_enqueue_style( 'isotope', get_template_directory_uri() . '/css/isotope.css' );
            wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
            wp_enqueue_style( 'vegas', get_template_directory_uri() . '/css/vegas/jquery.vegas.css' );
            wp_enqueue_style( 'superslides', get_template_directory_uri() . '/js/superslides-0.6.2/dist/stylesheets/superslides.css' );
            wp_enqueue_style( 'maginific-popup', get_template_directory_uri() . '/css/popup/magnific-popup.css' );
            wp_enqueue_style( 'dark', get_template_directory_uri() . '/css/color/dark.css' );
            if (empty($jellythemes['color'])) {wp_enqueue_style('blue', get_template_directory_uri() . '/css/color/blue.css' );}
            else {wp_enqueue_style( $jellythemes['color'], get_template_directory_uri() . '/css/color/' . $jellythemes['color'] . '.css' );}

            wp_enqueue_script('jquery');
            wp_enqueue_script(
                'modernizr',
                get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js',
                false,false,true );
            wp_enqueue_script(
                'jquery-ui',
                'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'carouFredSel',
                get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'smoothwheel',
                get_template_directory_uri() . '/js/jquery.smoothwheel.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'main',
                get_template_directory_uri() . '/js/main.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'inview',
                get_template_directory_uri() . '/js/jquery.inview.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'sticky',
                get_template_directory_uri() . '/js/jquery.sticky.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'easing',
                get_template_directory_uri() . '/js/caroussel/jquery.easing.1.3.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'portfolio',
                get_template_directory_uri() . '/js/portfolio.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'superslidesjs',
                get_template_directory_uri() . '/js/superslides-0.6.2/dist/jquery.superslides.js',
                array('jquery'),false,true );

            wp_enqueue_script(
                'vegas',
                get_template_directory_uri() . '/js/vegas/jquery.vegas.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'hoverdir',
                get_template_directory_uri() . '/js/jquery.hoverdir.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'nav',
                get_template_directory_uri() . '/js/jquery.nav.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'magnific-popup',
                get_template_directory_uri() . '/js/popup/jquery.magnific-popup.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'contentcarousel',
                get_template_directory_uri() . '/js/caroussel/jquery.contentcarousel.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'isotope',
                get_template_directory_uri() . '/js/jquery.isotope.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'plugins',
                get_template_directory_uri() . '/js/plugins.js',
                array('jquery'),false,true);

            if ( !is_page_template( 'homepage2.php' ) ) {
                wp_enqueue_script(
                    'vegas_slider',
                    get_template_directory_uri() . '/js/vegas/vegas_slider.js',
                    array('jquery'),false,true);
            }
            wp_enqueue_script(
                'test',
                get_template_directory_uri() . '/js/test.js',
                array('jquery'),false,true);
            if ( is_page_template( 'homepage.php' )  ) {
                wp_enqueue_script(
                    'superslides',
                    get_template_directory_uri() . '/js/superslides.js',
                    array('jquery'),false,true );
            }
            if ( is_page_template( 'homepage2.php' )  ) {
                wp_enqueue_script(
                    'devices',
                    get_template_directory_uri() . '/js/devices.js',
                    array('jquery'),false,true );
                wp_enqueue_script(
                    'ytplayer',
                    get_template_directory_uri() . '/js/video/jquery.mb.YTPlayer.js',
                    array('jquery'),false,true);
            }
            if ( is_page_template( 'homepage3.php' )  ) {
                wp_enqueue_script(
                    'jquery.bxslider',
                    get_template_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.min.js',
                    array('jquery'),false,true );
                wp_enqueue_script(
                    'bxslider',
                    get_template_directory_uri() . '/js/bxslider.js',
                    array('jquery.bxslider'),false,true );
                wp_enqueue_style( 'jquery.bxslider', get_template_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.css' );
            }
            $theme_opts = array( 'theme_path' => get_template_directory_uri(), 'color' => $jellythemes['color'], 'marker' => $jellythemes['marker_name'] );
            wp_localize_script( 'vegas_slider', 'jellythemes', $theme_opts );
            wp_localize_script( 'plugins', 'jellythemes', $theme_opts );
        }
    }
    add_action('wp_enqueue_scripts', 'jellythemes_scripts_and_styles');

    // Define walker nav menu to display custom html output
    class jellythemes_walker_nav_menu extends Walker_Nav_Menu {

        function start_el( &$output, $item, $depth = 0, $args = array(), $curr = 0 ) {
            global $wp_query;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );
            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
            if ($item->object == 'page' || $item->object == 'page-sections' ) {
                $varpost = get_post($item->object_id);
                $attributes .= ' href="' . get_site_url() . '/#' . $varpost->post_name . '"';
            } else {
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            }
            $item_output = '';
            if (is_object($args)) :
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            endif;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, 0 );
        }
    }

    //Return array of section's IDs in Main menu
    function jellythemes_get_sections(){
        if(!has_nav_menu( 'main' )) {
            return;
        }
        if ( ( $locations = get_nav_menu_locations() ) && $locations['main']  ) {
            $menu = wp_get_nav_menu_object( $locations['main'] );
            $items  = wp_get_nav_menu_items($menu->term_id);
            $sections = array();
            foreach((array) $items as $menu_items){
                if ($menu_items->object == 'page-sections') {
                    $sections[] = $menu_items->object_id;
                }
            }
        }
        return $sections;
    }

    //Comment format and Walker
    function jellythemes_comments_format($comment, $args, $depth) {
            $id = $comment->comment_ID;
    ?>
            <li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php echo $id ?>">

            <!--comment body-->
            <div class="row-fluid comment-body" id="div-comment-<?php echo $id ?>">
                <div class="span1 comment-author vcard">
                    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 43); ?>
                </div>

                <div class="span11">
                    <?php if ($comment->comment_approved == '0') : ?>
                    <span class="comment-awaiting-moderation"><?php echo __('Your comment is awaiting moderation.','Pixelentity Theme/Plugin') ?></span>
                    <br/>
                    <?php endif; ?>


                    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>','Pixelentity Theme/Plugin'), get_comment_author_link()); ?>
                    <div class="comment-meta commentmetadata">
                    <a href="<?php echo htmlspecialchars(get_comment_link()); ?>">
                        <?php printf( __('%1$s at %2$s','Pixelentity Theme/Plugin'), get_comment_date(),  get_comment_time()); ?>
                    </a>
                    <?php edit_comment_link(__('(Edit)','Pixelentity Theme/Plugin'),'&nbsp;&nbsp;',''); ?>
                    </div>
                    <div class="pe-wp-default">
                        <?php comment_text(); ?>
                    </div>
                    <div class="reply pull-right">
                        <?php comment_reply_link(array_merge( $args, array('add_below' => "div-comment", 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>
            </div>
    <?php
    }

    // Theme supports
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "post-thumbnails" )
?>
