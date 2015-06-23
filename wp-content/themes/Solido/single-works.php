<?php while ( have_posts() ) : the_post(); ?>
    <div class="w-arrows">
        <div class="btn-prev"></div>
        <div class="close"></div>
        <div class="btn-next"></div>
    </div>

    <div class="img-project">
        <div class="nav-wrapper">
            <div class="nav-work">
                <div class="w-prev"></div>
                <div class="w-next"></div>
            </div>
            <div class="wrapper-project">
                <ul>
                    <?php $video = get_post_meta( $post->ID, '_jellythemes_project_video', true ); ?>
                    <?php if (!empty($video)) : ?><li><?php echo wp_oembed_get($video, array('width' => 910)) ?></li><?php endif; ?>
                    <?php $images = rwmb_meta( '_jellythemes_project_images', 'type=plupload_image', get_the_ID() ); ?>
                    <?php  foreach($images as $image) : ?>
                    <li><?php echo  wp_get_attachment_image( $image['ID'], 'full'); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="controller-3">
                <ul>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="info-project">
            <div class="tag-project"><?php echo get_post_meta( $post->ID, '_jellythemes_project_subtitle', true ); ?></div>
            <div class="title-project"><?php the_title(); ?></div>
            <div class="spacer"></div>
            <div class="description">
                <?php echo get_post_meta( $post->ID, '_jellythemes_project_description', true ); ?>
                <?php
                    $url = get_post_meta( $post->ID, '_jellythemes_project_url', true );
                    if (!empty($url)) :
                ?>
                    <a class="visit-site" href="<?php echo $url ?>"><?php _e('Visit site', 'jellythemes'); ?></a>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="w-arrows last">
        <div class="btn-prev"></div>
        <div class="close"></div>
        <div class="btn-next"></div>
    </div>

<?php endwhile; ?>