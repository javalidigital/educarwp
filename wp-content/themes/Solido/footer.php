<a href="#" class="scrollup">^</a>
        <?php global $jellythemes; ?>
        <?php if ($jellythemes['opt_map']) : ?>
            <div id="maps" data-lat="<?php echo $jellythemes['latitude_coord'] ?>" data-lon="<?php echo $jellythemes['longitude_coord'] ?>">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <div class="map-content">
                    <div class="wpgmappity_container inner-map" id="wpgmappitymap"></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="socialFooter <?php echo ($jellythemes['opt_map'] ? '' : 'nomap') ?>">
        	<div class="social-icons">
                <div class="social">
                    <?php if ($jellythemes['facebook']) : ?> <a href="<?php echo $jellythemes['facebook']; ?>" target="_blank"><div class="face"></div></a><?php endif; ?>
                    <?php if ($jellythemes['twitter']) : ?><a href="<?php echo $jellythemes['twitter']; ?>" target="_blank"><div class="twitt"></div></a><?php endif; ?>
                    <?php if ($jellythemes['gplus']) : ?><a href="<?php echo $jellythemes['gplus']; ?>" target="_blank"><div class="plus"></div></a><?php endif; ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="copy"><?php echo $jellythemes['credits']; ?></div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>