<?php  get_header(); ?>



<div class="clr space"></div>


<ul class="nav nav-tabs">
<?php
$args = array(
'taxonomy' => 'project-categories',
'orderby' => 'name',
'order'   => 'ASC'
 );
$cats = get_categories($args);
foreach($cats as $cat) {
?>
<li><a data-toggle="tab" href="#menu<?php echo $cat->cat_ID; ?>"><?php echo $cat->name; ?></a></li>
<?php  } ?>
  
</ul>

<div class="tab-content">

<div id="home" class="tab-pane fade in active">



<?php
$the_query = new WP_Query( array( 'post_type' => 'custom_posts', 'posts_per_page' => 9 , 'paged' => get_query_var('paged') ? get_query_var('paged') : 1) ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post();  $date = get_the_date("F j, Y");    ?>


<div class="col-md-4">
<div class="blog-short">
<div class="blog_image_thmb_box">
<?php the_post_thumbnail( 'full' );   ?>
</div>
<span class="text-upper">
<?php
$category = get_the_terms( $post->ID, 'project-categories' );     
foreach ( $category as $cat){
   $cat_name= $cat->name; 
}

echo  $cat_name;
?></span>
<h3><?php  the_title();?></h3>
<span><?php echo $date; ?> <span class="slah_colr">/</span> <?php $totalcomments = get_comments_number(); echo $totalcomments; ?> Comment  </span>
<p><?php the_excerpt(); ?></p>
<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
</div>
</div>

<?php
endwhile;
?>

<div class="col-md-12 text-center">
<?php
$big = 999999999; // need an unlikely integer
 echo paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $the_query->max_num_pages
) );

wp_reset_postdata();
?>
</div>

</div>





<?php
$args = array(
'taxonomy' => 'project-categories',
'orderby' => 'name',
'order'   => 'ASC'
 );
$cats = get_categories($args);
foreach($cats as $cat) {
?>

<div id="menu<?php echo $cat->cat_ID; ?>" class="tab-pane fade">

<?php $cat_id=$cat->cat_ID; ?>







<?php
$args = array(
    'post_type' => 'custom_posts',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'project-categories',
            'field' => 'id',
            'terms' => $cat_id,
        )
    )
);
$the_query = new WP_Query( $args );
while ( $the_query->have_posts() ) : $the_query->the_post();
    //content 

?>



<div class="col-md-4">
<div class="blog-short">
<div class="blog_image_thmb_box">
<?php the_post_thumbnail( 'full' );   ?>
</div>
<span class="text-upper">
<?php
$category = get_the_terms( $post->ID, 'project-categories' );     
foreach ( $category as $cat){
   $cat_name= $cat->name; 
}

echo  $cat_name;
?></span>
<h3><?php  the_title();?></h3>
<span><?php echo $date; ?> <span class="slah_colr">/</span> <?php $totalcomments = get_comments_number(); echo $totalcomments; ?> Comment  </span>
<p><?php the_excerpt(); ?></p>
<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
</div>
</div>




<?php
endwhile;
?>













</div>

<?php  } ?>



</div>


<?php  get_footer(); ?>