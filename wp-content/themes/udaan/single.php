<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package udaan
 */

get_header();
$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<div class="main__body__wrapp">
   <div class="main__banner header__inner__banner">
      <div class="image__box__banner">
         <img src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" alt="" />
      </div>
      <div class="banner__content">
         <div class="container">
            <div class="banner__content__inner">
               <h1><?php the_title(); ?></h1>
            </div>
         </div>
      </div>
   </div>
   <div class="blog__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
               <div class="blog__details">
                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <img src="<?php echo $image1[0]; ?>" alt="" />
                  <?php endif; ?>
                  <h3><?php echo get_the_date('jS M, Y'); ?></h3>
                  <div class="share__holder">
                     <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                     <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                     <a href="#"><i class="fa-brands fa-facebook"></i></a>
                     <a href="#"><i class="fa-brands fa-twitter"></i></a>
                  </div>
                  <?php the_content(); ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="recentposts">
                  <h3>Recent Posts</h3>
                  
                <?php

   				$args = array (
   				'post_type'              => 'post',
   				'post_status'            => 'publish',
   				'order'                  => 'ASC',
   				'posts_per_page'=>-1
   				);
   				$count=1;
   				$banner = new WP_Query( $args );
   				if ( $banner->have_posts() ) {
   				while ( $banner->have_posts() ) {
   				$banner->the_post();
   				$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

   				?>

                  <div class="details__box">
                     <img src="<?php echo $image1[0]; ?>" alt="" class="small__img">
                     <div class="detail__text">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        <p><?php echo wp_trim_words( get_the_content(), 8, '...' ); ?></p>
                     </div>
                  </div>

                <?php $count++; } } wp_reset_postdata(); ?>


               </div>
              
            </div>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
