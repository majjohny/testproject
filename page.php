<?php  get_header(); ?>


<div class="clr space2"></div>

<div class="col-md-12 min_hts">

<div class="col-md-9 bord_rt">
<?php
$parent_post_id = $post->post_parent;
    $parent_post = get_post($parent_post_id);
    $parent_post_title = $parent_post->post_title;
 //   echo $parent_post_title;
?>



<?php the_title( '<h1 class="entry-title head_cher">', '</h1>' ); ?>
<?php the_post_thumbnail( 'full' );   ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>


</div>
<div class="col-md-3">
<?php  get_sidebar(); ?>

</div>

</div>


<?php  get_footer(); ?>