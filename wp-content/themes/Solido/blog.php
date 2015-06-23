<?php /* Template Name: Blog Index */ ?>
<?php get_header(); ?>
<div id="mask">
        <div class="loader">
          <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt='loading'>
        </div>
    </div>
	<?php while ( have_posts() ) : the_post(); ?>
        <?php $height = get_post_meta( $post->ID, '_jellythemes_slider_height', true ); ?>
        <?php $pattern = get_post_meta( $post->ID, '_jellythemes_slider_pattern', true ); ?>
        <?php if (!empty($pattern)) : ?>
        <?php $images = rwmb_meta('_jellythemes_slider_images', 'type=image', $post->ID ); ?>
        <?php foreach ($images as $image) : ?>
            <?php $bg = $image['full_url']; break; ?>
        <?php endforeach; ?>
        <section id="home" class="home-pat clear">
            <div class="pattern" style="background-image:url('<?php echo $bg ?>');">

            </div>
        </section>
        <?php else : ?>
        <section id="<?php echo $post->post_name; ?>" class="<?php echo (empty($height) ? 'slideshow-home' : 'slideshow-home-fullWidth'); ?> slide-home clear"
            data-slides="
                        <?php $images = rwmb_meta('_jellythemes_slider_images', 'type=image', $post->ID ); ?>
                        <?php foreach ($images as $image) : ?>
                            <?php echo $image['full_url'] ?>,
                        <?php endforeach; ?>
                        ">
            <div>
                <ul class="slider-controls">
                    <li><a id="vegas-next" class="s-next" href="#"></a></li>
                    <li><a id="vegas-prev" class="s-prev" href="#"></a></li>
                </ul>
            </div>
        </section>
        <?php endif; ?>
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
                <?php if (!empty($jellythemes['logo'])) : ?>
                    <img src="<?php echo $jellythemes['logo']['url']; ?> " alt="<?php echo strip_tags($jellythemes['blogname']); ?>">
                <?php else : ?>
                    <?php echo $jellythemes['blogname']; ?>
                <?php endif; ?>
            </div>
        <?php wp_nav_menu(array('container' => 'nav', 'container_id' => 'nav2', 'items_wrap' => '<a class="jump-menu" title="Show navigation">Show navigation</a><ul id="%1$s" class="%2$s">%3$s</ul>' ,'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
        <?php wp_nav_menu(array('container' => 'nav', 'container_id' => '','menu_id' => 'nav', 'container_class' => 'menu', 'theme_location' => 'main', 'walker' => new jellythemes_walker_nav_menu)); ?>
    </header>
    <div class="light">
		<section class="content padded container blog">
			<div class="title grid-full">
				<h2><?php the_title(); ?></h2>
				<div class="spacer"></div>
			</div>
			<div class="clearfix"></div>
			<div class="grid-4">
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$blog = new WP_Query(array('post_type'=>'post', 'paged' => $paged));?>
			<?php if ( $blog->have_posts() ) : while  ( $blog->have_posts() ) : $blog->the_post(); ?>
					<div <?php post_class(); ?>>

						<?php if (is_single()): ?>
							<span class="date">
								<?php echo get_the_date('d') ?>
								<br>
								<small><?php echo get_the_date('M') ?></small>
							</span>
						<?php else: ?>
							<a href="<?php the_permalink(); ?>">
								<span class="date">
									<?php echo get_the_date('d') ?>
									<br>
									<small><?php echo get_the_date('M') ?></small>
								</span>
							</a>
						<?php endif; ?>

						<div class="inner-spacer-right-lrg">
								<div class="post-media clearfix">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('full') ?>
									<?php endif; ?>
								</div>

								<div class="post-title">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
								</div>


								<div class="post-body pe-wp-default">
									<?php the_excerpt(); ?>
									<?php wp_link_pages(); ?>
								</div>
								<div class="post-meta">
									<h6>
									<?php _e("by",'jellythemes'); ?> <?php the_author_posts_link(); ?> /
									<?php _e("in",'jellythemes'); ?> <?php the_category(', '); ?> /
									<?php comments_popup_link(); ?>
									<a href="<?php the_permalink(); ?>" class="more"><?php _e('Read more', 'jellythemes') ?></a>
									</h6>
								</div>
								<?php if (has_tag()): ?>
									<div class="tags">
										<?php the_tags('',' ',''); ?>
									</div>
								<?php endif; ?>

							</div>
						</div>
				<?php endwhile; ?>
					<div class="pagination">
						<?php
							global $wp_query;
							$temp_wp_query = $wp_query;
							$wp_query = null;
							$wp_query = $blog;
						?>
						<?php posts_nav_link(); ?>
					</div>
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
				</div>
			<?php get_sidebar(); ?>
		</section>
	</div>

<?php get_footer(); ?>