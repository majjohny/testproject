<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Acme Themes
 * @subpackage Education Base
 */
get_header();
?>




<div class="col-md-12 min_hts">

<div class="col-md-9 bord_rt">

<?php if ( have_posts() ) : ?>
                 <header class="page-header">

				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

			</header><!-- .page-header -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
 the_title( '<h3 >', '</h3>' );
the_excerpt();
?>
<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
<hr />

<?php
endwhile;

the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );



 else: ?>
<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>




<?php endif; ?>



</div>

<div class="col-md-3">
<?php  get_sidebar(); ?>

</div>


</div>




<?php get_footer(); ?>