<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?> : <?php bloginfo('description'); ?>  : <?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet"> 
    
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">  



</head>
<body>


<header>
<div class="container text-center">
<?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"   >
</a>
<?php else : ?>
<hgroup>
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<p class="site-description"><?php bloginfo( 'description' ); ?></p>
</hgroup>
<?php endif; ?>
</div>
</header>



<div class="container">
<div class="row">
