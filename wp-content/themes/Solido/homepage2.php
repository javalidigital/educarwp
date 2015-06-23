<?php /* Template Name: Home Page 2 (Video background) */ ?>
<?php get_header(); ?>
        <div id="mask">
            <div class="loader">
              <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt='loading'>
            </div>
        </div>
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php $video = get_post_meta( $post->ID, '_jellythemes_slider_video', true ); ?>
        <?php $images = rwmb_meta('_jellythemes_slider_images', 'type=image', $post->ID ); ?>
        <?php foreach ($images as $image) : ?>
            <?php $bg = $image['full_url']; break; ?>
        <?php endforeach; ?>
        <section id="home" class="video clear">
           <div>
                <div class="mk-video-mask"></div>
                <a id="video-volume" onclick="$('#bgndVideo').toggleVolume()"><i class="icon-volume-down"></i></a>
                <!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
                <a id="bgndVideo" class="player mb_YTVPlayer" data-property="{videoURL:'<?php echo $video; ?>',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1}" style="display: none; background-image: none; background-position: initial initial; background-repeat: initial initial;" title="Lamborghini Aventador LP700-4 Official Commercial [1080P]">youtube</a>
            </div>
        </section>
        <section id="homedevice" style="background-image:url('<?php echo $bg ?>');" class="clear"></section>

        <div class="main-title <?php echo (empty($height) ? '' : 'title-fullWidth'); ?>">
            <div class="title-container">
                <div class="welcome"><?php echo get_post_meta( $post->ID, '_jellythemes_slider_title', true ); ?></div>
                <?php $texts =  get_post_meta( $post->ID, '_jellythemes_slider_text', true ); ?>
                <ul>
                    <?php foreach ($texts as $i => $text) : ?>
                        <li <?php echo $i==0 ? 'class="t-current"' : '' ?>><?php echo $text ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="spacer"></div>
                <div class="second-title"><?php echo get_post_meta( $post->ID, '_jellythemes_slider_content', true ); ?></div>
                <a href="<?php echo get_post_meta( $post->ID, '_jellythemes_slider_button_link', true ); ?>"><div class="buy-logo"><?php echo get_post_meta( $post->ID, '_jellythemes_slider_button_text', true ); ?><span></span></div></a>
        	</div>
        </div>
        <?php endwhile; ?>
        <div id="logx"></div>
        <header class="header">
            <div class="logo">
                <?php if (!empty($jellythemes['logo']) && strlen($jellythemes['logo']['url'])>3) : ?>
                    <img src="<?php echo $jellythemes['logo']['url']; ?> " alt="<?php echo strip_tags($jellythemes['blogname']); ?>">
                <?php else : ?>
                    <?php echo $jellythemes['blogname']; ?>
                <?php endif; ?>
            </div>
            <?php wp_nav_menu(array('container' => 'nav', 'container_id' => 'nav2', 'items_wrap' => '<a class="jump-menu" title="Show navigation">Show navigation</a><ul id="%1$s" class="%2$s">%3$s</ul>' ,'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
            <?php wp_nav_menu(array('container' => 'nav', 'container_id' => '','menu_id' => 'nav', 'container_class' => 'menu', 'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
        </header>
        <?php
            $sections = jellythemes_get_sections();
            $jellythemes_sections = new WP_Query( array('post_type' => 'page-sections',
                                'post__in' => $sections,
                                'posts_per_page' => count($sections),
                                'orderby' => 'post__in')); ?>
        <?php if ($jellythemes_sections->have_posts() ) : while ( $jellythemes_sections->have_posts() ) : $jellythemes_sections->the_post(); ?>
            <article id="<?php echo $post->post_name; ?>" class="content menu-top <?php echo get_post_meta( $post->ID, '_jellythemes_section_color', true ); ?>">
                <?php the_content(); ?>
            </article>
                <?php $back = $post //backup post data?>
                <?php $child_sections = new WP_Query(array('post_type' => 'page-sections', 'post_parent' => $post->ID)); ?>
                <?php while ($child_sections->have_posts() ) : $child_sections->the_post(); ?>
                    <article id="child" class="content menu-top <?php echo get_post_meta( $post->ID, '_jellythemes_section_color', true ); ?>">
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
                <?php $post = $back //restore post data?>
                    <?php $parallax_sections = new WP_Query(array('post_type' => 'parallax-sections', 'post__in' => array(get_post_meta( $post->ID, '_jellythemes_section_parallax', true )))); ?>
                    <?php while ($parallax_sections->have_posts() ) : $parallax_sections->the_post(); ?>
                        <?php $video_p = get_post_meta( $post->ID, '_jellythemes_parallax_video', true ); ?>
                        <?php $height = get_post_meta( $post->ID, '_jellythemes_parallax_height', true ); ?>
                        <?php if (empty($video_p)) : ?>
                        <?php $bg = rwmb_meta( '_jellythemes_parallax_bg', 'type=image' ); foreach ($bg as $bg_image) : $bg_url = $bg_image['full_url']; endforeach; ?>
                        <article class="parallax p-one p-two" style="background:url('<?php echo $bg_url; ?>'); <?php echo (empty($height) ? '' : 'height:' . $height .'px'); ?>">
                            <div class="p-title-one"><?php echo get_post_meta( $post->ID, '_jellythemes_parallax_title_1', true ); ?></div>
                            <div class="p-title-two"><?php echo get_post_meta( $post->ID, '_jellythemes_parallax_title_2', true ); ?></div>
                            <div class="spacer"></div>
                            <div class="p-image-02">
                                <?php $s_images = rwmb_meta( '_jellythemes_parallax_second_img', 'type=image' );
                                foreach ($s_images as $s_image) : ?>
                                    <div class="p-image-second hideme-slide dontHide delay"><img src="<?php echo $s_image['full_url'] ?>" alt="<?php echo $s_image['title'] ?>"></div>
                                <?php endforeach; ?>
                                <?php $f_images = rwmb_meta( '_jellythemes_parallax_first_img', 'type=image' );
                                foreach ($f_images as $f_image) : ?>
                                    <div class="p-image-first hideme-slide dontHide"><img src="<?php echo $f_image['full_url'] ?>" alt="<?php echo $f_image['title'] ?>"></div>
                                <?php endforeach; ?>
                            </div>
                        </article>
                        <?php elseif (empty($video)) : ?>
                            <article class="container-video">
                                <div class="parallax-info">
                                    <div class="p-video-title"><?php echo get_post_meta( $post->ID, '_jellythemes_parallax_title_1', true ); ?></div>
                                </div>
                                <div class="mk-video-mask"></div>
                                <div class="video-container"><div id="player"></div></div>
                                <script>
                                    var tag = document.createElement('script');
                                    tag.src = "http://www.youtube.com/player_api";
                                    var firstScriptTag = document.getElementsByTagName('script')[0];
                                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                    var player;
                                    function onYouTubePlayerAPIReady() {
                                        player = new YT.Player('player', {
                                            height: '100%',
                                            width: '100%',
                                            playerVars: { 'rel':0 , 'autoplay': 1, 'loop':1, 'controls':0,'autohide':1,'wmode':'opaque' },
                                            videoId: '<?php echo $video_p; ?>',
                                            events: {
                                            'onReady': onPlayerReady,
                                            'onStateChange': onPlayerStateChange}
                                        });
                                    }
                                    function onPlayerReady(event) {
                                        event.target.mute();
                                    }
                                    function onPlayerStateChange(event) {
                                        if(event.data === 0) {
                                            event.target.playVideo();
                                        }
                                    }
                                </script>
                            </article>
                        <?php endif; ?>
                    <?php endwhile; ?>
        <?php endwhile; ?>
        <?php else: ?>
            <h1><?php _e('No posts were found', 'jellythemes'); ?></h1>
        <?php endif; ?>
<?php get_footer(); ?>