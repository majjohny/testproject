
</div>
</div>



<footer>
<div class="container text-center">
<?php if ( get_theme_mod( 'm1_logo' ) ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"   >
</a>
<?php else : ?>
<hgroup>
<h1 class="site-title_footer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
</hgroup>
<?php endif; ?>

<div class="clr"></div>


<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>


</div>
</div>
</footer>




  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>


<?php wp_footer(); ?>
</body>
</html>
