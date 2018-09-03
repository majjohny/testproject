<?php  get_header(); ?>


<div class="clr space2"></div>

<div class="col-md-12">
<div class="col-md-9 bord_rt">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();
// Include the single post content template.
?>
            
   
            
<?php
/**
* The template part for displaying content
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- .entry-header -->

<?php if ( has_post_thumbnail() ) : ?>
<div class="col-md-6 banner_image pull-right"> <?php the_post_thumbnail( 'full' );   ?></div>
<?php else : ?><?php endif; ?>


<?php // twentysixteen_post_thumbnail(); ?>
<div class="entry-content">
<?php
/* translators: %s: Name of current post */
the_content( sprintf(
__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
get_the_title()
) );
wp_link_pages( array(


'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
'separator'   => '<span class="screen-reader-text">, </span>',
) );

?>

</div>

<div class="col-md-12 marg_top">
<?php  the_tags('<div class="wpb-tags"> ', ' ', '</div>'); ?>
</div>


</article><!-- #post-## -->

<div class="clr"></div>


<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
comments_template();
}

if ( is_singular( 'attachment' ) ) {
// Parent post navigation.
the_post_navigation( array(
'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
) );
} elseif ( is_singular( 'post' ) ) {
// Previous/next post navigation.
the_post_navigation( array(
'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
'<span class="post-title">%title</span>',
'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
'<span class="post-title">%title</span>',
) );

}






endwhile;
?>


</div>

<div class="col-md-3 bor_left ">
<?php  get_sidebar(); ?>
</div>


</div>



<?php  get_footer(); ?>