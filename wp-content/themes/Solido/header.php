<?php global $jellythemes; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo strip_tags($jellythemes['blogname']) ?> <?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="<?php echo $jellythemes['favicon']['url'] ?>">
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        <?php wp_head(); ?>
    </head>

<body <?php body_class($jellythemes['color'] . ' ' . $jellythemes['layout']); ?>>
<div class="selo"></div>
<div class="logo-topo"></div>

