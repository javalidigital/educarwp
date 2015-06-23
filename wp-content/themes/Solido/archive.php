<?php get_header(); ?>
<div id="mask">
        <div class="loader">
          <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt='loading'>
        </div>
    </div>
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
				<h2><?php _e('ARCHIVES', 'jellythemes'); ?></h2>
				<div class="spacer"></div>
			</div>
			<div class="clearfix"></div>
			<div class="grid-4">

			<?php if ( have_posts() ) : while  ( have_posts() ) : the_post(); ?>
					<div <?php post_class(); ?>>

						<?php if (is_single()): ?>
							<span class="date">
								<?php echo get_the_date('d') ?>
								<br>
								<small><?php echo get_the_date('M') ?></small>
							</span>
						<?php else: ?>
							<a href="<?php echo $link ?>">
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