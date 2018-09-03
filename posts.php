<?php /* Template Name: All posts */ ?>
<?php  get_header(); ?>




<div class="clr space2"></div>





<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<div class="col-md-12">
<h1 class="entry-title head_cher"><?php the_title(); ?></h1>
</div>
<?php the_content(); ?>
<?php

                    $current_date ="";

                    $count_posts = wp_count_posts();

                    $nextpost = 0;

                    $published_posts = $count_posts->publish;

                    $myposts = get_posts(array('posts_per_page'=>$published_posts)); 

	               foreach($myposts as $post) :

                         $nextpost++;

                         setup_postdata($post);

                          $date = get_the_date("F j, Y");   

                         if($current_date!=$date): 

                              if($nextpost>1): ?> 

                      

                              <?php endif; ?> 

                            

                              <?php $current_date=$date;

                         endif; ?>

                         

                         

<div class="col-md-4">
<div class="blog-short">
<div class="blog_image_thmb_box">
 <?php the_post_thumbnail( 'full' );   ?>
</div>
<span  class="text-upper" >Blog</span>
<h3><?php the_title(); ?></h3>
<span><?php echo $date; ?> <span class="slah_colr">/</span> <?php $totalcomments = get_comments_number(); echo $totalcomments; ?> Comment  </span>
<p><?php the_excerpt(); ?></p>
<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
</div>
</div>
                        

       
<?php endforeach; wp_reset_postdata(); ?>
<?php endwhile; 


?>



<?php endif; ?>




</div>


</div>

<div class="clr"></div>



<?php  get_footer(); ?>