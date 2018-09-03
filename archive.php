<?php  get_header(); ?>





<div class="clr space2"></div>


<div class="col-md-12 min_hts">
<div class="col-md-9 bord_rt">

<?php 	the_archive_title( '<h1 class="page-title">', '</h1>' );?>

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

<div class="col-md-6">
<div class="blog-short">
<div class="blog_image_thmb_box">
<?php the_post_thumbnail( 'full' );   ?>
</div>
<span class="text-upper"><?php echo $cat->name; ?></span>
<h3><?php  the_title();?></h3>
<span><?php the_time('F jS, Y') ?> <span class="slah_colr">/</span> <?php $totalcomments = get_comments_number(); echo $totalcomments; ?> Comment  </span>
<p><?php the_excerpt(); ?></p>
<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
</div>
</div>

<?php
endwhile;
?>

</div>

<div class="col-md-3 bor_left ">
<?php  get_sidebar(); ?>
</div>


</div>

<?php  get_footer(); ?>